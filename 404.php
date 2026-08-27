<?php
/**
 * MİS360 404 Error Page Template
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
        <div class="mis-error-404-box mis-card" style="text-align: center; padding: 4rem 2rem;">
            <span class="mis-gradient-text" style="font-size: 6rem; font-weight: 900; line-height: 1; display: block; margin-bottom: 1rem;">404</span>
            <h1 class="mis-page-title" style="margin-bottom: 1rem;"><?php esc_html_e('Sayfa Bulunamadı', 'mis360'); ?></h1>
            <p style="color: var(--mis-text-secondary); max-width: 480px; margin: 0 auto 2rem;"><?php esc_html_e('Aradığınız sayfa taşınmış, silinmiş veya hiç var olmamış olabilir. Arama yaparak içeriğe ulaşmayı deneyebilirsiniz.', 'mis360'); ?></p>
            <div style="max-width: 420px; margin: 0 auto;">
                <?php get_search_form(); ?>
            </div>
            <div style="margin-top: 2rem;">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="mis-icon-btn" style="width: auto; padding: 0.75rem 1.5rem; font-weight: 600; text-decoration: none;">
                    <?php esc_html_e('← Ana Sayfaya Dön', 'mis360'); ?>
                </a>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
