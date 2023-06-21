<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package VWS_Oklahoma_Lawyer
 */
?>

<aside id="secondary" class="widget-area col-sm-4 mt-4 ms-md-auto mt-md-0">
    <?php
    get_template_part('template-parts/widgets/custom-widget');
    get_template_part('template-parts/widgets/popular-articles');

    if(!get_field('disable_wp_widgets')) {
        dynamic_sidebar( 'sidebar-1' );
    }

    get_template_part('template-parts/widgets/sidebar-toc');
    ?>
</aside><!-- #secondary -->
