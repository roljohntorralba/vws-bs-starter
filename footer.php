<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package VWS_Bootstrap_Starter
 */

?>
<?php get_template_part('template-parts/sections/cta-contact') ?>

<footer class="site-footer">
    <?php if (is_active_sidebar('footer-widgets')) : ?>
    <section class="footer-widgets py-5 text-bg-secondary bg-opacity-90 bg-blur">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
                <?php dynamic_sidebar('footer-widgets'); ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <section id="colophon" class="py-4 text-black-50 small">
        <div class="container hstack gap-3 gap-md-1 flex-column flex-md-row justify-content-between">
            <div class="copyright">
                &copy; <?php echo date('Y') ?> All rights reserved. <a href="<?php echo esc_url(home_url('/')); ?>"
                                                  rel="home"><?php bloginfo('name'); ?></a>
            </div>
            <div class="footer-menu">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer-menu',
                    'menu_class' => 'hstack list-inline m-0 p-0 gap-3',
                    'container' => '',
                    'fallback_cb' => false,
                    'depth' => 1,
                ));
                ?>
            </div>
        </div>
    </section><!-- .site-info -->

</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
