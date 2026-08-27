<?php
/**
 * Template Name: MİS360 İlan & Portföy Listeleme
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

<main id="primary" class="mis-main-area mis-listings-landing">
    <div class="mis-container">

        <header class="mis-page-header" style="text-align: center; margin-bottom: var(--mis-space-lg);">
            <h1 class="mis-page-title" style="font-size: var(--mis-text-3xl); font-weight: 800;">
                <?php the_title(); ?>
            </h1>
            <p style="color: var(--mis-text-secondary); max-width: 600px; margin: 0.5rem auto 0;">
                <?php esc_html_e('Güncel fırsatlar, ilanlar ve portföy seçenekleri.', 'mis360'); ?>
            </p>
        </header>

        <div class="mis-content-layout">
            <div class="mis-posts-grid-container">
                <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $listings_query = new WP_Query([
                    'post_type'      => 'mis360_listing',
                    'posts_per_page' => 9,
                    'paged'          => $paged,
                ]);

                if ($listings_query->have_posts()) :
                    ?>
                    <div class="mis-cards-grid">
                        <?php
                        while ($listings_query->have_posts()) :
                            $listings_query->the_post();
                            get_template_part('template-parts/multipurpose/listing-card');
                        endwhile;
                        ?>
                    </div>

                    <div class="mis-pagination-wrapper">
                        <?php
                        echo paginate_links([
                            'total'     => $listings_query->max_num_pages,
                            'current'   => $paged,
                            'mid_size'  => 2,
                            'prev_text' => '←',
                            'next_text' => '→',
                        ]);
                        ?>
                    </div>
                    <?php
                    wp_reset_postdata();
                else :
                    ?>
                    <div class="mis-no-results mis-card">
                        <h2><?php esc_html_e('Kayıtlı ilan bulunamadı', 'mis360'); ?></h2>
                        <p><?php esc_html_e('Yakında yeni ilanlar burada listelenecektir.', 'mis360'); ?></p>
                    </div>
                <?php endif; ?>
            </div>

            <?php if (is_active_sidebar('sidebar-1')) : ?>
                <aside id="secondary" class="mis-sidebar-area" aria-label="<?php esc_attr_e('Kenar Çubuğu', 'mis360'); ?>">
                    <?php dynamic_sidebar('sidebar-1'); ?>
                </aside>
            <?php endif; ?>
        </div>

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
