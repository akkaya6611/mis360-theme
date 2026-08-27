<?php
/**
 * MİS360 Multipurpose Listing / Menu / Service Card
 * Restoran Menü Öğesi, Yol Yardım Hizmeti ve İlanlar İçin Ortak Kart Bileşeni
 *
 * @package MİS360
 * @since 1.0.0
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

$price    = get_post_meta(get_the_ID(), '_mis360_price', true);
$badge    = get_post_meta(get_the_ID(), '_mis360_badge', true);
$location = get_post_meta(get_the_ID(), '_mis360_location', true);
$btn_text = get_post_meta(get_the_ID(), '_mis360_btn_text', true) ?: __('Detayları İncele', 'mis360');
$btn_url  = get_post_meta(get_the_ID(), '_mis360_btn_url', true) ?: get_permalink();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('mis-card mis-listing-card'); ?>>
    
    <div class="mis-listing-thumb-wrap">
        <?php mis360_post_thumbnail('mis360-card'); ?>

        <?php if (!empty($badge)) : ?>
            <span class="mis-listing-badge"><?php echo esc_html($badge); ?></span>
        <?php endif; ?>

        <?php if (!empty($price)) : ?>
            <div class="mis-listing-price-tag"><?php echo esc_html($price); ?></div>
        <?php endif; ?>
    </div>

    <div class="mis-card-body">
        
        <?php if (!empty($location)) : ?>
            <div class="mis-listing-location">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                    <circle cx="12" cy="10" r="3"></circle>
                </svg>
                <span><?php echo esc_html($location); ?></span>
            </div>
        <?php endif; ?>

        <h3 class="mis-card-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h3>

        <div class="mis-card-excerpt">
            <?php the_excerpt(); ?>
        </div>

        <div class="mis-card-footer">
            <a href="<?php echo esc_url($btn_url); ?>" class="mis-btn-action">
                <?php echo esc_html($btn_text); ?>
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    <polyline points="12 5 19 12 12 19"></polyline>
                </svg>
            </a>
        </div>

    </div>

</article>
