<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package VWS_Oklahoma_Lawyer
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('mx-auto'); ?>>
    <header class="entry-header mb-4">
        <?php the_title('<h1 class="entry-title display-5 mb-4 styled-heading">', '</h1>'); ?>
        <?php if(get_field('leading_text')): ?>
            <div class="lead mb-3"><?php the_field('leading_text') ?></div>
        <?php endif; ?>
        <?php vws_starter_post_thumbnail('shadow'); ?>
    </header><!-- .entry-header -->

    <?php get_template_part('template-parts/widgets/page-toc') ?>

    <section class="entry-content mx-auto mb-6">
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

    <footer class="entry-footer">
        <div class="text-muted small">
            <?php
            vws_record_page_view();
            vws_get_page_views();
            ?>
        </div>
    </footer>
</article>
