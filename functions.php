<?php
/**
 * VWS Oklahoma Lawyer functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package VWS_Oklahoma_Lawyer
 */

if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
add_action('after_setup_theme', 'vws_starter_setup');
function vws_starter_setup()
{
    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
        * Let WordPress manage the document title.
        * By adding theme support, we declare that this theme does not use a
        * hard-coded <title> tag in the document head, and expect WordPress to
        * provide it for us.
        */
    add_theme_support('title-tag');

    /*
        * Enable support for Post Thumbnails on posts and pages.
        *
        * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
        */
    add_theme_support('post-thumbnails');

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(
        array(
            'main-menu' => esc_html__('Main Menu', 'vws-bs-starter'),
            'footer-menu' => esc_html__('Footer Menu', 'vws-bs-starter'),
        )
    );

    /*
        * Switch default core markup for search form, comment form, and comments
        * to output valid HTML5.
        */
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    // Disable Gutenberg Widgets Editor
    remove_theme_support( 'widgets-block-editor' );

}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
add_action('after_setup_theme', 'vws_starter_content_width', 0);
function vws_starter_content_width()
{
    $GLOBALS['content_width'] = apply_filters('vws_starter_content_width', 640);
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
add_action('widgets_init', 'vws_starter_widgets_init');
function vws_starter_widgets_init()
{
    register_sidebar(
        array(
            'name' => esc_html__('Sidebar', 'vws-bs-starter'),
            'id' => 'sidebar-1',
            'description' => esc_html__('Add widgets here.', 'vws-bs-starter'),
            'before_widget' => '<section id="%1$s" class="widget %2$s mb-4">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title fs-5 fw-bold mb-3">',
            'after_title' => '</h2>',
        )
    );

    register_sidebar(array(
        'name' => 'Footer Widgets',
        'id' => 'footer-widgets',
        'before_widget' => '<section id="%1$s" class="col widget-footer %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="styled-heading fs-5 mb-3">',
        'after_title' => '</h2>',
    ));
}

/**
 * Manually add scripts and styles on wp_head
 */
add_action('wp_head', 'vws_starter_manual_scripts');
function vws_starter_manual_scripts() {
    ob_start(); ?>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-MMBF99F');</script>
    <!-- End Google Tag Manager -->

    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/dist/css/bootstrap.min.css" />

    <?php if(is_front_page() || is_page_template('page-templates/template-landing-sections.php')) : ?>
        <link href="<?php echo get_stylesheet_directory_uri() ?>/dist/css/front-page.min.css" rel="stylesheet" />
        <link href="<?php echo get_stylesheet_directory_uri() ?>/dist/css/front-page-responsive.min.css" rel="stylesheet" media="orientation:portrait" />
    <?php else: ?>
        <link href="<?php echo get_stylesheet_directory_uri() ?>/dist/css/singular.min.css" rel="stylesheet" />

        <?php if(is_page('contact-us')) : ?>
            <link href="<?php echo get_stylesheet_directory_uri() ?>/dist/css/template-contact.min.css" rel="stylesheet" />
        <?php endif; ?>
    <?php endif; ?>

    <script defer src="<?php echo get_stylesheet_directory_uri() ?>/dist/js/base.min.js"></script>
    <?php if(is_front_page() || is_page_template('page-templates/template-landing-sections.php')) : ?>
        <script defer src="<?php echo get_stylesheet_directory_uri() ?>/dist/js/front-page.min.js"></script>
    <?php else : ?>
        <?php if (is_singular() && comments_open() && get_option('thread_comments')): ?>
            <script defer src="<?php echo includes_url() ?>js/comment-reply.min.js?ver=6.1.1"></script>
        <?php endif; ?>
        <script defer src="<?php echo get_stylesheet_directory_uri() ?>/dist/js/single.min.js"></script>
    <?php endif; ?>

    <?php
    echo ob_get_clean();
}

/**
 * WP Body Open Hook
 */
add_action('wp_body_open', 'vws_starter_wp_body_open');
function vws_starter_wp_body_open() {
    ob_start(); ?>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MMBF99F" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <?php if(is_front_page() || is_page_template('page-templates/template-landing-sections.php')) : ?>
        <picture class="d-none d-sm-block">
            <source srcset="<?php echo esc_url(get_stylesheet_directory_uri() . '/dist/img/hero-bg-optimized.webp') ?>" type="image/webp">
            <source srcset="<?php echo esc_url(get_stylesheet_directory_uri() . '/dist/img/hero-bg-optimized.jpg') ?>" type="image/jpeg">
            <img class="home-bg" loading="lazy" src="<?php echo esc_url(get_stylesheet_directory_uri() . '/dist/img/hero-bg-optimized.jpg') ?>" alt="Oklahoma City skyline" width="1920" height="1024">
        </picture>
    <?php endif; ?>
    <?php
    echo ob_get_clean();
}

/**
 * Hook to WP Footer.
 */
add_action('wp_footer', 'vws_starter_wp_footer');
function vws_starter_wp_footer() {
    $legal_service = '<script type="application/ld+json" id="legal-service-schema">
        {
            "@context": "https://schema.org",
            "@type": "LegalService",
            "name": "Hasbrook & Hasbrook",
            "image": "https://oklahomalawyer.com/wp-content/uploads/2021/03/okl-logo-white@2x.png",
            "@id": "https://oklahomalawyer.com/#legal",
            "url": "https://oklahomalawyer.com/",
            "telephone": "' . get_field('office_phone_number', 'option') . '",
            "priceRange": "$-$$$",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "400 N Walker Ave #130",
                "addressLocality": "Oklahoma City",
                "addressRegion": "OK",
                "postalCode": "73102",
                "addressCountry": "US"
            },
            "geo": {
                "@type": "GeoCoordinates",
                "latitude": 35.47121449999999,
                "longitude": -97.5207373
            },
            "openingHoursSpecification": {
                "@type": "OpeningHoursSpecification",
                "dayOfWeek": [
                    "Monday",
                    "Tuesday",
                    "Wednesday",
                    "Thursday",
                    "Friday",
                    "Saturday",
                    "Sunday"
                ],
                "opens": "00:00",
                "closes": "23:59"
            },
            "sameAs": [
                "https://www.facebook.com/HasbrookLaw/",
                "https://twitter.com/hasbrooklawyers",
                "https://www.linkedin.com/in/claytonhasbrook",
                "https://www.youtube.com/user/ClaytonHasbrook/featured"
            ]
        }
    </script>';
    ob_start(); ?>

    <script>(function (w,d,s,v,odl){(w[v]=w[v]||{})['odl']=odl;
            var f=d.getElementsByTagName(s)[0],j=d.createElement(s);j.async=true;
            j.src='https://intaker.azureedge.net/widget/chat.min.js';
            f.parentNode.insertBefore(j,f);
        })(window, document, 'script','Intaker', 'hasbrookhasbrook');
    </script>

    <!--<script type="text/javascript" id="load-chat-script">
        var mouseHandler = function(ev) {
            console.log('Load chat script.');
            document.body.removeEventListener('mouseover', mouseHandler);
            var chatScript = document.createElement('script');
            chatScript.onload = function() {
                console.log('Chat script loaded successfully.');
            }
            chatScript.src = '<?php echo get_stylesheet_directory_uri() ?>/dist/js/zm-chat.min.js';
            document.head.appendChild(chatScript);
        }
        document.body.addEventListener('mouseover', mouseHandler);
    </script>-->

    <?php
    echo ob_get_clean();
}


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Load optimization functions
 */
require get_template_directory() . '/inc/optimization.php';

/**
 * Add Bootstrap 5 Nav Walker
 * @source https://github.com/AlexWebLab/bootstrap-5-wordpress-navbar-walker
 */
require get_template_directory() . '/inc/Bootstrap5NavWalker.php';

/**
 * Add Comment Walker
 */
require get_template_directory() . '/inc/VWSBootstrapCommentWalker.php';

/**
 * ACF Custom Settings
 */
require get_template_directory() . '/inc/acf-settings.php';

/**
 * Load Custom Post Types
 */
require get_template_directory() . '/inc/custom-post-types.php';
