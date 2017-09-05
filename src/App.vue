<template>
  <div id="app">
    <header class="content">
      <ul class="col">
        <img class="logo" src="./assets/logo.svg">
        <li class="col center"><router-link to="/">Home</router-link></li>
        <li class="col center"><a href="https://lbry.community/forum/">Forum</a></li>
        <li class="col center"><a href="#how-lbry-works" v-smooth-scroll="{ duration: 800, offset: 50 }">How LBRY works</a></li>
        <li class="col center"><router-link to="/projects">Projects</router-link></li>
        <li class="col center"><router-link to="/contests">Contests</router-link></li>
        <li class="col center"><router-link to="/about">About</router-link></li>
        <li class="col center">Contact</li>
        <li class="col center"><router-link to="/contribute">Contribute</router-link></li>
      </ul>
    </header>
    <router-view></router-view>
  </div>
</template>

<script>
export default {
  name: 'app'
}
</script>



<style>

#app {
  margin-top: 60px;
}

.content {
  max-width: 85%;
  margin: 0 auto;
}

header {
  margin: 2em auto;
}

header ul li {
  text-transform: uppercase;
  font-size: 1rem;
  font-weight: 500;
}

header ul li a {
  text-decoration: none;
  color: #7A7A7A;
  position: relative;
}

header ul li a:hover {
  cursor: pointer;
  color: #AFAFAF;
}

.router-link-exact-active {
  color: #AFAFAF;
}

.router-link-exact-active:after {
  content: " ";
  position: absolute;
  width: 80%;
  height: 1px;
  background-color: #145B49;
  margin: 0 auto;
  left: 0;
  right: 0;
  bottom: -5px;
}

.col {
  display: flex;
  list-style-type: none;
  margin: 0 auto;
  align-items: center;
}
.logo {
  max-height: 100%;
  width: 8em;
  margin-right: 1em;
}
</style>
