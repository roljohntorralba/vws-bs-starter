<?php

function vws_custom_post_types() {
    /**
     * Case Result Custom Post Type: case_result
     */
    $labels = array(
        'name'                  => _x( 'Case Results', 'Post Type General Name', 'vws_oklahoma_lawyer' ),
        'singular_name'         => _x( 'Case Result', 'Post Type Singular Name', 'vws_oklahoma_lawyer' ),
        'menu_name'             => __( 'Case Results', 'vws_oklahoma_lawyer' ),
        'name_admin_bar'        => __( 'Case Results', 'vws_oklahoma_lawyer' ),
        'archives'              => __( 'Item Archives', 'vws_oklahoma_lawyer' ),
        'attributes'            => __( 'Item Attributes', 'vws_oklahoma_lawyer' ),
        'parent_item_colon'     => __( 'Parent Item:', 'vws_oklahoma_lawyer' ),
        'all_items'             => __( 'All Items', 'vws_oklahoma_lawyer' ),
        'add_new_item'          => __( 'Add New Item', 'vws_oklahoma_lawyer' ),
        'add_new'               => __( 'Add New', 'vws_oklahoma_lawyer' ),
        'new_item'              => __( 'New Item', 'vws_oklahoma_lawyer' ),
        'edit_item'             => __( 'Edit Item', 'vws_oklahoma_lawyer' ),
        'update_item'           => __( 'Update Item', 'vws_oklahoma_lawyer' ),
        'view_item'             => __( 'View Item', 'vws_oklahoma_lawyer' ),
        'view_items'            => __( 'View Items', 'vws_oklahoma_lawyer' ),
        'search_items'          => __( 'Search Item', 'vws_oklahoma_lawyer' ),
        'not_found'             => __( 'Not found', 'vws_oklahoma_lawyer' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'vws_oklahoma_lawyer' ),
        'featured_image'        => __( 'Featured Image', 'vws_oklahoma_lawyer' ),
        'set_featured_image'    => __( 'Set featured image', 'vws_oklahoma_lawyer' ),
        'remove_featured_image' => __( 'Remove featured image', 'vws_oklahoma_lawyer' ),
        'use_featured_image'    => __( 'Use as featured image', 'vws_oklahoma_lawyer' ),
        'insert_into_item'      => __( 'Insert into item', 'vws_oklahoma_lawyer' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'vws_oklahoma_lawyer' ),
        'items_list'            => __( 'Items list', 'vws_oklahoma_lawyer' ),
        'items_list_navigation' => __( 'Items list navigation', 'vws_oklahoma_lawyer' ),
        'filter_items_list'     => __( 'Filter items list', 'vws_oklahoma_lawyer' ),
    );
    $rewrite = array(
        'slug'                  => 'case-result',
        'with_front'            => true,
        'pages'                 => true,
        'feeds'                 => true,
    );
    $args = array(
        'label'                 => __( 'Case Result', 'vws_oklahoma_lawyer' ),
        'description'           => __( 'Case Results post type', 'vws_oklahoma_lawyer' ),
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
        'name'                  => _x( 'Testimonials', 'Post Type General Name', 'vws_oklahoma_lawyer' ),
        'singular_name'         => _x( 'Testimonial', 'Post Type Singular Name', 'vws_oklahoma_lawyer' ),
        'menu_name'             => __( 'Testimonials', 'vws_oklahoma_lawyer' ),
        'name_admin_bar'        => __( 'Testimonials', 'vws_oklahoma_lawyer' ),
        'archives'              => __( 'Item Archives', 'vws_oklahoma_lawyer' ),
        'attributes'            => __( 'Item Attributes', 'vws_oklahoma_lawyer' ),
        'parent_item_colon'     => __( 'Parent Item:', 'vws_oklahoma_lawyer' ),
        'all_items'             => __( 'All Items', 'vws_oklahoma_lawyer' ),
        'add_new_item'          => __( 'Add New Item', 'vws_oklahoma_lawyer' ),
        'add_new'               => __( 'Add New', 'vws_oklahoma_lawyer' ),
        'new_item'              => __( 'New Item', 'vws_oklahoma_lawyer' ),
        'edit_item'             => __( 'Edit Item', 'vws_oklahoma_lawyer' ),
        'update_item'           => __( 'Update Item', 'vws_oklahoma_lawyer' ),
        'view_item'             => __( 'View Item', 'vws_oklahoma_lawyer' ),
        'view_items'            => __( 'View Items', 'vws_oklahoma_lawyer' ),
        'search_items'          => __( 'Search Item', 'vws_oklahoma_lawyer' ),
        'not_found'             => __( 'Not found', 'vws_oklahoma_lawyer' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'vws_oklahoma_lawyer' ),
        'featured_image'        => __( 'Featured Image', 'vws_oklahoma_lawyer' ),
        'set_featured_image'    => __( 'Set featured image', 'vws_oklahoma_lawyer' ),
        'remove_featured_image' => __( 'Remove featured image', 'vws_oklahoma_lawyer' ),
        'use_featured_image'    => __( 'Use as featured image', 'vws_oklahoma_lawyer' ),
        'insert_into_item'      => __( 'Insert into item', 'vws_oklahoma_lawyer' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'vws_oklahoma_lawyer' ),
        'items_list'            => __( 'Items list', 'vws_oklahoma_lawyer' ),
        'items_list_navigation' => __( 'Items list navigation', 'vws_oklahoma_lawyer' ),
        'filter_items_list'     => __( 'Filter items list', 'vws_oklahoma_lawyer' ),
    );
    $rewrite = array(
        'slug'                  => 'testimonial',
        'with_front'            => true,
        'pages'                 => true,
        'feeds'                 => true,
    );
    $args = array(
        'label'                 => __( 'Testimonial', 'vws_oklahoma_lawyer' ),
        'description'           => __( 'Testimonials custom post type', 'vws_oklahoma_lawyer' ),
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
        'name'                       => _x( 'Case Category', 'Taxonomy General Name', 'vws_oklahoma_lawyer' ),
        'singular_name'              => _x( 'Case Category', 'Taxonomy Singular Name', 'vws_oklahoma_lawyer' ),
        'menu_name'                  => __( 'Category', 'vws_oklahoma_lawyer' ),
        'all_items'                  => __( 'All Items', 'vws_oklahoma_lawyer' ),
        'parent_item'                => __( 'Parent Item', 'vws_oklahoma_lawyer' ),
        'parent_item_colon'          => __( 'Parent Item:', 'vws_oklahoma_lawyer' ),
        'new_item_name'              => __( 'New Item Name', 'vws_oklahoma_lawyer' ),
        'add_new_item'               => __( 'Add New Item', 'vws_oklahoma_lawyer' ),
        'edit_item'                  => __( 'Edit Item', 'vws_oklahoma_lawyer' ),
        'update_item'                => __( 'Update Item', 'vws_oklahoma_lawyer' ),
        'view_item'                  => __( 'View Item', 'vws_oklahoma_lawyer' ),
        'separate_items_with_commas' => __( 'Separate items with commas', 'vws_oklahoma_lawyer' ),
        'add_or_remove_items'        => __( 'Add or remove items', 'vws_oklahoma_lawyer' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'vws_oklahoma_lawyer' ),
        'popular_items'              => __( 'Popular Items', 'vws_oklahoma_lawyer' ),
        'search_items'               => __( 'Search Items', 'vws_oklahoma_lawyer' ),
        'not_found'                  => __( 'Not Found', 'vws_oklahoma_lawyer' ),
        'no_terms'                   => __( 'No items', 'vws_oklahoma_lawyer' ),
        'items_list'                 => __( 'Items list', 'vws_oklahoma_lawyer' ),
        'items_list_navigation'      => __( 'Items list navigation', 'vws_oklahoma_lawyer' ),
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
