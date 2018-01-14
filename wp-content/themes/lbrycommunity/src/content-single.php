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
        <?php edit_post_link('Edit', '<p>', '</p>'); ?>
        <div class="margin-bottom"></div>
        <?php the_field('description'); ?>
        <?php the_content(); ?>


        <p>Categories:</p>
        <ul>
            <li><?php the_category('</li><li>') ?></li>
        </ul>

        <hr>

        <h2>Related articles</h2>
        <?php
        $category = get_the_category();
        $query = new WP_Query(array(
            'posts_per_page' => 3,
            'category_name' => esc_html($category[0]->name),
            'orderby' => 'date'
        ));

        if ($query->have_posts()) {
            echo '<div class="row">';
            while($query->have_posts()) {
                $query->the_post();
                get_template_part('content', 'single-small-simple');
            }
            echo '</div>';
        }
        ?>
    </div>
</article>