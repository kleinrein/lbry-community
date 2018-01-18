<?php
/**
 * Display  a single article
 * @package lbry
 */
?>

<?php
global $wp;
$current_url = home_url(add_query_arg(array(), $wp->request));
?>

<article class="article--single">
    <div class="content-text">
        <?php edit_post_link('Edit', '<p title="Edit article">', '</p>'); ?>
        <h1 class="entry-title"><?php if (the_title('', '', false) != '') the_title(); else echo 'Untitled'; ?></h1>
        <div class="preamble">
            <?php the_field('description');
            ?>
        </div>

        <div class="article-meta-extra">
            <h6 class="text-bold">
                <?php
                echo "By ";
                the_author_posts_link();
                echo ", ";
                echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago';
                ?>
            </h6>
        </div>

        <hr>
        <div class="article-categories">
            <?php the_category('</span>&nbsp;⟩&nbsp;<span>') ?>
        </div>
        <hr>

        <div class="margin-bottom"></div>
        <?php the_content(); ?>
        <hr>

        <div class="article-control-center margin-bottom">
            <p><b>Share</b></p>
            <div class="margin-top-1"></div>
            <a class="btn--icon"
               target="_blank"
               href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $current_url; ?>">
                <img src="<?php echo get_bloginfo('template_url') ?>/images/icon-fb-small.svg" alt="">
            </a>
            <a class="btn--icon"
               target="_blank"
               href="https://reddit.com/submit?url=<?php echo $current_url; ?>&title=<?php the_title(); ?>">
                <img src="<?php echo get_bloginfo('template_url') ?>/images/icon-reddit-small.svg" alt="">
            </a>
            <a class="btn--icon"
               target="_blank"
               rel="canonical"
               href="http://twitter.com/share?text=<?php the_title(); ?>&url=<?php echo $current_url; ?>&hashtags=LBRY">
                <img src="<?php echo get_bloginfo('template_url') ?>/images/icon-twitter-small.svg" alt="">
            </a>
            <a class="btn--icon"
               target="_blank"
               href="https://www.tumblr.com/widgets/share/tool?canonicalUrl=<?php echo $current_url; ?>&title=<?php the_title(); ?>&caption=LBRY">
                <img src="<?php echo get_bloginfo('template_url') ?>/images/icon-tumblr-small.svg" alt="">
            </a>
        </div>


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
            while ($query->have_posts()) {
                $query->the_post();
                get_template_part('content', 'single-small-simple');
            }
            echo '</div>';
        }
        ?>
    </div>
</article>