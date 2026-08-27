<?php
/**
 * MİS360 Security Hardening and Cleanup
 *
 * @package MİS360
 * @since 1.0.0
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Gereksiz <head> etiketlerini ve sürüm ifşalarını temizle (Security & Performance)
 */
function mis360_cleanup_head(): void {
    // WordPress sürüm numarasını kaldır
    remove_action('wp_head', 'wp_generator');

    // Windows Live Writer ve Really Simple Discovery bağlantılarını kaldır
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'rsd_link');

    // Kısa link meta etiketini kaldır
    remove_action('wp_head', 'wp_shortlink_wp_head', 10);

    // REST API link etiketini head'den gizle (API çalışmaya devam eder)
    remove_action('wp_head', 'rest_output_link_wp_head', 10);
    remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);

    // Gereksiz Core Emoji script ve stillerini kaldır (CWV tasarrufu)
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
}
add_action('after_setup_theme', 'mis360_cleanup_head');

/**
 * Güvenlik Başlıkları (Security Headers)
 */
function mis360_security_headers(): void {
    if (!is_admin()) {
        header('X-Content-Type-Options: nosniff');
        header('X-Frame-Options: SAMEORIGIN');
        header('Referrer-Policy: strict-origin-when-cross-origin');
    }
}
add_action('send_headers', 'mis360_security_headers');
