<?php
/**
 * MİS360 Lisans ve Aktivasyon Motoru (License & Activation Manager)
 *
 * Bu sınıf, temanın alan adı (domain) bazlı lisanslanmasını,
 * kriptografik HMAC-SHA256 anahtar doğrulamasını, GitHub bulut senkronizasyonunu
 * ve merkezi sunucu yetkilendirmesini yönetir.
 *
 * @package MİS360
 * @author  Serkan AKKAYA <https://misteknoloji360.com.tr/>
 * @since   1.0.0
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

class MIS360_License_Manager {

    public const OPTION_KEY  = 'mis360_license_data';
    public const SECRET_SALT = 'MIS_TEKNOLOJI_360_SERKAN_AKKAYA_2026_SECRET_KEY';

    /**
     * Sınıfı ve Admin Kancalarını Başlat
     */
    public static function init(): void {
        add_action('admin_menu', [__CLASS__, 'register_admin_menu']);
        add_action('admin_init', [__CLASS__, 'handle_actions']);
        add_action('admin_notices', [__CLASS__, 'display_admin_notice']);
    }

    /**
     * Lisansın geçerli ve aktif olup olmadığını kontrol eder
     */
    public static function is_licensed(): bool {
        $data = get_option(self::OPTION_KEY, []);
        if (empty($data) || empty($data['key']) || empty($data['status'])) {
            return false;
        }

        if ($data['status'] !== 'valid') {
            return false;
        }

        // Alan adı kontrolü (Developer lisansı değilse domain eşleşmeli)
        $current_domain = self::get_current_domain();
        if (!empty($data['domain']) && $data['domain'] !== $current_domain && ($data['type'] ?? '') !== 'Developer / Sınırsız') {
            return false;
        }

        return true;
    }

    /**
     * Lisans özet bilgilerini döndürür
     */
    public static function get_license_info(): array {
        $data        = get_option(self::OPTION_KEY, []);
        $is_licensed = self::is_licensed();
        $key         = (string) ($data['key'] ?? '');

        $masked_key = '';
        if (!empty($key)) {
            if (strlen($key) > 10) {
                $masked_key = substr($key, 0, 7) . '****-****-' . substr($key, -4);
            } else {
                $masked_key = substr($key, 0, 3) . '****';
            }
        }

        return [
            'is_active'    => $is_licensed,
            'key'          => $key,
            'masked_key'   => $masked_key,
            'domain'       => $data['domain'] ?? self::get_current_domain(),
            'type'         => $data['type'] ?? 'Standart',
            'activated_at' => $data['activated_at'] ?? '',
            'status_label' => $is_licensed ? __('Aktif (Lisanslı)', 'mis360') : __('Etkin Değil (Lisanssız)', 'mis360'),
            'developer'    => 'Serkan AKKAYA (misteknoloji360.com.tr)',
        ];
    }

    /**
     * Lisansı etkinleştirir
     */
    public static function activate(string $license_key): array {
        $clean_key = sanitize_text_field(trim($license_key));

        if (empty($clean_key)) {
            return [
                'success' => false,
                'message' => __('Lütfen geçerli bir lisans anahtarı girin.', 'mis360'),
            ];
        }

        $domain = self::get_current_domain();

        // 1. Geliştirici / Master Anahtar Kontrolü
        if (self::is_master_key($clean_key)) {
            $data = [
                'key'          => $clean_key,
                'status'       => 'valid',
                'type'         => 'Developer / Sınırsız',
                'domain'       => $domain,
                'activated_at' => current_time('mysql'),
            ];
            update_option(self::OPTION_KEY, $data);
            return [
                'success' => true,
                'message' => __('✓ Geliştirici Lisansı başarıyla etkinleştirildi! Tüm özellikler ve güncellemeler sınırsız açıldı.', 'mis360'),
            ];
        }

        // 2. Çevrimdışı Kriptografik Algoritmik Doğrulama (MIS-PRO-XXXX-YYYY veya MIS-XXXX-XXXX-XXXX)
        $algo_check = self::verify_key_algorithm($clean_key);
        if ($algo_check['valid']) {
            $data = [
                'key'          => $clean_key,
                'status'       => 'valid',
                'type'         => $algo_check['type'],
                'domain'       => $domain,
                'activated_at' => current_time('mysql'),
            ];
            update_option(self::OPTION_KEY, $data);
            return [
                'success' => true,
                'message' => sprintf(__('✓ MİS360 Lisansı başarıyla etkinleştirildi! (%s - %s)', 'mis360'), $domain, $algo_check['type']),
            ];
        }

        // 3. Uzak Sunucu & GitHub Bulut Doğrulaması
        $remote_verify = self::verify_remote_server($clean_key, $domain);
        if ($remote_verify['success']) {
            $data = [
                'key'          => $clean_key,
                'status'       => 'valid',
                'type'         => $remote_verify['type'] ?? 'PRO Lifetime',
                'domain'       => $domain,
                'activated_at' => current_time('mysql'),
            ];
            update_option(self::OPTION_KEY, $data);
            return [
                'success' => true,
                'message' => __('✓ Lisansınız merkezi sunucudan onaylandı ve etkinleştirildi!', 'mis360'),
            ];
        }

        return [
            'success' => false,
            'message' => __('Geçersiz lisans anahtarı! Lütfen Serkan AKKAYA (misteknoloji360.com.tr) ile iletişime geçin.', 'mis360'),
        ];
    }

    /**
     * Lisansı devre dışı bırakır
     */
    public static function deactivate(): array {
        delete_option(self::OPTION_KEY);
        return [
            'success' => true,
            'message' => __('Lisans bu siteden başarıyla kaldırıldı.', 'mis360'),
        ];
    }

    /**
     * Master Anahtarlar (Geliştirici Serkan AKKAYA için sınırsız erişim)
     */
    private static function is_master_key(string $key): bool {
        $upper = strtoupper(str_replace(['-', ' '], '', $key));
        $master_signatures = [
            'MISMASTER360SERKANAKKAYA',
            'MISTEKNOLOJI360PRO',
            'SERKANAKKAYALICENSE2026',
        ];

        if (in_array($upper, $master_signatures, true)) {
            return true;
        }

        // Prefix kontrolü (Örn: MIS-DEV-...)
        if (str_starts_with($key, 'MIS-DEV-') || str_starts_with($key, 'MIS-MASTER-')) {
            return true;
        }

        return false;
    }

    /**
     * Çevrimdışı Kriptografik Algoritmik Doğrulama (HMAC-SHA256)
     */
    private static function verify_key_algorithm(string $key): array {
        $clean = strtoupper(trim($key));

        // Format 1: MIS-PRO-XXXX-YYYY
        if (preg_match('/^MIS-PRO-([A-Z0-9]{4})-([A-Z0-9]{4})$/i', $clean, $matches)) {
            $rand_str      = strtoupper($matches[1]);
            $checksum      = strtoupper($matches[2]);
            $expected_hash = strtoupper(substr(hash_hmac('sha256', $rand_str . self::SECRET_SALT, self::SECRET_SALT), 0, 4));

            if ($checksum === $expected_hash) {
                return ['valid' => true, 'type' => 'PRO Lifetime'];
            }
        }

        // Format 2: MIS-XXXX-XXXX-XXXX
        if (preg_match('/^MIS-([A-Z0-9]{4})-([A-Z0-9]{4})-([A-Z0-9]{4})$/i', $clean, $matches)) {
            $payload       = strtoupper($matches[1] . $matches[2]);
            $checksum      = strtoupper($matches[3]);
            $expected_hash = strtoupper(substr(hash_hmac('sha256', $payload . self::SECRET_SALT, self::SECRET_SALT), 0, 4));

            if ($checksum === $expected_hash) {
                return ['valid' => true, 'type' => 'PRO Lifetime'];
            }
        }

        return ['valid' => false, 'type' => ''];
    }

    /**
     * GitHub Bulut (licenses.json) & misteknoloji360.com.tr API Doğrulaması
     */
    private static function verify_remote_server(string $key, string $domain): array {
        // 1. GitHub licenses.json bulut deposundan kontrol
        $cloud_url = 'https://raw.githubusercontent.com/akkaya6611/mis360-theme/main/licenses.json';
        $cloud_res = wp_remote_get($cloud_url, [
            'timeout'   => 5,
            'sslverify' => false,
        ]);

        if (!is_wp_error($cloud_res) && wp_remote_retrieve_response_code($cloud_res) === 200) {
            $list = json_decode(wp_remote_retrieve_body($cloud_res), true);
            if (is_array($list)) {
                foreach ($list as $lic) {
                    if (strcasecmp($lic['key'] ?? '', $key) === 0) {
                        if (($lic['status'] ?? 'active') !== 'active') {
                            return ['success' => false];
                        }
                        $lic_domain = preg_replace('/^www\./i', '', strtolower(trim($lic['domain'] ?? '')));
                        if (!empty($lic_domain) && $lic_domain !== '*' && $lic_domain !== $domain) {
                            return ['success' => false];
                        }
                        return ['success' => true, 'type' => $lic['type'] ?? 'PRO Lifetime'];
                    }
                }
            }
        }

        // 2. Web Servis API Doğrulaması
        $api_url  = 'https://misteknoloji360.com.tr/api/license-verify';
        $response = wp_remote_post($api_url, [
            'timeout'   => 5,
            'sslverify' => false,
            'body'      => [
                'license_key' => $key,
                'domain'      => $domain,
                'theme'       => 'mis360',
                'version'     => MIS360_VERSION,
            ],
        ]);

        if (!is_wp_error($response) && wp_remote_retrieve_response_code($response) === 200) {
            $json = json_decode(wp_remote_retrieve_body($response), true);
            if (!empty($json['success']) && true === $json['success']) {
                return [
                    'success' => true,
                    'type'    => $json['license_type'] ?? 'PRO Lifetime',
                ];
            }
        }

        return ['success' => false];
    }

    /**
     * Mevcut sitenin temiz alan adını döndürür
     */
    public static function get_current_domain(): string {
        $host = wp_parse_url(home_url(), PHP_URL_HOST);
        $host = preg_replace('/^www\./i', '', strtolower(trim((string) $host)));
        return $host ?: 'localhost';
    }

    /**
     * Müşteriler için Kriptografik Lisans Anahtarı Üretici (HMAC-SHA256 Helper)
     */
    public static function generate_license_key(string $type = 'PRO'): string {
        $random = strtoupper(wp_generate_password(4, false));
        $hash   = strtoupper(substr(hash_hmac('sha256', $random . self::SECRET_SALT, self::SECRET_SALT), 0, 4));
        return 'MIS-PRO-' . $random . '-' . $hash;
    }

    /**
     * WordPress Admin Menüsüne Lisans Sayfasını Ekle
     */
    public static function register_admin_menu(): void {
        add_theme_page(
            esc_html__('MİS360 Lisans & Aktivasyon', 'mis360'),
            esc_html__('MİS360 Lisans', 'mis360'),
            'manage_options',
            'mis360-license',
            [__CLASS__, 'render_license_page']
        );
    }

    /**
     * Lisans Form İşlemlerini Yönet (Aktivasyon / Deaktivasyon)
     */
    public static function handle_actions(): void {
        if (!isset($_POST['mis360_license_action'])) {
            return;
        }

        if (!current_user_can('manage_options')) {
            return;
        }

        check_admin_referer('mis360_license_nonce', 'mis360_license_nonce_field');

        $action = sanitize_text_field(wp_unslash($_POST['mis360_license_action']));

        if ('activate' === $action && !empty($_POST['mis360_license_key'])) {
            $key    = sanitize_text_field(wp_unslash($_POST['mis360_license_key']));
            $result = self::activate($key);
            set_transient('mis360_license_notice', $result, 30);
            wp_safe_redirect(admin_url('themes.php?page=mis360-license'));
            exit;
        }

        if ('deactivate' === $action) {
            $result = self::deactivate();
            set_transient('mis360_license_notice', $result, 30);
            wp_safe_redirect(admin_url('themes.php?page=mis360-license'));
            exit;
        }
    }

    /**
     * Admin Bildirimi Göster (Lisanssız Durumda)
     */
    public static function display_admin_notice(): void {
        $screen = get_current_screen();
        if ($screen && 'appearance_page_mis360-license' === $screen->id) {
            $notice = get_transient('mis360_license_notice');
            if ($notice && is_array($notice)) {
                delete_transient('mis360_license_notice');
                $class = $notice['success'] ? 'notice-success' : 'notice-error';
                printf('<div class="notice %1$s is-dismissible"><p>%2$s</p></div>', esc_attr($class), esc_html($notice['message']));
            }
            return;
        }

        if (!self::is_licensed() && current_user_can('manage_options')) {
            ?>
            <div class="notice notice-warning is-dismissible">
                <p>
                    <strong><?php esc_html_e('MİS360 Teması:', 'mis360'); ?></strong> 
                    <?php esc_html_e('Temanız henüz lisanslanmadı. GitHub otomatik güncellemelerini ve tüm gelişmiş özellikleri açmak için lütfen lisans anahtarınızı giriniz.', 'mis360'); ?>
                    <a href="<?php echo esc_url(admin_url('themes.php?page=mis360-license')); ?>" class="button button-primary" style="margin-left: 10px;">
                        <?php esc_html_e('Lisansı Etkinleştir', 'mis360'); ?>
                    </a>
                </p>
            </div>
            <?php
        }
    }

    /**
     * Lisans Yönetim Arayüzü (Admin UI)
     */
    public static function render_license_page(): void {
        $info = self::get_license_info();
        ?>
        <div class="wrap" style="max-width: 860px; margin-top: 25px;">
            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 20px;">
                <h1 style="font-size: 26px; font-weight: 800; color: #0f172a; margin: 0;">
                    <?php esc_html_e('MİS360 Lisans & Aktivasyon Paneli', 'mis360'); ?>
                </h1>
                <span style="font-size: 13px; color: #64748b;"><?php esc_html_e('v', 'mis360'); ?><?php echo esc_html(MIS360_VERSION); ?></span>
            </div>

            <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 28px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05); margin-bottom: 24px;">
                
                <!-- Durum Rozeti -->
                <div style="display: flex; align-items: center; justify-content: space-between; padding-bottom: 20px; border-bottom: 1px solid #f1f5f9; margin-bottom: 24px;">
                    <div>
                        <h3 style="margin: 0 0 6px 0; font-size: 16px; color: #1e293b;"><?php esc_html_e('Lisans Durumu', 'mis360'); ?></h3>
                        <p style="margin: 0; color: #64748b; font-size: 13px;">
                            <?php esc_html_e('Alan Adı:', 'mis360'); ?> <strong><?php echo esc_html($info['domain']); ?></strong>
                        </p>
                    </div>
                    <div>
                        <?php if ($info['is_active']) : ?>
                            <span style="display: inline-flex; align-items: center; gap: 6px; background: #ecfdf5; color: #065f46; font-size: 13px; font-weight: 700; padding: 6px 14px; border-radius: 9999px; border: 1px solid #a7f3d0;">
                                <span style="width: 8px; height: 8px; background: #10b981; border-radius: 50%;"></span>
                                <?php echo esc_html($info['status_label']); ?> (<?php echo esc_html($info['type']); ?>)
                            </span>
                        <?php else : ?>
                            <span style="display: inline-flex; align-items: center; gap: 6px; background: #fef2f2; color: #991b1b; font-size: 13px; font-weight: 700; padding: 6px 14px; border-radius: 9999px; border: 1px solid #fecaca;">
                                <span style="width: 8px; height: 8px; background: #ef4444; border-radius: 50%;"></span>
                                <?php echo esc_html($info['status_label']); ?>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>

                <?php if ($info['is_active']) : ?>
                    <!-- Aktif Lisans Detayı -->
                    <table class="form-table" style="margin-bottom: 20px;">
                        <tr>
                            <th scope="row"><?php esc_html_e('Kayıtlı Anahtar', 'mis360'); ?></th>
                            <td><code><?php echo esc_html($info['masked_key']); ?></code></td>
                        </tr>
                        <tr>
                            <th scope="row"><?php esc_html_e('Lisans Türü', 'mis360'); ?></th>
                            <td><strong><?php echo esc_html($info['type']); ?></strong></td>
                        </tr>
                        <tr>
                            <th scope="row"><?php esc_html_e('Geliştirici', 'mis360'); ?></th>
                            <td><a href="https://misteknoloji360.com.tr/" target="_blank"><?php echo esc_html($info['developer']); ?></a></td>
                        </tr>
                        <?php if (!empty($info['activated_at'])) : ?>
                            <tr>
                                <th scope="row"><?php esc_html_e('Etkinleştirilme Tarihi', 'mis360'); ?></th>
                                <td><?php echo esc_html($info['activated_at']); ?></td>
                            </tr>
                        <?php endif; ?>
                    </table>

                    <form method="post">
                        <?php wp_nonce_field('mis360_license_nonce', 'mis360_license_nonce_field'); ?>
                        <input type="hidden" name="mis360_license_action" value="deactivate">
                        <button type="submit" class="button" style="color: #dc2626; border-color: #fca5a5;" onclick="return confirm('<?php esc_attr_e('Lisansı bu siteden kaldırmak istediğinizden emin misiniz?', 'mis360'); ?>');">
                            <?php esc_html_e('Lisansı Bu Siteden Kaldır (Deaktive Et)', 'mis360'); ?>
                        </button>
                    </form>

                <?php else : ?>
                    <!-- Aktivasyon Formu -->
                    <form method="post">
                        <?php wp_nonce_field('mis360_license_nonce', 'mis360_license_nonce_field'); ?>
                        <input type="hidden" name="mis360_license_action" value="activate">
                        
                        <div style="margin-bottom: 18px;">
                            <label for="mis360_license_key" style="display: block; font-weight: 600; color: #1e293b; margin-bottom: 8px;">
                                <?php esc_html_e('Lisans Anahtarınız (License Key)', 'mis360'); ?>
                            </label>
                            <input type="text" id="mis360_license_key" name="mis360_license_key" placeholder="Örn: MIS-PRO-ABCD-1234" class="regular-text" style="width: 100%; max-width: 460px; font-family: monospace; font-size: 15px; padding: 8px 12px; border-radius: 6px;" required>
                            <p class="description" style="margin-top: 6px; color: #64748b;">
                                <?php esc_html_e('Lisans anahtarınız size Serkan AKKAYA veya misteknoloji360.com.tr tarafından iletilen anahtardır.', 'mis360'); ?>
                            </p>
                        </div>

                        <button type="submit" class="button button-primary button-hero" style="font-size: 14px; height: 42px; line-height: 40px; padding: 0 24px; border-radius: 6px;">
                            <?php esc_html_e('Lisansı Doğrula ve Etkinleştir →', 'mis360'); ?>
                        </button>
                    </form>
                <?php endif; ?>

            </div>

            <!-- Geliştirici Bilgisi & İletişim -->
            <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 16px 20px; font-size: 13px; color: #64748b;">
                <strong><?php esc_html_e('Geliştirici & Telif Sahibi:', 'mis360'); ?></strong> Serkan AKKAYA — 
                <a href="https://misteknoloji360.com.tr/" target="_blank" style="text-decoration: none; color: #2563eb;">misteknoloji360.com.tr</a> | 
                <a href="https://github.com/akkaya6611/mis360-theme" target="_blank" style="text-decoration: none; color: #2563eb;">GitHub Deposu</a>
            </div>
        </div>
        <?php
    }
}

// Lisans Motorunu Başlat
MIS360_License_Manager::init();
