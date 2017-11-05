<?php
/**
 * The template for displaying search results pages.
 */
get_header(); ?>

    <section class="container">

        <?php if (have_posts()) : ?>

            <h1 class="page-title"><?php printf(__('Search Results for: %s', '_mbbasetheme'), '<span>' . get_search_query() . '</span>'); ?></h1>

            <?php /* Start the Loop */ ?>
            <?php while (have_posts()) : the_post(); ?>

                <?php
                /**
                 * Run the loop for the search to output the results.
                 * If you want to overload this in a child theme then include a file
                 * called content-search.php and that will be used instead.
                 */
                get_template_part('content', 'search');
                ?>

            <?php endwhile; ?>

            <?php _mbbasetheme_paging_nav(); ?>

        <?php else : ?>
            <?php get_template_part('content', 'none'); ?>
        <?php endif; ?>

        </main>
    </section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>