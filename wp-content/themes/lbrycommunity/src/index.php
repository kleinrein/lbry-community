<?php get_header(); ?>

        <!-- Intro section -->
        <section class="container center section-air">
            <h1 class="text-center mx-auto">Welcome to LBRY.COMMUNITY</h1>
            <img class="img img-gif-intro center"
                 src="<?php echo get_bloginfo('template_url') ?>/images/lbry-animation-thelion.gif"/>
            <div class="flex">
                <a href="https://lbry.io/get" class="btn--secondary">Get the lbry app</a>
            </div>
            <div class="ticker-wrapper">
                <div class="ticker">
                    <p class="ticker-title">LBRY Credits</p>
                    <p class="ticker-price">
                        <b>...</b>
                    </p>
                </div>
            </div>
        </section>

        <section class="container section-air">
            <h2 class="title-underline-right">RESOURCES & ARTICLES</h2>
            <?php if (have_posts()) {
                while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
                        <header class="entry-header">
                            <h1><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
                        </header>
                        <?php printf(__('<time datetime="%1$s">%2$s</time> by %3$s. ', 'voidx'), get_post_time('c'), get_the_date(), get_the_author()); ?>
                        <div class="entry-content">
                            <?php the_content(); ?>
                            <?php wp_link_pages(); ?>
                        </div>
                    </article>
                <?php endwhile;
            } else { ?>
                <article id="post-0" class="post no-results not-found">
                    <header class="entry-header">
                        <h1><?php _e('Not found', 'voidx'); ?></h1>
                    </header>
                    <div class="entry-content">
                        <p><?php _e('Sorry, but your request could not be completed.', 'voidx'); ?></p>
                        <?php get_search_form(); ?>
                    </div>
                </article>
            <?php } ?>
        </section>

        <section class="container section-air">
            <h2 class="title-underline-left">CONTACT US</h2>
            <p>Send us an email or go to the slack channel and contact @rouse</p>
            <div class="margin-bottom margin-top">
                <img class="img-micro" src="<?php echo get_bloginfo('template_url') ?>/images/icon-slack.svg">
                <p class="inline-block">https://slack.lbry.io</p>
            </div>
            <div>
                <img class="img-micro" src="<?php echo get_bloginfo('template_url')?>/images/icon-email.svg">
                <p>hello@lbry.community</p>
            </div>
        </section>

    <?php voidx_post_navigation(); ?>
</div>
<?php get_footer(); ?>
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