<?php
/**
 * Display a small article with just title and metadata
 * @package lbry
 */

?>
<div class="col col-4-of-12">
    <article data-tilt class="article-wrapper article--small">
        <a href="<?php the_permalink(); ?>">
            <?php if (has_post_thumbnail()) { ?>
                <div class="article-preview-image--small img-bg"
                     style="background: url(<?php the_post_thumbnail_url(); ?>) no-repeat center center;"></div>
            <?php } else { ?>
                <div class="article-preview-image--none-small"></div>
            <?php } ?>
        </a>

        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
        <div class="category-post">
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
        </div>
    </article>
</div>
