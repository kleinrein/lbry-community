<?php
/*
Template Name: Articles
*/
get_header(); ?>

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