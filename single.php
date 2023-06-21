<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package VWS_Oklahoma_Lawyer
 */

get_header();
?>

    <div class="container my-3 my-md-5">
        <div class="row">
            <main id="primary" class="site-main col-sm-8 mx-auto">
                <?php
                while (have_posts()) :
                    the_post();

                    get_template_part( 'template-parts/content', get_post_type() );

                    get_template_part('tempalte-parts/navigation/navigation', 'post');

                    // If comments are open or we have at least one comment, load up the comment template.
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;

                endwhile; // End of the loop.
                ?>
            </main>

            <?php get_sidebar() ?>
        </div>
    </div>

<?php
get_footer();
