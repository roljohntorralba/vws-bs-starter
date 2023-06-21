<?php

function vws_custom_post_types() {
    /**
     * Case Result Custom Post Type: case_result
     */
    $labels = array(
        'name'                  => _x( 'Case Results', 'Post Type General Name', 'vws_bs_starter' ),
        'singular_name'         => _x( 'Case Result', 'Post Type Singular Name', 'vws_bs_starter' ),
        'menu_name'             => __( 'Case Results', 'vws_bs_starter' ),
        'name_admin_bar'        => __( 'Case Results', 'vws_bs_starter' ),
        'archives'              => __( 'Item Archives', 'vws_bs_starter' ),
        'attributes'            => __( 'Item Attributes', 'vws_bs_starter' ),
        'parent_item_colon'     => __( 'Parent Item:', 'vws_bs_starter' ),
        'all_items'             => __( 'All Items', 'vws_bs_starter' ),
        'add_new_item'          => __( 'Add New Item', 'vws_bs_starter' ),
        'add_new'               => __( 'Add New', 'vws_bs_starter' ),
        'new_item'              => __( 'New Item', 'vws_bs_starter' ),
        'edit_item'             => __( 'Edit Item', 'vws_bs_starter' ),
        'update_item'           => __( 'Update Item', 'vws_bs_starter' ),
        'view_item'             => __( 'View Item', 'vws_bs_starter' ),
        'view_items'            => __( 'View Items', 'vws_bs_starter' ),
        'search_items'          => __( 'Search Item', 'vws_bs_starter' ),
        'not_found'             => __( 'Not found', 'vws_bs_starter' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'vws_bs_starter' ),
        'featured_image'        => __( 'Featured Image', 'vws_bs_starter' ),
        'set_featured_image'    => __( 'Set featured image', 'vws_bs_starter' ),
        'remove_featured_image' => __( 'Remove featured image', 'vws_bs_starter' ),
        'use_featured_image'    => __( 'Use as featured image', 'vws_bs_starter' ),
        'insert_into_item'      => __( 'Insert into item', 'vws_bs_starter' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'vws_bs_starter' ),
        'items_list'            => __( 'Items list', 'vws_bs_starter' ),
        'items_list_navigation' => __( 'Items list navigation', 'vws_bs_starter' ),
        'filter_items_list'     => __( 'Filter items list', 'vws_bs_starter' ),
    );
    $rewrite = array(
        'slug'                  => 'case-result',
        'with_front'            => true,
        'pages'                 => true,
        'feeds'                 => true,
    );
    $args = array(
        'label'                 => __( 'Case Result', 'vws_bs_starter' ),
        'description'           => __( 'Case Results post type', 'vws_bs_starter' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor' ),
        'taxonomies'            => array( 'case_category' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-portfolio',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => false,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => true,
        'publicly_queryable'    => true,
        'rewrite'               => $rewrite,
        'capability_type'       => 'page',
    );
    register_post_type( 'case_result', $args );

    /**
     * Testimonials Custom Post Type: testimonial
     */
    unset($labels);
    unset($rewrite);
    unset($args);
    $labels = array(
        'name'                  => _x( 'Testimonials', 'Post Type General Name', 'vws_bs_starter' ),
        'singular_name'         => _x( 'Testimonial', 'Post Type Singular Name', 'vws_bs_starter' ),
        'menu_name'             => __( 'Testimonials', 'vws_bs_starter' ),
        'name_admin_bar'        => __( 'Testimonials', 'vws_bs_starter' ),
        'archives'              => __( 'Item Archives', 'vws_bs_starter' ),
        'attributes'            => __( 'Item Attributes', 'vws_bs_starter' ),
        'parent_item_colon'     => __( 'Parent Item:', 'vws_bs_starter' ),
        'all_items'             => __( 'All Items', 'vws_bs_starter' ),
        'add_new_item'          => __( 'Add New Item', 'vws_bs_starter' ),
        'add_new'               => __( 'Add New', 'vws_bs_starter' ),
        'new_item'              => __( 'New Item', 'vws_bs_starter' ),
        'edit_item'             => __( 'Edit Item', 'vws_bs_starter' ),
        'update_item'           => __( 'Update Item', 'vws_bs_starter' ),
        'view_item'             => __( 'View Item', 'vws_bs_starter' ),
        'view_items'            => __( 'View Items', 'vws_bs_starter' ),
        'search_items'          => __( 'Search Item', 'vws_bs_starter' ),
        'not_found'             => __( 'Not found', 'vws_bs_starter' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'vws_bs_starter' ),
        'featured_image'        => __( 'Featured Image', 'vws_bs_starter' ),
        'set_featured_image'    => __( 'Set featured image', 'vws_bs_starter' ),
        'remove_featured_image' => __( 'Remove featured image', 'vws_bs_starter' ),
        'use_featured_image'    => __( 'Use as featured image', 'vws_bs_starter' ),
        'insert_into_item'      => __( 'Insert into item', 'vws_bs_starter' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'vws_bs_starter' ),
        'items_list'            => __( 'Items list', 'vws_bs_starter' ),
        'items_list_navigation' => __( 'Items list navigation', 'vws_bs_starter' ),
        'filter_items_list'     => __( 'Filter items list', 'vws_bs_starter' ),
    );
    $rewrite = array(
        'slug'                  => 'testimonial',
        'with_front'            => true,
        'pages'                 => true,
        'feeds'                 => true,
    );
    $args = array(
        'label'                 => __( 'Testimonial', 'vws_bs_starter' ),
        'description'           => __( 'Testimonials custom post type', 'vws_bs_starter' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-star-half',
        'show_in_admin_bar'     => false,
        'show_in_nav_menus'     => false,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => true,
        'publicly_queryable'    => true,
        'rewrite'               => $rewrite,
        'capability_type'       => 'page',
    );
    register_post_type( 'testimonial', $args );

    /**
     * Case Category Taxonomy: case_category
     */
    unset($labels);
    unset($rewrite);
    unset($args);
    $labels = array(
        'name'                       => _x( 'Case Category', 'Taxonomy General Name', 'vws_bs_starter' ),
        'singular_name'              => _x( 'Case Category', 'Taxonomy Singular Name', 'vws_bs_starter' ),
        'menu_name'                  => __( 'Category', 'vws_bs_starter' ),
        'all_items'                  => __( 'All Items', 'vws_bs_starter' ),
        'parent_item'                => __( 'Parent Item', 'vws_bs_starter' ),
        'parent_item_colon'          => __( 'Parent Item:', 'vws_bs_starter' ),
        'new_item_name'              => __( 'New Item Name', 'vws_bs_starter' ),
        'add_new_item'               => __( 'Add New Item', 'vws_bs_starter' ),
        'edit_item'                  => __( 'Edit Item', 'vws_bs_starter' ),
        'update_item'                => __( 'Update Item', 'vws_bs_starter' ),
        'view_item'                  => __( 'View Item', 'vws_bs_starter' ),
        'separate_items_with_commas' => __( 'Separate items with commas', 'vws_bs_starter' ),
        'add_or_remove_items'        => __( 'Add or remove items', 'vws_bs_starter' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'vws_bs_starter' ),
        'popular_items'              => __( 'Popular Items', 'vws_bs_starter' ),
        'search_items'               => __( 'Search Items', 'vws_bs_starter' ),
        'not_found'                  => __( 'Not Found', 'vws_bs_starter' ),
        'no_terms'                   => __( 'No items', 'vws_bs_starter' ),
        'items_list'                 => __( 'Items list', 'vws_bs_starter' ),
        'items_list_navigation'      => __( 'Items list navigation', 'vws_bs_starter' ),
    );
    $rewrite = array(
        'slug'                       => 'case-category',
        'with_front'                 => false,
        'hierarchical'               => false,
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'rewrite'                    => $rewrite,
    );
    register_taxonomy( 'case_category', array( 'case_result' ), $args );

}
add_action( 'init', 'vws_custom_post_types', 0 );
