<?php
/**
 * Template Name: MİS360 Restoran Menü & Sipariş
 *
 * @package MİS360
 * @since 1.0.0
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$phone    = get_theme_mod('mis360_phone', '+90 555 123 4567');
$whatsapp = get_theme_mod('mis360_whatsapp', '905551234567');
$badge    = get_theme_mod('mis360_header_badge', 'Şefin Özel Menüsü');
?>

<main id="primary" class="mis-main-area mis-menu-landing">
    <div class="mis-container">

        <!-- Restoran Başlık Vitrini -->
        <section class="mis-restaurant-hero" style="text-align: center; margin-bottom: var(--mis-space-xl);">
            <span class="mis-listing-badge" style="position: static; display: inline-block; margin-bottom: 1rem; font-size: var(--mis-text-sm);">
                <?php echo esc_html($badge); ?>
            </span>
            <h1 class="mis-page-title" style="font-size: var(--mis-text-hero); font-weight: 900; margin-bottom: 1rem;">
                <?php the_title(); ?>
            </h1>
            <p style="font-size: var(--mis-text-lg); color: var(--mis-text-secondary); max-width: 640px; margin: 0 auto 2rem;">
                <?php esc_html_e('En taze ve seçkin malzemelerle ustalarımız tarafından hazırlanan benzersiz lezzetlerimizi keşfedin.', 'mis360'); ?>
            </p>

            <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Merhaba, menünüzden sipariş vermek istiyorum:'); ?>" target="_blank" rel="noopener noreferrer" class="mis-icon-btn" style="width: auto; padding: 0.75rem 1.75rem; background-color: #25d366; color: #ffffff; border: none; font-weight: 700; border-radius: var(--mis-radius-full);">
                    <?php esc_html_e('💬 WhatsApp ile Kolay Sipariş', 'mis360'); ?>
                </a>
                <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone)); ?>" class="mis-icon-btn" style="width: auto; padding: 0.75rem 1.75rem; font-weight: 700; border-radius: var(--mis-radius-full);">
                    <?php esc_html_e('📞 Masa Rezervasyonu', 'mis360'); ?>
                </a>
            </div>
        </section>

        <!-- Kategori Filtreleri -->
        <?php
        $categories = get_terms([
            'taxonomy'   => 'mis360_listing_cat',
            'hide_empty' => true,
        ]);

        if (!empty($categories) && !is_wp_error($categories)) :
            ?>
            <div class="mis-menu-filters" style="display: flex; gap: 0.5rem; justify-content: center; flex-wrap: wrap; margin-bottom: var(--mis-space-lg);">
                <span class="mis-filter-pill active" style="padding: 0.5rem 1.25rem; border-radius: var(--mis-radius-full); background: var(--mis-primary); color: #fff; font-weight: 600; font-size: var(--mis-text-sm); cursor: pointer;">
                    <?php esc_html_e('Tüm Menü', 'mis360'); ?>
                </span>
                <?php foreach ($categories as $cat) : ?>
                    <a href="<?php echo esc_url(get_term_link($cat)); ?>" class="mis-filter-pill" style="padding: 0.5rem 1.25rem; border-radius: var(--mis-radius-full); background: var(--mis-bg-surface); border: 1px solid var(--mis-border-color); color: var(--mis-text-secondary); font-weight: 600; font-size: var(--mis-text-sm); text-decoration: none;">
                        <?php echo esc_html($cat->name); ?>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <!-- Menü Kartları Izgarası -->
        <div class="mis-cards-grid">
            <?php
            $menu_query = new WP_Query([
                'post_type'      => 'mis360_listing',
                'posts_per_page' => 12,
            ]);

            if ($menu_query->have_posts()) :
                while ($menu_query->have_posts()) :
                    $menu_query->the_post();
                    get_template_part('template-parts/multipurpose/listing-card');
                endwhile;
                wp_reset_postdata();
            else :
                ?>
                <div class="mis-card" style="grid-column: 1 / -1; padding: 3rem; text-align: center;">
                    <h3><?php esc_html_e('Henüz menü öğesi eklenmemiş.', 'mis360'); ?></h3>
                    <p style="color: var(--mis-text-secondary);"><?php esc_html_e('WordPress Paneli > İlan & Hizmetler menüsünden yeni lezzetler ekleyebilirsiniz.', 'mis360'); ?></p>
                </div>
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
