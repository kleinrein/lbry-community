<?php
/**
 * Display search result
 * @package lbry
 */
?>


<a class="search-result" href="<?php echo esc_url(get_permalink()); ?>">
    <article class="article--dark">
        <h2>
            <?php the_title(); ?>
        </h2>
        <?php if ('post' === get_post_type()) : ?>
            <div class="entry-meta">
            </div>
        <?php endif; ?>


        <p class="four-lines">
            <?php echo substr(strip_tags(get_the_excerpt(), 2), 0, 200) . '...'; ?>
        </p>
        <small title="<?php the_time('c') ?>"><?php echo "Posted " . human_time_diff(get_the_time('U'), current_time('U')) . " ago"; ?></small>
    </article>
</a>