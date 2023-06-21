<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package VWS_Bootstrap_Starter
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class('overflow-x-hidden'); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'vws-bs-starter' ); ?></a>

	<header id="masthead" class="site-header sticky-top">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm py-2">
            <div class="container d-flex align-items-center justify-content-between">
                <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                    <?php bloginfo('name') ?>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div id="main-menu" class="collapse navbar-collapse">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'main-menu',
                        'container' => false,
                        'menu_class' => '',
                        'fallback_cb' => '__return_false',
                        'items_wrap' => '<ul id="%1$s" class="navbar-nav mx-auto mt-0 mb-2 mb-md-0 %2$s">%3$s</ul>',
                        'depth' => 2,
                        'walker' => new \Valiant_Web\Bootstrap5NavWalker()
                    ));
                    ?>
                </div>
            </div>
        </nav>
	</header><!-- #masthead -->

    <?php
    if(!is_front_page()) {
        get_template_part('template-parts/sections/breadcrumbs');
    }
