<?php
/**
 * Template Name: Advanced
 * @package lbry
 */

get_header();
the_breadcrumb();
?>


<section class="container">
    <div class="content-text">
        <h1><?php the_title(); ?></h1>
        <?php
        the_field('content');
        ?>
    </div>
</section>
<?php
$featuredArticle = get_field('featured_article');
if ($featuredArticle) {
    set_query_var('featured', $featuredArticle);
    get_template_part('content', 'featured');
}

?>
<section class="container">
    <?php
    $categories = get_field('categories');
    if ($categories) {
        foreach ($categories as $category) {
            $tax = get_term($category);
            post_single_small($tax->name);
            echo "<div class='margin-bottom'>&nbsp;</div>";
        }
    }
    ?>
</section>


get_footer();
?>