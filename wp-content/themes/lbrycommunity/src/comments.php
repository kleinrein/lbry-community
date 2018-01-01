<?php
/**
 * Show comments
 * @package lbry
 */
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php // You can start editing here -- including this comment! ?>

    <?php if (have_comments()) : ?>
        <h2 class="comments-title">
            <?php
            printf(_nx('One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', '_mbbasetheme'),
                number_format_i18n(get_comments_number()), '<span>' . get_the_title() . '</span>');
            ?>
        </h2>

        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : // are there comments to navigate through ?>
            <nav id="comment-nav-above" class="comment-navigation" role="navigation">
                <h1 class="screen-reader-text"><?php _e('Comment navigation'); ?></h1>
                <div class="nav-previous"><?php previous_comments_link(__('&larr; Older Comments')); ?></div>
                <div class="nav-next"><?php next_comments_link(__('Newer Comments &rarr;')); ?></div>
            </nav>
        <?php endif; // check for comment navigation ?>

        <ol class="comment-list">
            <?php
            wp_list_comments(array(
                'style' => 'ol',
                'short_ping' => true,
            ));
            ?>
        </ol>

        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : // are there comments to navigate through ?>
            <nav id="comment-nav-below" class="comment-navigation" role="navigation">
                <h1 class="screen-reader-text"><?php _e('Comment navigation', '_mbbasetheme'); ?></h1>
                <div class="nav-previous"><?php previous_comments_link(__('&larr; Older Comments', '_mbbasetheme')); ?></div>
                <div class="nav-next"><?php next_comments_link(__('Newer Comments &rarr;', '_mbbasetheme')); ?></div>
            </nav>
        <?php endif; // check for comment navigation ?>

    <?php endif; // have_comments() ?>

    <?php
    if (!comments_open() && '0' != get_comments_number() && post_type_supports(get_post_type(), 'comments')) :
        ?>
        <p class="no-comments"><?php _e('Comments are closed.', '_mbbasetheme'); ?></p>
    <?php endif; ?>

    <?php comment_form(); ?>

</div><!-- #comments -->