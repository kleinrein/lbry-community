<template>
  <div>
    <section class="section-intro">
      <h1 class="text-center">{{ $t("welcome") }}</h1>
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
    <section class="section-how" id="how-lbry-works">
      <div cass="content">
        <h2 class="title-underline-left">HOW LBRY WORKS</h2>

        <h3 class="text-center">{{$t("howItWorks.page1title")}}</h3>
        <swiper class="how-swiper" :options="swiperOption">
          <swiper-slide>
            <ul class="classic-list">
              <li>{{$t("howItWorks.page1point1")}}</li>
              <li>{{$t("howItWorks.page1point2")}}</li>
              <li>{{$t("howItWorks.page1point3")}}</li>
            </ul>
          </swiper-slide>
          <swiper-slide>
            <ul class="classic-list">
              <li>{{$t("howItWorks.page2point1")}}</li>
              <li>{{$t("howItWorks.page2point2")}}</li>
              <li>{{$t("howItWorks.page2point3")}}</li>
            </ul>
          </swiper-slide>
          <swiper-slide>
            <ul class="classic-list">
              <li>{{$t("howItWorks.page3point1")}}</li>
            </ul>
          </swiper-slide>
          <swiper-slide>
            <ul class="classic-list">
              <li>{{$t("howItWorks.page4point1")}}</li>
            </ul>
          </swiper-slide>
          <div class="swiper-pagination" slot="pagination"></div>
          <div class="swiper-button-prev" slot="button-prev"></div>
          <div class="swiper-button-next" slot="button-next"></div>
          <div class="swiper-scrollbar" slot="scrollbar"></div>
        </swiper>
        <div class="how-steps-wrapper">
          <el-steps class="how-steps" :space="200" :active="1">
            <el-step title="LBRY PROTOCOL AND APP"></el-step>
            <el-step title="THE PUBLISHER"></el-step>
            <el-step title="THE USER"></el-step>
            <el-step title="LEARN MORE"></el-step>
          </el-steps>
        </div>
      </div>
    </section>
    <section class="section-resources">
      <h2 class="text-right title-underline-right">RESOURCES AND ARTICLES</h2>
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
  </div>
</template>

<script>
import axios from 'axios'

export default {
  name: 'hello',
  data () {
    return {
      lbry: {
        price_usd: 0,
        percent_change_24h: 0
      },
      swiperOption: {
        autoplay: 0,
        direction: 'horizontal',
        grabCursor: true,
        setWrapperSize: true,
        autoHeight: false,
        pagination: '.swiper-pagination',
        paginationClickable: true,
        prevButton: '.swiper-button-prev',
        nextButton: '.swiper-button-next',
        scrollbar: '.swiper-scrollbar',
        keyboardControl: true,
        mousewheelControl: false,
        observeParents: true,
        debugger: true,
        centeredSlides: true,
        onTransitionStart (swiper) {
          console.log(swiper)
        },
        onSlideChangeEnd (swiper) {
          console.log(swiper)
        }
      }
    }
  },
  created () {
    axios.get('https://api.coinmarketcap.com/v1/ticker/library-credit/')
      .then(response => {
        this.lbry = response.data[0]

        if (this.lbry.percent_change_24h > 0) {
          this.$el.querySelector('.ticker-price').classList.add('ticker-positive')
        } else {
          this.$el.querySelector('.ticker-price').classList.add('ticker-negative')
        }
      })
      .catch(e => {
        this.errors.push(e)
      })
  }
}
</script>


<style lang="scss">
.section-contact {
  div p {
    font-size: 2rem;
    margin: .25em 0;
  }
  img {
    max-height: 100%;
    width: 3em;
  }
}

@keyframes negative-number {
  0% {
    color: #717171;
  }
  2% {
    opacity: 1;
  }
  20% {
    color: #e74c3c;
  }
  100% {
    color: #717171;
    opacity: 1;
  }
}

@keyframes positive-number {
  0% {
    color: #717171;
  }
  2% {
    opacity: 1;
  }
  20% {
    color: #2ecc71;
  }
  100% {
    color: #717171;
    opacity: 1;
  }
}

.ticker-wrapper {
  display: flex;
  max-width: 85%;
  width: 100%;
  justify-content: flex-end;
  .ticker-title {
    color: #717171;
    margin: 0;
    font-size: 1.1rem;
  }
  .ticker-price {
    color: #717171;
    margin: 0;
  }
  .ticker-positive {
    animation-name: positive-number;
    animation-duration: 4s;
    animation-delay: 1s;
    animation-timing-function: ease-out;
  }
  .ticker-negative {
    animation-name: negative-number;
    animation-duration: 4s;
    animation-delay: 1s;
    animation-timing-function: ease-out;
  }
}

.ticker {
  position: relative;
}


/* Sections */

.section-full {
  height: 100vh;
}

.section-content {
  margin: 4em auto;
  width: 80%;
}

.section-intro {
  margin: 4em 0;
  height: 80vh;
  align-items: center;
  justify-content: center;
  display: flex;
  flex-direction: column;
}




/* How LBRY works */

.section-how {
  height: 100vh;
  background-color: #2D2D2D;
  padding: 4em;
}

.how-swiper {
  padding: 12em;
  margin-top: 0;
  margin-bottom: 2em;
  width: auto;
  font-size: 1.1rem;
}

.how-steps-wrapper {
  display: flex;
  width: 100%;
  align-items: center;
  margin: 8em auto;
}

.swiper-slide {
  margin: 0 auto;
}

.how-steps-wrapper .el-step:last-child {
  width: auto !important;
}

.how-steps {
  margin: 0 auto;
}

.classic-list {
  list-style-type: square !important;
  width: 700px;
  margin: 0 auto;
}

.classic-list li {
  display: list-item !important;
}

.section-resources {
  height: 100vh;
  padding: 4em;
  background-color: linear-gradient(to right, #2E2E2E, #2D2D2D);
  box-shadow: 1px 1px 20px rgba(0, 0, 0, 0.5);
}

.section-contact {
  height: 100vh;
  padding: 4em;
}

.text-right {
  text-align: right;
}

.text-center {
  text-align: center;
}

.flex {
  display: flex;
  flex: 1;
}

.img-gif-intro {
  box-shadow: 1px 5px 25px rgba(0, 0, 0, 0.55);
  display: block;
  max-height: 100%;
  width: 44em;
  margin: 2em auto;
}
</style>
