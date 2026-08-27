<?php
/**
 * Beyzade Et & Balık Restaurant - Footer Template
 * 1:1 Denfora Architecture with Authentic Beyzade Restaurant Data
 * Fiyat vurgusu kaldırılmıştır.
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
?>

    </main><!-- #primary -->

    <?php
    // Elementor Pro Theme Builder Footer kontrolü
    if (!function_exists('elementor_theme_do_location') || !elementor_theme_do_location('footer')) :
    ?>
    <footer class="footer">
        <div class="container">
            
            <!-- 4-Sütunlu Ana Footer Izgarası (Denfora 1:1) -->
            <div class="footer-grid">
                
                <!-- 1. Sütun: Marka & Sosyal Medya -->
                <div class="footer-brand">
                    <div class="footer-logo">
                        <img src="<?php echo esc_url($logo_url); ?>" alt="Beyzade Logo" style="height: 48px; width: auto; object-fit: contain; margin-bottom: 8px;" onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                        <div style="display: none;">
                            BEYZADE <span style="font-size: 14px; font-weight: 700; color: var(--color-primary); display: block; letter-spacing: 0.15em;">ET & BALIK RESTAURANT</span>
                        </div>
                    </div>
                    <p class="footer-tagline">
                        2015 yılından bu yana Yozgat Sarıkaya'da et, balık, kebap ve yöresel lezzetlerimizi sıcak aile ortamıyla misafirlerimizle buluşturuyoruz.
                    </p>
                    <div class="footer-social">
                        <a href="https://www.instagram.com/beyzadeetbalik/" class="footer-social-link" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                            <svg viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </a>
                        <a href="https://www.facebook.com/beyzadeetsarikaya/?locale=tr_TR" class="footer-social-link" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
                            <svg viewBox="0 0 24 24" fill="currentColor">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                        <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>" class="footer-social-link" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp">
                            <span style="font-weight: 800; font-size: 13px;">WA</span>
                        </a>
                    </div>
                </div>

                <!-- 2. Sütun: Menü & Sayfa Linkleri -->
                <div class="footer-column">
                    <h4 class="footer-column-title">Menü Kategorileri</h4>
                    <div class="footer-links">
                        <a href="#kebaplar" class="footer-link">Kebap Çeşitlerimiz</a>
                        <a href="#pideler" class="footer-link">Pide & Lahmacun</a>
                        <a href="#donerler" class="footer-link">Döner & İskender</a>
                        <a href="#tatlilar" class="footer-link">Tatlılar & Çorbalar</a>
                        <a href="#about" class="footer-link">Hakkımızda</a>
                        <a href="#reviews" class="footer-link">Google Yorumları (4.3 ★)</a>
                        <a href="#reservation" class="footer-link">Masa Rezervasyonu</a>
                    </div>
                </div>

                <!-- 3. Sütun: Çalışma Saatleri -->
                <div class="footer-column">
                    <h4 class="footer-column-title">Çalışma Saatleri</h4>
                    <div style="font-size: 13px; color: var(--color-gray-400); line-height: 1.8;">
                        <p style="margin-bottom: 8px;">
                            <strong style="color: var(--color-white);">Pazartesi – Pazar:</strong><br>
                            06:00 – 23:45 (Sabah Çorbasından Geceye)
                        </p>
                        <p style="margin-bottom: 8px;">
                            <strong style="color: var(--color-white);">Mutfak Hizmeti:</strong><br>
                            Sabah Çorbası, Öğle & Akşam Kebap-Balık & Paket Servis
                        </p>
                        <p style="color: var(--color-primary); font-size: 12px; font-weight: 700;">
                            ✓ Açık Hava Bahçe & Mama Sandalyesi Mevcut
                        </p>
                    </div>
                </div>

                <!-- 4. Sütun: İletişim & Konum -->
                <div class="footer-column">
                    <h4 class="footer-column-title">İletişim & Konum</h4>
                    <div class="footer-contact-item">
                        <svg class="footer-contact-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        <div class="footer-contact-text">
                            <a href="https://maps.app.goo.gl/q2icLBRX1FJNzVtY7" target="_blank" style="color: inherit;">
                                Bahçelievler Mah. 66650 Sarıkaya / Yozgat
                            </a>
                        </div>
                    </div>
                    <div class="footer-contact-item">
                        <svg class="footer-contact-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                        </svg>
                        <div class="footer-contact-text">
                            <a href="tel:<?php echo esc_attr($clean_phone); ?>" style="color: var(--color-white); font-weight: 700;"><?php echo esc_html($phone); ?></a>
                        </div>
                    </div>
                    <div class="footer-contact-item">
                        <svg class="footer-contact-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                        </svg>
                        <div class="footer-contact-text">
                            <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>" target="_blank" style="color: #25d366; font-weight: 700;">
                                +90 546 503 31 32 (WhatsApp)
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            <!-- 4 Güven Rozeti (Beyzade Google + Hizmetler) -->
            <div class="footer-trust">
                <div class="trust-badge">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                    </svg>
                    <span>★ 4.3 (448 Doğrulanmış Google Yorumu)</span>
                </div>
                <div class="trust-badge">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                        <polyline points="9 12 11 14 15 10"></polyline>
                    </svg>
                    <span>Açık Hava Bahçe Bölümü</span>
                </div>
                <div class="trust-badge">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                    </svg>
                    <span>Mama Sandalyesi & Aile Salonu</span>
                </div>
                <div class="trust-badge">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polyline points="12 6 12 12 16 14"></polyline>
                    </svg>
                    <span>Sabah 06:00 – 23:45 Açık</span>
                </div>
            </div>

            <!-- Alt Telif & Ajans Künyesi -->
            <div class="footer-bottom">
                <div class="footer-bottom-inner">
                    <p class="footer-copyright">
                        © <?php echo date('Y'); ?> Beyzade Et & Balık Restaurant. Tüm hakları saklıdır. (Sarıkaya / Yozgat)
                    </p>
                    <div class="footer-bottom-links">
                        <a href="https://beyzadeetbalikrestaurant.com.tr/" class="footer-bottom-link" target="_blank">beyzadeetbalikrestaurant.com.tr</a>
                        <a href="#" class="footer-bottom-link">Gizlilik Politikası</a>
                        <a href="#" class="footer-bottom-link">Çerez Ayarları</a>
                    </div>
                </div>

                <div class="footer-agency">
                    <span style="color: var(--color-gray-500); font-size: 11px; text-transform: uppercase; letter-spacing: 0.1em;">
                        Web Tasarım & Geliştirici:
                    </span>
                    <a href="https://misteknoloji360.com.tr/" target="_blank" rel="noopener noreferrer" style="font-weight: 700; color: var(--color-primary);">
                        Serkan AKKAYA — MİS Teknoloji 360
                    </a>
                </div>
            </div>
        </div>
    </footer>
    <?php endif; // Elementor Footer End ?>

    <!-- Mobil Sabit Hızlı Sipariş & Arama Barı (Floating Mobile Action Bar) -->
    <div class="mobile-bottom-bar" id="mobileBottomBar">
        <a href="tel:<?php echo esc_attr($clean_phone); ?>" class="mobile-bottom-btn mobile-btn-call">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
            </svg>
            <span>Hemen Ara</span>
        </a>
        <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Merhaba Beyzade Restaurant, masa ayırtmak ve sipariş vermek istiyorum:'); ?>" class="mobile-bottom-btn mobile-btn-whatsapp" target="_blank" rel="noopener noreferrer">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
            </svg>
            <span>WhatsApp Rezervasyon</span>
        </a>
    </div>

</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
