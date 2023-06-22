<?php
/**
 * VWS Bootstrap Starter functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package VWS_Bootstrap_Starter
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
    remove_theme_support('widgets-block-editor');

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
function vws_starter_manual_scripts()
{
    ob_start(); ?>

    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/dist/css/bootstrap.min.css"/>

    <link href="<?php echo get_stylesheet_directory_uri() ?>/dist/css/singular.min.css" rel="stylesheet"/>

    <script defer src="<?php echo get_stylesheet_directory_uri() ?>/dist/js/base.min.js"></script>
    <?php if (is_singular() && comments_open() && get_option('thread_comments')): ?>
    <script defer src="<?php echo includes_url() ?>js/comment-reply.min.js?ver=6.1.1"></script>
<?php endif; ?>
    <script defer src="<?php echo get_stylesheet_directory_uri() ?>/dist/js/single.min.js"></script>

    <?php
    echo ob_get_clean();
}

/**
 * WP Body Open Hook
 */
add_action('wp_body_open', 'vws_starter_wp_body_open');
function vws_starter_wp_body_open()
{
    ob_start(); ?>
    <?php
    echo ob_get_clean();
}

/**
 * Hook to WP Footer.
 */
add_action('wp_footer', 'vws_starter_wp_footer');
function vws_starter_wp_footer()
{
    ob_start(); ?>

    <!--<script type="text/javascript" id="load-chat-script">
        var mouseHandler = function(ev) {
            console.log('Load chat script.');
            document.body.removeEventListener('mouseover', mouseHandler);
            var chatScript = document.createElement('script');
            chatScript.onload = function() {
                console.log('Chat script loaded successfully.');
            }
            chatScript.src = '<?php echo get_stylesheet_directory_uri() ?>/dist/js/dynamic-script-sample.min.js';
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
//require get_template_directory() . '/inc/acf-settings.php';

/**
 * Load Custom Post Types
 */
//require get_template_directory() . '/inc/custom-post-types.php';
