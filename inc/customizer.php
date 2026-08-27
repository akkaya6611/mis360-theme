<?php
/**
 * MİS360 Customizer & Theme Options
 * Çok Amaçlı (Restoran, Yol Yardım, İlan, Kurumsal) Yönetim Paneli
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
 * Customizer Ayarlarını ve Kontrollerini Kaydet
 */
function mis360_customize_register(WP_Customize_Manager $wp_customize): void {
    // -------------------------------------------------------------------------
    // Panel: MİS360 Çok Amaçlı Sektör & İletişim Yönetimi
    // -------------------------------------------------------------------------
    $wp_customize->add_section('mis360_multipurpose_section', [
        'title'       => esc_html__('MİS360 Sektör & İletişim Ayarları', 'mis360'),
        'description' => esc_html__('Yol Yardım, Restoran, İlan ve Kurumsal siteler için acil çağrı, WhatsApp ve sektör ayarları.', 'mis360'),
        'priority'    => 30,
    ]);

    // 1. Acil Çağrı / Hızlı Arama Telefon Numarası
    $wp_customize->add_setting('mis360_phone', [
        'default'           => '+90 555 123 4567',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ]);
    $wp_customize->add_control('mis360_phone', [
        'label'       => esc_html__('Doğrudan Arama Numarası (Telefon)', 'mis360'),
        'description' => esc_html__('Yol yardım, sipariş ve rezervasyon için aranacak numara.', 'mis360'),
        'section'     => 'mis360_multipurpose_section',
        'type'        => 'text',
    ]);

    // 2. WhatsApp Destek & Konum Hattı
    $wp_customize->add_setting('mis360_whatsapp', [
        'default'           => '905551234567',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ]);
    $wp_customize->add_control('mis360_whatsapp', [
        'label'       => esc_html__('WhatsApp Numarası (Ülke kodu ile, başında + olmadan)', 'mis360'),
        'description' => esc_html__('Örn: 905551234567 (Konum atma ve sipariş için).', 'mis360'),
        'section'     => 'mis360_multipurpose_section',
        'type'        => 'text',
    ]);

    // 3. Mobil Yapışkan Bar (Sticky Call Bar) Açık/Kapalı
    $wp_customize->add_setting('mis360_show_sticky_bar', [
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
        'transport'         => 'refresh',
    ]);
    $wp_customize->add_control('mis360_show_sticky_bar', [
        'label'       => esc_html__('Mobil Hızlı Erişim / Acil Arama Barı Gösterilsin', 'mis360'),
        'description' => esc_html__('Mobil cihazlarda ekranın altında sabit "Hemen Ara" ve "WhatsApp" butonları çıkar.', 'mis360'),
        'section'     => 'mis360_multipurpose_section',
        'type'        => 'checkbox',
    ]);

    // 4. Arama Buton Metni
    $wp_customize->add_setting('mis360_call_btn_text', [
        'default'           => 'Hemen Ara',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('mis360_call_btn_text', [
        'label'   => esc_html__('Arama Buton Metni', 'mis360'),
        'section' => 'mis360_multipurpose_section',
        'type'    => 'text',
    ]);

    // 5. Hizmet / Rozet Metni (Örn: "7/24 Kesintisiz Yol Yardım" veya "Özel Lezzetler")
    $wp_customize->add_setting('mis360_header_badge', [
        'default'           => '7/24 Kesintisiz Hizmet',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('mis360_header_badge', [
        'label'       => esc_html__('Başlık / Sektör Rozeti Metni', 'mis360'),
        'description' => esc_html__('Header veya vitrinde gösterilen dikkat çekici rozet.', 'mis360'),
        'section'     => 'mis360_multipurpose_section',
        'type'        => 'text',
    ]);

    // 6. Çalışma Saatleri / Hizmet Süresi
    $wp_customize->add_setting('mis360_working_hours', [
        'default'           => 'Haftanın 7 Günü / 24 Saat Açık',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('mis360_working_hours', [
        'label'   => esc_html__('Çalışma / Hizmet Saatleri', 'mis360'),
        'section' => 'mis360_multipurpose_section',
        'type'    => 'text',
    ]);

    // 7. Konum / Bölge Bilgisi
    $wp_customize->add_setting('mis360_service_area', [
        'default'           => 'Tüm Şehir ve Çevre Otoyollar',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('mis360_service_area', [
        'label'       => esc_html__('Hizmet Bölgesi / Şehir', 'mis360'),
        'description' => esc_html__('Yol yardım çekici bölgeleri veya restoran teslimat alanları.', 'mis360'),
        'section'     => 'mis360_multipurpose_section',
        'type'        => 'text',
    ]);

    // -------------------------------------------------------------------------
    // Renk Ayarları (Vurgu / Marka Rengi)
    // -------------------------------------------------------------------------
    $wp_customize->add_setting('mis360_primary_color', [
        'default'           => '#3b82f6',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'mis360_primary_color', [
        'label'    => esc_html__('Ana Vurgu Rengi (Primary Color)', 'mis360'),
        'section'  => 'colors',
        'settings' => 'mis360_primary_color',
    ]));
}
add_action('customize_register', 'mis360_customize_register');

/**
 * Dinamik CSS Çıktısı (Customizer Renk Değişimi İçin)
 */
function mis360_customizer_css(): void {
    $primary = get_theme_mod('mis360_primary_color', '#3b82f6');
    if ('#3b82f6' !== $primary) {
        $custom_css = ":root { --mis-primary: {$primary}; }";
        wp_add_inline_style('mis360-main', $custom_css);
    }
}
add_action('wp_enqueue_scripts', 'mis360_customizer_css', 20);
