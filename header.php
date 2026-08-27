<?php
/**
 * MİS360 Header Template
 *
 * @package MİS360
 * @since 1.0.0
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#primary">
    <?php esc_html_e('İçeriğe Atla', 'mis360'); ?>
</a>

<div id="page" class="mis-site-wrapper">

    <?php
    // Elementor Pro Theme Builder Header kontrolü
    if (!function_exists('elementor_theme_do_location') || !elementor_theme_do_location('header')) :
    ?>
    <header id="masthead" class="mis-site-header">
        <div class="mis-container mis-header-inner">
            
            <!-- Site Logosu & Marka -->
            <div class="mis-site-branding">
                <?php
                if (has_custom_logo()) :
                    the_custom_logo();
                else :
                    ?>
                    <div class="mis-site-title-wrap">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="mis-site-title" rel="home">
                            <span class="mis-gradient-text"><?php bloginfo('name'); ?></span>
                        </a>
                        <?php
                        $description = get_bloginfo('description', 'display');
                        if ($description || is_customize_preview()) :
                            ?>
                            <p class="mis-site-description"><?php echo esc_html($description); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Masaüstü Navigasyon Menüsü -->
            <nav id="site-navigation" class="mis-main-navigation" aria-label="<?php esc_attr_e('Ana Menü', 'mis360'); ?>">
                <?php
                wp_nav_menu([
                    'theme_location' => 'primary',
                    'menu_id'        => 'primary-menu',
                    'container'      => false,
                    'menu_class'     => 'mis-nav-menu',
                    'fallback_cb'    => function() {
                        echo '<ul class="mis-nav-menu">';
                        echo '<li><a href="' . esc_url(home_url('/')) . '">' . esc_html__('Ana Sayfa', 'mis360') . '</a></li>';
                        if (is_user_logged_in()) {
                            echo '<li><a href="' . esc_url(admin_url('nav-menus.php')) . '">' . esc_html__('Menü Ekle', 'mis360') . '</a></li>';
                        }
                        echo '</ul>';
                    },
                ]);
                ?>
            </nav>

            <!-- Araçlar: Karanlık Mod Butonu & Mobil Menü Tetikleyicisi -->
            <div class="mis-header-actions">
                <!-- Karanlık / Aydınlık Mod Düğmesi -->
                <button id="mis-theme-toggle" class="mis-icon-btn mis-theme-toggle" aria-label="<?php esc_attr_e('Karanlık ve aydınlık modu değiştir', 'mis360'); ?>" type="button">
                    <svg class="mis-icon-sun" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <circle cx="12" cy="12" r="5"></circle>
                        <line x1="12" y1="1" x2="12" y2="3"></line>
                        <line x1="12" y1="21" x2="12" y2="23"></line>
                        <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                        <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                        <line x1="1" y1="12" x2="3" y2="12"></line>
                        <line x1="21" y1="12" x2="23" y2="12"></line>
                        <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                        <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                    </svg>
                    <svg class="mis-icon-moon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                    </svg>
                </button>

                <!-- Mobil Hamburger Düğmesi -->
                <button id="mis-mobile-menu-toggle" class="mis-icon-btn mis-mobile-toggle" aria-controls="mis-mobile-drawer" aria-expanded="false" aria-label="<?php esc_attr_e('Menüyü Aç', 'mis360'); ?>" type="button">
                    <span class="mis-hamburger-box">
                        <span class="mis-hamburger-inner"></span>
                    </span>
                </button>
            </div>

        </div>
    </header>

    <!-- Mobil Off-Canvas Çekmece Menüsü -->
    <div id="mis-mobile-drawer" class="mis-mobile-drawer" aria-hidden="true">
        <div class="mis-mobile-drawer-backdrop" id="mis-drawer-overlay"></div>
        <div class="mis-mobile-drawer-content">
            <div class="mis-drawer-header">
                <span class="mis-drawer-title"><?php bloginfo('name'); ?></span>
                <button id="mis-mobile-close" class="mis-icon-btn mis-close-btn" aria-label="<?php esc_attr_e('Menüyü Kapat', 'mis360'); ?>" type="button">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <nav class="mis-mobile-nav" aria-label="<?php esc_attr_e('Mobil Menü', 'mis360'); ?>">
                <?php
                wp_nav_menu([
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => 'mis-mobile-nav-list',
                ]);
                ?>
            </nav>
        </div>
    </div>
    <?php endif; // Elementor Header End ?>

    <!-- Ana İçerik Başlangıcı -->
    <div id="content" class="mis-site-content">
