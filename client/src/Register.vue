
<template>
  <div id="app">
    <Navbar />
    <Footer />
  </div>
</template>
<script>

  import Navbar from './components/Common/Navbar.vue';
  import Footer from './components/Common/Footer.vue';
  export default {
    name: 'Register',
    components: {
      Navbar,
      Footer
    }
  }
</script>
