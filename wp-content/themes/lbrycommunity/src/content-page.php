<?php
/**
 * Created by PhpStorm.
 * User: rein
 * Date: 05.11.2017
 * Time: 18:50
 */

get_header(); ?>


<section class="container">
    <article class="content-text" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>

        <div class="entry-content">
            <?php the_content(); ?>
            <?php
            wp_link_pages(array(
                'before' => '<div class="page-links">' . __('Pages:', '_mbbasetheme'),
                'after' => '</div>',
            ));
            ?>
        </div>
        <?php edit_post_link(__('Edit', '_mbbasetheme'), '<span class="edit-link">', '</span>'); ?>
    </article>
</section>

<?php
    get_footer();
?>