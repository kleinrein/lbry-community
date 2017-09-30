<?php
/**
 * Created by PhpStorm.
 * User: andreasrein
 * Date: 30.09.2017
 * Time: 21.16
 */
get_header();
?>
    <main class="content" tabindex="-1" role="main">
        <?php
        // Start the Loop.
        while (have_posts()) : the_post();

            /*
             * Include the post format-specific template for the content. If you want to
             * use this in a child theme, then include a file called content-___.php
             * (where ___ is the post format) and that will be used instead.
             */
            ?>
            <div class="content-text">
                <?php the_content(); ?>
            </div>
            <?php
            // get_template_part( 'content', get_post_format() );

            // If comments are open or we have at least one comment, load up the comment template.
            /*if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;*/
        endwhile;
        ?>
    </main><!-- #main -->

<?php
get_footer();
