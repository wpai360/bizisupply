
<template>
  <div id="home">
    <Ticker />
    <Banner />
    <HowitWork />
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
  import Ticker from './Home/Ticker.vue';
  import Plan from './Home/Plan.vue';

  export default {
    name: 'Home',
    components: {
      Banner,
      HowitWork,
      Mobile,
      Register,
      Ticker,
      Plan
    }
  }
</script>
