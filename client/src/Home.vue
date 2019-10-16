
<template>
  <div id="app">
    <Navbar />
    <Banner />
    <HowitWork />
    <Mobile />
    <Register />
    <Footer />
  </div>
</template>
<script>

  import Navbar from './components/Common/Navbar.vue';
  import Banner from './components/Home/Banner.vue';  
  import HowitWork from './components/Home/HowitWork.vue'; 
  import Mobile from './components/Home/Mobile.vue';
  import Register from './components/Home/Register.vue';
  import Footer from './components/Common/Footer.vue';
  export default {
    name: 'Home',
    components: {
      Navbar,
      Banner,
      HowitWork,
      Mobile,
      Register,
      Footer
    }
  }
</script>
