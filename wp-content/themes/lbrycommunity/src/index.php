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

        <section class="container section-air">
            <h3 class="text-center title-secondary">What is LBRY?</h3>
        </section>

        <section class="container section-air section-m-abs">
            <h3 class="text-cente title-secondary">How lbry works</h3>
        </section>

        <section class="container section-air">
            <h3 class="text-center title-secondary">Articles</h3>

            <div class="grid full-width">

                <?php if (have_posts()) {
                    ?>
                    <div class="row">
                    <?php
                    while (have_posts()) : the_post(); ?>
                        <div class="col col-2-of-12">
                            <article class="article-wrapper">

                            </article>
                        </div>
                    <?php endwhile;
                    ?>
                    </div>
                    ?>
                        <?php
                } ?>
            </div>
        </section>

        <section class="container section-air">
            <h2 class="title-underline">Contact us</h2>
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