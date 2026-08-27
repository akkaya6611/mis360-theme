<?php
/**
 * MİS360 GitHub Otomatik Güncelleme Motoru & Tek Tıkla Güncelleme
 *
 * GitHub Releases / raw JSON tabanlı otomatik sürüm kontrolü,
 * menülerde canlı güncelleme bildirim rozetleri ve tek tıkla GitHub'dan güncelleme motoru.
 *
 * @package MİS360
 * @author  Serkan AKKAYA <https://misteknoloji360.com.tr/>
 * @since   1.0.0
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

class MIS360_Theme_Updater {

    private string $theme_slug;
    private string $current_version;
    private string $update_json_url;

    public function __construct(string $theme_slug, string $current_version, string $update_json_url = '') {
        $this->theme_slug      = $theme_slug;
        $this->current_version = $current_version;
        $this->update_json_url = $update_json_url ?: 'https://raw.githubusercontent.com/akkaya6611/mis360-theme/main/theme-update.json';

        // 1. WordPress Standart Güncelleme Kancaları
        add_filter('pre_set_site_transient_update_themes', [$this, 'check_for_theme_update']);
        add_filter('upgrader_source_selection', [$this, 'fix_source_directory_name'], 10, 4);
        add_action('upgrader_process_complete', [$this, 'clear_update_cache'], 10, 2);

        // 2. Yönetim Menüsü ve Üst Bar Bildirim Rozetleri
        add_action('admin_menu', [$this, 'register_admin_update_menu']);
        add_action('admin_bar_menu', [$this, 'add_admin_bar_update_badge'], 999);
        add_action('admin_notices', [$this, 'render_admin_update_banner']);

        // 3. Tek Tıkla Güncelleme Eylemi
        add_action('admin_post_mis360_one_click_update', [$this, 'process_one_click_update']);
    }

    /**
     * GitHub'dan sürüm bilgilerini çeker
     */
    public function get_remote_version_info(bool $force_check = false): ?array {
        $cache_key = 'mis360_remote_update_info';
        $cached    = get_transient($cache_key);

        if (false !== $cached && !$force_check && is_array($cached)) {
            return $cached;
        }

        $request_url = add_query_arg('t', time(), $this->update_json_url);
        $response    = wp_remote_get($request_url, [
            'timeout'   => 15,
            'sslverify' => false,
            'headers'   => [
                'Accept'        => 'application/json',
                'Cache-Control' => 'no-cache, no-store, must-revalidate',
                'Pragma'        => 'no-cache',
                'User-Agent'    => 'WordPress/' . get_bloginfo('version') . '; ' . home_url(),
            ],
        ]);

        if (is_wp_error($response) || 200 !== wp_remote_retrieve_response_code($response)) {
            return null;
        }

        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body, true);

        if (empty($data) || empty($data['version']) || empty($data['download_url'])) {
            return null;
        }

        // 2 saat önbelleğe al
        set_transient($cache_key, $data, 2 * HOUR_IN_SECONDS);

        return $data;
    }

    /**
     * Yeni güncelleme var mı kontrolü
     */
    public function is_update_available(bool $force = false): bool {
        $remote = $this->get_remote_version_info($force);
        if (!$remote || empty($remote['version'])) {
            return false;
        }

        return version_compare($this->current_version, (string) $remote['version'], '<');
    }

    /**
     * WordPress Tema Güncelleme Havuzuna Enjekte Eder
     */
    public function check_for_theme_update($transient) {
        if (empty($transient->checked)) {
            return $transient;
        }

        $remote_info = $this->get_remote_version_info();

        if ($remote_info && !empty($remote_info['version'])) {
            if (version_compare($this->current_version, (string) $remote_info['version'], '<')) {
                $transient->response[$this->theme_slug] = [
                    'theme'        => $this->theme_slug,
                    'new_version'  => (string) $remote_info['version'],
                    'url'          => (string) ($remote_info['homepage'] ?? 'https://misteknoloji360.com.tr/'),
                    'package'      => (string) $remote_info['download_url'],
                    'requires'     => (string) ($remote_info['requires'] ?? '6.3'),
                    'requires_php' => (string) ($remote_info['requires_php'] ?? '8.2'),
                ];
            }
        }

        return $transient;
    }

    /**
     * Görünüm menüsüne güncelleme sayfası ve bildirim rozeti ekler
     */
    public function register_admin_update_menu(): void {
        $has_update = $this->is_update_available();
        
        $menu_title = esc_html__('MİS360 Güncelleme', 'mis360');
        if ($has_update) {
            $menu_title .= ' <span class="update-plugins count-1" style="background: #ef4444; border-radius: 9999px; padding: 2px 7px; color: #fff; font-size: 10px; font-weight: 800;"><span class="update-count">1</span></span>';
        }

        add_theme_page(
            esc_html__('MİS360 Tema Güncelleme', 'mis360'),
            $menu_title,
            'manage_options',
            'mis360-updater',
            [$this, 'render_updater_page']
        );
    }

    /**
     * WordPress Üst Admin Barında Güncelleme Bildirimi
     */
    public function add_admin_bar_update_badge($wp_admin_bar): void {
        if (!current_user_can('manage_options') || !$this->is_update_available()) {
            return;
        }

        $remote = $this->get_remote_version_info();
        $new_v  = $remote['version'] ?? '';

        $wp_admin_bar->add_node([
            'id'    => 'mis360-update-alert',
            'title' => sprintf(
                '<span style="background: #05f9ff; color: #0b0f19; font-weight: 800; border-radius: 12px; padding: 2px 9px; font-size: 11px; display: inline-flex; align-items: center; gap: 4px;">🔄 MİS360 v%s Güncellemesi Mevcut!</span>',
                esc_html($new_v)
            ),
            'href'  => admin_url('themes.php?page=mis360-updater'),
        ]);
    }

    /**
     * Admin Panelinde Üst Bildirim Bandı
     */
    public function render_admin_update_banner(): void {
        if (!current_user_can('manage_options')) {
            return;
        }

        // Güncelleme başarı bildirimi varsa göster
        $notice = get_transient('mis360_update_success_notice');
        if ($notice) {
            delete_transient('mis360_update_success_notice');
            ?>
            <div class="notice notice-success is-dismissible" style="border-left-color: #10b981; padding: 12px;">
                <p style="font-size: 14px; font-weight: 700; color: #065f46; margin: 0;">
                    <?php echo esc_html($notice); ?>
                </p>
            </div>
            <?php
            return;
        }

        // Güncelleme var uyarısı
        $screen = get_current_screen();
        if ($screen && 'appearance_page_mis360-updater' !== $screen->id && $this->is_update_available()) {
            $remote = $this->get_remote_version_info();
            $new_v  = $remote['version'] ?? '';
            ?>
            <div class="notice notice-warning is-dismissible" style="border-left-color: #05f9ff; background: #0f172a; color: #fff; padding: 12px 16px; border-radius: 6px;">
                <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 10px;">
                    <div>
                        <strong style="color: #05f9ff;">🚀 MİS360 Yeni Sürüm Hazır (v<?php echo esc_html($new_v); ?>):</strong>
                        <span style="color: #cbd5e1; margin-left: 8px;">Temanız için GitHub üzerinde yeni bir güncelleme mevcut.</span>
                    </div>
                    <div>
                        <a href="<?php echo esc_url(admin_url('themes.php?page=mis360-updater')); ?>" class="button button-primary" style="background: #05f9ff; color: #0b0f19; border: none; font-weight: 800;">
                            <?php esc_html_e('Tek Tıkla GitHub\'dan Güncelle →', 'mis360'); ?>
                        </a>
                    </div>
                </div>
            </div>
            <?php
        }
    }

    /**
     * Tek Tıkla GitHub'dan Güncelleme İşlemi (One-Click Update Engine)
     */
    public function process_one_click_update(): void {
        if (!current_user_can('manage_options')) {
            wp_die(__('Bu işlemi yapmaya yetkiniz yok.', 'mis360'));
        }

        check_admin_referer('mis360_update_nonce', 'mis360_update_nonce_field');

        $remote_info = $this->get_remote_version_info(true);
        if (!$remote_info || empty($remote_info['download_url'])) {
            wp_die(__('GitHub üzerinden güncelleme paketi alınamadı.', 'mis360'));
        }

        $package_url = (string) $remote_info['download_url'];
        $new_version = (string) ($remote_info['version'] ?? 'Son Sürüm');

        require_once ABSPATH . 'wp-admin/includes/file.php';
        require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
        require_once ABSPATH . 'wp-admin/includes/theme.php';

        // Dosya sistemini başlat
        WP_Filesystem();
        global $wp_filesystem;

        if (!$wp_filesystem) {
            wp_die(__('Dosya sistemine erişilemedi.', 'mis360'));
        }

        // 1. GitHub'dan zip paketini indir
        $temp_file = download_url($package_url, 300);
        if (is_wp_error($temp_file)) {
            wp_die(sprintf(__('Paket indirilemedi: %s', 'mis360'), $temp_file->get_error_message()));
        }

        // 2. Geçici bir klasöre çıkart
        $temp_dir = get_temp_dir() . 'mis360_update_' . time() . '/';
        $wp_filesystem->mkdir($temp_dir);

        $unzip_result = unzip_file($temp_file, $temp_dir);
        @unlink($temp_file); // Geçici zipi sil

        if (is_wp_error($unzip_result)) {
            $wp_filesystem->delete($temp_dir, true);
            wp_die(sprintf(__('Paket açılamadı: %s', 'mis360'), $unzip_result->get_error_message()));
        }

        // 3. Çıkartılan klasörün içeriğini bul
        $source_dir = $temp_dir . 'mis360/';
        if (!$wp_filesystem->is_dir($source_dir)) {
            $source_dir = $temp_dir; // Doğrudan kök dizine çıkartılmışsa
        }

        // 4. Hedef tema dizinine kopyala
        $destination_dir = get_theme_root() . '/mis360/';
        $copy_result = copy_dir($source_dir, $destination_dir);

        // Geçici çıkartma klasörünü temizle
        $wp_filesystem->delete($temp_dir, true);

        if (is_wp_error($copy_result)) {
            wp_die(sprintf(__('Dosyalar kopyalanamadı: %s', 'mis360'), $copy_result->get_error_message()));
        }

        // 5. Önbellekleri temizle
        delete_transient('mis360_remote_update_info');
        delete_site_transient('update_themes');
        wp_clean_themes_cache();

        set_transient('mis360_update_success_notice', sprintf(
            __('✓ MİS360 teması GitHub üzerinden başarıyla v%s sürümüne güncellendi!', 'mis360'),
            $new_version
        ), 60);

        wp_safe_redirect(admin_url('themes.php?page=mis360-updater'));
        exit;
    }

    /**
     * Güncelleme Yönetim Ekranı
     */
    public function render_updater_page(): void {
        $force_check = isset($_GET['check_now']) && isset($_GET['_wpnonce']) && wp_verify_nonce(sanitize_text_field(wp_unslash($_GET['_wpnonce'])), 'mis360_check_now');
        $remote_info = $this->get_remote_version_info((bool) $force_check);
        $has_update  = $this->is_update_available();
        $remote_ver  = $remote_info['version'] ?? $this->current_version;
        ?>
        <div class="wrap" style="max-width: 900px; margin-top: 25px;">
            <div style="background: #0f172a; color: #ffffff; padding: 30px; border-radius: 14px; box-shadow: 0 10px 25px -5px rgba(0,0,0,0.2); margin-bottom: 25px;">
                <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 15px;">
                    <div>
                        <span style="background: rgba(5, 249, 255, 0.15); color: #05f9ff; border: 1px solid rgba(5, 249, 255, 0.3); padding: 4px 10px; border-radius: 9999px; font-size: 11px; font-weight: 800; text-transform: uppercase;">
                            GitHub Canlı Güncelleyici
                        </span>
                        <h1 style="color: #ffffff; font-size: 26px; font-weight: 900; margin: 10px 0 5px 0;">
                            MİS360 Tema Güncelleme Merkezi
                        </h1>
                        <p style="color: #94a3b8; margin: 0; font-size: 14px;">
                            Yazar: <strong style="color: #fff;">Serkan AKKAYA</strong> • GitHub Deposu: <a href="https://github.com/akkaya6611/mis360-theme" target="_blank" style="color: #05f9ff; text-decoration: underline;">akkaya6611/mis360-theme</a>
                        </p>
                    </div>

                    <div>
                        <a href="<?php echo esc_url(wp_nonce_url(admin_url('themes.php?page=mis360-updater&check_now=1'), 'mis360_check_now')); ?>" class="button button-secondary" style="border-radius: 9999px; padding: 6px 16px; font-weight: 600;">
                            🔄 Güncellemeleri Denetle
                        </a>
                    </div>
                </div>
            </div>

            <!-- Sürüm Durum Kartları -->
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 20px; margin-bottom: 25px;">
                <div style="background: #ffffff; border: 1px solid #e2e8f0; padding: 22px; border-radius: 12px;">
                    <div style="font-size: 13px; color: #64748b; font-weight: 600; text-transform: uppercase;"><?php esc_html_e('Yüklü Mevcut Sürüm', 'mis360'); ?></div>
                    <div style="font-size: 28px; font-weight: 900; color: #0f172a; margin: 6px 0;">v<?php echo esc_html($this->current_version); ?></div>
                    <div style="font-size: 13px; color: #10b981; font-weight: 600;">✓ Aktif ve Kullanımda</div>
                </div>

                <div style="background: #ffffff; border: 1px solid <?php echo $has_update ? '#05f9ff' : '#e2e8f0'; ?>; padding: 22px; border-radius: 12px;">
                    <div style="font-size: 13px; color: #64748b; font-weight: 600; text-transform: uppercase;"><?php esc_html_e('GitHub En Son Sürüm', 'mis360'); ?></div>
                    <div style="font-size: 28px; font-weight: 900; color: <?php echo $has_update ? '#ef4444' : '#0f172a'; ?>; margin: 6px 0;">v<?php echo esc_html($remote_ver); ?></div>
                    <div style="font-size: 13px; font-weight: 600; color: <?php echo $has_update ? '#ef4444' : '#64748b'; ?>;">
                        <?php echo $has_update ? '⚡ Yeni Bir Güncelleme Var!' : '✓ Temanız En Güncel Sürümde'; ?>
                    </div>
                </div>
            </div>

            <!-- Güncelleme Butonu ve Detaylar -->
            <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 30px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);">
                <?php if ($has_update) : ?>
                    <div style="background: #ecfeff; border: 1px solid #a5f3fc; border-radius: 10px; padding: 20px; margin-bottom: 24px; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 15px;">
                        <div>
                            <h3 style="margin: 0 0 6px 0; font-size: 18px; color: #0e7490; font-weight: 800;">
                                <?php printf(esc_html__('v%s Güncellemesi Yüklenmeye Hazır!', 'mis360'), esc_html($remote_ver)); ?>
                            </h3>
                            <p style="margin: 0; color: #155e75; font-size: 14px;">
                                <?php esc_html_e('GitHub deponuzdaki en güncel kodlar tek dokunuşla temanıza entegre edilecektir.', 'mis360'); ?>
                            </p>
                        </div>

                        <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                            <?php wp_nonce_field('mis360_update_nonce', 'mis360_update_nonce_field'); ?>
                            <input type="hidden" name="action" value="mis360_one_click_update">
                            <button type="submit" class="button button-primary button-large" style="background: #05f9ff; color: #0b0f19; border: none; font-size: 16px; font-weight: 900; padding: 10px 26px; border-radius: 100px; cursor: pointer; box-shadow: 0 4px 12px rgba(5, 249, 255, 0.3);">
                                🚀 <?php esc_html_e('TEK TIKLA GİTHUB\'DAN GÜNCELLE', 'mis360'); ?>
                            </button>
                        </form>
                    </div>
                <?php else : ?>
                    <div style="text-align: center; padding: 20px 0;">
                        <span style="font-size: 48px;">🎉</span>
                        <h3 style="margin: 12px 0 6px; font-size: 20px; color: #0f172a; font-weight: 800;">
                            <?php esc_html_e('Harika! Temanız Zaten En Son Sürümde', 'mis360'); ?>
                        </h3>
                        <p style="color: #64748b; margin: 0 0 20px 0; font-size: 14px;">
                            <?php printf(esc_html__('Şu an en güncel sürüm olan v%s kullanılıyor. GitHub\'a yeni bir sürüm pushladığınızda burada anında görünecektir.', 'mis360'), esc_html($this->current_version)); ?>
                        </p>

                        <!-- Yine de yeniden yüklemek isterse -->
                        <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" style="display: inline-block;">
                            <?php wp_nonce_field('mis360_update_nonce', 'mis360_update_nonce_field'); ?>
                            <input type="hidden" name="action" value="mis360_one_click_update">
                            <button type="submit" class="button button-secondary" style="border-radius: 9999px; font-weight: 600;">
                                <?php esc_html_e('GitHub\'daki Sürümü Yeniden İndir ve Kur', 'mis360'); ?>
                            </button>
                        </form>
                    </div>
                <?php endif; ?>

                <!-- Değişiklik Günlüğü (Changelog) -->
                <?php if (!empty($remote_info['sections']['changelog'])) : ?>
                    <div style="border-top: 1px solid #f1f5f9; padding-top: 24px; margin-top: 24px;">
                        <h4 style="margin: 0 0 14px 0; font-size: 16px; color: #0f172a; font-weight: 800;">
                            <?php esc_html_e('Sürüm Notları & Değişiklikler (Changelog)', 'mis360'); ?>
                        </h4>
                        <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 18px; font-size: 14px; line-height: 1.7; color: #334155;">
                            <?php echo wp_kses_post($remote_info['sections']['changelog']); ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php
    }

    /**
     * Dizin adı düzeltmesi
     */
    public function fix_source_directory_name($source, $remote_source, $upgrader, array $hook_extra = []) {
        global $wp_filesystem;

        if (isset($hook_extra['theme']) && $hook_extra['theme'] === $this->theme_slug) {
            $correct_source = trailingslashit($remote_source) . $this->theme_slug . '/';

            if ($source !== $correct_source) {
                $wp_filesystem->move($source, $correct_source);
                return $correct_source;
            }
        }

        return $source;
    }

    /**
     * Güncelleme Tamamlandığında Önbelleği Temizle
     */
    public function clear_update_cache($upgrader_object, array $options): void {
        if (isset($options['action'], $options['type']) && 'update' === $options['action'] && 'theme' === $options['type']) {
            delete_transient('mis360_remote_update_info');
            delete_site_transient('update_themes');
        }
    }
}

// Güncelleyiciyi Başlat
new MIS360_Theme_Updater('mis360', MIS360_VERSION);
