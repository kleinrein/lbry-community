<?php
/**
 * Display search results
 * @package lbry
 */
get_header(); ?>

    <section class="container margin-bottom">

        <?php if (have_posts()) { ?>
            <h1 class="page-title"><?php printf(__('Here is what we found about: %s'), '<span>' . get_search_query() . '</span>'); ?></h1>
            <?php while (have_posts()) : the_post(); ?>
                <?php
                    get_template_part('content', 'search');
                ?>
            <?php endwhile; ?>
        <?php } else { ?>
            <?php get_template_part('content', 'none'); ?>
        <?php } ?>

    </section>

<?php get_footer(); ?>