<?php
/**
 * Display a small article
 * @package lbry
 */

?>
<div class="col col-3-of-12">
    <article class="article-wrapper--small">
        <?php if (has_post_thumbnail()) { ?>
            <figure class="article-preview-image">
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
            </figure>
            <?php
        } else {
            $images = get_posts(
                array(
                    'post_type' => 'attachment',
                    'post_mime_type' => 'image',
                    'post_parent' => $post->ID,
                    'posts_per_page' => 1,
                )
            );

            if ($images) {
                echo '<img src="' . wp_get_attachment_image_src($images[0]->ID, 'post-thumbnail') . '" alt="" />';
            }
        }
        ?>

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
                <?php echo substr(strip_tags(get_the_excerpt(), 2), 0, 100) . '...'; ?>
            </p>
        </div>
        <?php if (has_tag()) { ?>
            <p class="tags"><?php the_tags('', ' '); ?></p>
        <?php } ?>
    </article>
</div>
