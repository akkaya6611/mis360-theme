<?php
/**
 * MİS360 Single Post Template
 *
 * @package MİS360
 * @since 1.0.0
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

get_header();

// Elementor Pro Theme Builder Tekil Şablon Kontrolü
if (function_exists('elementor_theme_do_location') && elementor_theme_do_location('single')) {
    get_footer();
    return;
}
?>

<main id="primary" class="mis-main-area">
    <div class="mis-container mis-container-narrow">
        <?php
        while (have_posts()) :
            the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('mis-single-article'); ?>>
                
                <header class="mis-single-header">
                    <div class="mis-entry-meta">
                        <?php mis360_posted_on(); ?>
                        <span class="mis-meta-sep" aria-hidden="true">•</span>
                        <?php mis360_posted_by(); ?>
                        <span class="mis-meta-sep" aria-hidden="true">•</span>
                        <?php mis360_reading_time(); ?>
                    </div>

                    <h1 class="mis-single-title"><?php the_title(); ?></h1>
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

                <footer class="mis-single-footer">
                    <?php
                    $categories_list = get_the_category_list(', ');
                    if ($categories_list) {
                        printf(
                            '<div class="mis-cat-links"><span class="mis-label">%s</span> %s</div>',
                            esc_html__('Kategoriler:', 'mis360'),
                            $categories_list // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                        );
                    }

                    $tags_list = get_the_tag_list('', ' ');
                    if ($tags_list) {
                        printf(
                            '<div class="mis-tag-links"><span class="mis-label">%s</span> %s</div>',
                            esc_html__('Etiketler:', 'mis360'),
                            $tags_list // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                        );
                    }
                    ?>
                </footer>

                <!-- Yazar Kartı (Author Bio) -->
                <div class="mis-author-box mis-card">
                    <div class="mis-author-avatar">
                        <?php echo get_avatar(get_the_author_meta('ID'), 80, '', esc_attr(get_the_author()), ['class' => 'mis-avatar-img']); ?>
                    </div>
                    <div class="mis-author-info">
                        <h4 class="mis-author-name"><?php the_author(); ?></h4>
                        <p class="mis-author-bio"><?php echo esc_html(get_the_author_meta('description') ?: __('Bu yazar hakkında henüz bir biyografi eklenmemiş.', 'mis360')); ?></p>
                    </div>
                </div>

                <!-- Önceki / Sonraki Yazı Bağlantıları -->
                <div class="mis-post-nav">
                    <?php
                    the_post_navigation([
                        'prev_text' => '<span class="mis-nav-subtitle">' . esc_html__('← Önceki Yazı', 'mis360') . '</span> <span class="mis-nav-title">%title</span>',
                        'next_text' => '<span class="mis-nav-subtitle">' . esc_html__('Sonraki Yazı →', 'mis360') . '</span> <span class="mis-nav-title">%title</span>',
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
