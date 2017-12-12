<?php
/**
 * Created by PhpStorm.
 * User: rein
 * Date: 12.12.2017
 * Time: 18:10
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
            // No post thumbnail, try attachments instead.
            $images = get_posts(
                array(
                    'post_type' => 'attachment',
                    'post_mime_type' => 'image',
                    'post_parent' => $post->ID,
                    'posts_per_page' => 1, /* Save memory, only need one */
                )
            );

            if ($images) {
                echo '<img src="' . wp_get_attachment_image_src($images[0]->ID, 'post-thumbnail') . '" alt="" />';
            }
        }
        ?>

        <h2><a href="<?php the_permalink(); ?>" class="category-title-link"><?php the_title(); ?></a></h2>

        <div class="category-post">
            <div class="article-meta-extra">
                <h6>
                    <?php
                    if (has_category() && !has_category('Uncategorized')) {
                        the_category('  |  ');
                        echo " | ";
                    }

                    the_date(get_option('date_format'));
                    the_time(get_option('time_format'));
                    echo " by ";
                    the_author_posts_link();
                    ?>
                </h6>
            </div>

            <p class="four-lines">
                <?php the_excerpt(); ?>
            </p>
        </div>
        <?php if (has_tag()) { ?>
            <p class="tags"><?php the_tags('', ' '); ?></p>
        <?php } ?>
    </article>
</div>
