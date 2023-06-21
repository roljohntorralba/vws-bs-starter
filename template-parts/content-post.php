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
        <?php if(get_field('leading_text')): ?>
            <div class="lead mb-3"><?php the_field('leading_text') ?></div>
        <?php endif; ?>
        <div class="entry-meta small text-muted mb-4">
            <?php
            vws_starter_posted_on();
            vws_starter_posted_by();
            ?>
        </div><!-- .entry-meta -->
        <?php vws_starter_post_thumbnail('shadow'); ?>
    </header><!-- .entry-header -->

    <?php get_template_part('template-parts/widgets/page-toc') ?>

    <section class="entry-content mx-auto mb-6 ">
        <?php the_content(); ?>
        <div class="text-center my-4"><a href="<?php echo esc_url(get_home_url(null, 'contact-us/')) ?>" class="btn btn-warning btn-lg">Get FREE Consultation</a></div>
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
            vws_record_page_view();
            vws_starter_entry_footer();
            ?>
        </div>
    </footer>

</article>