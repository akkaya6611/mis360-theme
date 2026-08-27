<?php
/**
 * Template Name: MİS360 Demo - Gourmet Bistro & Restoran
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

<main id="primary" class="mis-main-area mis-demo-restaurant">
    <div class="mis-container">

        <!-- 1. Restoran Hero & Karşılama Vitrini -->
        <section class="mis-restaurant-hero" style="text-align: center; padding: 4rem 1rem; background: radial-gradient(circle at center, rgba(245, 158, 11, 0.08) 0%, transparent 70%); border-bottom: 1px solid var(--mis-border-color); margin-bottom: var(--mis-space-xl);">
            <span class="mis-listing-badge" style="position: static; display: inline-block; background: #d97706; margin-bottom: 1rem; font-size: var(--mis-text-sm);">
                <?php esc_html_e('⭐ Gurme Mutfak & Seçkin Lezzetler', 'mis360'); ?>
            </span>

            <h1 style="font-size: var(--mis-text-hero); font-weight: 900; line-height: 1.15; margin-bottom: 1rem;">
                <?php esc_html_e('Usta Ellerin Hazırladığı', 'mis360'); ?> <br>
                <span class="mis-gradient-text" style="background: linear-gradient(135deg, #d97706, #f59e0b); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                    <?php esc_html_e('Eşsiz Bir Gastronomi Deneyimi', 'mis360'); ?>
                </span>
            </h1>

            <p style="font-size: var(--mis-text-lg); color: var(--mis-text-secondary); max-width: 680px; margin: 0 auto 2rem;">
                <?php esc_html_e('Doğal ve taze malzemeler, odun ateşinde ağır pişen spesiyaller ve sıcak bir atmosfer ile sofranıza konuk oluyoruz.', 'mis360'); ?>
            </p>

            <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Merhaba, menünüzden sipariş vermek istiyorum:'); ?>" target="_blank" rel="noopener noreferrer" class="mis-icon-btn" style="width: auto; padding: 0.85rem 2rem; background: #25d366; color: #ffffff; border: none; font-weight: 700; border-radius: var(--mis-radius-full); box-shadow: 0 4px 12px rgba(37, 211, 102, 0.3);">
                    <?php esc_html_e('💬 WhatsApp ile Anında Sipariş', 'mis360'); ?>
                </a>

                <a href="tel:<?php echo esc_attr($clean_phone); ?>" class="mis-icon-btn" style="width: auto; padding: 0.85rem 2rem; font-weight: 700; border-radius: var(--mis-radius-full);">
                    <?php esc_html_e('📞 Masa Rezervasyonu', 'mis360'); ?>
                </a>
            </div>
        </section>

        <!-- 2. Menü Kategorileri -->
        <section style="margin-bottom: var(--mis-space-xl);">
            <div style="text-align: center; margin-bottom: var(--mis-space-lg);">
                <h2 style="font-size: var(--mis-text-3xl); font-weight: 800;"><?php esc_html_e('Öne Çıkan Spesiyallerimiz', 'mis360'); ?></h2>
                <p style="color: var(--mis-text-secondary);"><?php esc_html_e('Her damak tadına hitap eden zengin menümüzden seçtiklerimiz.', 'mis360'); ?></p>
            </div>

            <!-- Menü Kartları Izgarası -->
            <div class="mis-cards-grid">
                
                <!-- Lezzet Kartı 1 -->
                <article class="mis-card mis-listing-card">
                    <div class="mis-listing-thumb-wrap" style="background: linear-gradient(135deg, #1e293b, #0f172a); display: flex; align-items: center; justify-content: center; min-height: 220px;">
                        <span class="mis-listing-badge"><?php esc_html_e('Şefin Spesiyali', 'mis360'); ?></span>
                        <div class="mis-listing-price-tag">₺480</div>
                        <span style="font-size: 3.5rem;">🥩</span>
                    </div>
                    <div class="mis-card-body">
                        <div class="mis-listing-location"><?php esc_html_e('12 Saat Ağır Pişirme • Firik Pilavı', 'mis360'); ?></div>
                        <h3 class="mis-card-title"><?php esc_html_e('Fırınlanmış Kuzu Gerdan', 'mis360'); ?></h3>
                        <p class="mis-card-excerpt"><?php esc_html_e('Közlenmiş arpacık soğan, taze biberiye ve özel kemik iliği sosu ile marine edilmiş yumuşacık kuzu eti.', 'mis360'); ?></p>
                        <div class="mis-card-footer">
                            <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('1 Porsiyon Fırınlanmış Kuzu Gerdan sipariş vermek istiyorum.'); ?>" target="_blank" class="mis-btn-action">
                                <?php esc_html_e('WhatsApp Sipariş Ver', 'mis360'); ?> →
                            </a>
                        </div>
                    </div>
                </article>

                <!-- Lezzet Kartı 2 -->
                <article class="mis-card mis-listing-card">
                    <div class="mis-listing-thumb-wrap" style="background: linear-gradient(135deg, #1e293b, #0f172a); display: flex; align-items: center; justify-content: center; min-height: 220px;">
                        <span class="mis-listing-badge" style="background: #2563eb;"><?php esc_html_e('İtalyan Mutfak', 'mis360'); ?></span>
                        <div class="mis-listing-price-tag">₺360</div>
                        <span style="font-size: 3.5rem;">🍝</span>
                    </div>
                    <div class="mis-card-body">
                        <div class="mis-listing-location"><?php esc_html_e('El Yapımı Taze Makarna • Trüf', 'mis360'); ?></div>
                        <h3 class="mis-card-title"><?php esc_html_e('Trüf Mantarlı Tagliatelle', 'mis360'); ?></h3>
                        <p class="mis-card-excerpt"><?php esc_html_e('Hakiki siyah trüf püresi, taze porçini mantarı, tereyağlı parmesan emülsiyonu ve taze fesleğen yaprakları.', 'mis360'); ?></p>
                        <div class="mis-card-footer">
                            <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('1 Porsiyon Trüf Mantarlı Tagliatelle sipariş vermek istiyorum.'); ?>" target="_blank" class="mis-btn-action">
                                <?php esc_html_e('WhatsApp Sipariş Ver', 'mis360'); ?> →
                            </a>
                        </div>
                    </div>
                </article>

                <!-- Lezzet Kartı 3 -->
                <article class="mis-card mis-listing-card">
                    <div class="mis-listing-thumb-wrap" style="background: linear-gradient(135deg, #1e293b, #0f172a); display: flex; align-items: center; justify-content: center; min-height: 220px;">
                        <span class="mis-listing-badge" style="background: #dc2626;"><?php esc_html_e('Odun Ateşinde', 'mis360'); ?></span>
                        <div class="mis-listing-price-tag">₺420</div>
                        <span style="font-size: 3.5rem;">🍔</span>
                    </div>
                    <div class="mis-card-body">
                        <div class="mis-listing-location"><?php esc_html_e('200g Dry-Aged Dana Eti • Brioche', 'mis360'); ?></div>
                        <h3 class="mis-card-title"><?php esc_html_e('MİS360 Black Angus Burger', 'mis360'); ?></h3>
                        <p class="mis-card-excerpt"><?php esc_html_e('Karamelize soğan reçeli, eritilmiş tütsülü gravyer peyniri, trüflü mayonez ve baharatlı patates kızartması.', 'mis360'); ?></p>
                        <div class="mis-card-footer">
                            <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('1 Adet MİS360 Black Angus Burger sipariş vermek istiyorum.'); ?>" target="_blank" class="mis-btn-action">
                                <?php esc_html_e('WhatsApp Sipariş Ver', 'mis360'); ?> →
                            </a>
                        </div>
                    </div>
                </article>

            </div>
        </section>

        <!-- 3. Çalışma Saatleri & Rezervasyon Kutusu -->
        <section class="mis-card" style="padding: 3rem 2rem; text-align: center; background: var(--mis-bg-surface-elevated); margin-bottom: var(--mis-space-xl); border-radius: var(--mis-radius-lg);">
            <h2 style="font-size: var(--mis-text-2xl); font-weight: 800; margin-bottom: 0.5rem;"><?php esc_html_e('Özel Davetler ve Masa Rezervasyonu', 'mis360'); ?></h2>
            <p style="color: var(--mis-text-secondary); max-width: 600px; margin: 0 auto 1.5rem;">
                <?php esc_html_e('Hafta içi & Hafta sonu 11:30 - 23:30 saatleri arasında hizmetinizdeyiz. Doğum günü, iş toplantısı ve özel kutlamalarınız için masanızı ayırtın.', 'mis360'); ?>
            </p>
            <a href="tel:<?php echo esc_attr($clean_phone); ?>" class="mis-icon-btn" style="width: auto; padding: 0.85rem 2rem; background: var(--mis-primary); color: #fff; border: none; font-weight: 700; border-radius: var(--mis-radius-full);">
                <?php printf(esc_html__('📞 Hemen Masanızı Ayırtın: %s', 'mis360'), esc_html($phone)); ?>
            </a>
        </section>

    </div>
</main>

<?php
get_footer();
