<?php
/**
 * MİS360 Enqueue Styles and Scripts
 *
 * @package MİS360
 * @since 1.0.0
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Tema Stillerini ve JavaScript Dosyalarını Kuyruğa Ekle
 */
function mis360_scripts(): void {
    // 1. Ana Tema Bilgi ve Reset Stili (style.css)
    wp_enqueue_style(
        'mis360-style',
        get_stylesheet_uri(),
        [],
        MIS360_VERSION
    );

    // 2. Çekirdek Bileşen ve Düzen Stilleri (assets/css/main.css)
    $main_css_path = MIS360_DIR . '/assets/css/main.css';
    $main_css_ver  = file_exists($main_css_path) ? (string) filemtime($main_css_path) : MIS360_VERSION;

    wp_enqueue_style(
        'mis360-main',
        MIS360_URI . '/assets/css/main.css',
        ['mis360-style'],
        $main_css_ver
    );

    // 3. Pure Vanilla JS (ES6+) - jQuery Bağımsız
    $main_js_path = MIS360_DIR . '/assets/js/main.js';
    $main_js_ver  = file_exists($main_js_path) ? (string) filemtime($main_js_path) : MIS360_VERSION;

    wp_enqueue_script(
        'mis360-main',
        MIS360_URI . '/assets/js/main.js',
        [],
        $main_js_ver,
        [
            'strategy'  => 'defer', // WP 6.3+ native defer (Core Web Vitals için kritik)
            'in_footer' => true,
        ]
    );

    // 4. JS Tarafına Güvenli Veri Aktarımı (Localization)
    wp_localize_script('mis360-main', 'mis360Data', [
        'ajaxUrl'   => admin_url('admin-ajax.php'),
        'nonce'     => wp_create_nonce('mis360_nonce'),
        'themeUri'  => MIS360_URI,
        'i18n'      => [
            'toggleDarkMode'  => esc_html__('Karanlık/Aydınlık modunu değiştir', 'mis360'),
            'menuOpen'        => esc_html__('Menüyü Aç', 'mis360'),
            'menuClose'       => esc_html__('Menüyü Kapat', 'mis360'),
        ],
    ]);

    // 5. Yorum Yanıtlama Scripti (Sadece yorumu açık tekil sayfalarda)
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'mis360_scripts');

/**
 * Geriye Dönük Uyumluluk: WP 6.3 altı sistemler için script etiketine defer ekleme
 */
function mis360_defer_scripts(string $tag, string $handle, string $src): string {
    if ('mis360-main' === $handle && !str_contains($tag, 'defer')) {
        return str_replace(' src', ' defer src', $tag);
    }
    return $tag;
}
add_filter('script_loader_tag', 'mis360_defer_scripts', 10, 3);
