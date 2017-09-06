import Vue from 'vue'
import Router from 'vue-router'

// Components
import Home from '@/components/Home'
import Projects from '@/components/Projects'
import Contests from '@/components/Contests'
import Contribute from '@/components/Contribute'
import About from '@/components/About'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'Home',
      component: Home
    },
    {
      path: '/how-lbry-works',
      name: 'how-lbry-works',
      component: Home
    },
    {
      path: '/projects',
      name: 'Projects',
      component: Projects
    },
    {
      path: '/contests',
      name: 'Contests',
      component: Contests
    },
    {
      path: '/contribute',
      name: 'Contribute',
      component: Contribute
    },
    {
      path: '/about',
      name: 'About',
      component: About
    }
  ],
  linkActiveClass: 'active'
})
