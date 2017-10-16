<?php get_header(); ?>

    <div class="grid">
        <?php if (have_posts()) : ?>
        <h2 class="page-content-title"><?php single_cat_title(__(''), true); ?></h2>

        <div class="row">
            <?php while (have_posts()) : the_post(); ?>
                <div class="col col-6-of-12">
                    <article class="article-wrapper">
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
            <?php endwhile; ?>
            <?php else : ?>

                <article class="no-posts">
                    <h1>No posts were found.</h1>
                </article>

            <?php endif; ?>
        </div>
    </div>

<?php get_footer(); ?>