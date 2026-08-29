<?php
/**
 * MİS360 Custom Template Tags
 *
 * @package MİS360
 * @since 1.0.0
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

if (!function_exists('mis360_posted_on')) {
    /**
     * Semantik HTML5 ve mikroformat uyumlu yayınlanma tarihi.
     */
    function mis360_posted_on(): void {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if (get_the_time('U') !== get_the_modified_time('U')) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated screen-reader-text" datetime="%3$s">%4$s</time>';
        }

        $time_string = sprintf(
            $time_string,
            esc_attr(get_the_date(DATE_W3C)),
            esc_html(get_the_date()),
            esc_attr(get_the_modified_date(DATE_W3C)),
            esc_html(get_the_modified_date())
        );

        echo '<span class="mis-meta-item mis-posted-on">' . $time_string . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    }
}

if (!function_exists('mis360_posted_by')) {
    /**
     * Yazar bilgisi ve profil bağlantısı.
     */
    function mis360_posted_by(): void {
        $byline = sprintf(
            /* translators: %s: post author. */
            esc_html_x('%s', 'post author', 'mis360'),
            '<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
        );

        echo '<span class="mis-meta-item mis-byline">' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    }
}

if (!function_exists('mis360_reading_time')) {
    /**
     * Tahmini okuma süresi hesaplayıcı (Core Web Vitals & UX dostu).
     */
    function mis360_reading_time(): void {
        $content = get_post_field('post_content', get_the_ID());
        $word_count = str_word_count(strip_tags((string) $content));
        $reading_time = max(1, (int) ceil($word_count / 200));

        printf(
            '<span class="mis-meta-item mis-reading-time"><svg class="mis-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg> %s %s</span>',
            esc_html((string) $reading_time),
            esc_html__('dk okuma', 'mis360')
        );
    }
}

if (!function_exists('mis360_post_thumbnail')) {
    /**
     * Erişilebilir ve responsive öne çıkan görsel.
     */
    
    function mis360_post_thumbnail(string $size = 'mis360-card'): void {
        if (post_password_required() || is_attachment()) {
            return;
        }

        $fallback_img = get_template_directory_uri() . '/assets/img/demo/restaurant.webp';

        if (is_singular()) :
            if (!has_post_thumbnail()) {
                ?>
                <figure class="mis-post-thumbnail mis-post-thumbnail-single">
                    <img src="<?php echo esc_url($fallback_img); ?>" class="mis-featured-img" alt="<?php the_title_attribute(); ?>" loading="eager" width="1200" height="600">
                </figure>
                <?php
                return;
            }

            ?>
            <figure class="mis-post-thumbnail mis-post-thumbnail-single">
                <?php the_post_thumbnail('mis360-hero', [
                    'loading' => 'eager', // Hero görseli için LCP optimizasyonu
                    'class'   => 'mis-featured-img',
                    'alt'     => the_title_attribute(['echo' => false]),
                ]); ?>
            </figure>
            <?php
        else :
            ?>
            <figure class="mis-post-thumbnail">
                <a class="mis-post-thumbnail-link" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
                    <?php the_post_thumbnail($size, [
                        'loading' => 'lazy',
                        'class'   => 'mis-card-img',
                        'alt'     => the_title_attribute(['echo' => false]),
                    ]); ?>
                </a>
            </figure>
            <?php
        endif;
    }
}
