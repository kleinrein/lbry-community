<?php
/**
 * Template Name: Articles
 * @package lbry
 */
get_header();
the_breadcrumb();
?>

    <h1 class="text-center"><?php the_title(); ?></h1>

<?php get_template_part('content', 'featured'); ?>
    <section class="container">
        <?php

        post_single_small('community');
        echo "<div class='margin-bottom'>&nbsp;</div>";
        post_single_small('resource');
        echo "<div class='margin-bottom'>&nbsp;</div>";
        post_single_small('fun');
        ?>

    </section>

<?php get_footer(); ?>