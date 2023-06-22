<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package VWS_Bootstrap_Starter
 */
?>

<aside id="secondary" class="widget-area col-sm-4 mt-4 ms-md-auto mt-md-0">
    <?php
    get_template_part('template-parts/widgets/popular-articles');
    get_template_part('template-parts/widgets/related-articles');
    dynamic_sidebar( 'sidebar-1' );
    get_template_part('template-parts/widgets/sidebar-toc');
    ?>
</aside><!-- #secondary -->
