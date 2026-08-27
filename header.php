<?php
/**
 * MİS360 Header Template
 * 1:1 Denfora Architecture (Sticky Header, Language Switcher, WhatsApp Button & Mobile Drawer)
 *
 * @package MİS360
 * @author  Serkan AKKAYA <https://misteknoloji360.com.tr/>
 * @since   1.0.0
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

$phone       = get_theme_mod('mis360_phone', '+90 555 123 4567');
$clean_phone = preg_replace('/[^0-9+]/', '', $phone);
$whatsapp    = get_theme_mod('mis360_whatsapp', '905551234567');
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#primary">
    <?php esc_html_e('İçeriğe Atla', 'mis360'); ?>
</a>

<div id="page" class="site-wrapper">

    <?php
    // Elementor Pro Theme Builder Header kontrolü
    if (!function_exists('elementor_theme_do_location') || !elementor_theme_do_location('header')) :
    ?>
    <header class="header" id="siteHeader">
        <div class="header-inner">
            
            <!-- Logo -->
            <a href="<?php echo esc_url(home_url('/')); ?>" class="header-logo" rel="home">
                <?php
                if (has_custom_logo()) :
                    the_custom_logo();
                else :
                    ?>
                    <span class="header-brand-text">MİS<span>360</span></span>
                <?php endif; ?>
            </a>

            <!-- Desktop Navigation -->
            <nav class="header-nav" aria-label="<?php esc_attr_e('Ana Navigasyon', 'mis360'); ?>">
                <?php
                if (has_nav_menu('primary')) :
                    wp_nav_menu([
                        'theme_location' => 'primary',
                        'container'      => false,
                        'items_wrap'     => '%3$s',
                        'fallback_cb'    => false,
                        'walker'         => new class extends Walker_Nav_Menu {
                            public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
                                $classes = empty($item->classes) ? [] : (array) $item->classes;
                                $is_active = in_array('current-menu-item', $classes) || in_array('current_page_item', $classes);
                                $class_attr = 'nav-link' . ($is_active ? ' active' : '');
                                $output .= sprintf(
                                    '<a href="%s" class="%s">%s</a>',
                                    esc_url($item->url),
                                    esc_attr($class_attr),
                                    esc_html($item->title)
                                );
                            }
                        }
                    ]);
                else :
                    ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="nav-link <?php echo is_front_page() ? 'active' : ''; ?>">
                        <?php esc_html_e('Ana Sayfa', 'mis360'); ?>
                    </a>
                    <a href="<?php echo esc_url(home_url('/prestige-ilan-emlak-listeleme-demo/')); ?>" class="nav-link">
                        <?php esc_html_e('İlan & Portföy', 'mis360'); ?>
                    </a>
                    <a href="<?php echo esc_url(home_url('/gourmet-bistro-restoran-menu-demo/')); ?>" class="nav-link">
                        <?php esc_html_e('Restoran & Menü', 'mis360'); ?>
                    </a>
                    <a href="<?php echo esc_url(home_url('/acil-yol-yardim-oto-cekici-demo/')); ?>" class="nav-link">
                        <?php esc_html_e('Yol Yardım', 'mis360'); ?>
                    </a>
                    <a href="<?php echo esc_url(home_url('/modern-kurumsal-ajans-360-demo/')); ?>" class="nav-link">
                        <?php esc_html_e('Kurumsal', 'mis360'); ?>
                    </a>
                <?php endif; ?>
            </nav>

            <!-- Header Actions -->
            <div class="header-actions">
                <!-- Dil Seçici (TR / EN / DE) -->
                <div class="lang-switcher" id="langSwitcher">
                    <button type="button" class="lang-switcher-toggle" aria-expanded="false" aria-haspopup="true">
                        <svg class="flag-icon" viewBox="0 0 640 480" width="18" height="12">
                            <path fill="#e30a17" d="M0 0h640v480H0z"/>
                            <path fill="#fff" d="M407 243.2c0 68.4-55.5 123.9-123.9 123.9s-123.9-55.5-123.9-123.9 55.5-123.9 123.9-123.9 123.9 55.5 123.9 123.9z"/>
                            <path fill="#e30a17" d="M413 243.2c0 53.6-43.5 97-97 97s-97-43.5-97-97 43.5-97 97-97 97 43.4 97 97z"/>
                            <path fill="#fff" d="m430.7 191.5-1 44.3-41.3 11.2 40.8 14.5-1 40.7 26.5-31.8 40.2 14-23.2-34.1 28.3-33.9-42.4 12.8z"/>
                        </svg>
                        <span>TR</span>
                        <svg class="lang-arrow" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </button>
                    <div class="lang-switcher-dropdown">
                        <a href="?lang=tr" class="lang-option active">
                            <span>🇹🇷 Türkçe</span>
                        </a>
                        <a href="?lang=en" class="lang-option">
                            <span>🇬🇧 English</span>
                        </a>
                        <a href="?lang=de" class="lang-option">
                            <span>🇩🇪 Deutsch</span>
                        </a>
                    </div>
                </div>

                <!-- WhatsApp Butonu (Desktop) -->
                <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Merhaba, web siteniz üzerinden ulaşıyorum:'); ?>" class="btn btn-whatsapp btn-sm header-whatsapp" target="_blank" rel="noopener noreferrer">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                    </svg>
                    <span>WhatsApp</span>
                </a>

                <!-- Mobil Menü Aç/Kapat Butonu -->
                <button type="button" class="mobile-menu-toggle" id="mobileMenuToggle" aria-label="<?php esc_attr_e('Menüyü Aç', 'mis360'); ?>" aria-expanded="false">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                </button>
            </div>

        </div>
    </header>

    <!-- Mobil Menü Çekmecesi (Denfora Mobile Nav) -->
    <div class="mobile-nav-overlay" id="mobileNavOverlay">
        <nav class="mobile-nav" id="mobileNav">
            <div class="mobile-nav-header">
                <span class="header-brand-text">MİS<span>360</span></span>
                <button type="button" class="mobile-nav-close" id="mobileNavClose" aria-label="<?php esc_attr_e('Kapat', 'mis360'); ?>">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>

            <div class="mobile-nav-body">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="mobile-nav-link active"><?php esc_html_e('Ana Sayfa', 'mis360'); ?></a>
                <a href="<?php echo esc_url(home_url('/prestige-ilan-emlak-listeleme-demo/')); ?>" class="mobile-nav-link"><?php esc_html_e('İlanlar & Portföy', 'mis360'); ?></a>
                <a href="<?php echo esc_url(home_url('/gourmet-bistro-restoran-menu-demo/')); ?>" class="mobile-nav-link"><?php esc_html_e('Restoran & Menü', 'mis360'); ?></a>
                <a href="<?php echo esc_url(home_url('/acil-yol-yardim-oto-cekici-demo/')); ?>" class="mobile-nav-link"><?php esc_html_e('Acil Yol Yardım', 'mis360'); ?></a>
                <a href="<?php echo esc_url(home_url('/modern-kurumsal-ajans-360-demo/')); ?>" class="mobile-nav-link"><?php esc_html_e('Kurumsal & Paketler', 'mis360'); ?></a>

                <div class="mobile-nav-divider"></div>

                <div style="font-size: 11px; font-weight: 700; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.1em; padding: 0 12px 6px;">
                    <?php esc_html_e('Hızlı İletişim', 'mis360'); ?>
                </div>
                <a href="tel:<?php echo esc_attr($clean_phone); ?>" class="mobile-nav-link">📞 <?php echo esc_html($phone); ?></a>
            </div>

            <div class="mobile-nav-footer">
                <div class="mobile-lang-list">
                    <a href="?lang=de" class="mobile-lang-btn">DE</a>
                    <a href="?lang=en" class="mobile-lang-btn">EN</a>
                    <a href="?lang=tr" class="mobile-lang-btn active">TR</a>
                </div>

                <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>" class="btn btn-whatsapp btn-full" target="_blank" rel="noopener noreferrer">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
                    </svg>
                    <span>WhatsApp İletişim</span>
                </a>
            </div>
        </nav>
    </div>
    <?php endif; // Elementor Header End ?>

    <main id="primary" class="main-content-area">
