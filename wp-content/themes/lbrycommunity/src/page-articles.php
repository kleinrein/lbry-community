<?php
/*
Template Name: Articles
*/
get_header(); ?>

    <section class="container">
        <?php
            post_single_small('community');
            post_single_small('resource');
            post_single_small('fun');
        ?>

    </section>

<?php get_footer(); ?>