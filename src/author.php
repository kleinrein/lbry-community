<?php
/**
 * Author page
 * @package lbry
 */

get_header();
the_breadcrumb();
?>

<?php the_archive_title('<h1 class="text-center">', '</h1>'); ?>

<section class="container margin-top margin-bottom">
    <?php if (have_posts()) { ?>
        <?php
        $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));

        $query = new WP_Query(array(
            'author' => $curauth->ID,
            'orderby' => 'post_date',
            'order' => 'ASC',
            'posts_per_page' => 1
        ));

        echo '<div class="grid full-width margin-bottom">';
        if ($query->have_posts()) {
            echo '<div class="row">';
            while ($query->have_posts()) {
                $query->the_post();
                get_template_part('content', 'single-small');
            }
            echo '</div>';
        }
        echo '</div>';
        ?>
    <?php } ?>
</section>

<?php
get_footer();
?>