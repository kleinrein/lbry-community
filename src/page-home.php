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
        <h1 class="text-center mx-auto" style="opacity: 0;"><?php the_field('title'); ?></h1>
        <h3 class="text-center mx-auto" style="opacity: 0;"><?php the_field('description'); ?></h3>
        <div class="container center flex">
            <div>
                <a href="https://lbry.io/get" class="btn--primary" style="opacity: 0;">Get LBRY</a>
                <a href="https://spee.ch" class="btn--secondary" style="opacity: 0;">Use Spee.ch</a>
            </div>
        </div>
        <div class="ticker-wrapper">
            <a target="_blank" href="https://coinmarketcap.com/currencies/library-credit/"
               title="Price taken from Coinmarketcap.com">
                <div class="ticker">
                    <p class="ticker-title">LBRY Credits</p>
                    <p class="ticker-price">
                        <b>...</b>
                    </p>
                </div>
            </a>
        </div>
    </div>
    <div class="scroll-down" data-scroll="#What-is-lbry"></div>
</section>

<section class="container margin-bottom">
    <a id="What-is-lbry" name="What-is-lbry"></a>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article class="content-text" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div data-aos="fade-down"
                 data-aos-delay="400"
                 data-aos-duration="400"
                 data-aos-easing="ease"
                 data-aos-once="true"
                 class="entry-content air">
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

<section class="section-dark padding-top padding-bottom">
    <a name="Contact-us"></a>
    <div class="container air">
        <h1 class="text-gradient text-center margin-auto"><?php the_field('gradient_text'); ?></h1>

        <div class="flex center margin-top margin-bottom">
            <a target="_blank" href="https://twitter.com/LBRYCommunity">
                <div class="box-dark">
                    <img src="<?php echo get_bloginfo('template_url') ?>/images/icon-twitter-big.svg"
                         alt="twitter icon">
                    <small class="box-dark-text"><?php the_field('twitter'); ?></small>
                </div>
            </a>
            <a target="_blank" href="https://www.facebook.com/lbrycommunity/">
                <div class="box-dark">
                    <img src="<?php echo get_bloginfo('template_url') ?>/images/icon-fb-big.svg" alt="facebook icon">
                    <small class="box-dark-text"><?php the_field('facebook'); ?></small>
                </div>
            </a>
        </div>

        <h2 class="text-center"><?php the_field('contact_title'); ?></h2>
        <p class="text-center"><?php the_field('contact_description'); ?></p>
        <a target="_blank" href="https://discordapp.com/invite/U5aRyN6">
            <img class="img-small margin-top aligncenter"
                 src="<?php echo get_bloginfo('template_url') ?>/images/icon-discord.svg" alt="discord">
        </a>
    </div>
</section>

<?php get_footer(); ?>
<style>
    .section-intro {
        background: linear-gradient(
                rgba(0, 0, 0, 0.75),
                rgba(0, 0, 0, 0.6)
        ),
        url("<?php echo get_bloginfo('template_url') ?>/images/forest.jpg");
        background-size: cover;
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
        }, 15000)
    }
</script>