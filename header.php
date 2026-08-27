<?php
/**
 * MİS360 Header Template
 * Modern Pill Floating Header & Luxury Mega Menu
 *
 * @package MİS360
 * @author  Serkan AKKAYA <https://misteknoloji360.com.tr/>
 * @since   1.0.0
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#primary">
    <?php esc_html_e('İçeriğe Atla', 'mis360'); ?>
</a>

<div id="page" class="mis-site-wrapper base-template__wrapper">

    <?php
    // Elementor Pro Theme Builder Header kontrolü
    if (!function_exists('elementor_theme_do_location') || !elementor_theme_do_location('header')) :
    ?>
    <div class="wrapper header-wrapper-container" style="margin: 0 auto; padding: 20px 20px 0; width: 100%;">
        <header id="masthead" class="header">
            <div class="header__wrapper">
                
                <!-- Logo -->
                <div class="header__logo">
                    <?php
                    if (has_custom_logo()) :
                        the_custom_logo();
                    else :
                        ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="header__logo-link">
                            <span style="font-weight: 900; font-size: 22px; color: #fff; letter-spacing: -0.02em;">MİS<span style="color: var(--color-primary, #05f9ff);">360</span></span>
                        </a>
                    <?php endif; ?>
                </div>

                <!-- Navigasyon Sarmalayıcı -->
                <div class="header__navigation-wrapper" id="headerNavigationWrapper">
                    <nav class="header__navigation" aria-label="<?php esc_attr_e('Ana Menü', 'mis360'); ?>">
                        <ul class="header__list">
                            
                            <li class="header__list-item">
                                <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Ana Sayfa', 'mis360'); ?></a>
                            </li>

                            <!-- Lüks Mega Menü (Sektörel Çözümler & Demolar) -->
                            <li class="header__list-item has-dropdown">
                                <a href="#" class="header__link-dropdown">
                                    <span><?php esc_html_e('Sektörel Çözümler', 'mis360'); ?></span>
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="6 9 12 15 18 9"></polyline>
                                    </svg>
                                </a>

                                <!-- Submenu Wrapper (Mega Menü) -->
                                <div class="submenu-wrapper">
                                    <div class="submenu-list__wrapper">
                                        <div class="submenu-list__title"><?php esc_html_e('Sektör Seçimi', 'mis360'); ?></div>
                                        <ul class="submenu-list">
                                            
                                            <!-- Tab 1: Yol Yardım & Çekici -->
                                            <li class="submenu-list__item has-submenu active" data-tab="emergency">
                                                <div class="submenu-list__item-wrapper">
                                                    <div class="submenu-list__item-icon" style="font-size: 20px;">🚨</div>
                                                    <div class="submenu-list__item-link">
                                                        <span class="submenu-list__item-title"><?php esc_html_e('Yol Yardım & Çekici', 'mis360'); ?></span>
                                                        <span class="submenu-list__item-subtile"><?php esc_html_e('7/24 Acil Çağrı & Konum', 'mis360'); ?></span>
                                                    </div>
                                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                        <polyline points="9 18 15 12 9 6"></polyline>
                                                    </svg>
                                                </div>

                                                <div class="submenu-content">
                                                    <div class="submenu-content__title"><?php esc_html_e('Acil Yol Yardım Hizmetleri', 'mis360'); ?></div>
                                                    <div class="submenu-content__list">
                                                        <div class="submenu-content__list-item">
                                                            <div class="submenu-content__link">
                                                                <div class="submenu-content__link-title"><?php esc_html_e('Oto Çekici & Kurtarıcı', 'mis360'); ?></div>
                                                                <div class="submenu-content__link-text"><?php esc_html_e('15 dakikada en yakın çekici ekibi yanınızda.', 'mis360'); ?></div>
                                                                <a href="<?php echo esc_url(home_url('/acil-yol-yardim-oto-cekici-demo/')); ?>" class="submenu-content__url">
                                                                    <span><?php esc_html_e('Demoyu İncele', 'mis360'); ?></span>
                                                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="submenu-content__list-item">
                                                            <div class="submenu-content__link">
                                                                <div class="submenu-content__link-title"><?php esc_html_e('Akü Takviye & Servis', 'mis360'); ?></div>
                                                                <div class="submenu-content__link-text"><?php esc_html_e('Yerinde akü ölçümü ve hızlı takviye desteği.', 'mis360'); ?></div>
                                                                <a href="<?php echo esc_url(home_url('/acil-yol-yardim-oto-cekici-demo/')); ?>" class="submenu-content__url">
                                                                    <span><?php esc_html_e('Hizmeti Gör', 'mis360'); ?></span>
                                                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="submenu-content__list-item">
                                                            <div class="submenu-content__link">
                                                                <div class="submenu-content__link-title"><?php esc_html_e('Ağır Vasıta & Vinç', 'mis360'); ?></div>
                                                                <div class="submenu-content__link-text"><?php esc_html_e('Ahtapot ve vinçli özel kurtarma filosu.', 'mis360'); ?></div>
                                                                <a href="<?php echo esc_url(home_url('/acil-yol-yardim-oto-cekici-demo/')); ?>" class="submenu-content__url">
                                                                    <span><?php esc_html_e('Vinç Hizmeti', 'mis360'); ?></span>
                                                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>

                                            <!-- Tab 2: Restoran & Gurme -->
                                            <li class="submenu-list__item has-submenu" data-tab="restaurant">
                                                <div class="submenu-list__item-wrapper">
                                                    <div class="submenu-list__item-icon" style="font-size: 20px;">🍽️</div>
                                                    <div class="submenu-list__item-link">
                                                        <span class="submenu-list__item-title"><?php esc_html_e('Gourmet Restoran', 'mis360'); ?></span>
                                                        <span class="submenu-list__item-subtile"><?php esc_html_e('Menü & WhatsApp Sipariş', 'mis360'); ?></span>
                                                    </div>
                                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                        <polyline points="9 18 15 12 9 6"></polyline>
                                                    </svg>
                                                </div>

                                                <div class="submenu-content">
                                                    <div class="submenu-content__title"><?php esc_html_e('Gurme Restoran & Menü Kataloğu', 'mis360'); ?></div>
                                                    <div class="submenu-content__list">
                                                        <div class="submenu-content__list-item">
                                                            <div class="submenu-content__link">
                                                                <div class="submenu-content__link-title"><?php esc_html_e('Şefin Spesiyalleri', 'mis360'); ?></div>
                                                                <div class="submenu-content__link-text"><?php esc_html_e('Odun ateşinde ağır pişen özel et ve tava lezzetleri.', 'mis360'); ?></div>
                                                                <a href="<?php echo esc_url(home_url('/gourmet-bistro-restoran-menu-demo/')); ?>" class="submenu-content__url">
                                                                    <span><?php esc_html_e('Menüyü İncele', 'mis360'); ?></span>
                                                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="submenu-content__list-item">
                                                            <div class="submenu-content__link">
                                                                <div class="submenu-content__link-title"><?php esc_html_e('WhatsApp Kolay Sipariş', 'mis360'); ?></div>
                                                                <div class="submenu-content__link-text"><?php esc_html_e('Menüden tek tıkla doğrudan sipariş iletin.', 'mis360'); ?></div>
                                                                <a href="<?php echo esc_url(home_url('/gourmet-bistro-restoran-menu-demo/')); ?>" class="submenu-content__url">
                                                                    <span><?php esc_html_e('Sipariş Ver', 'mis360'); ?></span>
                                                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="submenu-content__list-item">
                                                            <div class="submenu-content__link">
                                                                <div class="submenu-content__link-title"><?php esc_html_e('Masa Rezervasyonu', 'mis360'); ?></div>
                                                                <div class="submenu-content__link-text"><?php esc_html_e('Özel davet ve kutlamalarınız için masanızı ayırtın.', 'mis360'); ?></div>
                                                                <a href="<?php echo esc_url(home_url('/gourmet-bistro-restoran-menu-demo/')); ?>" class="submenu-content__url">
                                                                    <span><?php esc_html_e('Rezervasyon', 'mis360'); ?></span>
                                                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>

                                            <!-- Tab 3: İlan & Emlak / Galeri -->
                                            <li class="submenu-list__item has-submenu" data-tab="listing">
                                                <div class="submenu-list__item-wrapper">
                                                    <div class="submenu-list__item-icon" style="font-size: 20px;">🏷️</div>
                                                    <div class="submenu-list__item-link">
                                                        <span class="submenu-list__item-title"><?php esc_html_e('İlan & Emlak / Galeri', 'mis360'); ?></span>
                                                        <span class="submenu-list__item-subtile"><?php esc_html_e('Fiyat, Konum & Portföy', 'mis360'); ?></span>
                                                    </div>
                                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                        <polyline points="9 18 15 12 9 6"></polyline>
                                                    </svg>
                                                </div>

                                                <div class="submenu-content">
                                                    <div class="submenu-content__title"><?php esc_html_e('İlan & Portföy Seçenekleri', 'mis360'); ?></div>
                                                    <div class="submenu-content__list">
                                                        <div class="submenu-content__list-item">
                                                            <div class="submenu-content__link">
                                                                <div class="submenu-content__link-title"><?php esc_html_e('Konut & Rezidans', 'mis360'); ?></div>
                                                                <div class="submenu-content__link-text"><?php esc_html_e('Boğaz manzaralı lüks daire ve villa seçenekleri.', 'mis360'); ?></div>
                                                                <a href="<?php echo esc_url(home_url('/prestige-ilan-emlak-listeleme-demo/')); ?>" class="submenu-content__url">
                                                                    <span><?php esc_html_e('İlanları Gör', 'mis360'); ?></span>
                                                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="submenu-content__list-item">
                                                            <div class="submenu-content__link">
                                                                <div class="submenu-content__link-title"><?php esc_html_e('Vasıta & Otomobil', 'mis360'); ?></div>
                                                                <div class="submenu-content__link-text"><?php esc_html_e('Ekspertiz garantili hibrit ve prestij araçlar.', 'mis360'); ?></div>
                                                                <a href="<?php echo esc_url(home_url('/prestige-ilan-emlak-listeleme-demo/')); ?>" class="submenu-content__url">
                                                                    <span><?php esc_html_e('Araçları Gör', 'mis360'); ?></span>
                                                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="submenu-content__list-item">
                                                            <div class="submenu-content__link">
                                                                <div class="submenu-content__link-title"><?php esc_html_e('Danışman Randevusu', 'mis360'); ?></div>
                                                                <div class="submenu-content__link-text"><?php esc_html_e('Portföy uzmanı ile doğrudan WhatsApp iletişimi.', 'mis360'); ?></div>
                                                                <a href="<?php echo esc_url(home_url('/prestige-ilan-emlak-listeleme-demo/')); ?>" class="submenu-content__url">
                                                                    <span><?php esc_html_e('İletişim', 'mis360'); ?></span>
                                                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>

                                            <!-- Tab 4: Kurumsal & Ajans -->
                                            <li class="submenu-list__item has-submenu" data-tab="corporate">
                                                <div class="submenu-list__item-wrapper">
                                                    <div class="submenu-list__item-icon" style="font-size: 20px;">🏢</div>
                                                    <div class="submenu-list__item-link">
                                                        <span class="submenu-list__item-title"><?php esc_html_e('Kurumsal & Ajans', 'mis360'); ?></span>
                                                        <span class="submenu-list__item-subtile"><?php esc_html_e('360° Çözümler & Paketler', 'mis360'); ?></span>
                                                    </div>
                                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                        <polyline points="9 18 15 12 9 6"></polyline>
                                                    </svg>
                                                </div>

                                                <div class="submenu-content">
                                                    <div class="submenu-content__title"><?php esc_html_e('Kurumsal Hizmet Paketleri', 'mis360'); ?></div>
                                                    <div class="submenu-content__list">
                                                        <div class="submenu-content__list-item">
                                                            <div class="submenu-content__link">
                                                                <div class="submenu-content__link-title"><?php esc_html_e('Özel Yazılım & Web', 'mis360'); ?></div>
                                                                <div class="submenu-content__link-text"><?php esc_html_e('Yüksek hızlı, SEO uyumlu ve ölçeklenebilir altyapı.', 'mis360'); ?></div>
                                                                <a href="<?php echo esc_url(home_url('/modern-kurumsal-ajans-360-demo/')); ?>" class="submenu-content__url">
                                                                    <span><?php esc_html_e('İncele', 'mis360'); ?></span>
                                                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="submenu-content__list-item">
                                                            <div class="submenu-content__link">
                                                                <div class="submenu-content__link-title"><?php esc_html_e('Marka & UI/UX Tasarım', 'mis360'); ?></div>
                                                                <div class="submenu-content__link-text"><?php esc_html_e('Kullanıcı odaklı modern ve minimalist arayüzler.', 'mis360'); ?></div>
                                                                <a href="<?php echo esc_url(home_url('/modern-kurumsal-ajans-360-demo/')); ?>" class="submenu-content__url">
                                                                    <span><?php esc_html_e('İncele', 'mis360'); ?></span>
                                                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="submenu-content__list-item">
                                                            <div class="submenu-content__link">
                                                                <div class="submenu-content__link-title"><?php esc_html_e('Şeffaf Paketler', 'mis360'); ?></div>
                                                                <div class="submenu-content__link-text"><?php esc_html_e('İşletmenizin ölçeğine uygun esnek fiyatlandırma.', 'mis360'); ?></div>
                                                                <a href="<?php echo esc_url(home_url('/modern-kurumsal-ajans-360-demo/')); ?>" class="submenu-content__url">
                                                                    <span><?php esc_html_e('Paketler', 'mis360'); ?></span>
                                                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </li>

                            <li class="header__list-item">
                                <a href="<?php echo esc_url(home_url('/ilanlar/')); ?>"><?php esc_html_e('İlanlar', 'mis360'); ?></a>
                            </li>

                            <li class="header__list-item">
                                <a href="<?php echo esc_url(home_url('/gourmet-bistro-restoran-menu-demo/')); ?>"><?php esc_html_e('Menü', 'mis360'); ?></a>
                            </li>

                            <li class="header__list-item">
                                <a href="<?php echo esc_url(home_url('/acil-yol-yardim-oto-cekici-demo/')); ?>"><?php esc_html_e('Yol Yardım', 'mis360'); ?></a>
                            </li>
                        </ul>
                    </nav>

                    <!-- Sağ Butonlar -->
                    <div class="header__buttons-wrapper">
                        <?php
                        // Yönetici Girişi Yapılmışsa ve Güncelleme Varsa Menüde Bildirim Göster
                        if (current_user_can('manage_options')) {
                            $remote_info = get_transient('mis360_remote_update_info');
                            if ($remote_info && !empty($remote_info['version']) && version_compare(MIS360_VERSION, (string) $remote_info['version'], '<')) {
                                ?>
                                <a href="<?php echo esc_url(admin_url('themes.php?page=mis360-updater')); ?>" class="header__button" style="background: rgba(239, 68, 68, 0.2); border: 1px solid #ef4444; color: #ff8888; font-size: 12px; font-weight: 800; text-decoration: none;" title="<?php esc_attr_e('Yeni güncelleme mevcut! Tek tıkla güncelleyin.', 'mis360'); ?>">
                                    <span style="display: inline-block; width: 8px; height: 8px; border-radius: 50%; background: #ef4444; box-shadow: 0 0 8px #ef4444;"></span>
                                    <span><?php printf(esc_html__('Güncelleme: v%s', 'mis360'), esc_html($remote_info['version'])); ?></span>
                                </a>
                                <?php
                            }
                        }
                        ?>

                        <!-- Karanlık / Aydınlık Mod Düğmesi -->
                        <button id="mis-theme-toggle" class="header__button" style="background: transparent; border: 1px solid rgba(255,255,255,0.2); color: #fff; cursor: pointer;" aria-label="<?php esc_attr_e('Temayı Değiştir', 'mis360'); ?>" type="button">
                            <span style="font-size: 16px;">🌓</span>
                        </button>

                        <?php
                        $phone       = get_theme_mod('mis360_phone', '+90 555 123 4567');
                        $clean_phone = preg_replace('/[^0-9+]/', '', $phone);
                        ?>
                        <a href="tel:<?php echo esc_attr($clean_phone); ?>" class="header__button" style="background: var(--color-primary); color: #0b0f19; font-weight: 700;">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                            <span><?php esc_html_e('Hemen Ara', 'mis360'); ?></span>
                        </a>
                    </div>

                </div>

                <!-- Mobil Hamburger İkonu -->
                <div class="header__burger" id="headerBurger">
                    <i></i>
                    <i></i>
                    <i></i>
                </div>

            </div>
        </header>
    </div>
    <?php endif; // Elementor Header End ?>

    <!-- Ana İçerik Başlangıcı -->
    <div id="content" class="mis-site-content">
