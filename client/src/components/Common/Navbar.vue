
<template>
  <div>
    <b-nav class="mb-3">
      <b-navbar-brand
        class="mx-auto"
        href="#"
      >
        <b-img
          src="../../assets/logo.png"
          style="width:80%;margin-left:15%;margin-top:1%"
          alt="hawkiLogo"
        />
      </b-navbar-brand>

      <b-row class="mx-auto my-auto">
        <b-nav-item @click="$goRoute('/')">
          Home
        </b-nav-item>
        <b-nav-item @click="$goRoute('/Academy')">
          How-it-work
        </b-nav-item>
        <b-nav-item >
          About Us
        </b-nav-item>
        <b-nav-item >
          Help
        </b-nav-item>
        <!-- <b-nav-item @click="$goRoute('/Login')"> -->
        <b-nav-item>
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
