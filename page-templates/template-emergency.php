<?php
/**
 * Template Name: MİS360 Acil Yol Yardım & Çekici
 *
 * @package MİS360
 * @since 1.0.0
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$phone       = get_theme_mod('mis360_phone', '+90 555 123 4567');
$clean_phone = preg_replace('/[^0-9+]/', '', $phone);
$whatsapp    = get_theme_mod('mis360_whatsapp', '905551234567');
$badge       = get_theme_mod('mis360_header_badge', '7/24 Acil Yol Yardım & Çekici');
$hours       = get_theme_mod('mis360_working_hours', 'Haftanın 7 Günü / 24 Saat Açık');
$area        = get_theme_mod('mis360_service_area', 'Tüm Şehir ve Otoyollar');
?>

<main id="primary" class="mis-main-area mis-emergency-landing">
    <div class="mis-container">

        <!-- Acil Yol Yardım Hero Bölümü -->
        <section class="mis-emergency-hero">
            <div class="mis-emergency-hero-content">
                <span class="mis-emergency-live-badge">
                    <span class="mis-pulse-dot"></span>
                    <?php echo esc_html($badge); ?>
                </span>

                <h1 class="mis-emergency-title">
                    <?php esc_html_e('Yolda mı Kaldınız?', 'mis360'); ?> <br>
                    <span class="mis-gradient-text"><?php esc_html_e('En Yakın Çekici 15 Dakikada Yanınızda!', 'mis360'); ?></span>
                </h1>

                <p class="mis-emergency-desc">
                    <?php printf(esc_html__('Bölgemiz: %1$s | %2$s kesintisiz oto kurtarma, akü takviye ve vinç hizmeti.', 'mis360'), '<strong>' . esc_html($area) . '</strong>', '<strong>' . esc_html($hours) . '</strong>'); ?>
                </p>

                <!-- Büyük Acil Aksiyon Butonları -->
                <div class="mis-emergency-cta-group">
                    <a href="tel:<?php echo esc_attr($clean_phone); ?>" class="mis-btn mis-btn-emergency-call">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                        </svg>
                        <span><?php esc_html_e('HEMEN ÇEKİCİ ÇAĞIR', 'mis360'); ?> <small><?php echo esc_html($phone); ?></small></span>
                    </a>

                    <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Acil yol yardım çekiciye ihtiyacım var, konum paylaşıyorum:'); ?>" target="_blank" rel="noopener noreferrer" class="mis-btn mis-btn-emergency-wa">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        <span><?php esc_html_e('WHATSAPP KONUM AT', 'mis360'); ?></span>
                    </a>
                </div>
            </div>
        </section>

        <!-- 3 Adımda Kolay Yol Yardım -->
        <section class="mis-steps-section">
            <h2 class="mis-section-title"><?php esc_html_e('Nasıl Çalışır? 3 Kolay Adımda Yanınızdayız', 'mis360'); ?></h2>
            
            <div class="mis-steps-grid">
                <div class="mis-step-card mis-card">
                    <div class="mis-step-num">1</div>
                    <h3><?php esc_html_e('Arayın veya Konum Atın', 'mis360'); ?></h3>
                    <p><?php esc_html_e('Çağrı merkezimizi arayın veya WhatsApp ile canlı konumunuzu iletin.', 'mis360'); ?></p>
                </div>
                <div class="mis-step-card mis-card">
                    <div class="mis-step-num">2</div>
                    <h3><?php esc_html_e('En Yakın Çekici Yönlendirilsin', 'mis360'); ?></h3>
                    <p><?php esc_html_e('GPS takip sistemimizle rotanıza en yakın profesyonel aracımız hemen yola çıksın.', 'mis360'); ?></p>
                </div>
                <div class="mis-step-card mis-card">
                    <div class="mis-step-num">3</div>
                    <h3><?php esc_html_e('Güvenle Ulaşın', 'mis360'); ?></h3>
                    <p><?php esc_html_e('Aracınız kaskolu ve garantili olarak istediğiniz servise veya adrese taşınsın.', 'mis360'); ?></p>
                </div>
            </div>
        </section>

        <!-- Dinamik Hizmetler Listesi (CPT) -->
        <section class="mis-services-section">
            <h2 class="mis-section-title"><?php esc_html_e('Yol Yardım & Çekici Hizmetlerimiz', 'mis360'); ?></h2>

            <div class="mis-cards-grid">
                <?php
                $services_query = new WP_Query([
                    'post_type'      => 'mis360_listing',
                    'posts_per_page' => 6,
                ]);

                if ($services_query->have_posts()) :
                    while ($services_query->have_posts()) :
                        $services_query->the_post();
                        get_template_part('template-parts/multipurpose/listing-card');
                    endwhile;
                    wp_reset_postdata();
                else :
                    ?>
                    <!-- Varsayılan Vitrin Kartları -->
                    <div class="mis-card mis-service-default-card">
                        <div class="mis-card-body">
                            <span class="mis-listing-badge">7/24 Aktif</span>
                            <h3 class="mis-card-title"><?php esc_html_e('Otomobil & Hafif Ticari Çekici', 'mis360'); ?></h3>
                            <p class="mis-card-excerpt"><?php esc_html_e('Her marka ve model binek aracınız için hasarsız çekici ve oto kurtarma hizmeti.', 'mis360'); ?></p>
                            <a href="tel:<?php echo esc_attr($clean_phone); ?>" class="mis-btn-action"><?php esc_html_e('Çekici Çağır', 'mis360'); ?> →</a>
                        </div>
                    </div>

                    <div class="mis-card mis-service-default-card">
                        <div class="mis-card-body">
                            <span class="mis-listing-badge">Mobil Servis</span>
                            <h3 class="mis-card-title"><?php esc_html_e('Akü Takviye & Yerinde Destek', 'mis360'); ?></h3>
                            <p class="mis-card-excerpt"><?php esc_html_e('Akü bitmesi, yakıt tükenmesi ve küçük mekanik arızalara anında yerinde müdahale.', 'mis360'); ?></p>
                            <a href="tel:<?php echo esc_attr($clean_phone); ?>" class="mis-btn-action"><?php esc_html_e('Destek Al', 'mis360'); ?> →</a>
                        </div>
                    </div>

                    <div class="mis-card mis-service-default-card">
                        <div class="mis-card-body">
                            <span class="mis-listing-badge">Ağır Vasıta</span>
                            <h3 class="mis-card-title"><?php esc_html_e('Ahtapot & Vinçli Kurtarma', 'mis360'); ?></h3>
                            <p class="mis-card-excerpt"><?php esc_html_e('Şarampole devrilme, saplanma ve ağır ticari araçlar için donanımlı vinç filosu.', 'mis360'); ?></p>
                            <a href="tel:<?php echo esc_attr($clean_phone); ?>" class="mis-btn-action"><?php esc_html_e('Vinç Çağır', 'mis360'); ?> →</a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </section>

        <!-- Gutenberg İçerik Alanı -->
        <?php while (have_posts()) : the_post(); ?>
            <div class="mis-entry-content entry-content" style="margin-top: var(--mis-space-xl);">
                <?php the_content(); ?>
            </div>
        <?php endwhile; ?>

    </div>
</main>

<?php
get_footer();
