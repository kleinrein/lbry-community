<?php
get_header();
the_breadcrumb();
?>

<?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('content', 'page'); ?>

    <?php
    // If comments are open or we have at least one comment, load up the comment template
    if (comments_open() || '0' != get_comments_number()) :
        comments_template();
    endif;
    ?>

<?php endwhile; ?>

<?php get_footer(); ?>