<?php get_header(); ?>
  <div id="wrap-content" class="wrap-content">
    <div id="content" class="site-content">

      <section id="primary" class="content-area">
        <main id="main" class="site-main">
        <section class="section-intro">
        <h1 class="text-center">Velkommen</h1>
        <img class="img-gif-intro" src="../assets/lbry-animation-thelion.gif" />
        <div>
          <a href="https://lbry.io/get" class="btn-primary">Get the lbry app</a>
        </div>
        <div class="ticker-wrapper">
          <div class="ticker">
            <p class="ticker-title">LBRY Credits</p>
            <p class="ticker-price">
              <b>{{lbry.price_usd}} USD ({{lbry.percent_change_24h}}%)</b>
            </p>
          </div>
        </div>
      </section>

      <section class="section-resources">
        <?php if ( have_posts() ) {
          while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
              <header class="entry-header">
                <h1><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
              </header>
              <footer class="entry-meta">
                <?php printf( __( 'Posted <time datetime="%1$s">%2$s</time> by %3$s. ', 'voidx' ), get_post_time('c'), get_the_date(), get_the_author() ); ?>
                <?php _e( 'Categories: ', 'voidx' ); the_category( ', ' ); echo '. '; ?>
              </footer>
              <div class="entry-content">
                <?php the_content(); ?>
                <?php wp_link_pages(); ?>
              </div>
            </article>
          <?php endwhile;
        } else { ?>
          <article id="post-0" class="post no-results not-found">
            <header class="entry-header">
              <h1><?php _e( 'Not found', 'voidx' ); ?></h1>
            </header>
            <div class="entry-content">
              <p><?php _e( 'Sorry, but your request could not be completed.', 'voidx' ); ?></p>
              <?php get_search_form(); ?>
            </div>
          </article>
        <?php } ?>
        </section>

        <section class="section-contact">
          <h2 class="title-underline-left">CONTACT US</h2>
          <p>Send us an email or go to the slack channel and contact @rouse</p>
          <div class="margin-bottom margin-top">
            <img src="../assets/icon-slack.svg">
            <p class="inline-block">https://slack.lbry.io</p>
          </div>
          <div>
            <img src="../assets/icon-email.svg">
            <p>hello@lbry.community</p>
          </div>
        </section>
        
        </main>
        <?php voidx_post_navigation(); ?>
      </section>
    </div>
  </div>
<?php get_footer(); ?>