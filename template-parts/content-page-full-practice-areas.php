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
</article>
