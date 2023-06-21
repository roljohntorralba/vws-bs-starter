<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package VWS_Bootstrap_Starter
 */

get_header();
?>

    <div class="container my-3 my-md-5">
        <div class="row">
            <main id="primary" class="site-main col-sm-8">

                <?php if (have_posts()) : ?>

                    <header class="page-header mb-4">
                        <?php
                        the_archive_title('<h1 class="page-title fw-bold">', '</h1>');
                        the_archive_description('<div class="archive-description">', '</div>');
                        ?>
                    </header><!-- .page-header -->

                    <div class="row g-3 row-cols-1 row-cols-sm-2 align-items-stretch">
                        <?php
                        /* Start the Loop */
                        while (have_posts()) :
                            the_post();

                            /*
                             * Include the Post-Type-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                             */
                            get_template_part('template-parts/content-card');

                        endwhile; ?>
                    </div>
                    <?php

                    the_posts_navigation();

                else :

                    get_template_part('template-parts/content', 'none');

                endif;
                ?>

            </main><!-- #main -->
            <?php get_sidebar(); ?>
        </div>
    </div>

<?php
get_footer();
