<?php
/**
 * Beyzade Et & Balık Restaurant - Header Template
 * 1:1 Denfora Architecture with Authentic Beyzade Restaurant Assets & Data
 * Menü sadeleştirilmiş, yemek kategorileri "Menümüz" dropdown altına toplanmıştır.
 *
 * @package MİS360
 * @author  Serkan AKKAYA <https://misteknoloji360.com.tr/>
 * @since   1.0.0
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

$phone       = '(0354) 502 33 33';
$clean_phone = '+903545023333';
$whatsapp    = '905465033132';
$logo_url    = 'https://beyzadeetbalikrestaurant.com.tr/wp-content/uploads/2026/05/cropped-Basliksiz-1-1.png';
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Playfair+Display:ital,wght@0,600;0,700;0,800;1,400&display=swap" rel="stylesheet">
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
    <!-- Üst Bilgi Barı (Denfora + Beyzade) -->
    <div style="background: var(--color-black); color: #cbd5e1; font-size: 12px; padding: 7px 0; border-bottom: 1px solid rgba(255,255,255,0.08);">
        <div class="container" style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 8px;">
            <div style="display: flex; align-items: center; gap: 16px;">
                <a href="https://maps.app.goo.gl/q2icLBRX1FJNzVtY7" target="_blank" rel="noopener noreferrer" style="color: #94a3b8; display: inline-flex; align-items: center; gap: 5px;">
                    📍 Bahçelievler Mah. 66650 Sarıkaya / Yozgat
                </a>
                <span style="color: #475569;">|</span>
                <span style="color: #22c55e; font-weight: 700; display: inline-flex; align-items: center; gap: 4px;">
                    ● Şu An Açık (Kapanış: 23:45)
                </span>
            </div>
            <div style="display: flex; align-items: center; gap: 16px;">
                <span style="color: #f59e0b; font-weight: 700;">★ 4.3 (448 Doğrulanmış Google Yorumu)</span>
                <span style="color: #475569;">|</span>
                <a href="tel:<?php echo esc_attr($clean_phone); ?>" style="color: #ffffff; font-weight: 700; display: inline-flex; align-items: center; gap: 4px;">
                    📞 <?php echo esc_html($phone); ?>
                </a>
            </div>
        </div>
    </div>

    <!-- Yapışkan Beyaz Header (Denfora 1:1) -->
    <header class="header" id="siteHeader">
        <div class="header-inner">
            
            <!-- Beyzade Resmi Logo -->
            <a href="<?php echo esc_url(home_url('/')); ?>" class="header-logo" rel="home">
                <img src="<?php echo esc_url($logo_url); ?>" alt="Beyzade Et Balık Restaurant" style="height: 48px; width: auto; object-fit: contain; display: block;" onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                <div style="display: none;">
                    <span style="font-size: 22px; font-weight: 900; letter-spacing: -0.02em; color: var(--color-black); line-height: 1.1;">
                        BEYZADE
                    </span>
                    <span style="font-size: 10px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.16em; color: var(--color-primary); display: block;">
                        ET & BALIK RESTAURANT
                    </span>
                </div>
            </a>

            <!-- Sadeleştirilmiş Masaüstü Navigasyon (Yemekler Menümüz Altında Dropdown) -->
            <nav class="header-nav" aria-label="<?php esc_attr_e('Ana Navigasyon', 'mis360'); ?>">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="nav-link active">
                    <?php esc_html_e('Ana Sayfa', 'mis360'); ?>
                </a>

                <!-- Menümüz (Açılır Dropdown Menü) -->
                <div class="nav-item">
                    <a href="#menu" class="nav-link has-dropdown-toggle">
                        <?php esc_html_e('Menümüz', 'mis360'); ?>
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </a>
                    <div class="nav-dropdown">
                        <a href="#kebaplar" class="nav-dropdown-link">
                            <span class="nav-dropdown-icon">🥩</span>
                            <span>Kebap Çeşitlerimiz</span>
                        </a>
                        <a href="#pideler" class="nav-dropdown-link">
                            <span class="nav-dropdown-icon">🍕</span>
                            <span>Pide & Lahmacun</span>
                        </a>
                        <a href="#donerler" class="nav-dropdown-link">
                            <span class="nav-dropdown-icon">🥙</span>
                            <span>Döner & İskender</span>
                        </a>
                        <a href="#tatlilar" class="nav-dropdown-link">
                            <span class="nav-dropdown-icon">🍲</span>
                            <span>Sıcak Çorbalar</span>
                        </a>
                        <a href="#tatlilar" class="nav-dropdown-link">
                            <span class="nav-dropdown-icon">🍯</span>
                            <span>Tatlılarımız</span>
                        </a>
                        <div style="border-top: 1px solid var(--color-gray-100); margin: 6px 0;"></div>
                        <a href="#menu" class="nav-dropdown-link" style="color: var(--color-primary);">
                            <span class="nav-dropdown-icon">📋</span>
                            <span>Tüm Menüyü İncele →</span>
                        </a>
                    </div>
                </div>

                <a href="#about" class="nav-link">
                    <?php esc_html_e('Hakkımızda', 'mis360'); ?>
                </a>
                <a href="#reservation" class="nav-link">
                    <?php esc_html_e('Masa Rezervasyonu', 'mis360'); ?>
                </a>
                <a href="#contact" class="nav-link">
                    <?php esc_html_e('İletişim & Konum', 'mis360'); ?>
                </a>
            </nav>

            <!-- Header Actions -->
            <div class="header-actions">
                <!-- WhatsApp Butonu (0546 503 31 32 Hattına Bağlı) -->
                <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Merhaba Beyzade Restaurant, masa rezervasyonu ve menü hakkında bilgi almak istiyorum.'); ?>" class="btn btn-whatsapp btn-sm header-whatsapp" target="_blank" rel="noopener noreferrer">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                    </svg>
                    <span>Masa Rezervasyonu</span>
                </a>

                <!-- Mobil Menü Açma Butonu -->
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

    <!-- Mobil Menü Çekmecesi -->
    <div class="mobile-nav-overlay" id="mobileNavOverlay">
        <nav class="mobile-nav" id="mobileNav">
            <div class="mobile-nav-header">
                <img src="<?php echo esc_url($logo_url); ?>" alt="Beyzade Logo" style="height: 40px; width: auto; object-fit: contain;">
                <button type="button" class="mobile-nav-close" id="mobileNavClose" aria-label="<?php esc_attr_e('Kapat', 'mis360'); ?>">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>

            <div class="mobile-nav-body">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="mobile-nav-link active"><?php esc_html_e('Ana Sayfa', 'mis360'); ?></a>
                
                <!-- Mobil Menümüz ve Alt Yemek Başlıkları -->
                <div style="margin-bottom: 6px;">
                    <a href="#menu" class="mobile-nav-link" style="font-weight: 700; color: var(--color-black);">
                        <?php esc_html_e('Menümüz', 'mis360'); ?>
                    </a>
                    <div class="mobile-nav-submenu">
                        <a href="#kebaplar" class="mobile-nav-sublink">🥩 Kebap Çeşitlerimiz</a>
                        <a href="#pideler" class="mobile-nav-sublink">🍕 Pide & Lahmacun</a>
                        <a href="#donerler" class="mobile-nav-sublink">🥙 Döner & İskender</a>
                        <a href="#tatlilar" class="mobile-nav-sublink">🍲 Sıcak Çorbalar</a>
                        <a href="#tatlilar" class="mobile-nav-sublink">🍯 Tatlılarımız</a>
                    </div>
                </div>

                <a href="#about" class="mobile-nav-link"><?php esc_html_e('Hakkımızda', 'mis360'); ?></a>
                <a href="#reservation" class="mobile-nav-link"><?php esc_html_e('Masa Rezervasyonu', 'mis360'); ?></a>
                <a href="#contact" class="mobile-nav-link"><?php esc_html_e('İletişim & Konum', 'mis360'); ?></a>

                <div class="mobile-nav-divider"></div>

                <div style="background: var(--color-gray-50); border: 1px solid var(--color-gray-200); padding: 12px; border-radius: 8px; margin-bottom: 12px;">
                    <div style="font-size: 11px; font-weight: 700; color: #1e293b; text-transform: uppercase; margin-bottom: 4px;">
                        🕒 Çalışma Saatleri
                    </div>
                    <div style="font-size: 12px; color: #64748b;">
                        Hergün: 10:00 – 23:45<br>
                        Açık Hava Bahçe & Aile Salonu
                    </div>
                </div>

                <a href="tel:<?php echo esc_attr($clean_phone); ?>" class="mobile-nav-link" style="color: var(--color-black); font-weight: 700;">
                    📞 <?php echo esc_html($phone); ?>
                </a>
            </div>

            <div class="mobile-nav-footer">
                <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Merhaba Beyzade Restaurant, masa ayırtmak istiyorum:'); ?>" class="btn btn-whatsapp btn-full" target="_blank" rel="noopener noreferrer">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                    </svg>
                    <span>WhatsApp İle Rezervasyon Yap</span>
                </a>
            </div>
        </nav>
    </div>
    <?php endif; // Elementor Header End ?>

    <main id="primary" class="main-content-area">
