<?php
/**
 * Disable WordPress emojis.
 *
 * Remove this section if you want to enable emojis.
 */
add_action('init', 'vws_bs_starter_disable_emojis');
function vws_bs_starter_disable_emojis()
{
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    add_filter('tiny_mce_plugins', 'vws_bs_starter_disable_emojis_tinymce');
    add_filter('wp_resource_hints', 'vws_bs_starter_disable_emojis_remove_dns_prefetch', 10, 2);
}

function vws_bs_starter_disable_emojis_tinymce($plugins)
{
    if (is_array($plugins)) {
        return array_diff($plugins, array('wpemoji'));
    } else {
        return array();
    }
}

function vws_bs_starter_disable_emojis_remove_dns_prefetch($urls, $relation_type)
{
    if ('dns-prefetch' == $relation_type) {
        $emoji_svg_url = apply_filters('emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/');
        $urls = array_diff($urls, array($emoji_svg_url));
    }
    return $urls;
}

/**
 * Plugin related optimization.
 */
// Disable Fluent Form plugin default styling on form inputs.
add_filter('fluentform_load_default_public', '__return_false');

/**
 * Block editor / Gutenberg related optimization.
 *
 * Remove this section if you're planning to use the block editor.
 */
add_filter('use_block_editor_for_post_type', '__return_false', 10); // Fully Disable Gutenberg editor.
add_action('wp_enqueue_scripts', 'vws_remove_unused_styles_scripts', 100); // Don't load Gutenberg-related stylesheets.
function vws_remove_unused_styles_scripts()
{
    wp_dequeue_style('classic-theme-styles');
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('wc-block-style'); // WooCommerce
    wp_dequeue_style('storefront-gutenberg-blocks'); // Storefront theme
    wp_deregister_script('comment-reply');
}

add_filter('gutenberg_use_widgets_block_editor', '__return_false', 100);
add_filter('use_widgets_block_editor', '__return_false');


