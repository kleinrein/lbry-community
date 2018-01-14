<?php
/**
 * Display  a single article
 * @package lbry
 */
?>

<article class="article--single">
    <div class="content-text">
        <h1 class="entry-title"><?php if (the_title('', '', false) != '') the_title(); else echo 'Untitled'; ?></h1>

        <div class="article-control-center">
            <?php $page = get_page_by_title('Articles'); ?>
            <a href="<?php echo get_page_link($page->ID); ?>" class="btn--dark">&#8592;&nbsp;&nbsp;Go back to articles</a>
            <div>
                <p class="text-center"><b>Share on social media:</b></p>
                <div class="margin-top-1"></div>
                <button class="btn--icon"><img src="<?php echo get_bloginfo('template_url') ?>/images/icon-fb-small.svg" alt=""></button>
                <button class="btn--icon"><img src="<?php echo get_bloginfo('template_url') ?>/images/icon-reddit-small.svg" alt=""></button>
                <button class="btn--icon"><img src="<?php echo get_bloginfo('template_url') ?>/images/icon-twitter-small.svg" alt=""></button>
                <button class="btn--icon"><img src="<?php echo get_bloginfo('template_url') ?>/images/icon-tumblr-small.svg" alt=""></button>
            </div>
        </div>

        <div class="article-meta-extra">
            <h6>
                <?php
                echo "By ";
                the_author_posts_link();
                echo ", ";
                echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago';
                ?>
            </h6>
        </div>
        <div class="margin-bottom"></div>

        <?php the_field('description'); ?>

        <?php the_content(); ?>
        <?php wp_link_pages(array('before' => '<p>Pages: ', 'after' => '</p>', 'next_or_number' => 'number')); ?>


        <?php if (has_tag()) echo '<p>Tags:</p>';
        the_tags('<ul><li>', '</li><li>', '</li></ul>'); ?>

        <p>Categories:</p>
        <ul>
            <li><?php the_category('</li><li>') ?></li>
        </ul>

        <?php if (comments_open() && pings_open()) { ?>
            <p><a href="#respond" title="Contribute to the discussion">Leave a comment</a> or <a
                        href="<?php trackback_url(); ?>" title="Send a notification when you link to this page">send a
                    trackback</a> from your own site.</p>

        <?php } elseif (!comments_open() && pings_open()) { ?>
            <p>Comments are closed, but you can <a href="<?php trackback_url(); ?>"
                                                   title="Send a notification when you link to this page">send a
                    trackback</a> from your own site.</p>

        <?php } elseif (comments_open() && !pings_open()) { ?>
            <p><a href="#respond" title="Contribute to the discussion">Leave a comment</a>.</p>

        <?php } elseif (!comments_open() && !pings_open()) { ?>
            <p>Comments are closed.</p>

        <?php }
        edit_post_link('Edit', '<p>', '</p>'); ?>
    </div>
</article>