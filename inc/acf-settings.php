<?php
/**
 * If WordPress's default custom fields checkbox is gone from
 * screen settings, uncomment the below line.
 * @source https://support.advancedcustomfields.com/forums/topic/acf-pro-5-6-0-unable-to-display-regular-custom-fields-metabox-on-cpts/
 */
//add_filter('acf/settings/remove_wp_meta_box', '__return_false');

/**
 * ACF Display Options Page.
 */
if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title'    => 'Theme General Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));

/*
    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Header Settings',
        'menu_title'    => 'Header',
        'parent_slug'   => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Footer Settings',
        'menu_title'    => 'Footer',
        'parent_slug'   => 'theme-general-settings',
    ));*/

}
