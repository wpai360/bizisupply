
<template>
  <div id="home">
    <AdTicker />
    <SaleTicker />
    <HowitWork />
    <Register />
    <Register2/>
    <Info />
    <Mobile />
    <Plan />
    <Register1 />
  </div>
</template>

<script>
import Banner from './Home/Banner.vue';
import HowitWork from './Home/HowitWork.vue';
import Mobile from './Home/Mobile.vue';
import Register from './Home/Register.vue';
import Register2 from './Home/Register2.vue';
import Register1 from './Home/Register1.vue';
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
    Register1,
    Register2,
    AdTicker,
    SaleTicker,
    Plan,
    Info
  }
}
</script>
