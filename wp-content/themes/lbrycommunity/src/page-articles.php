<?php
/**
 * Template Name: Articles
 * @package lbry
 */
get_header(); ?>

    <section class="container">
        <?php
            get_template_part('content', 'featured');
            post_single_small('community');
            echo "<div class='margin-bottom'>&nbsp;</div>";
            post_single_small('resource');
            echo "<div class='margin-bottom'>&nbsp;</div>";
            post_single_small('fun');
        ?>

    </section>

<?php get_footer(); ?>