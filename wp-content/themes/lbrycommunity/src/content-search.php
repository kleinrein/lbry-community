<?php
/**
 * Display search result
 * @package lbry
 */
?>

<p class="published margin-top"
   title="<?php the_time('c') ?>"><?php echo "Posted " . human_time_diff(get_the_time('U'), current_time('U')) . " ago"; ?></p>


<article class="article--dark">
    <header class="entry-header">
        <?php the_title(sprintf('<h2><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>
        <?php if ('post' === get_post_type()) : ?>
            <div class="entry-meta">
            </div>
        <?php endif; ?>
    </header>

    <p class="four-lines">
        <?php echo substr(strip_tags(get_the_excerpt(), 2), 0, 200) . '...'; ?>
    </p>
</article>
