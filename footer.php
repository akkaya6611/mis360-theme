<?php
/**
 * MİS360 Footer Template
 * 1:1 Denfora Architecture (4-Column Grid, Newsletter, 4 Trust Badges, Copyright & Author Credit)
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
?>

    </main><!-- #primary -->

    <?php
    // Elementor Pro Theme Builder Footer kontrolü
    if (!function_exists('elementor_theme_do_location') || !elementor_theme_do_location('footer')) :
    ?>
    <footer class="footer">
        <div class="container">
            
            <!-- 4-Sütunlu Ana Footer Izgarası -->
            <div class="footer-grid">
                
                <!-- 1. Sütun: Marka & Sosyal Medya -->
                <div class="footer-brand">
                    <div class="footer-logo">
                        MİS<span>360</span>
                    </div>
                    <p class="footer-tagline">
                        <?php esc_html_e('Kalite. Tasarım. İnovasyon.', 'mis360'); ?>
                    </p>
                    <div class="footer-social">
                        <a href="https://instagram.com/" class="footer-social-link" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                            <svg viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </a>
                        <a href="https://facebook.com/" class="footer-social-link" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
                            <svg viewBox="0 0 24 24" fill="currentColor">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                        <a href="https://linkedin.com/" class="footer-social-link" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn">
                            <svg viewBox="0 0 24 24" fill="currentColor">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- 2. Sütun: Navigasyon -->
                <div class="footer-column">
                    <h4 class="footer-column-title"><?php esc_html_e('Navigasyon', 'mis360'); ?></h4>
                    <div class="footer-links">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="footer-link"><?php esc_html_e('Ana Sayfa', 'mis360'); ?></a>
                        <a href="<?php echo esc_url(home_url('/prestige-ilan-emlak-listeleme-demo/')); ?>" class="footer-link"><?php esc_html_e('İlan & Portföy', 'mis360'); ?></a>
                        <a href="<?php echo esc_url(home_url('/gourmet-bistro-restoran-menu-demo/')); ?>" class="footer-link"><?php esc_html_e('Restoran & Menü', 'mis360'); ?></a>
                        <a href="<?php echo esc_url(home_url('/acil-yol-yardim-oto-cekici-demo/')); ?>" class="footer-link"><?php esc_html_e('Acil Yol Yardım', 'mis360'); ?></a>
                        <a href="<?php echo esc_url(home_url('/modern-kurumsal-ajans-360-demo/')); ?>" class="footer-link"><?php esc_html_e('Kurumsal & Ajans', 'mis360'); ?></a>
                    </div>
                </div>

                <!-- 3. Sütun: Yasal & Bilgi -->
                <div class="footer-column">
                    <h4 class="footer-column-title"><?php esc_html_e('Kurumsal', 'mis360'); ?></h4>
                    <div class="footer-links">
                        <a href="#" class="footer-link"><?php esc_html_e('Hakkımızda', 'mis360'); ?></a>
                        <a href="#" class="footer-link"><?php esc_html_e('Gizlilik Politikası', 'mis360'); ?></a>
                        <a href="#" class="footer-link"><?php esc_html_e('Kullanım Koşulları', 'mis360'); ?></a>
                        <a href="#" class="footer-link"><?php esc_html_e('Çerez Politikası', 'mis360'); ?></a>
                        <a href="#" class="footer-link"><?php esc_html_e('Sıkça Sorulan Sorular', 'mis360'); ?></a>
                    </div>
                </div>

                <!-- 4. Sütun: İletişim & Lokasyon -->
                <div class="footer-column">
                    <h4 class="footer-column-title"><?php esc_html_e('İletişim', 'mis360'); ?></h4>
                    <div class="footer-contact-item">
                        <svg class="footer-contact-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        <div class="footer-contact-text">
                            İstanbul & Tüm Türkiye Hizmet Ağı
                        </div>
                    </div>
                    <div class="footer-contact-item">
                        <svg class="footer-contact-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                        </svg>
                        <div class="footer-contact-text">
                            <a href="tel:<?php echo esc_attr($clean_phone); ?>"><?php echo esc_html($phone); ?></a>
                        </div>
                    </div>
                    <div class="footer-contact-item">
                        <svg class="footer-contact-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                            <polyline points="22,6 12,13 2,6"></polyline>
                        </svg>
                        <div class="footer-contact-text">
                            info@misteknoloji360.com.tr
                        </div>
                    </div>
                </div>

            </div>

            <!-- Bülten Aboneliği (Denfora Newsletter) -->
            <div class="footer-newsletter">
                <div class="footer-newsletter-content">
                    <h4 class="footer-newsletter-title"><?php esc_html_e('Bültene Abone Olun', 'mis360'); ?></h4>
                    <p class="footer-newsletter-text"><?php esc_html_e('Özel teklifler, yeni portföyler ve sektörel haberler doğrudan e-postanıza gelsin.', 'mis360'); ?></p>
                </div>
                <form class="footer-newsletter-form" onsubmit="return false;">
                    <input type="email" placeholder="<?php esc_attr_e('E-posta adresiniz...', 'mis360'); ?>" class="footer-newsletter-input" required>
                    <button type="submit" class="btn btn-primary"><?php esc_html_e('Abone Ol', 'mis360'); ?></button>
                </form>
            </div>

            <!-- 4 Güven Rozeti (Denfora Exact Trust Badges) -->
            <div class="footer-trust">
                <div class="trust-badge">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                        <polyline points="9 12 11 14 15 10"></polyline>
                    </svg>
                    <span><?php esc_html_e('Güvenli Altyapı', 'mis360'); ?></span>
                </div>
                <div class="trust-badge">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="1" y="3" width="15" height="13"></rect>
                        <polygon points="16 8 22 12 22 20 16 16 16 8"></polygon>
                    </svg>
                    <span><?php esc_html_e('Hızlı Teslimat', 'mis360'); ?></span>
                </div>
                <div class="trust-badge">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                    </svg>
                    <span><?php esc_html_e('7/24 Danışmanlık', 'mis360'); ?></span>
                </div>
                <div class="trust-badge">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                    </svg>
                    <span><?php esc_html_e('Premium Kalite', 'mis360'); ?></span>
                </div>
            </div>

            <!-- Alt Telif & Ajans Künyesi -->
            <div class="footer-bottom">
                <div class="footer-bottom-inner">
                    <p class="footer-copyright">
                        © <?php echo date('Y'); ?> MİS360. <?php esc_html_e('Tüm hakları saklıdır.', 'mis360'); ?>
                    </p>
                    <div class="footer-bottom-links">
                        <a href="#" class="footer-bottom-link"><?php esc_html_e('Künye', 'mis360'); ?></a>
                        <a href="#" class="footer-bottom-link"><?php esc_html_e('Gizlilik Politikası', 'mis360'); ?></a>
                        <a href="#" class="footer-bottom-link"><?php esc_html_e('Çerez Ayarları', 'mis360'); ?></a>
                    </div>
                </div>

                <div class="footer-agency">
                    <span style="color: var(--color-gray-500); font-size: 11px; text-transform: uppercase; letter-spacing: 0.1em;">
                        <?php esc_html_e('Tasarım & Geliştirici:', 'mis360'); ?>
                    </span>
                    <a href="https://misteknoloji360.com.tr/" target="_blank" rel="noopener noreferrer" style="font-weight: 700; color: var(--color-primary);">
                        Serkan AKKAYA — MİS Teknoloji 360
                    </a>
                </div>
            </div>

        </div>
    </footer>
    <?php endif; // Elementor Footer End ?>

</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
