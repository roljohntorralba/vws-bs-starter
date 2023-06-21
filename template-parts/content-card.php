<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package VWS_Oklahoma_Lawyer
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('col'); ?>>
    <div class="card h-100">
        <?php vws_starter_post_thumbnail('card-img-top'); ?>
        <div class="card-body">
            <header class="entry-header mb-2">
                <?php
                the_title( '<h2 class="entry-title card-title mb-2 fs-4 fw-bold"><a href="' . esc_url( get_permalink() ) . '" class="text-decoration-none" rel="bookmark">', '</a></h2>' );

                if ( 'post' === get_post_type() ) :
                    ?>
                    <div class="entry-meta small text-muted">
                        <?php
                        vws_starter_posted_on();
                        vws_starter_posted_by();
                        ?>
                    </div><!-- .entry-meta -->
                <?php endif; ?>
            </header><!-- .entry-header -->

            <section class="entry-content mx-auto mb-2">
                <?php
                the_excerpt();

                wp_link_pages(
                    array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'vws-bs-starter' ),
                        'after'  => '</div>',
                    )
                );
                ?>
            </section><!-- .entry-content -->

            <footer class="entry-footer small text-muted vstack">
                <?php vws_starter_entry_footer(); ?>
            </footer><!-- .entry-footer -->
        </div>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
