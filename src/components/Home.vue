<template>
  <div>
    <section class="section-intro">
      <h1 class="text-center">{{ $t("welcome") }}</h1>
      <img class="img-gif-intro" src="../assets/lbry-animation-thelion.gif" />
        <div>
          <a href="https://lbry.io/get" class="btn-primary">Get the lbry app</a>
        </div>
        <div class="grid">
          <div class="row">
          <div class="flex"></div>
            <div class="flex">
              <p>LBRY Credits</p>
              <p>0.328765 USD (-5.2%)</p>
            </div>
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
      <div>
        <h4>https://slack.lbry.io</h4>
      </div>
      <div>
        <h4>hello@lbry.community</h4>
      </div>
    </section>
  </div>
</template>

<script>
export default {
  name: 'hello',
  data () {
    return {
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
  }
}
</script>

<style>
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
}

.classic-list li {
  display:list-item !important;
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
