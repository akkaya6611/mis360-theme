<?php
/**
 * MİS360 Single Post Template (Beyzade Et & Balık Restoran Blog Makale Sayfası)
 * Sol tarafta yazı, sağ tarafta bileşenler (2 Sütunlu Profesyonel Blog Mimarisi)
 *
 * @package MİS360
 * @since 1.0.0
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
        $post_cats = get_the_category();
        $first_cat = !empty($post_cats) ? $post_cats[0] : null;
        $cat_name  = $first_cat ? $first_cat->name : 'Lezzet Blogu';
        $cat_slug  = $first_cat ? $first_cat->slug : 'blog';

        // Görsel Belirleme
        $hero_img = '';
        if (has_post_thumbnail()) {
            $hero_img = get_the_post_thumbnail_url(get_the_ID(), 'full');
        } else {
            $meta_thumb = get_post_meta(get_the_ID(), '_mis360_external_thumb', true);
            if ($meta_thumb) {
                $hero_img = $meta_thumb;
            } else {
                $hero_img = get_template_directory_uri() . '/assets/img/demo/restaurant.jpg';
            }
        }

        // Okuma Süresi Hesaplama
        $post_content = (string) get_post_field('post_content', get_the_ID());
        $word_count   = str_word_count(strip_tags($post_content));
        $reading_time = max(1, (int) ceil($word_count / 200));
    ?>

    <!-- 1. Üst Breadcrumbs & Başlık Alanı -->
    <header class="single-post-header">
        <div class="container">
            <div class="single-post-header-inner">
                
                <nav class="single-breadcrumbs" aria-label="Sayfa Yolu">
                    <a href="<?php echo esc_url(home_url('/')); ?>">Ana Sayfa</a>
                    <span class="sep">/</span>
                    <a href="<?php echo esc_url(home_url('/haberler-galeri/')); ?>">Haberler & Galeri</a>
                    <span class="sep">/</span>
                    <span class="current"><?php echo esc_html(wp_trim_words(get_the_title(), 5, '...')); ?></span>
                </nav>

                <div class="single-cat-badge">
                    <span><?php echo esc_html($cat_name); ?></span>
                </div>

                <h1 class="single-post-title">
                    <?php the_title(); ?>
                </h1>

                <div class="single-post-meta">
                    <span class="meta-item">📅 <?php echo esc_html(get_the_date('j F Y')); ?></span>
                    <span class="meta-dot">•</span>
                    <span class="meta-item">👤 <?php echo esc_html(get_the_author() ?: 'Beyzade Şef Ekibi'); ?></span>
                    <span class="meta-dot">•</span>
                    <span class="meta-item">⏱️ <?php echo esc_html($reading_time . ' dk okuma'); ?></span>
                </div>

            </div>
        </div>
    </header>

    <!-- 2. Ana Gövde: Sol Taraf Yazı / Sağ Taraf Bileşenler (Grid) -->
    <div class="container single-post-container">
        <div class="single-layout-grid">
            
            <!-- SOL SÜTUN: Makale İçeriği (Ana Alan) -->
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

                    <!-- Etiketler & WhatsApp Paylaş -->
                    <footer class="single-article-footer">
                        <div class="single-tags">
                            <?php
                            $tags = get_the_tags();
                            if ($tags) {
                                foreach ($tags as $tag) {
                                    echo '<a href="' . esc_url(get_tag_link($tag->term_id)) . '" class="tag-pill">#' . esc_html($tag->name) . '</a> ';
                                }
                            } else {
                                echo '<span class="tag-pill">#BeyzadeEtBalık</span> ';
                                echo '<span class="tag-pill">#SarıkayaLezzetleri</span> ';
                                echo '<span class="tag-pill">#YozgatRestoran</span>';
                            }
                            ?>
                        </div>

                        <div class="single-share">
                            <a href="https://wa.me/?text=<?php echo rawurlencode(get_the_title() . ' ' . get_permalink()); ?>" target="_blank" rel="noopener noreferrer" class="btn-share-whatsapp">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" style="display:inline-block; vertical-align:middle; margin-right:4px;">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                                </svg>
                                WhatsApp'ta Paylaş
                            </a>
                        </div>
                    </footer>

                    <!-- Yazar Bilgi Kutusu -->
                    <div class="single-author-card">
                        <div class="author-avatar-wrap">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/demo/beyzadelogo1-66.png" alt="Beyzade Restaurant" class="author-logo-img">
                        </div>
                        <div class="author-details">
                            <span class="author-role">Restoran Yazarı & Şef Ekibi</span>
                            <h4 class="author-name"><?php echo esc_html(get_the_author() ?: 'Beyzade Şef Ekibi'); ?></h4>
                            <p class="author-bio">
                                2019 yılından bu yana Yozgat Sarıkaya'da meşe kömüründe kebap, taş fırın pideleri ve günlük taze balık sofralarımızla misafirlerimize unutulmaz lezzet anları sunuyoruz.
                            </p>
                        </div>
                    </div>

                    <!-- Önceki / Sonraki Yazı Gezintisi -->
                    <div class="single-post-navigation">
                        <div class="nav-prev">
                            <?php
                            $prev_post = get_previous_post();
                            if ($prev_post) : ?>
                                <a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>" class="nav-link-card">
                                    <span class="nav-direction">← Önceki Yazı</span>
                                    <strong class="nav-title"><?php echo esc_html(wp_trim_words($prev_post->post_title, 6, '...')); ?></strong>
                                </a>
                            <?php endif; ?>
                        </div>

                        <div class="nav-center">
                            <a href="<?php echo esc_url(home_url('/haberler-galeri/')); ?>" class="nav-back-btn">
                                📋 Tüm Yazılar
                            </a>
                        </div>

                        <div class="nav-next">
                            <?php
                            $next_post = get_next_post();
                            if ($next_post) : ?>
                                <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>" class="nav-link-card text-right">
                                    <span class="nav-direction">Sonraki Yazı →</span>
                                    <strong class="nav-title"><?php echo esc_html(wp_trim_words($next_post->post_title, 6, '...')); ?></strong>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>

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

                </article>

            </div><!-- .single-main-col -->

            <!-- SAĞ SÜTUN: Bileşenler (Sidebar & Widgets) -->
            <div class="single-sidebar-col">
                <?php get_sidebar(); ?>
            </div>

        </div><!-- .single-layout-grid -->
    </div><!-- .single-post-container -->

    <?php endwhile; ?>
</main>

<?php
get_footer();
