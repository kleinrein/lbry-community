<?php
/**
 * Display a single post
 * @package lbry
 */
get_header();
?>

    <main class="content" tabindex="-1" role="main">
        <?php while (have_posts()) : the_post(); ?>

            <?php get_template_part('content', 'single'); ?>

            <?php
            // If comments are open or we have at least one comment, load up the comment template
            if (comments_open() || '0' != get_comments_number()) :
                comments_template();
            endif;
            ?>

        <?php endwhile; // end of the loop. ?>
    </main><!-- #main -->

<?php
get_footer();
