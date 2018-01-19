<?php
/**
 * Display a small article with just title and metadata
 * @package lbry
 */

?>
<div class="col col-4-of-12 col-m-4-of-4">
    <article class="article-wrapper article--small">
        <?php
            $image = catch_first_image();
        ?>
        <a href="<?php the_permalink(); ?>">
            <?php if ($image) { ?>
                <div class="article-preview-image--small img-bg"
                     style="background: url(<?php $image; ?>) no-repeat center center;"></div>
            <?php } else { ?>
                <div class="article-preview-image--none-small"></div>
            <?php } ?>

            <h4><?php the_title(); ?></h4>
            <div class="category-post">
                <div class="article-meta-extra">
                    <h6>
                        <?php
                        echo "By ";
                        the_author_posts_link();
                        echo ", ";
                        echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago';
                        ?>
                    </h6>
                </div>
            </div>
        </a>
    </article>
</div>
