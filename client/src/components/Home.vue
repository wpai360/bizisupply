
<template>
  <div id="home">
    <AdTicker />
    <SaleTicker />
    <Intro />
    <Register/>
    <Info />
    <Mobile />
    <Plan />
  </div>
</template>

<script>
import Banner from './Home/Banner.vue';
import Intro from './Home/Intro.vue';
import Mobile from './Home/Mobile.vue';
import Register from './Home/Register.vue';
import AdTicker from './Home/AdTicker.vue';
import SaleTicker from './Home/SaleTicker.vue';
import Plan from './Home/Plan.vue';
import Info from './Home/Info.vue';
export default {
  name: 'Home',
  components: {
    Banner,
    Intro,
    Mobile,
    Register,
    AdTicker,
    SaleTicker,
    Plan,
    Info
  }
}
</script>
