
<template>
  <div id="home">
    <Banner />
    <HowitWork />
    <Mobile />
    <Register />
  </div>
</template>

<script>
  import Banner from './Home/Banner.vue';  
  import HowitWork from './Home/HowitWork.vue'; 
  import Mobile from './Home/Mobile.vue';
  import Register from './Home/Register.vue';

  export default {
    name: 'Home',
    components: {
      Banner,
      HowitWork,
      Mobile,
      Register,
    }
  }
</script>
