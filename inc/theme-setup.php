<?php
/**
 * MİS360 Theme Setup and Configuration
 *
 * @package MİS360
 * @since 1.0.0
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

if (!function_exists('mis360_setup')) {
    /**
     * Tema desteklerini ve varsayılan ayarları yükler.
     */
    function mis360_setup(): void {
        // Çeviri desteği (Translation Ready)
        load_theme_textdomain('mis360', MIS360_DIR . '/languages');

        // Otomatik RSS akış linkleri
        add_theme_support('automatic-feed-links');

        // Dinamik <title> etiketi desteği
        add_theme_support('title-tag');

        // Öne çıkan görsel (Post Thumbnails) desteği
        add_theme_support('post-thumbnails');

        // Optimize Görsel Boyutları (Core Web Vitals uyumlu)
        add_image_size('mis360-card', 640, 360, true);   // 16:9 Blog Kartı
        add_image_size('mis360-hero', 1280, 640, true);  // 2:1 Hero / Single Header
        add_image_size('mis360-thumb', 160, 160, true);  // 1:1 Küçük Liste Resmi

        // Navigasyon Menüleri
        register_nav_menus([
            'primary' => esc_html__('Masaüstü & Mobil Ana Menü', 'mis360'),
            'footer'  => esc_html__('Alt Bilgi (Footer) Menüsü', 'mis360'),
        ]);

        // Modern HTML5 markup desteği
        add_theme_support('html5', [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
            'navigation-widgets',
        ]);

        // Özel Logo Desteği
        add_theme_support('custom-logo', [
            'height'               => 80,
            'width'                => 240,
            'flex-height'          => true,
            'flex-width'           => true,
            'unlink-homepage-logo' => true,
        ]);

        // Duyarlı Medya Yerleştirmeleri (Responsive Embeds)
        add_theme_support('responsive-embeds');

        // Gutenberg Tam Genişlik / Geniş Hizalama Desteği
        add_theme_support('align-wide');

        // Gutenberg Blok Varsayılan Stilleri
        add_theme_support('wp-block-styles');

        // Blok Editör Stillerini Eşleme
        add_theme_support('editor-styles');
        add_editor_style('assets/css/editor-style.css');

        // Canlı Özelleştirici Seçici Yenileme (Selective Refresh)
        add_theme_support('customize-selective-refresh-widgets');

        // WooCommerce Desteği ve Galeri Özellikleri
        add_theme_support('woocommerce');
        add_theme_support('wc-product-gallery-zoom');
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-slider');
    }
}
add_action('after_setup_theme', 'mis360_setup');

/**
 * İçerik Genişliği Ayarı
 */
function mis360_content_width(): void {
    $GLOBALS['content_width'] = apply_filters('mis360_content_width', 1280);
}
add_action('after_setup_theme', 'mis360_content_width', 0);

/**
 * Kenar Çubuğu (Widget Alanları) Kaydı
 */
function mis360_widgets_init(): void {
    register_sidebar([
        'name'          => esc_html__('Ana Kenar Çubuğu (Sidebar)', 'mis360'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Yazı ve arşiv sayfalarında görünen bileşen alanı.', 'mis360'),
        'before_widget' => '<section id="%1$s" class="mis-widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="mis-widget-title">',
        'after_title'   => '</h3>',
    ]);

    register_sidebar([
        'name'          => esc_html__('Footer Alanı', 'mis360'),
        'id'            => 'footer-widgets',
        'description'   => esc_html__('Alt bilgi alanında görünen bileşenler.', 'mis360'),
        'before_widget' => '<div id="%1$s" class="mis-footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="mis-footer-widget-title">',
        'after_title'   => '</h4>',
    ]);
}
add_action('widgets_init', 'mis360_widgets_init');
