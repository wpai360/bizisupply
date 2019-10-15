
<template>
  <div id="app">
    <Navbar/>
    <Banner/>
    <HowitWork/>
  </div>
</template>
<script>

  import Navbar from './components/Navbar.vue';
  import Banner from './components/Banner.vue';  
  import HowitWork from './components/HowitWork.vue'; 
  export default {
    name: 'Home',
    components: {
      Navbar,
      Banner,
      HowitWork
    }
  }
</script>
