<?php
/**
 * Template Name: Home
 * @package lbry
 */
?>

<?php get_header(); ?>
<!-- Intro section -->
<section class="container center section-intro">
    <div class="content-text--full-height">
        <h1 class="text-center mx-auto"><?php bloginfo('name'); ?></h1>
        <h3 class="text-center mx-auto"><?php bloginfo('description') ?></h3>
        <div class="container center flex">
            <div>
                <a href="https://lbry.io/get" class="btn--primary">Get LBRY</a>
                <a href="https://spee.ch" class="btn--secondary" data-tooltip="">Use Spee.ch</a>
            </div>
        </div>
        <div class="ticker-wrapper">
            <a target="_blank" href="https://coinmarketcap.com/currencies/library-credit/" title="Price taken from Coinmarketcap.com">
                <div class="ticker">
                    <p class="ticker-title">LBRY Credits</p>
                    <p class="ticker-price">
                        <b>...</b>
                    </p>
                </div>
            </a>
        </div>
    </div>
</section>

<section class="container">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article class="content-text" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
    <?php endwhile; endif; ?>
</section>

<section class="section-contact">
    <div class="container">
        <h1 class="text-gradient text-center">BE PART OF OUR FRIENDLY COMMUNITY</h1>

        <div class="flex center">
            <div class="box-dark">
                <p>Follow us on twitter</p>
                <img src="<?php echo get_bloginfo('template_url') ?>/images/icon-twitter-big.svg" alt="twitter icon">
            </div>
            <div class="box-dark">
                <p>Like our page on Facebook</p>
                <img src="<?php echo get_bloginfo('template_url') ?>/images/icon-fb-big.svg" alt="facebook icon">
            </div>
        </div>

        <h2 class="text-center">Contact us</h2>
        <p class="text-center">Send us an email or go to the Discord-chat and contact @rouse#1378</p>
    </div>
</section>

<?php get_footer(); ?>
<style>
    .section-intro {
        background: linear-gradient(
                rgba(0, 0, 0, 0.75),
                rgba(0, 0, 0, 0.5)
        ),
        url("<?php echo get_bloginfo('template_url') ?>/images/forest.jpg");
    }
</style>

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    window.onload = function () {
        const ticker = document.querySelector('.ticker-price');

        function updateTicker() {
            axios.get('https://api.coinmarketcap.com/v1/ticker/library-credit/')
                .then(function (response) {
                    var lbry = response.data[0]
                    ticker.classList.remove('ticker-negative');
                    ticker.classList.remove('ticker-positive');
                    ticker.style.animation = 'none';
                    ticker.offsetHeight;
                    ticker.style.animation = null;
                    if (lbry.percent_change_24h > 0) {
                        ticker.classList.add('ticker-positive')
                    }
                    else {
                        ticker.classList.add('ticker-negative')
                    }
                    document.querySelector('.ticker-price b').innerHTML = lbry.price_usd + " USD" + " (" + lbry.percent_change_24h + "%)"
                })
                .catch(function (e) {
                    this.errors.push(e)
                })
        }

        updateTicker();
        window.setInterval(function () {
            console.count('interval');
            updateTicker()
        }, 20000)
    }
</script>