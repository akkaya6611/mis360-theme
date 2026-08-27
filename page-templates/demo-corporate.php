<?php
/**
 * Template Name: MİS360 Demo - Modern Kurumsal & 360 Ajans
 *
 * @package MİS360
 * @author  Serkan AKKAYA <https://misteknoloji360.com.tr/>
 * @since   1.0.0
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$phone       = get_theme_mod('mis360_phone', '+90 555 123 4567');
$clean_phone = preg_replace('/[^0-9+]/', '', $phone);
$whatsapp    = get_theme_mod('mis360_whatsapp', '905551234567');
?>

<main id="primary" class="mis-main-area mis-demo-corporate">
    <div class="mis-container">

        <!-- 1. Kurumsal & Ajans Hero -->
        <section style="text-align: center; padding: 5rem 1rem 3rem; margin-bottom: var(--mis-space-xl);">
            <span class="mis-listing-badge" style="position: static; display: inline-block; background: #3b82f6; margin-bottom: 1.25rem;">
                <?php esc_html_e('🚀 360° Dijital Çözümler & İnovasyon', 'mis360'); ?>
            </span>

            <h1 style="font-size: var(--mis-text-hero); font-weight: 900; line-height: 1.15; margin-bottom: 1.5rem;">
                <?php esc_html_e('İşinizi Geleceğe Taşıyan', 'mis360'); ?> <br>
                <span class="mis-gradient-text"><?php esc_html_e('Güçlü, Modern & Akılcı Çözümler', 'mis360'); ?></span>
            </h1>

            <p style="font-size: var(--mis-text-lg); color: var(--mis-text-secondary); max-width: 720px; margin: 0 auto 2.5rem;">
                <?php esc_html_e('İşletmenizin dijital dönüşümünü hızlandırıyor; yüksek performanslı web sistemleri, marka kimliği ve dönüşüm odaklı stratejiler sunuyoruz.', 'mis360'); ?>
            </p>

            <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                <a href="tel:<?php echo esc_attr($clean_phone); ?>" class="mis-icon-btn" style="width: auto; padding: 0.9rem 2.25rem; background: var(--mis-primary); color: #fff; border: none; font-weight: 700; border-radius: var(--mis-radius-full); box-shadow: var(--mis-shadow-glow);">
                    <?php esc_html_e('Hemen Teklif Alın →', 'mis360'); ?>
                </a>
                <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Kurumsal hizmetleriniz hakkında bilgi ve teklif almak istiyorum.'); ?>" target="_blank" rel="noopener noreferrer" class="mis-icon-btn" style="width: auto; padding: 0.9rem 2.25rem; font-weight: 700; border-radius: var(--mis-radius-full);">
                    <?php esc_html_e('💬 WhatsApp Danışmanı', 'mis360'); ?>
                </a>
            </div>
        </section>

        <!-- 2. İstatistik & Başarı Sayaçları -->
        <section style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 1.25rem; margin-bottom: var(--mis-space-xl); text-align: center;">
            <div class="mis-card" style="padding: 2rem;">
                <div style="font-size: 2.5rem; font-weight: 900; color: var(--mis-primary); margin-bottom: 0.25rem;">500+</div>
                <div style="font-weight: 600; color: var(--mis-text-primary);"><?php esc_html_e('Tamamlanan Proje', 'mis360'); ?></div>
                <div style="font-size: 13px; color: var(--mis-text-muted);"><?php esc_html_e('Farklı sektörlerde başarı hikayeleri', 'mis360'); ?></div>
            </div>
            <div class="mis-card" style="padding: 2rem;">
                <div style="font-size: 2.5rem; font-weight: 900; color: var(--mis-primary); margin-bottom: 0.25rem;">%99</div>
                <div style="font-weight: 600; color: var(--mis-text-primary);"><?php esc_html_e('Müşteri Memnuniyeti', 'mis360'); ?></div>
                <div style="font-size: 13px; color: var(--mis-text-muted);"><?php esc_html_e('Sözleşmeli servis kalitesi', 'mis360'); ?></div>
            </div>
            <div class="mis-card" style="padding: 2rem;">
                <div style="font-size: 2.5rem; font-weight: 900; color: var(--mis-primary); margin-bottom: 0.25rem;">12+</div>
                <div style="font-weight: 600; color: var(--mis-text-primary);"><?php esc_html_e('Yıllık Deneyim', 'mis360'); ?></div>
                <div style="font-size: 13px; color: var(--mis-text-muted);"><?php esc_html_e('Köklü kurumsal birikim', 'mis360'); ?></div>
            </div>
            <div class="mis-card" style="padding: 2rem;">
                <div style="font-size: 2.5rem; font-weight: 900; color: var(--mis-primary); margin-bottom: 0.25rem;">24/7</div>
                <div style="font-weight: 600; color: var(--mis-text-primary);"><?php esc_html_e('Aktif Teknik Destek', 'mis360'); ?></div>
                <div style="font-size: 13px; color: var(--mis-text-muted);"><?php esc_html_e('Kesintisiz operasyon güvencesi', 'mis360'); ?></div>
            </div>
        </section>

        <!-- 3. Hizmet Alanlarımız -->
        <section style="margin-bottom: var(--mis-space-xl);">
            <div style="text-align: center; margin-bottom: var(--mis-space-lg);">
                <h2 style="font-size: var(--mis-text-3xl); font-weight: 800;"><?php esc_html_e('Uçtan Uca Kurumsal Hizmetlerimiz', 'mis360'); ?></h2>
                <p style="color: var(--mis-text-secondary); max-width: 600px; margin: 0 auto;"><?php esc_html_e('Markanızı sektörde liderliğe taşıyacak stratejik çözümler.', 'mis360'); ?></p>
            </div>

            <div class="mis-cards-grid">
                <div class="mis-card">
                    <div class="mis-card-body">
                        <div style="font-size: 2.5rem; margin-bottom: 1rem;">⚡</div>
                        <h3 class="mis-card-title"><?php esc_html_e('Özel Yazılım & Web Sistemleri', 'mis360'); ?></h3>
                        <p class="mis-card-excerpt"><?php esc_html_e('Modern web standartlarına tam uyumlu, ultra hızlı, SEO dostu ve ölçeklenebilir dijital platformlar.', 'mis360'); ?></p>
                    </div>
                </div>

                <div class="mis-card">
                    <div class="mis-card-body">
                        <div style="font-size: 2.5rem; margin-bottom: 1rem;">🎨</div>
                        <h3 class="mis-card-title"><?php esc_html_e('Marka Kimliği & UI/UX Tasarım', 'mis360'); ?></h3>
                        <p class="mis-card-excerpt"><?php esc_html_e('Kullanıcı deneyimini merkeze alan, kurumsal duruşunuzu güçlendiren minimalist ve şık arayüz tasarımları.', 'mis360'); ?></p>
                    </div>
                </div>

                <div class="mis-card">
                    <div class="mis-card-body">
                        <div style="font-size: 2.5rem; margin-bottom: 1rem;">📈</div>
                        <h3 class="mis-card-title"><?php esc_html_e('Dönüşüm Odaklı Dijital Büyüme', 'mis360'); ?></h3>
                        <p class="mis-card-excerpt"><?php esc_html_e('Arama motoru optimizasyonu (SEO), performans pazarlaması ve satış hunisi (funnel) optimizasyonu.', 'mis360'); ?></p>
                    </div>
                </div>
            </div>
        </section>

        <!-- 4. Fiyat & Hizmet Paketleri -->
        <section style="margin-bottom: var(--mis-space-xl);">
            <div style="text-align: center; margin-bottom: var(--mis-space-lg);">
                <h2 style="font-size: var(--mis-text-3xl); font-weight: 800;"><?php esc_html_e('Şeffaf Çözüm Paketleri', 'mis360'); ?></h2>
                <p style="color: var(--mis-text-secondary);"><?php esc_html_e('İhtiyacınıza en uygun paketi seçin, hemen başlayalım.', 'mis360'); ?></p>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.5rem;">
                
                <!-- Paket 1 -->
                <div class="mis-card" style="padding: 2rem;">
                    <h3 style="font-size: 1.25rem; font-weight: 700; margin-bottom: 0.5rem;"><?php esc_html_e('Başlangıç', 'mis360'); ?></h3>
                    <div style="font-size: 2rem; font-weight: 900; color: var(--mis-text-primary); margin-bottom: 1rem;">₺12.500 <small style="font-size: 13px; color: var(--mis-text-muted); font-weight: normal;">/ tek sefer</small></div>
                    <ul style="list-style: none; padding: 0; margin: 0 0 1.5rem 0; display: flex; flex-direction: column; gap: 8px; font-size: 14px; color: var(--mis-text-secondary);">
                        <li>✓ Modern Kurumsal Web Sitesi</li>
                        <li>✓ Mobil & Tablet Uyumlu Arayüz</li>
                        <li>✓ Temel SEO & Hız Optimizasyonu</li>
                        <li>✓ 1 Yıl Teknik Destek</li>
                    </ul>
                    <a href="tel:<?php echo esc_attr($clean_phone); ?>" class="mis-btn-action"><?php esc_html_e('Teklif İste', 'mis360'); ?></a>
                </div>

                <!-- Paket 2 (Öne Çıkan) -->
                <div class="mis-card" style="padding: 2rem; border-color: var(--mis-primary); position: relative; box-shadow: var(--mis-shadow-lg);">
                    <span class="mis-listing-badge" style="top: -12px; right: 20px; background: var(--mis-primary);"><?php esc_html_e('En Çok Tercih Edilen', 'mis360'); ?></span>
                    <h3 style="font-size: 1.25rem; font-weight: 700; margin-bottom: 0.5rem;"><?php esc_html_e('Profesyonel 360', 'mis360'); ?></h3>
                    <div style="font-size: 2rem; font-weight: 900; color: var(--mis-primary); margin-bottom: 1rem;">₺24.500 <small style="font-size: 13px; color: var(--mis-text-muted); font-weight: normal;">/ tek sefer</small></div>
                    <ul style="list-style: none; padding: 0; margin: 0 0 1.5rem 0; display: flex; flex-direction: column; gap: 8px; font-size: 14px; color: var(--mis-text-secondary);">
                        <li>✓ Özel UI/UX Tasarım ve Kodlama</li>
                        <li>✓ Gelişmiş İlan / Menü / CPT Modülü</li>
                        <li>✓ WhatsApp Entegrasyonu & Yapışkan Bar</li>
                        <li>✓ 100/100 Core Web Vitals Skoru</li>
                        <li>✓ Öncelikli 7/24 VIP Destek</li>
                    </ul>
                    <a href="tel:<?php echo esc_attr($clean_phone); ?>" class="mis-btn-action" style="background: var(--mis-primary); color: #fff; border-color: var(--mis-primary);"><?php esc_html_e('Hemen Başlayın →', 'mis360'); ?></a>
                </div>

                <!-- Paket 3 -->
                <div class="mis-card" style="padding: 2rem;">
                    <h3 style="font-size: 1.25rem; font-weight: 700; margin-bottom: 0.5rem;"><?php esc_html_e('Enterprise Kurumsal', 'mis360'); ?></h3>
                    <div style="font-size: 2rem; font-weight: 900; color: var(--mis-text-primary); margin-bottom: 1rem;"><?php esc_html_e('Özel Fiyat', 'mis360'); ?></div>
                    <ul style="list-style: none; padding: 0; margin: 0 0 1.5rem 0; display: flex; flex-direction: column; gap: 8px; font-size: 14px; color: var(--mis-text-secondary);">
                        <li>✓ Çok Şubeli / Çok Dilli Altyapı</li>
                        <li>✓ Özel API ve CRM Entegrasyonları</li>
                        <li>✓ Yüksek Trafikli Sunucu Mimarisi</li>
                        <li>✓ Özel Danışman ve SLA Garantisi</li>
                    </ul>
                    <a href="tel:<?php echo esc_attr($clean_phone); ?>" class="mis-btn-action"><?php esc_html_e('Görüşme Talep Et', 'mis360'); ?></a>
                </div>

            </div>
        </section>

    </div>
</main>

<?php
get_footer();
