<?php get_header(); ?>


    <h1 class="text-center"><?php single_cat_title(__(''), true); ?></h1>

    <section class="container margin-top margin-bottom">
        <div class="grid">
            <?php if (have_posts()) : ?>
            <div class="row">
                <?php while (have_posts()) : the_post(); ?>
                    <?php
                    get_template_part('content', 'single-small');
                    ?>

                <?php endwhile; ?>
                <?php else : ?>
                    <article class="no-posts">
                        <h1>No posts were found.</h1>
                    </article>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php get_footer(); ?>