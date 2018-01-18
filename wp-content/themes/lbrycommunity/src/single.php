<?php
/**
 * Display a single post
 * @package lbry
 */
get_header();
?>
<?php the_breadcrumb(); ?>

    <section class="container">
        <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part('content', 'single'); ?>
            <?php
            if (comments_open() || '0' != get_comments_number()) :
                comments_template();
            endif;
            ?>
        <?php endwhile; ?>
    </section>
<?php
get_footer();
