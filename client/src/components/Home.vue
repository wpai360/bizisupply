
<template>
  <div id="home">
    <AdTicker />
    <SaleTicker />
    <HowitWork />
    <Intro1 />
    <Intro2 />
    <Intro3 />
    <Intro4 />
    <Intro5 />
    <Intro6 />
    <Register/>
    <Info />
    <Mobile />
    <Plan />
  </div>
</template>

<script>
import Banner from './Home/Banner.vue';
import HowitWork from './Home/HowitWork.vue';
import Mobile from './Home/Mobile.vue';
import Intro1 from './Home/Intro1.vue';
import Intro2 from './Home/Intro2.vue';
import Intro3 from './Home/Intro3.vue';
import Intro4 from './Home/Intro4.vue';
import Intro5 from './Home/Intro5.vue';
import Intro6 from './Home/Intro6.vue';
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
    Intro1,
    Intro2,
    Intro3,
    Intro4,
    Intro5,
    Intro6,
    Register,
    AdTicker,
    SaleTicker,
    Plan,
    Info
  }
}
</script>
