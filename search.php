<?php
/**
 * MİS360 Search Results Template
 *
 * @package MİS360
 * @since 1.0.0
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<main id="primary" class="mis-main-area">
    <div class="mis-container">
        
        <header class="mis-page-header" style="margin-bottom: var(--mis-space-lg); text-align: center;">
            <h1 class="mis-page-title" style="font-size: var(--mis-text-2xl); font-weight: 800;">
                <?php
                /* translators: %s: search query. */
                printf(
                    wp_kses_post(__('Arama Sonuçları: %s', 'mis360')),
                    '<span class="mis-gradient-text">' . esc_html(get_search_query()) . '</span>'
                );
                ?>
            </h1>
        </header>

        <div class="mis-content-layout">
            <div class="mis-posts-grid-container">
                <?php if (have_posts()) : ?>
                    
                    <div class="mis-cards-grid">
                        <?php
                        while (have_posts()) :
                            the_post();
                            ?>
                            <article id="post-<?php the_ID(); ?>" <?php post_class('mis-card'); ?>>
                                
                                <?php mis360_post_thumbnail('mis360-card'); ?>

                                <div class="mis-card-body">
                                    <div class="mis-card-meta">
                                        <?php mis360_posted_on(); ?>
                                        <span class="mis-meta-sep" aria-hidden="true">•</span>
                                        <?php mis360_reading_time(); ?>
                                    </div>

                                    <h2 class="mis-card-title">
                                        <a href="<?php the_permalink(); ?>" rel="bookmark">
                                            <?php the_title(); ?>
                                        </a>
                                    </h2>

                                    <div class="mis-card-excerpt">
                                        <?php the_excerpt(); ?>
                                    </div>

                                    <div class="mis-card-footer">
                                        <a href="<?php the_permalink(); ?>" class="mis-read-more-link">
                                            <?php esc_html_e('Devamını Oku', 'mis360'); ?>
                                            <svg class="mis-arrow-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                <polyline points="12 5 19 12 12 19"></polyline>
                                            </svg>
                                        </a>
                                    </div>
                                </div>

                            </article>
                        <?php endwhile; ?>
                    </div>

                    <div class="mis-pagination-wrapper">
                        <?php the_posts_pagination(['mid_size' => 2]); ?>
                    </div>

                <?php else : ?>

                    <div class="mis-no-results mis-card" style="padding: 3rem 2rem; text-align: center;">
                        <h2><?php esc_html_e('Eşleşen sonuç bulunamadı', 'mis360'); ?></h2>
                        <p style="color: var(--mis-text-secondary); margin-bottom: 1.5rem;"><?php esc_html_e('Lütfen farklı anahtar kelimeler kullanarak tekrar arama yapınız.', 'mis360'); ?></p>
                        <div style="max-width: 420px; margin: 0 auto;">
                            <?php get_search_form(); ?>
                        </div>
                    </div>

                <?php endif; ?>
            </div>

            <?php if (is_active_sidebar('sidebar-1')) : ?>
                <aside id="secondary" class="mis-sidebar-area" aria-label="<?php esc_attr_e('Kenar Çubuğu', 'mis360'); ?>">
                    <?php dynamic_sidebar('sidebar-1'); ?>
                </aside>
            <?php endif; ?>
        </div>

    </div>
</main>

<?php
get_footer();
