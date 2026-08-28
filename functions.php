<?php
/**
 * MİS360 Theme Functions and Definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package MİS360
 * @since 1.0.0
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit; // Doğrudan dosya erişimini engelle
}

/**
 * Tema Sabitleri (Constants)
 */
define('MIS360_VERSION', '1.0.6');
define('MIS360_DIR', get_template_directory());
define('MIS360_URI', get_template_directory_uri());

/**
 * Modüler Dosya Yükleyici (Includes)
 */
$mis360_includes = [
    '/inc/theme-setup.php',           // add_theme_support, menüler, özel görsel boyutları
    '/inc/enqueue.php',               // Stil ve script kuyruk yönetimi (WP 6.3+ defer stratejisi)
    '/inc/template-tags.php',         // Şablon yardımcı fonksiyonları (tarih, yazar, okuma süresi)
    '/inc/security.php',              // Header temizliği ve temel güvenlik sıkılaştırmaları
    '/inc/class-license-manager.php', // Serkan AKKAYA HMAC-SHA256 lisans ve aktivasyon sistemi
    '/inc/class-theme-updater.php',   // GitHub otomatik tema güncelleme motoru
    '/inc/customizer.php',            // Çok amaçlı sektör, telefon, WhatsApp ve renk ayarları
    '/inc/custom-post-types.php',     // İlan, Menü ve Hizmet CPT & Taksonomi mimarisi
    '/inc/meta-boxes.php',            // Fiyat, Rozet, Konum ve Buton meta alanları
    '/inc/elementor.php',             // Elementor & Elementor Pro Theme Builder tam uyum katmanı
    '/inc/demo-importer.php',         // Şık sektörel hazır demolar ve tek tıkla kurulum
    '/inc/class-google-reviews.php',  // Otomatik Google Yorumları & Canlı Senkronizasyon Motoru
    '/inc/seo-geo.php',               // Antigravity SEO & GEO (AI Search Engine & Schema.org) Motoru
    '/inc/sitemap-generator.php',     // Dinamik Sitemap (sitemap.xml) Motoru
    '/inc/theme-options.php',         // MİS360 Tema Ayarları (Popup vs.)
];

// Beyzade Blog Importer - sadece admin panelinde yükle
if (is_admin() && file_exists(MIS360_DIR . '/inc/beyzade-importer.php')) {
    require_once MIS360_DIR . '/inc/beyzade-importer.php';
}

foreach ($mis360_includes as $file) {
    $filepath = MIS360_DIR . $file;
    if (file_exists($filepath)) {
        require_once $filepath;
    }
}

/**
 * İsteğe Bağlı Entegrasyonlar (WooCommerce vb.)
 */
if (class_exists('WooCommerce')) {
    $wc_file = MIS360_DIR . '/inc/woocommerce.php';
    if (file_exists($wc_file)) {
        require_once $wc_file;
    }
}


/* ==========================================================================
   YAYINA ALMA (PRODUCTION) HIZ VE GÜVENLİK OPTİMİZASYONLARI
   ========================================================================== */

// 1. GÜVENLİK: WordPress Sürüm Numarasını Gizle (Hacker botlarını şaşırtır)
remove_action('wp_head', 'wp_generator');

// 2. GÜVENLİK: Gereksiz ve riskli meta linklerini kaldır (RSD, WLW)
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_shortlink_wp_head');

// 3. GÜVENLİK: XML-RPC Kapat (DDoS ve Brute Force saldırılarını engeller)
add_filter('xmlrpc_enabled', '__return_false');
