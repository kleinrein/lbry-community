<?php
/**
 * Display a featured post
 * @package lbry
 */

$posts = get_posts(array(
    'meta_query' => array(
        array(
            'key' => 'featured',
            'value' => '"featured"',
            'compare' => 'LIKE'
        )
    )
));

if ($posts) {
    foreach ($posts as &$post) {
        $author_id = get_post_field( 'post_author', $post->ID );
        $category = get_the_category($post->ID);
        $title = get_the_title($post);
        $description = get_field('description', $post->ID);
        $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');
        ?>

        <article class="article--featured margin-top margin-bottom">
            <a href="<?php the_permalink(); ?>">
                <?php if ($image[0]) { ?>
                    <div class="article-preview-image--featured img-bg"
                         style="background: url(<?php echo $image[0] ?>) no-repeat center center;"></div>
                <?php } else { ?>
                    <div class="article-preview-image--none-featured"></div>
                <?php } ?>
            </a>

            <div class="article--featured-content">
                <div class="category-featured">
                    <span>Featured</span>
                </div>
                <h2><?php echo $title; ?></h2>
                <p><?php echo $description; ?></p>
                <div class="article-meta-extra">
                    <h6>
                        <?php
                        echo "By ";
                        the_author_meta('user_nicename', $author_id);
                        echo ", ";
                        echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago';
                        ?>
                    </h6>
                </div>
            </div>
        </article>

        <?php
    }
}