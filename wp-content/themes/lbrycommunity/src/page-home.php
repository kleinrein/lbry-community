<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>

    <!-- Intro section -->
    <section class="container center section-intro">
        <div class="content-text--full-height">
            <h1 class="text-center mx-auto">Create, share, earn.</h1>
            <h4 class="text-center mx-auto">Content freedom</h4>
            <div class="flex">
                <a href="https://lbry.io/get" class="btn--primary">Get LBRY</a>
            </div>
            <div class="ticker-wrapper">
                <div class="ticker">
                    <p class="ticker-title">LBRY Credits</p>
                    <p class="ticker-price">
                        <b>...</b>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="container">
        <article class="content-text" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
            <?php edit_post_link(__('Edit', '_mbbasetheme'), '<span class="edit-link">', '</span>'); ?>
            <div class="entry-content">
                <?php the_content(); ?>
                <?php
                wp_link_pages(array(
                    'before' => '<div class="page-links">' . __('Pages:', '_mbbasetheme'),
                    'after' => '</div>',
                ));
                ?>
            </div>
        </article>
    </section>

<?php get_footer(); ?>