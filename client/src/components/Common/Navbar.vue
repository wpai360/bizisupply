
<template>
  <div>
    <b-nav class="mb-3">
      <b-navbar-brand
        class="mx-auto"
        href="#"
      >
        <b-img
          src="../../assets/logo.png"
          style="width:15%;margin-left:15%;margin-top:1%"
          alt="hawkiLogo"
        />
      </b-navbar-brand>

      <b-row class="mx-auto my-auto">
        <b-nav-item @click="$goRoute('/Home')">
          Home
        </b-nav-item>
        <b-nav-item disabled>
          About Us
        </b-nav-item>
        <b-nav-item disabled>
          Help
        </b-nav-item>
        <!-- <b-nav-item @click="$goRoute('/Login')"> -->
        <b-nav-item >
          <b-button
            size="sm"
            class="my-2 my-sm-0"
            pill
            variant="primary"
          >
            LogIn/Register
          </b-button>
        </b-nav-item>
      </b-row>
    </b-nav>
  </div>
</template>
<script>
export default {
}    
</script>
