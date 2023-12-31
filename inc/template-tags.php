<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 */

if (!function_exists('vws_bs_starter_entry_footer')) {
    /**
     * Prints HTML with meta information for the current post-date/time.
     */
    function vws_bs_starter_posted_on()
    {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if (get_the_time('U') !== get_the_modified_time('U')) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
        }

        $time_string = sprintf(
            $time_string,
            esc_attr(get_the_date(DATE_W3C)),
            esc_html(get_the_date()),
            esc_attr(get_the_modified_date(DATE_W3C)),
            esc_html(get_the_modified_date())
        );

        $posted_on = sprintf(
        /* translators: %s: post date. */
            esc_html_x('Posted on %s', 'post date', 'vws-bs-starter'),
            '<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'
        );

        echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    }
}

if (!function_exists('vws_bs_starter_posted_by')) {
    /**
     * Prints HTML with meta information for the current author.
     */
    function vws_bs_starter_posted_by()
    {
        $byline = sprintf(
        /* translators: %s: post author. */
            esc_html_x('by %s', 'post author', 'vws-bs-starter'),
            '<span class="author vcard">' . get_the_author_link() . '</span>'
        );

        echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

    }
}

if (!function_exists('vws_bs_starter_entry_footer')) {
    /**
     * Prints HTML with meta information for the categories, tags and comments.
     */
    function vws_bs_starter_entry_footer()
    {
        // Hide category and tag text for pages.
        if ('post' === get_post_type()) {
            /* translators: used between list items, there is a space after the comma */
            $categories_list = get_the_category_list(esc_html__(', ', 'vws-bs-starter'));
            if ($categories_list) {
                /* translators: 1: list of categories. */
                printf('<span class="cat-links">' . esc_html__('Posted in %1$s', 'vws-bs-starter') . '</span>', $categories_list); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            }

            /* translators: used between list items, there is a space after the comma */
            $tags_list = get_the_tag_list('', esc_html_x(', ', 'list item separator', 'vws-bs-starter'));
            if ($tags_list) {
                /* translators: 1: list of tags. */
                printf('<span class="tags-links">' . esc_html__('Tagged %1$s', 'vws-bs-starter') . '</span>', $tags_list); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            }
        }

        if (!is_single() && !post_password_required() && (comments_open() || get_comments_number())) {
            echo '<span class="comments-link">';
            comments_popup_link(
                sprintf(
                    wp_kses(
                    /* translators: %s: post title */
                        __('Leave a Comment<span class="screen-reader-text"> on %s</span>', 'vws-bs-starter'),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    wp_kses_post(get_the_title())
                )
            );
            echo '</span>';
        }

        // Append page views span tag.
        vws_bs_starter_get_page_views();

        edit_post_link(
            sprintf(
                wp_kses(
                /* translators: %s: Name of current post. Only visible to screen readers */
                    __('Edit <span class="screen-reader-text">%s</span>', 'vws-bs-starter'),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                wp_kses_post(get_the_title())
            ),
            '<span class="edit-link">',
            '</span>'
        );
    }
}

if (!function_exists('vws_bs_starter_post_thumbnail')) {
    /**
     * Displays an optional post thumbnail.
     *
     * Wraps the post thumbnail in an anchor element on index views, or a div
     * element when on single views.
     */
    function vws_bs_starter_post_thumbnail($class = '')
    {
        if (post_password_required() || is_attachment() || !has_post_thumbnail()) {
            return;
        }

        if (is_singular()) :
            ?>

            <div class="post-thumbnail">
                <?php the_post_thumbnail('post-thumbnail', [
                    'class' => $class
                ]); ?>
            </div><!-- .post-thumbnail -->

        <?php else : ?>

            <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
                <?php
                the_post_thumbnail(
                    'post-thumbnail',
                    array(
                        'alt' => the_title_attribute(
                            array(
                                'echo' => false,
                            )
                        ),
                        'class' => $class
                    )
                );
                ?>
            </a>

        <?php
        endif; // End is_singular().
    }
}

if (!function_exists('wp_body_open')) {
    /**
     * Shim for sites older than 5.2.
     *
     * @link https://core.trac.wordpress.org/ticket/12563
     */
    function wp_body_open()
    {
        do_action('wp_body_open');
    }
}

/**
 * Creates a new REST API entry point for page views.
 */
if(!function_exists('vws_bs_starter_add_page_view')) {
    add_action('rest_api_init', function () {
        register_rest_route('vws/v1', '/pageview/(?P<id>\d+)', [
            'methods' => ['POST'],
            'callback' => 'vws_bs_starter_add_page_view',
            'permission_callback' => '__return_true',
            'args' => [
                'id' => [
                    'validate_callback' => function ($param, $request, $key) {
                        return is_numeric($param);
                    }
                ]
            ]
        ]);
    });
    function vws_bs_starter_add_page_view(WP_REST_Request $request)
    {
        $post_id = $request['id'];

        $args = [
            'p' => $post_id,
            'post_type' => ['page', 'post']
        ];
        $post = new WP_Query($args);

        if (!$post->have_posts()) {
            return new WP_Error('vws_request_error', 'No posts found with the given ID', array('status' => 404));
        }

        $prev_value = (int)get_post_meta($post->post->ID, '_vws_page_views', true);
        $is_updated = update_post_meta($post->post->ID, '_vws_page_views', $prev_value + 1);

        $response['post_id'] = $post->post->ID;
        $response['post_title'] = $post->post->post_title;
        $response['is_updated'] = $is_updated;
        $response['prev_value'] = $prev_value;
        $response['current_value'] = get_post_meta($post->post->ID, '_vws_page_views', true);

        $res = new WP_REST_Response($response);
        return ['request' => $res];
    }
}

if (!function_exists('vws_bs_starter_get_page_views')) {
    function vws_bs_starter_get_page_views($post_id = null, $label = 'Page Views: ')
    {
        printf('<span class="page-views">%s%s</span>', $label, (int)get_post_meta($post_id ? $post_id : get_the_ID(), '_vws_page_views', true));
    }
}
