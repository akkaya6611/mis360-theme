<?php
/**
 * MİS360 Static Page Template
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
    <div class="mis-container mis-container-narrow">
        <?php
        while (have_posts()) :
            the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('mis-single-article'); ?>>
                
                <header class="mis-entry-header">
                    <h1 class="mis-entry-title"><?php the_title(); ?></h1>
                </header>

                <?php mis360_post_thumbnail('mis360-hero'); ?>

                <div class="mis-entry-content entry-content">
                    <?php
                    the_content();

                    wp_link_pages([
                        'before' => '<div class="page-links">' . esc_html__('Sayfalar:', 'mis360'),
                        'after'  => '</div>',
                    ]);
                    ?>
                </div>

                <?php if (comments_open() || get_comments_number()) : ?>
                    <div class="mis-comments-wrapper">
                        <?php comments_template(); ?>
                    </div>
                <?php endif; ?>

            </article>
        <?php endwhile; ?>
    </div>
</main>

<?php
get_footer();
