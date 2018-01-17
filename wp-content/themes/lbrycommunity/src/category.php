<?php get_header(); ?>


    <h1 class="text-center"><?php single_cat_title(__(''), true); ?></h1>

<?php
$category = single_term_title("", false);
include(locate_template('content-featured.php'));
?>

    <section class="container margin-top margin-bottom">
        <div class="grid">
            <?php
            $query = new WP_Query(array(
                'category_name' => $category,
                'orderby' => 'date'
            ));

            if ($query->have_posts()) { ?>
            <div class="row">
                <?php
                while ($query->have_posts()) {
                    $query->the_post();
                    get_template_part('content', 'single-small');
                }
                } else { ?>
                    <article class="no-posts">
                        <h1>No posts were found.</h1>
                    </article>
                <?php } ?>
            </div>
        </div>
    </section>
<?php get_footer(); ?>