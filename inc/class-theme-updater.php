<?php
/**
 * MİS360 GitHub Otomatik Güncelleme Motoru (Theme Auto-Updater Engine)
 *
 * Bu sınıf, WordPress standart tema güncelleme kancalarını (pre_set_site_transient_update_themes,
 * upgrader_source_selection vb.) dinleyerek, GitHub Releases veya akkaya6611/mis360-theme
 * üzerindeki merkezi JSON dosyasından yeni sürümleri otomatik çeker ve günceller.
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

        // WordPress Tema Güncelleme Filtreleri
        add_filter('pre_set_site_transient_update_themes', [$this, 'check_for_theme_update']);
        add_filter('upgrader_source_selection', [$this, 'fix_source_directory_name'], 10, 4);
        add_action('upgrader_process_complete', [$this, 'clear_update_cache'], 10, 2);
    }

    /**
     * GitHub deposundaki en güncel sürüm bilgilerini çeker (Transient Önbellekli)
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

        // 6 saat önbelleğe al
        set_transient($cache_key, $data, 6 * HOUR_IN_SECONDS);

        return $data;
    }

    /**
     * WordPress Tema Güncelleme Havuzuna (Transient) Yeni Sürümü Enjekte Eder
     */
    public function check_for_theme_update($transient) {
        if (empty($transient->checked)) {
            return $transient;
        }

        // Lisanssız sitelerde güncelleme bildirimini veya paketini kısıtlayabiliriz
        if (!MIS360_License_Manager::is_licensed()) {
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
     * GitHub zip arşivinden çıkartılan klasör adını düzeltir (mis360 olmasını garanti eder)
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
