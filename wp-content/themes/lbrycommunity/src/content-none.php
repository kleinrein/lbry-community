<?php
/**
 * Display empty search result
 * @package lbry
 */
?>

<main class="content" tabindex="-1" role="main">
    <h1 class="page-title"><?php printf(__('Found nothing about: %s'), '<span>' . get_search_query() . '</span>'); ?></h1>
</main>
