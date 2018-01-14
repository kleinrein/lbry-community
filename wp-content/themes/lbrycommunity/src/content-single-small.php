<?php
/**
 * Display a small article
 * @package lbry
 */

?>
<div class="col col-3-of-12">
    <article class="article-wrapper article--small">
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

            <p class="four-lines">
                <?php the_field('description'); ?>
            </p>
        </div>
        <?php if (has_tag()) { ?>
            <p class="tags"><?php the_tags('', ' '); ?></p>
        <?php } ?>
    </article>
</div>
