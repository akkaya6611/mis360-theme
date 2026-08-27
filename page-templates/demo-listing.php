<?php
/**
 * Template Name: MİS360 Demo - Prestige İlan & Emlak / Galeri
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

<main id="primary" class="mis-main-area mis-demo-listing">
    <div class="mis-container">

        <!-- 1. İlan Arama & Filtreleme Vitrini -->
        <section style="background: linear-gradient(135deg, rgba(16, 185, 129, 0.08), rgba(59, 130, 246, 0.06)); border: 1px solid var(--mis-border-color); border-radius: var(--mis-radius-lg); padding: 3rem 1.5rem; text-align: center; margin-bottom: var(--mis-space-xl);">
            <span class="mis-listing-badge" style="position: static; display: inline-block; background: #059669; margin-bottom: 1rem;">
                <?php esc_html_e('💎 Doğrulanmış VIP Portföy', 'mis360'); ?>
            </span>
            <h1 style="font-size: var(--mis-text-3xl); font-weight: 900; margin-bottom: 1rem;">
                <?php esc_html_e('Hayalinizdeki Evi ve Prestijli Aracı Keşfedin', 'mis360'); ?>
            </h1>
            <p style="color: var(--mis-text-secondary); max-width: 600px; margin: 0 auto 2rem;">
                <?php esc_html_e('Ekspertiz onaylı, tapu ve ruhsat kontrolleri tamamlanmış en seçkin ilan seçenekleri.', 'mis360'); ?>
            </p>

            <!-- Arama & Filtre Çubuğu -->
            <div style="background: var(--mis-bg-surface); padding: 1rem; border-radius: var(--mis-radius-md); box-shadow: var(--mis-shadow-md); max-width: 860px; margin: 0 auto; display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)) 120px; gap: 0.75rem; align-items: center;">
                <input type="text" placeholder="Kelime veya İlan No..." style="padding: 0.65rem 1rem; border: 1px solid var(--mis-border-color); border-radius: var(--mis-radius-sm); font-size: 14px;">
                <select style="padding: 0.65rem 1rem; border: 1px solid var(--mis-border-color); border-radius: var(--mis-radius-sm); font-size: 14px;">
                    <option><?php esc_html_e('Tüm Kategoriler', 'mis360'); ?></option>
                    <option><?php esc_html_e('Konut & Rezidans', 'mis360'); ?></option>
                    <option><?php esc_html_e('Vasıta & Otomobil', 'mis360'); ?></option>
                    <option><?php esc_html_e('Ticari Gayrimenkul', 'mis360'); ?></option>
                </select>
                <select style="padding: 0.65rem 1rem; border: 1px solid var(--mis-border-color); border-radius: var(--mis-radius-sm); font-size: 14px;">
                    <option><?php esc_html_e('Şehir / Lokasyon', 'mis360'); ?></option>
                    <option>İstanbul</option>
                    <option>Ankara</option>
                    <option>İzmir</option>
                    <option>Antalya</option>
                </select>
                <button type="button" class="button button-primary" style="height: 100%; border-radius: var(--mis-radius-sm); font-weight: 700; font-size: 14px; background: #059669; border-color: #059669; cursor: pointer;">
                    <?php esc_html_e('Ara 🔍', 'mis360'); ?>
                </button>
            </div>
        </section>

        <!-- 2. Öne Çıkan VIP İlanlar -->
        <section style="margin-bottom: var(--mis-space-xl);">
            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: var(--mis-space-lg); flex-wrap: wrap; gap: 1rem;">
                <div>
                    <h2 style="font-size: var(--mis-text-2xl); font-weight: 800; margin: 0;"><?php esc_html_e('Öne Çıkan Fırsat İlanları', 'mis360'); ?></h2>
                    <p style="color: var(--mis-text-muted); margin: 4px 0 0 0;"><?php esc_html_e('Bu haftanın en çok ilgi gören emlak ve vasıta ilanları.', 'mis360'); ?></p>
                </div>
            </div>

            <div class="mis-cards-grid">
                
                <!-- İlan 1: Lüks Daire -->
                <article class="mis-card mis-listing-card">
                    <div class="mis-listing-thumb-wrap" style="background: linear-gradient(135deg, #1e293b, #0f172a); display: flex; align-items: center; justify-content: center; min-height: 220px;">
                        <span class="mis-listing-badge" style="background: #059669;"><?php esc_html_e('VIP Satılık', 'mis360'); ?></span>
                        <div class="mis-listing-price-tag">₺18.500.000</div>
                        <span style="font-size: 3.5rem;">🏢</span>
                    </div>
                    <div class="mis-card-body">
                        <div class="mis-listing-location">📍 Beşiktaş, Levent / İstanbul</div>
                        <h3 class="mis-card-title"><?php esc_html_e('Boğaz Manzaralı 3+1 Akıllı Rezidans', 'mis360'); ?></h3>
                        
                        <!-- Özellik Çipleri -->
                        <div style="display: flex; gap: 0.5rem; flex-wrap: wrap; margin-bottom: 1rem; font-size: 12px; color: var(--mis-text-muted);">
                            <span style="background: var(--mis-bg-surface-elevated); padding: 3px 8px; border-radius: 4px;">📐 185 m²</span>
                            <span style="background: var(--mis-bg-surface-elevated); padding: 3px 8px; border-radius: 4px;">🛏️ 3+1</span>
                            <span style="background: var(--mis-bg-surface-elevated); padding: 3px 8px; border-radius: 4px;">🚗 Otoparklı</span>
                        </div>

                        <p class="mis-card-excerpt"><?php esc_html_e('Yüksek kat, kesintisiz boğaz manzarası, 7/24 güvenlik, concierge hizmeti ve geniş teras alanı.', 'mis360'); ?></p>
                        
                        <div class="mis-card-footer">
                            <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Beşiktaş Leventteki 3+1 rezidans ilanı hakkında bilgi almak istiyorum.'); ?>" target="_blank" class="mis-btn-action">
                                <?php esc_html_e('İlanı İncele & Danışmana Yaz', 'mis360'); ?> →
                            </a>
                        </div>
                    </div>
                </article>

                <!-- İlan 2: Prestij Otomobil -->
                <article class="mis-card mis-listing-card">
                    <div class="mis-listing-thumb-wrap" style="background: linear-gradient(135deg, #1e293b, #0f172a); display: flex; align-items: center; justify-content: center; min-height: 220px;">
                        <span class="mis-listing-badge" style="background: #2563eb;"><?php esc_html_e('Hatasız & Boyasız', 'mis360'); ?></span>
                        <div class="mis-listing-price-tag">₺2.650.000</div>
                        <span style="font-size: 3.5rem;">🚘</span>
                    </div>
                    <div class="mis-card-body">
                        <div class="mis-listing-location">📍 Kadıköy Galeri / İstanbul</div>
                        <h3 class="mis-card-title"><?php esc_html_e('2024 Model Hibrit SUV Prestij Paket', 'mis360'); ?></h3>
                        
                        <!-- Özellik Çipleri -->
                        <div style="display: flex; gap: 0.5rem; flex-wrap: wrap; margin-bottom: 1rem; font-size: 12px; color: var(--mis-text-muted);">
                            <span style="background: var(--mis-bg-surface-elevated); padding: 3px 8px; border-radius: 4px;">📅 2024</span>
                            <span style="background: var(--mis-bg-surface-elevated); padding: 3px 8px; border-radius: 4px;">⚡ Hibrit</span>
                            <span style="background: var(--mis-bg-surface-elevated); padding: 3px 8px; border-radius: 4px;">🛣️ 18.000 KM</span>
                        </div>

                        <p class="mis-card-excerpt"><?php esc_html_e('İlk sahibinden, yetkili servis garantili, panoramik cam tavan, otonom sürüş ve 360 kamera.', 'mis360'); ?></p>
                        
                        <div class="mis-card-footer">
                            <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('2024 Model Hibrit SUV ilanı için ekspertiz ve randevu rica ediyorum.'); ?>" target="_blank" class="mis-btn-action">
                                <?php esc_html_e('Ekspertiz Raporu & Randevu', 'mis360'); ?> →
                            </a>
                        </div>
                    </div>
                </article>

            </div>
        </section>

        <!-- 3. Portföy Danışmanı İletişim Bandı -->
        <section class="mis-card" style="padding: 2.5rem; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 1.5rem; background: var(--mis-bg-surface-elevated);">
            <div>
                <h3 style="margin: 0 0 0.5rem 0; font-size: var(--mis-text-xl);"><?php esc_html_e('Mülkünüzü veya Aracınızı Hızlıca Satmak mı İstiyorsunuz?', 'mis360'); ?></h3>
                <p style="margin: 0; color: var(--mis-text-secondary);"><?php esc_html_e('Uzman kadromuzla ücretsiz değerleme ve doğru fiyatlandırma desteği alın.', 'mis360'); ?></p>
            </div>
            <div>
                <a href="tel:<?php echo esc_attr($clean_phone); ?>" class="mis-icon-btn" style="width: auto; padding: 0.85rem 2rem; background: var(--mis-primary); color: #fff; border: none; font-weight: 700; border-radius: var(--mis-radius-full);">
                    <?php esc_html_e('📞 Danışmanımızla Görüşün', 'mis360'); ?>
                </a>
            </div>
        </section>

    </div>
</main>

<?php
get_footer();
