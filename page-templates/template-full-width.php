<?php
/**
 * Template Name: Full Width
 */

get_header();
?>

<?php get_template_part('template-parts/hero/hero') ?>

    <div class="container mt-3 mb-4 my-md-5">
        <div class="row">
            <main id="primary" class="site-main col-sm-8 mx-auto">
                <?php
                while (have_posts()) :
                    the_post();

                    get_template_part('template-parts/content-page', 'full');

                    // If comments are open or we have at least one comment, load up the comment template.
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;

                endwhile; // End of the loop.
                ?>
            </main>
        </div>
    </div>

<?php
get_footer();
