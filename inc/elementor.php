<?php
/**
 * MİS360 Elementor & Elementor Pro Compatibility Layer
 *
 * Bu modül, temanın Elementor ve Elementor Pro Theme Builder (Header, Footer, Single, Archive)
 * ile tam uyumlu çalışmasını, CPT desteğini ve tuval düzenlerini yönetir.
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
 * Elementor Pro Theme Builder Konumlarını Kaydet (Header, Footer, Single, Archive)
 */
function mis360_register_elementor_locations(ElementorPro\Modules\ThemeBuilder\Classes\Locations_Manager $elementor_theme_manager): void {
    $elementor_theme_manager->register_all_core_location();
}
add_action('elementor/theme/register_locations', 'mis360_register_elementor_locations');

/**
 * Elementor için Tema Desteği Bildirimi
 */
function mis360_elementor_setup(): void {
    // Elementor ve Elementor Pro desteği
    add_theme_support('elementor');

    // Elementor şablonları için içerik genişliği uyumu
    $GLOBALS['content_width'] = apply_filters('mis360_content_width', 1280);
}
add_action('after_setup_theme', 'mis360_elementor_setup');

/**
 * İlan & Hizmetler (mis360_listing) CPT'sini Elementor Desteklenen Türlerine Otomatik Ekle
 */
function mis360_add_cpt_to_elementor(): void {
    $cpt_support = get_option('elementor_cpt_support', ['post', 'page']);
    if (is_array($cpt_support) && !in_array('mis360_listing', $cpt_support, true)) {
        $cpt_support[] = 'mis360_listing';
        update_option('elementor_cpt_support', $cpt_support);
    }
}
add_action('admin_init', 'mis360_add_cpt_to_elementor');

/**
 * Elementor Sayfalarında Gövde Sınıfları (Body Classes)
 */
function mis360_elementor_body_classes(array $classes): array {
    if (did_action('elementor/loaded')) {
        $classes[] = 'mis-elementor-active';

        if (\Elementor\Plugin::$instance->preview->is_preview_mode()) {
            $classes[] = 'mis-elementor-preview';
        }
    }
    return $classes;
}
add_filter('body_class', 'mis360_elementor_body_classes');

/**
 * Elementor Özel Widget Kategorisi (MİS360 Elemanları)
 */
function mis360_add_elementor_widget_category($elements_manager): void {
    $elements_manager->add_category(
        'mis360-elements',
        [
            'title' => esc_html__('MİS360 Özel Bileşenleri', 'mis360'),
            'icon'  => 'fa fa-plug',
        ]
    );
}
add_action('elementor/elements/categories_registered', 'mis360_add_elementor_widget_category');
