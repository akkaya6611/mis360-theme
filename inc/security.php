<?php
/**
 * MİS360 Enterprise-Grade Security Hardening and Protection Suite
 *
 * @package MİS360
 * @author  Serkan AKKAYA <https://misteknoloji360.com.tr/>
 * @since   1.0.0
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

/**
 * 1. Gereksiz <head> etiketlerini ve sürüm ifşalarını temizle (Fingerprinting Koruması)
 */
function mis360_cleanup_head(): void {
    // WordPress sürüm numarasını kaldır (Versiyon ifşasını önler)
    remove_action('wp_head', 'wp_generator');
    add_filter('the_generator', '__return_empty_string');

    // Windows Live Writer ve Really Simple Discovery bağlantılarını kaldır
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'rsd_link');

    // Kısa link meta etiketini kaldır
    remove_action('wp_head', 'wp_shortlink_wp_head', 10);

    // REST API link etiketini head'den gizle (API çalışmaya devam eder)
    remove_action('wp_head', 'rest_output_link_wp_head', 10);
    remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);

    // Gereksiz Core Emoji script ve stillerini kaldır (CWV ve gereksiz istek tasarrufu)
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
 * 2. Modern Güvenlik Başlıkları (HTTP Security Headers)
 */
function mis360_security_headers(): void {
    if (!is_admin() && !headers_sent()) {
        header('X-Content-Type-Options: nosniff');
        header('X-Frame-Options: SAMEORIGIN');
        header('Referrer-Policy: strict-origin-when-cross-origin');
        header('Permissions-Policy: geolocation=(), camera=(), microphone=()');
        header('X-XSS-Protection: 1; mode=block');
    }
}
add_action('send_headers', 'mis360_security_headers');

/**
 * 3. XML-RPC ve Pingback Koruması (DDoS & Brute Force Engelleme)
 * XML-RPC, brute force saldırılarının ve amplifikasyon ataklarının 1 numaralı hedefidir.
 */
add_filter('xmlrpc_enabled', '__return_false');
add_filter('wp_headers', function (array $headers): array {
    unset($headers['X-Pingback']);
    return $headers;
});
add_filter('xmlrpc_methods', function (array $methods): array {
    unset($methods['pingback.ping'], $methods['pingback.extensions.getPingbacks']);
    return $methods;
});

/**
 * 4. Kullanıcı Adı Tarama ve İfşa Koruması (Username Enumeration Prevention)
 * Saldırganların /?author=1 veya REST API üzerinden admin kullanıcı adlarını tespit etmesini engeller.
 */
function mis360_block_author_enumeration(): void {
    if (!is_admin() && !is_user_logged_in()) {
        $request_uri = sanitize_text_field(wp_unslash($_SERVER['REQUEST_URI'] ?? ''));
        $query_string= sanitize_text_field(wp_unslash($_SERVER['QUERY_STRING'] ?? ''));

        // ?author=N taraması yapılıyorsa anasayfaya yönlendir
        if (preg_match('/(author=\d+)/i', $query_string) || preg_match('/\/author\/[a-zA-Z0-9_-]+/i', $request_uri)) {
            wp_safe_redirect(home_url('/'), 301);
            exit;
        }
    }
}
add_action('template_redirect', 'mis360_block_author_enumeration');

// REST API üzerinden giriş yapmamış kişilerin kullanıcı listesini çekmesini engelle (/wp-json/wp/v2/users)
add_filter('rest_endpoints', function (array $endpoints): array {
    if (!is_user_logged_in()) {
        if (isset($endpoints['/wp/v2/users'])) {
            unset($endpoints['/wp/v2/users']);
        }
        if (isset($endpoints['/wp/v2/users/(?P<id>[\d]+)'])) {
            unset($endpoints['/wp/v2/users/(?P<id>[\d]+)']);
        }
    }
    return $endpoints;
});

/**
 * 5. Giriş Hata Mesajlarını Standartlaştır (Kullanıcı Adı Tahminini Engelle)
 * "Kullanıcı adı bulunamadı" veya "Şifre hatalı" ayrımını kaldırır, ortak güvenli mesaj verir.
 */
add_filter('login_errors', function (): string {
    return esc_html__('Girdiğiniz kullanıcı adı veya parola hatalı.', 'mis360');
});

/**
 * 6. Kötü Niyetli SQL Enjeksiyonu & XSS İstek Filtresi (Query String WAF Filter)
 * URL parametreleri üzerinden gönderilen zararlı SQLi ve XSS kalıplarını algılayıp güvenle engeller.
 */
function mis360_firewall_query_filter(): void {
    if (is_admin()) {
        return;
    }

    $query = sanitize_text_field(wp_unslash($_SERVER['QUERY_STRING'] ?? ''));
    if (empty($query)) {
        return;
    }

    $malicious_patterns = [
        '/(union(\s+all)?\s+select)/i',
        '/(concat\s*\(|group_concat|benchmark\s*\(|sleep\s*\()/i',
        '/(<script|%3Cscript)/i',
        '/(base64_decode|eval\s*\(|system\s*\()/i',
        '/(\.\.\/|\.\.\\)/i',
        '/(information_schema|load_file|into\s+outfile)/i',
    ];

    foreach ($malicious_patterns as $pattern) {
        if (preg_match($pattern, $query)) {
            wp_die(
                esc_html__('Güvenlik Duvarı: Geçersiz veya şüpheli istek algılandı (Hata 403).', 'mis360'),
                esc_html__('Erişim Engellendi', 'mis360'),
                ['response' => 403]
            );
        }
    }
}
add_action('init', 'mis360_firewall_query_filter');

/**
 * 7. Tema ve Eklenti Düzenleyicisini Devre Dışı Bırakma (RCE Önlemi)
 * Olası yönetici hesabı sızıntısında bile kod enjeksiyonunu engellemek için dosya düzenlemeyi kısıtlar.
 */
if (!defined('DISALLOW_FILE_EDIT')) {
    define('DISALLOW_FILE_EDIT', true);
}
