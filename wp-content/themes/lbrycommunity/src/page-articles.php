<?php
/*
Template Name: Articles
*/
get_header(); ?>

<section class="container">

    <div class="content-text">
        <h1>Articles</h1>


            <?php
                $query = new WP_Query(array(
                    'posts_per_page' => 4,
                    'category_name' => 'community',
                ));
            ?>

        <div class="grid full-width">
            <?php
                if ($query -> have_posts()) {
                    ?>

                    <div class="row">
                        <?php
                        while ($query -> have_posts()) {
                               $query -> the_post();
                        ?>

                            <div class="col col-3-of-12">
                                <article class="article-wrapper--small">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <figure class="article-preview-image">
                                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                                        </figure>
                                    <?php else : ?>
                                    <?php endif; ?>

                                    <h2><a href="<?php the_permalink(); ?>"
                                           class="category-title-link"><?php the_title(); ?></a></h2>

                                    <div class="category-post">
                                        <div class="article-meta-extra">
                                            <h6>
                                                <?php if (has_category() && !has_category('Uncategorized')) : ?>
                                                    <?php the_category('  |  '); ?> |
                                                <?php else : ?>
                                                <?php endif; ?>

                                                <?php the_date(get_option('date_format')); ?>
                                                <?php the_time(get_option('time_format')); ?>
                                                by <?php the_author_posts_link(); ?>
                                            </h6>
                                        </div>

                                        <?php the_excerpt(); ?>

                                    </div>
                                    <?php if (has_tag()) : ?>
                                        <p class="tags"><?php the_tags('', ' '); ?></p>
                                    <?php else : ?>
                                    <?php endif; ?>
                                    <a href="<?php the_permalink(); ?>" class="btn--primary">Read More</a>
                                </article>
                            </div>

                            <?php
                        }
                        ?>
                    </div>
                    <?php
                }
            ?>

        </div>
    </div>

</section>

<?php get_footer(); ?>