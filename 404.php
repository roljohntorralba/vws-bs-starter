<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package VWS_Bootstrap_Starter
 */

get_header();
?>

    <div class="container my-3 my-md-5">
        <div class="row">
            <main id="primary" class="site-main col-sm-8 mx-auto">

                <section class="error-404 not-found">

                    <header class="page-header">
                        <h1 class="page-title fs-3 fw-bold text-center lh-1 mb-4 text-danger">
                            <span class="display-1"><?php esc_html_e('Error 404', 'vws-bs-starter'); ?></span>
                            <br>
                            <?php esc_html_e('That page can&rsquo;t be found', 'vws-bs-starter'); ?>
                        </h1>
                    </header><!-- .page-header -->

                    <div class="page-content">
                        <p class="text-center mb-4 lead"><?php esc_html_e('It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'vws-bs-starter'); ?></p>

                        <div class="row">
                            <div class="col-md-9 mx-auto">
                                <?php get_search_form() ?>
                            </div>
                        </div>
                    </div><!-- .page-content -->
                </section><!-- .error-404 -->

            </main><!-- #main -->
        </div>
    </div>

<?php
get_footer();
