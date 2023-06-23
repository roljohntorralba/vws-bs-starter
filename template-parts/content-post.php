<?php
/**
 * Template part for displaying page content in single.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package VWS_Bootstrap_Starter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('sp-main mx-auto'); ?>>
    <header class="entry-header mb-4">
        <?php the_title('<h1 class="entry-title display-5 mb-3 styled-heading">', '</h1>'); ?>
        <div class="entry-meta small text-muted mb-4">
            <?php
            vws_bs_starter_posted_on();
            vws_bs_starter_posted_by();
            ?>
        </div><!-- .entry-meta -->
        <?php vws_bs_starter_post_thumbnail('shadow'); ?>
    </header><!-- .entry-header -->

    <?php get_template_part('template-parts/widgets/page-toc') ?>

    <section class="entry-content mx-auto mb-6 ">
        <?php the_content(); ?>
        <?php
        wp_link_pages(
            array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'vws-bs-starter'),
                'after' => '</div>',
            )
        );
        ?>
    </section>

    <footer class="entry-footer">
        <div class="small text-muted hstack justify-content-between mb-4">
            <?php
            vws_bs_starter_record_page_view();
            vws_bs_starter_entry_footer();
            ?>
        </div>
    </footer>

</article>
