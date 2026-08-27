<?php
/**
 * MİS360 Restaurant Footer Template
 * 1:1 Denfora Architecture (4-Column Grid, Gourmet Newsletter, 4 Restaurant Trust Badges, Working Hours & Credit)
 *
 * @package MİS360
 * @author  Serkan AKKAYA <https://misteknoloji360.com.tr/>
 * @since   1.0.0
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

$phone       = get_theme_mod('mis360_phone', '+90 212 360 00 00');
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
                        MİS<span>360</span> <small style="font-size: 12px; color: var(--color-primary); font-weight: 700; letter-spacing: 0.15em;">BISTRO</small>
                    </div>
                    <p class="footer-tagline">
                        <?php esc_html_e('Kalite. Lezzet. Kusursuz Ambiyans.', 'mis360'); ?>
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
                        <a href="https://tripadvisor.com/" class="footer-social-link" target="_blank" rel="noopener noreferrer" aria-label="Tripadvisor">
                            <span style="font-weight: 900; font-size: 14px;">TA</span>
                        </a>
                    </div>
                </div>

                <!-- 2. Sütun: Restoran Navigasyonu -->
                <div class="footer-column">
                    <h4 class="footer-column-title"><?php esc_html_e('Restoran Menüsü', 'mis360'); ?></h4>
                    <div class="footer-links">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="footer-link"><?php esc_html_e('Ana Sayfa', 'mis360'); ?></a>
                        <a href="#menu" class="footer-link"><?php esc_html_e('A La Carte Menü', 'mis360'); ?></a>
                        <a href="#categories" class="footer-link"><?php esc_html_e('Mutfaklar & Lezzetler', 'mis360'); ?></a>
                        <a href="#chef" class="footer-link"><?php esc_html_e('Şefin Masası & Hikaye', 'mis360'); ?></a>
                        <a href="#reservation" class="footer-link"><?php esc_html_e('Masa Rezervasyonu', 'mis360'); ?></a>
                        <a href="#contact" class="footer-link"><?php esc_html_e('Özel Davet & İletişim', 'mis360'); ?></a>
                    </div>
                </div>

                <!-- 3. Sütun: Çalışma Saatleri -->
                <div class="footer-column">
                    <h4 class="footer-column-title"><?php esc_html_e('Çalışma Saatleri', 'mis360'); ?></h4>
                    <div style="font-size: 13px; color: var(--color-gray-400); line-height: 1.8;">
                        <p style="margin-bottom: 8px;">
                            <strong style="color: var(--color-white);"><?php esc_html_e('Hafta İçi:', 'mis360'); ?></strong><br>
                            12:00 – 24:00 (Mutfak Kapanış: 23:00)
                        </p>
                        <p style="margin-bottom: 8px;">
                            <strong style="color: var(--color-white);"><?php esc_html_e('Hafta Sonu:', 'mis360'); ?></strong><br>
                            09:30 – 13:30 (Serpme Brunch)<br>
                            14:00 – 01:00 (Akşam Servisi)
                        </p>
                        <p style="color: var(--color-primary); font-size: 12px; font-weight: 700;">
                            ✓ Vale Park & Açık Teras Mevcuttur
                        </p>
                    </div>
                </div>

                <!-- 4. Sütun: Rezervasyon & Lokasyon -->
                <div class="footer-column">
                    <h4 class="footer-column-title"><?php esc_html_e('Rezervasyon & Konum', 'mis360'); ?></h4>
                    <div class="footer-contact-item">
                        <svg class="footer-contact-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        <div class="footer-contact-text">
                            Cevdetpaşa Cad. No:42 Bebek, Beşiktaş / İstanbul
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
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                            <polyline points="22,6 12,13 2,6"></polyline>
                        </svg>
                        <div class="footer-contact-text">
                            rezervasyon@misteknoloji360.com.tr
                        </div>
                    </div>
                </div>

            </div>

            <!-- Gurme Bülten Aboneliği (Denfora Newsletter) -->
            <div class="footer-newsletter">
                <div class="footer-newsletter-content">
                    <h4 class="footer-newsletter-title"><?php esc_html_e('Gurme Bültenimize Katılın', 'mis360'); ?></h4>
                    <p class="footer-newsletter-text"><?php esc_html_e('Yeni mevsimsel menüler, şefin tadım günleri ve özel davetlerden ilk siz haberdar olun.', 'mis360'); ?></p>
                </div>
                <form class="footer-newsletter-form" onsubmit="return false;">
                    <input type="email" placeholder="<?php esc_attr_e('E-posta adresiniz...', 'mis360'); ?>" class="footer-newsletter-input" required>
                    <button type="submit" class="btn btn-primary"><?php esc_html_e('Kayıt Ol', 'mis360'); ?></button>
                </form>
            </div>

            <!-- 4 Restoran Güven Rozeti (Denfora Exact Architecture) -->
            <div class="footer-trust">
                <div class="trust-badge">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                        <polyline points="9 12 11 14 15 10"></polyline>
                    </svg>
                    <span><?php esc_html_e('Hijyen & Kalite Sertifikalı', 'mis360'); ?></span>
                </div>
                <div class="trust-badge">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="1" y="3" width="15" height="13"></rect>
                        <polygon points="16 8 22 12 22 20 16 16 16 8"></polygon>
                    </svg>
                    <span><?php esc_html_e('Özel Vale Park Servisi', 'mis360'); ?></span>
                </div>
                <div class="trust-badge">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                    </svg>
                    <span><?php esc_html_e('WhatsApp Rezervasyon', 'mis360'); ?></span>
                </div>
                <div class="trust-badge">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                    </svg>
                    <span><?php esc_html_e('%100 Taze & Organik', 'mis360'); ?></span>
                </div>
            </div>

            <!-- Alt Telif & Ajans Künyesi -->
            <div class="footer-bottom">
                <div class="footer-bottom-inner">
                    <p class="footer-copyright">
                        © <?php echo date('Y'); ?> MİS360 Bistro & Gourmet. <?php esc_html_e('Tüm hakları saklıdır.', 'mis360'); ?>
                    </p>
                    <div class="footer-bottom-links">
                        <a href="#" class="footer-bottom-link"><?php esc_html_e('Alerjen Uyarısı', 'mis360'); ?></a>
                        <a href="#" class="footer-bottom-link"><?php esc_html_e('Gizlilik Politikası', 'mis360'); ?></a>
                        <a href="#" class="footer-bottom-link"><?php esc_html_e('Çerez Ayarları', 'mis360'); ?></a>
                    </div>
                </div>

                <div class="footer-agency">
                    <span style="color: var(--color-gray-500); font-size: 11px; text-transform: uppercase; letter-spacing: 0.1em;">
                        <?php esc_html_e('Tasarım & Web Altyapısı:', 'mis360'); ?>
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
