<?php
/**
 * MİS360 Footer Template
 *
 * @package MİS360
 * @since 1.0.0
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}
?>
    </div><!-- #content -->

    <?php
    // Elementor Pro Theme Builder Footer kontrolü
    if (!function_exists('elementor_theme_do_location') || !elementor_theme_do_location('footer')) :
    ?>
    <footer id="colophon" class="mis-site-footer">
        <div class="mis-container">
            
            <?php if (is_active_sidebar('footer-widgets')) : ?>
                <div class="mis-footer-widgets-grid">
                    <?php dynamic_sidebar('footer-widgets'); ?>
                </div>
            <?php endif; ?>

            <div class="mis-footer-bottom">
                <div class="mis-footer-copyright">
                    <p>
                        &copy; <?php echo esc_html(date_i18n('Y')); ?> 
                        <a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>. 
                        <?php esc_html_e('Tüm hakları saklıdır.', 'mis360'); ?>
                    </p>
                </div>

                <?php if (has_nav_menu('footer')) : ?>
                    <nav class="mis-footer-navigation" aria-label="<?php esc_attr_e('Alt Bilgi Menüsü', 'mis360'); ?>">
                        <?php
                        wp_nav_menu([
                            'theme_location' => 'footer',
                            'container'      => false,
                            'menu_class'     => 'mis-footer-menu',
                            'depth'          => 1,
                        ]);
                        ?>
                    </nav>
                <?php endif; ?>
            </div>

        </div>
    </footer><!-- #colophon -->
    <?php endif; // Elementor Footer End ?>
</div><!-- #page -->

<?php get_template_part('template-parts/multipurpose/sticky-call-bar'); ?>

<?php wp_footer(); ?>
</body>
</html>
