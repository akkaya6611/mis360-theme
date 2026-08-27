<?php
/**
 * Template Name: MİS360 Demo - Acil Yol Yardım & Çekici
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
$area        = get_theme_mod('mis360_service_area', 'Tüm Şehir, Otoyol & Çevre Yolları');
?>

<main id="primary" class="mis-main-area mis-demo-emergency">
    <div class="mis-container">

        <!-- 1. Acil Çağrı Hero Vitrini -->
        <section class="mis-emergency-hero">
            <div class="mis-emergency-hero-content">
                <span class="mis-emergency-live-badge">
                    <span class="mis-pulse-dot"></span>
                    <?php esc_html_e('7/24 Canlı Nöbetçi Çekici Ekipleri Aktif', 'mis360'); ?>
                </span>

                <h1 class="mis-emergency-title">
                    <?php esc_html_e('Yolda mı Kaldınız?', 'mis360'); ?> <br>
                    <span class="mis-gradient-text"><?php esc_html_e('En Yakın Çekici 15 Dakikada Yanınızda!', 'mis360'); ?></span>
                </h1>

                <p class="mis-emergency-desc">
                    <?php printf(esc_html__('Bölge: %s genelinde kaskolu, sigortalı ve hasarsız oto çekici, vinçli kurtarma ve akü takviye hizmeti.', 'mis360'), '<strong>' . esc_html($area) . '</strong>'); ?>
                </p>

                <div class="mis-emergency-cta-group">
                    <a href="tel:<?php echo esc_attr($clean_phone); ?>" class="mis-btn-emergency-call">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                        </svg>
                        <span><?php esc_html_e('HEMEN ÇEKİCİ ÇAĞIR', 'mis360'); ?> <small><?php echo esc_html($phone); ?></small></span>
                    </a>

                    <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Acil çekiciye ihtiyacım var, canlı konumumu iletiyorum:'); ?>" target="_blank" rel="noopener noreferrer" class="mis-btn-emergency-wa">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        <span><?php esc_html_e('WHATSAPP KONUM GÖNDER', 'mis360'); ?></span>
                    </a>
                </div>
            </div>
        </section>

        <!-- 2. İstatistik & Güven Sayaçları -->
        <section class="mis-stats-bar" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; margin-bottom: var(--mis-space-xl); text-align: center;">
            <div class="mis-card" style="padding: 1.5rem;">
                <div style="font-size: var(--mis-text-2xl); font-weight: 900; color: var(--mis-primary);">15 Dk</div>
                <div style="font-size: var(--mis-text-sm); color: var(--mis-text-secondary);"><?php esc_html_e('Ortalama Varış Süresi', 'mis360'); ?></div>
            </div>
            <div class="mis-card" style="padding: 1.5rem;">
                <div style="font-size: var(--mis-text-2xl); font-weight: 900; color: var(--mis-primary);">7/24</div>
                <div style="font-size: var(--mis-text-sm); color: var(--mis-text-secondary);"><?php esc_html_e('Kesintisiz Çağrı Merkezi', 'mis360'); ?></div>
            </div>
            <div class="mis-card" style="padding: 1.5rem;">
                <div style="font-size: var(--mis-text-2xl); font-weight: 900; color: var(--mis-primary);">18+</div>
                <div style="font-size: var(--mis-text-sm); color: var(--mis-text-secondary);"><?php esc_html_e('Aktif Çekici Filosu', 'mis360'); ?></div>
            </div>
            <div class="mis-card" style="padding: 1.5rem;">
                <div style="font-size: var(--mis-text-2xl); font-weight: 900; color: var(--mis-primary);">%100</div>
                <div style="font-size: var(--mis-text-sm); color: var(--mis-text-secondary);"><?php esc_html_e('Kaskolu Taşıma Garantisi', 'mis360'); ?></div>
            </div>
        </section>

        <!-- 3. Hizmet Filosu Kartları -->
        <section style="margin-bottom: var(--mis-space-xl);">
            <div style="text-align: center; margin-bottom: var(--mis-space-lg);">
                <h2 style="font-size: var(--mis-text-2xl); font-weight: 800;"><?php esc_html_e('Yol Yardım & Çekici Hizmetlerimiz', 'mis360'); ?></h2>
                <p style="color: var(--mis-text-secondary);"><?php esc_html_e('Her türlü araç ve acil durum için donanımlı araç parkurumuz hazır.', 'mis360'); ?></p>
            </div>

            <div class="mis-cards-grid">
                <div class="mis-card">
                    <div class="mis-card-body">
                        <span class="mis-listing-badge" style="position: static; display: inline-block; margin-bottom: 0.75rem;">7/24 Aktif</span>
                        <h3 class="mis-card-title"><?php esc_html_e('Binek & Hafif Ticari Çekici', 'mis360'); ?></h3>
                        <p class="mis-card-excerpt"><?php esc_html_e('Otomobil, SUV ve minibüs gibi araçlarınız için kayar kasalı modern oto çekici araçlarımızla hasarsız taşıma.', 'mis360'); ?></p>
                        <div style="margin-top: auto;">
                            <a href="tel:<?php echo esc_attr($clean_phone); ?>" class="mis-btn-action"><?php esc_html_e('Hemen Çağır', 'mis360'); ?> →</a>
                        </div>
                    </div>
                </div>

                <div class="mis-card">
                    <div class="mis-card-body">
                        <span class="mis-listing-badge" style="position: static; display: inline-block; margin-bottom: 0.75rem; background: #2563eb;">Mobil Destek</span>
                        <h3 class="mis-card-title"><?php esc_html_e('Akü Takviye & Yerinde Servis', 'mis360'); ?></h3>
                        <p class="mis-card-excerpt"><?php esc_html_e('Aracınız marş basmıyorsa çekiciye gerek kalmadan mobil servis ekibimiz gelir, akü takviyesi ve ölçümü yapar.', 'mis360'); ?></p>
                        <div style="margin-top: auto;">
                            <a href="tel:<?php echo esc_attr($clean_phone); ?>" class="mis-btn-action"><?php esc_html_e('Akü Servisi İste', 'mis360'); ?> →</a>
                        </div>
                    </div>
                </div>

                <div class="mis-card">
                    <div class="mis-card-body">
                        <span class="mis-listing-badge" style="position: static; display: inline-block; margin-bottom: 0.75rem; background: #d97706;">Ağır Vasıta</span>
                        <h3 class="mis-card-title"><?php esc_html_e('Ahtapot & Vinçli Kurtarma', 'mis360'); ?></h3>
                        <p class="mis-card-excerpt"><?php esc_html_e('Şarampol, hendek, kaza veya yoldan çıkan ağır araçlar için güçlü vinç ve ahtapot çekici filomuz.', 'mis360'); ?></p>
                        <div style="margin-top: auto;">
                            <a href="tel:<?php echo esc_attr($clean_phone); ?>" class="mis-btn-action"><?php esc_html_e('Vinç Çağır', 'mis360'); ?> →</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 4. Nasıl Çalışır? (3 Kolay Adım) -->
        <section class="mis-steps-section">
            <h2 class="mis-section-title"><?php esc_html_e('Nasıl Çalışır? 3 Kolay Adımda Yanınızdayız', 'mis360'); ?></h2>
            <div class="mis-steps-grid">
                <div class="mis-step-card mis-card">
                    <div class="mis-step-num">1</div>
                    <h3><?php esc_html_e('Arayın veya Konum Atın', 'mis360'); ?></h3>
                    <p><?php esc_html_e('7/24 çağrı merkezimizi arayın veya WhatsApp ile canlı konumunuzu iletin.', 'mis360'); ?></p>
                </div>
                <div class="mis-step-card mis-card">
                    <div class="mis-step-num">2</div>
                    <h3><?php esc_html_e('En Yakın Çekici Yönlensin', 'mis360'); ?></h3>
                    <p><?php esc_html_e('Akıllı filo takip sistemimizle konumunuza en yakın aracımız 15 dakikada hareket etsin.', 'mis360'); ?></p>
                </div>
                <div class="mis-step-card mis-card">
                    <div class="mis-step-num">3</div>
                    <h3><?php esc_html_e('Güvenle Ulaşın', 'mis360'); ?></h3>
                    <p><?php esc_html_e('Aracınız garantili ve sigortalı şekilde dilediğiniz servise teslim edilsin.', 'mis360'); ?></p>
                </div>
            </div>
        </section>

        <!-- 5. Müşteri Memnuniyeti & Yorumlar -->
        <section style="margin-bottom: var(--mis-space-xl);">
            <div style="text-align: center; margin-bottom: var(--mis-space-lg);">
                <h2 style="font-size: var(--mis-text-2xl); font-weight: 800;"><?php esc_html_e('Yolda Bize Güvenen Sürücüler', 'mis360'); ?></h2>
                <div style="color: #f59e0b; font-size: 1.25rem;">★★★★★</div>
            </div>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem;">
                <div class="mis-card" style="padding: 1.75rem;">
                    <p style="font-style: italic; color: var(--mis-text-secondary); margin-bottom: 1rem;">"Gece yarısı otobanda kaldım, aradıktan 12 dakika sonra çekici geldi. Kibar ve çok profesyonel bir ekipti, teşekkürler!"</p>
                    <strong>— Murat K. (Binek Araç Sürücüsü)</strong>
                </div>
                <div class="mis-card" style="padding: 1.75rem;">
                    <p style="font-style: italic; color: var(--mis-text-secondary); margin-bottom: 1rem;">"Akü bittiğinde WhatsApp'tan konum attım, hemen geldiler ve yerinde takviye yaptılar. Fiyat son derece makuldu."</p>
                    <strong>— Zeynep A. (Kadıköy)</strong>
                </div>
            </div>
        </section>

    </div>
</main>

<?php
get_footer();
