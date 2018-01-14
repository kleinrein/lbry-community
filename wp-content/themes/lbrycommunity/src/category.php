<?php get_header(); ?>

    <main class="content">
        <div class="grid">
            <?php if (have_posts()) : ?>
            <h1 class="page-content-title"><?php single_cat_title(__(''), true); ?></h1>

            <div class="row">
                <?php while (have_posts()) : the_post(); ?>
                    <div class="col col-6-of-12">
                        <article class="article-wrapper">
                            <a href="<?php the_permalink(); ?>">
                                <?php if (has_post_thumbnail()) { ?>
                                    <div class="article-preview-image--big img-bg"
                                         style="background: url(<?php the_post_thumbnail_url(); ?>) no-repeat center center;"></div>
                                <?php } else { ?>
                                    <div class="article-preview-image--none-big"></div>
                                <?php } ?>
                            </a>

                            <h2><a href="<?php the_permalink(); ?>"
                                   class="category-title-link"><?php the_title(); ?></a></h2>

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

                                <p class="four-lines">
                                    <?php the_field('description'); ?>
                                </p>
                            </div>
                            <?php if (has_tag()) : ?>
                                <p class="tags"><?php the_tags('', ' '); ?></p>
                            <?php else : ?>
                            <?php endif; ?>
                            <a href="<?php the_permalink(); ?>" class="btn--ghost">Read More</a>
                        </article>
                    </div>
                <?php endwhile; ?>
                <?php else : ?>

                    <article class="no-posts">
                        <h1>No posts were found.</h1>
                    </article>

                <?php endif; ?>
            </div>
        </div>
    </main>
<?php get_footer(); ?>