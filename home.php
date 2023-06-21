<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package VWS_Bootstrap_Starter
 */

get_header();

// TODO Improve Blog Template: Horizontal images?
?>
    <div class="container my-3 my-md-5">
        <div class="row">
            <main id="primary" class="site-main col-sm-12 mx-auto">

                <?php
                if (have_posts()) : ?>

                    <div class="row g-3 row-cols-1 row-cols-sm-3 align-items-stretch">
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
        </div>
    </div>

<?php
get_footer();
