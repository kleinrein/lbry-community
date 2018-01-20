<?php
/**
 * Display a featured post
 * @package lbry
 */


if (!isset($category) && !isset($featured)) {
    $posts = get_posts(array(
        'meta_query' => array(
            array(
                'key' => 'featured',
                'value' => '"featured"',
                'compare' => 'LIKE'
            )
        )
    ));
} else if (isset($category)) {
    $posts = get_posts(array(
        'meta_query' => array(
            array(
                'key' => 'featured',
                'value' => '"featured_category"',
                'compare' => 'LIKE',
                'category_name' => $category
            )
        )
    ));
}

if ($posts || $featured) {
    if (isset($featured)) {
        $posts = array($featured);
    }
    foreach ($posts as &$post) {
        $link = get_permalink($post->ID);
        $author_id = get_post_field('post_author', $post->ID);
        if (!isset($category)) {
            $category = get_the_category($post->ID);
        }
        $title = get_the_title($post);
        $description = get_field('description', $post->ID);
        $image = catch_first_image($post->ID);
        ?>

        <article class="article--featured margin-top margin-bottom">
            <?php if ($image) { ?>
                <div class="article-preview-image--featured img-bg"
                     style="background: url(<?php echo $image ?>) no-repeat center center;"></div>
            <?php } else { ?>
                <div class="article-preview-image--none-featured"></div>
            <?php } ?>


            <a href="<?php echo $link; ?>">
                <div class="article--featured-content">
                    <div class="category-featured">
                        <span>Featured</span>
                    </div>
                    <h2 class="text-bold"><?php echo $title; ?></h2>
                    <p class="article--featured-description"><?php echo $description; ?></p>
                    <div class="article-meta-extra">
                        <h6 class="text-bold">
                            <?php
                            echo "By ";
                            the_author_meta('user_nicename', $author_id);
                            echo ", ";
                            echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago';
                            ?>
                        </h6>
                    </div>
                </div>
            </a>
        </article>
        <?php
    }
}