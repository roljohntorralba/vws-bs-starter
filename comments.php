<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package VWS_Oklahoma_Lawyer
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
function vws_add_comment_author_link_class($comment_id)
{
    $comment = get_comment($comment_id);
    $url = get_comment_author_url($comment);
    $author = get_comment_author($comment);
    return "<a href='$url' rel='external nofollow ugc' class='url fw-semibold link-dark text-decoration-none'>$author</a>";
}

add_filter('get_comment_author_link', 'vws_add_comment_author_link_class');
?>

<div id="comments" class="comments-area mx-auto mt-5">

    <?php if (have_comments()) : ?>
        <h2 class="small text-uppercase mb-4 hstack fw-bold">
            <?php
            printf('<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-square me-2" viewBox="0 0 16 16"><path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1h-2.5a2 2 0 0 0-1.6.8L8 14.333 6.1 11.8a2 2 0 0 0-1.6-.8H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h2.5a1 1 0 0 1 .8.4l1.9 2.533a1 1 0 0 0 1.6 0l1.9-2.533a1 1 0 0 1 .8-.4H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/></svg> %1$s comment%2$s', get_comments_number(), get_comments_number() == 1 ? '' : 's');
            ?>
        </h2>

        <ol class="list-unstyled mb-4">
            <?php
            wp_list_comments(array(
                'walker' => new \Valiant_Web\VWSBootstrapCommentWalker(),
                'style' => 'ol',
                'short_ping' => true,
                'avatar_size' => 40,
            ));
            ?>
        </ol><!-- .comment-list -->

        <?php
        // Are there comments to navigate through?
        if (get_comment_pages_count() > 1 && get_option('page_comments')) :
            ?>
            <nav class="navigation comment-navigation" role="navigation">
                <h1 class="screen-reader-text section-heading"><?php _e('Comment navigation', 'twentythirteen'); ?></h1>
                <div class="nav-previous"><?php previous_comments_link(__('&larr; Older Comments', 'twentythirteen')); ?></div>
                <div class="nav-next"><?php next_comments_link(__('Newer Comments &rarr;', 'twentythirteen')); ?></div>
            </nav><!-- .comment-navigation -->
        <?php endif; // Check for comment navigation
        ?>

        <?php if (!comments_open() && get_comments_number()) : ?>
            <p class="no-comments"><?php _e('Comments are closed.', 'twentythirteen'); ?></p>
        <?php endif; ?>

    <?php endif; // have_comments()
    ?>

    <?php
    // Customize the comment form.
    $commenter = wp_get_current_commenter();
    $user = wp_get_current_user();
    $user_identity = $user->exists() ? $user->display_name : '';
    $req = get_option('require_name_email');
    $required_attribute = ' required';
    $checked_attribute = ' checked';
    $required_indicator = ' <span class="required" aria-hidden="true">*</span>';
    $comment_form_class = 'vstack';
    $input_class = 'form-control';
    $textarea_class = 'form-control';
    $label_class = 'small fw-semibold text-muted mb-2 cursor-pointer';
    // Website field disabled by default. Change the $fields['url'] value to $website_field below to enable it.
    $website_field = sprintf(
        '<p class="comment-form-url %s col-span-2">%s %s</p>',
        $comment_form_class,
        sprintf(
            '<label class="%s" for="url">%s</label>',
            $label_class,
            __('Website')
        ),
        sprintf(
            '<input id="url" name="url" type="url" value="%s" size="30" maxlength="200" class="form-input %s" />',
            esc_attr($commenter['comment_author_url']),
            $input_class
        )
    );
    $fields = array(
        'author' => sprintf(
            '<p class="comment-form-author %s">%s %s</p>',
            $comment_form_class,
            sprintf(
                '<label class="%s" for="author">%s%s</label>',
                $label_class,
                __('Name'),
                ($req ? $required_indicator : '')
            ),
            sprintf(
                '<input id="author" class="form-input %s" name="author" type="text" value="%s" size="30" maxlength="245" %s />',
                $input_class,
                esc_attr($commenter['comment_author']),
                ($req ? $required_attribute : '')
            )
        ),
        'email' => sprintf(
            '<p class="comment-form-email %s">%s %s</p>',
            $comment_form_class,
            sprintf(
                '<label class="%s" for="email">%s%s</label>',
                $label_class,
                __('Email'),
                ($req ? $required_indicator : '')
            ),
            sprintf(
                '<input id="email" class="form-input %s" name="email" type="email" value="%s" size="30" maxlength="100" aria-describedby="email-notes" %s />',
                $input_class,
                esc_attr($commenter['comment_author_email']),
                ($req ? $required_attribute : '')
            )
        ),
        'url' => '',
    );
    if (has_action('set_comment_cookies', 'wp_set_comment_cookies') && get_option('show_comments_cookies_opt_in')) {
        $consent = empty($commenter['comment_author_email']) ? '' : $checked_attribute;

        $fields['cookies'] = sprintf(
            '<p class="comment-form-cookies-consent hstack col-span-2 mt-2">%s %s</p>',
            sprintf(
                '<input id="wp-comment-cookies-consent" class="form-checkbox" name="wp-comment-cookies-consent" type="checkbox" value="yes"%s />',
                $consent
            ),
            sprintf(
                '<label class="text-sm ms-2 text-muted cursor-pointer" for="wp-comment-cookies-consent">%s</label>',
                __('Save my name, email, and website in this browser for the next time I comment.')
            )
        );

    }
    $required_text = sprintf(
        ' <span class="required-field-message" aria-hidden="true">' . __('Required fields are marked %s') . '</span>',
        trim($required_indicator)
    );
    $comment_form_args = array(
        'fields' => $fields,
        'comment_field' => sprintf(
            '<p class="comment-form-comment %s col-span-2">%s %s</p>',
            $comment_form_class,
            sprintf(
                '<label class="%s screen-reader-text" for="comment">%s%s</label>',
                $label_class,
                _x('Comment', 'noun'),
                $required_indicator
            ),
            '<textarea id="comment" class="form-textarea ' . $textarea_class . '" name="comment" cols="45" rows="7" placeholder="Write a comment..." maxlength="65525"' . $required_attribute . '></textarea>'
        ),
        'must_log_in' => sprintf(
            '<p class="must-log-in">%s</p>',
            sprintf(
            /* translators: %s: Login URL. */
                __('You must be <a href="%s">logged in</a> to post a comment.'),
                /** This filter is documented in wp-includes/link-template.php */
                wp_login_url()
            )
        ),
        'logged_in_as' => '',
        'comment_notes_before' => '',
        'comment_notes_after' => '',
        'id_form' => 'commentform',
        'id_submit' => 'submit',
        'class_container' => 'comment-respond',
        'class_form' => 'comment-form mb-8',
        'class_submit' => 'submit',
        'name_submit' => 'submit',
        'title_reply' => '',
        'title_reply_to' => __('Leave a Reply to %s'),
        'title_reply_before' => '',
        'title_reply_after' => '',
        'cancel_reply_before' => '',
        'cancel_reply_after' => '',
        'cancel_reply_link' => '<span class="py-2 mb-2 d-inline-block small fw-semibold">Cancel reply</span>',
        'label_submit' => 'Submit',
        'submit_button' => '<button name="%1$s" type="submit" id="%2$s" class="%3$s btn btn-primary hstack float-end">%4$s <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-square ms-2" viewBox="0 0 16 16"><path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1h-2.5a2 2 0 0 0-1.6.8L8 14.333 6.1 11.8a2 2 0 0 0-1.6-.8H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h2.5a1 1 0 0 1 .8.4l1.9 2.533a1 1 0 0 0 1.6 0l1.9-2.533a1 1 0 0 1 .8-.4H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/></svg></button>',
        'submit_field' => '<p class="form-submit mt-4">%1$s %2$s</p>',
    );
    comment_form($comment_form_args);
    ?>

</div><!-- #comments -->
