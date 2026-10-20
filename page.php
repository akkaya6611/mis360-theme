<?php
/**
 * MİS360 Static Page Template (Premium Sayfa Şablonu)
 * Blog yazıları gibi şık, kartlı, breadcrumb'lı profesyonel sayfa tasarımı.
 *
 * @package MİS360
 * @since 1.1.26
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$phone       = '0535 830 93 07';
$clean_phone = '+905358309307';
$whatsapp    = '905358309307';
?>

<main id="primary" class="single-post-page">
    <?php while (have_posts()) : the_post();

        // Görsel Belirleme
        $hero_img = '';
        if (has_post_thumbnail()) {
            $hero_img = get_the_post_thumbnail_url(get_the_ID(), 'full');
        }
    ?>

    <!-- 1. Üst Breadcrumbs & Başlık Alanı -->
    <header class="single-post-header">
        <div class="container">
            <div class="single-post-header-inner">
                
                <nav class="single-breadcrumbs" aria-label="Sayfa Yolu">
                    <a href="<?php echo esc_url(home_url('/')); ?>">Ana Sayfa</a>
                    <span class="sep">/</span>
                    <span class="current"><?php echo esc_html(wp_trim_words(get_the_title(), 8, '...')); ?></span>
                </nav>

                <h1 class="single-post-title">
                    <?php the_title(); ?>
                </h1>

                <div class="single-post-meta">
                    <span class="meta-item">📅 <?php echo esc_html(get_the_date('j F Y')); ?></span>
                    <span class="meta-dot">•</span>
                    <span class="meta-item">📄 Sayfa</span>
                </div>

            </div>
        </div>
    </header>

    <!-- 2. Ana Gövde: İçerik Kartı -->
    <div class="container single-post-container">
        <div class="single-layout-grid single-layout-grid--fullwidth">
            
            <!-- SOL SÜTUN: Sayfa İçeriği (Tam Genişlik) -->
            <div class="single-main-col">

                <!-- Öne Çıkan Görsel -->
                <?php if (!empty($hero_img)) : ?>
                    <div class="single-featured-image-wrap">
                        <img src="<?php echo esc_url($hero_img); ?>" alt="<?php the_title_attribute(); ?>" class="single-featured-img">
                    </div>
                <?php endif; ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class('single-article-card'); ?>>
                    
                    <!-- Yazı İçeriği -->
                    <div class="single-article-content entry-content">
                        <?php the_content(); ?>
                        <?php
                        wp_link_pages([
                            'before' => '<div class="page-links">' . esc_html__('Sayfalar:', 'mis360'),
                            'after'  => '</div>',
                        ]);
                        ?>
                    </div>

                </article>

                <!-- Alt Masa Rezervasyon Kutusu -->
                <div class="single-reservation-cta">
                    <span class="cta-subtitle">BEYZADE ET & BALIK RESTAURANT</span>
                    <h3 class="cta-title">Bu Eşsiz Lezzeti Yerinde Tatmak İster Misiniz?</h3>
                    <p class="cta-desc">Sarıkaya'daki restoranımızda aileniz ve sevdiklerinizle unutulmaz bir lezzet deneyimi için masanızı şimdiden ayırtın.</p>
                    <div class="cta-actions">
                        <a href="<?php echo esc_url(home_url('/#reservation')); ?>" class="btn btn-primary btn-md">
                            Masa Rezervasyonu Yap →
                        </a>
                        <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp btn-md">
                            💬 WhatsApp Rezervasyon
                        </a>
                        <a href="tel:<?php echo esc_attr($clean_phone); ?>" class="btn btn-outline-dark btn-md">
                            📞 <?php echo esc_html($phone); ?>
                        </a>
                    </div>
                </div>

                <!-- Yorumlar Bölümü -->
                <?php if (comments_open() || get_comments_number()) : ?>
                    <div class="single-comments-section">
                        <?php comments_template(); ?>
                    </div>
                <?php endif; ?>

            </div><!-- .single-main-col -->

        </div><!-- .single-layout-grid -->
    </div><!-- .single-post-container -->

    <?php endwhile; ?>
</main>

<?php
get_footer();
