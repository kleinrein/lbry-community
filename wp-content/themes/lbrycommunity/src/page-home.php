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
            <div class="mx-auto">
                <a href="https://lbry.io/get" class="btn--primary">Get LBRY</a>
                <a href="https://spee.ch" class="btn--secondary">Use Spee.ch</a>
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
<style>
    .section-intro {
        background:
                linear-gradient(
                        rgba(0, 0, 0, 0.75),
                        rgba(0, 0, 0, 0.5)
                ),
                url("<?php echo get_bloginfo('template_url') ?>/images/forest.jpg");
    }
</style>

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    window.onload = function () {
        const ticker = document.querySelector('.ticker-price')

        function updateTicker() {
            axios.get('https://api.coinmarketcap.com/v1/ticker/library-credit/')
                .then(response => {
                    let lbry = response.data[0]

                    ticker.classList.remove('ticker-negative')
                    ticker.classList.remove('ticker-positive')

                    ticker.style.animation = 'none'
                    ticker.offsetHeight
                    ticker.style.animation = null;

                    if (lbry.percent_change_24h > 0) {
                        ticker.classList.add('ticker-positive')
                    }
                    else {
                        ticker.classList.add('ticker-negative')
                    }
                    document.querySelector('.ticker-price b').innerHTML = lbry.price_usd + " USD" + " (" + lbry.percent_change_24h + "%)"
                })
                .catch(e => {
                    this.errors.push(e)
                })
        }
        updateTicker()

        window.setInterval(() => {
            console.count('interval')
            updateTicker()
        }, 20000)
    }
</script>
