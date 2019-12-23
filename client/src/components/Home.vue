
<template>
  <div id="home">
    <AdTicker />
    <SaleTicker />
    <Banner />
    <HowitWork />
    <Info />
    <Mobile />
    <Plan />
    <Register />
  </div>
</template>

<script>
import Banner from './Home/Banner.vue';
import HowitWork from './Home/HowitWork.vue';
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
    HowitWork,
    Mobile,
    Register,
    AdTicker,
    SaleTicker,
    Plan,
    Info
  }
}
</script>
