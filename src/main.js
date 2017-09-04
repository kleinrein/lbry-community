// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import VueI18n from 'vue-i18n'
import App from './App'
import router from './router'
import Element from 'element-ui'
import VueAwesomeSwiper from 'vue-awesome-swiper'

import 'element-ui/lib/theme-default/index.css'
require('swiper/dist/css/swiper.css')

Vue.config.productionTip = false
Vue.use(VueI18n)
Vue.use(Element)
Vue.use(VueAwesomeSwiper)

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
      page2point2: 'The miners are people who use their graphic cards to power the network'
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
