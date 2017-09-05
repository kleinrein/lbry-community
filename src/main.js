// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import VueI18n from 'vue-i18n'
import App from './App'
import router from './router'
import Element from 'element-ui'
import VueAwesomeSwiper from 'vue-awesome-swiper'
import VueSmoothScroll from 'vue-smooth-scroll'
import './styles/main.scss'

import 'element-ui/lib/theme-default/index.css'
require('swiper/dist/css/swiper.css')

Vue.config.productionTip = false
Vue.use(VueI18n)
Vue.use(Element)
Vue.use(VueAwesomeSwiper)
Vue.use(VueSmoothScroll)

// Translations
const messages = {
  en: {
    welcome: 'WELCOME TO LBRY.COMMUNITY',
    howItWorks: {
      page1title: 'LBRY Protocol & LBRY App',
      page1point1: 'LBRY Protocol is built using the blockchain technology',
      page1point2: 'This means no one can edit or remove the information which is published, except the owner of the publication',
      page1point3: 'Not even the developers at LBRY Inc. can change it',
      page2point1: 'No single company or person owns the LBRY blockchain. The blockchain is owned by the community & miners.',
      page2point2: 'The miners are people who use their graphic cards to power the network.',
      page2point3: 'Every ~2.5 minutes a miner gets the block reward which is ~450 Library Credits (LBC) (as of June 1st 2017)',
      page2point4: 'Today, the amount of computing power is ~3,000 gh/s, which is equivalent of approx. ~30.000 mid-range graphic cards. (~100mh/s per graphic card.)',
      page3point1: 'The LBRY App is owned and controlled by LBRY Inc. It reads and publishes links to and from the LBRY blockchain protocol. Anyone with experience in programming can build an app or a website which does the same thing.',
      page4point1: 'If illegal or copyrighted material is published on the protocol, and it is reported by the community, or original owners; then LBRY Inc\'s legal team (following US law) will remove the access to the files on the LBRY App.',
      page5point1: 'The LBRY App allows you to publish your legally owned digital content on the LBRY blockchain protocol.'
    }
  },
  nb: {
    welcome: 'VELKOMMEN TIL LBRY.COMMUNITY'
  }
}

// Create VueI18n instance with options
const i18n = new VueI18n({
  locale: 'en',
  messages
})

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  template: '<App/>',
  components: {
    App
  },
  i18n
})
