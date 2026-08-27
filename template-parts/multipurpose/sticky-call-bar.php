<?php
/**
 * MİS360 Mobile Sticky Emergency / Quick Contact Bar
 * Mobil ekranda sabit duran "Hemen Ara" ve "WhatsApp" çağrı barı
 *
 * @package MİS360
 * @since 1.0.0
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

if (!get_theme_mod('mis360_show_sticky_bar', true)) {
    return;
}

$phone        = get_theme_mod('mis360_phone', '+90 555 123 4567');
$clean_phone  = preg_replace('/[^0-9+]/', '', $phone);
$whatsapp     = get_theme_mod('mis360_whatsapp', '905551234567');
$btn_text     = get_theme_mod('mis360_call_btn_text', 'Hemen Ara');
?>

<aside class="mis-sticky-call-bar" aria-label="<?php esc_attr_e('Hızlı İletişim ve Acil Çağrı Barı', 'mis360'); ?>">
    <div class="mis-sticky-call-inner">
        
        <!-- 1. Doğrudan Telefon Araması (Acil Çağrı / Yol Yardım / Sipariş) -->
        <a href="tel:<?php echo esc_attr($clean_phone); ?>" class="mis-sticky-btn mis-btn-call">
            <svg class="mis-sticky-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
            </svg>
            <span><?php echo esc_html($btn_text); ?></span>
        </a>

        <!-- 2. WhatsApp Konum Gönderme / Sipariş Hattı -->
        <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Merhaba, bilgi ve acil hizmet almak istiyorum.'); ?>" target="_blank" rel="noopener noreferrer" class="mis-sticky-btn mis-btn-whatsapp">
            <svg class="mis-sticky-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
            </svg>
            <span><?php esc_html_e('WhatsApp', 'mis360'); ?></span>
        </a>

    </div>
</aside>
