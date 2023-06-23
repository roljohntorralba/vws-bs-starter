<?php
/**
 * Template part for displaying page content in template-full-width.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package VWS_Bootstrap_Starter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('mx-auto'); ?>>
    <?php get_template_part('template-parts/widgets/page-toc') ?>

    <section class="entry-content mx-auto">
        <?php
        the_content();

        wp_link_pages(
            array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'vws-bs-starter'),
                'after' => '</div>',
            )
        );
        ?>
    </section>

    <footer class="entry-footer mt-4">
        <div class="text-muted small">
            <?php
            vws_bs_starter_record_page_view();
            vws_bs_starter_get_page_views();
            ?>
        </div>
    </footer>
</article>
