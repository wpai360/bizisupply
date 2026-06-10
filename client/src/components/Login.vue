
<template>
  <section class="login-form-sec">
    <div class="container my-5">
      <div class="login_form text-center">
        <h2 style="color:#22bde5">
          Log In
        </h2>
        <b-form
          @submit="onSubmit"
          @reset="onReset"
        >
          <b-form-group>
            <b-form-input
              id="email"
              type="email"
              required
              placeholder="Email"
            />
          </b-form-group>

          <b-form-group>
            <b-form-input
              id="password"
              type="password"
              required
              placeholder="Password"
            />
          </b-form-group>
                
          <b-form-group>
            <b-form-select />
          </b-form-group>
        </b-form>
        <b-button
          type="submit"
          variant="primary"
        >
          Submit
        </b-button>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: "Login",
  data() {
    return {};
  }
};
</script>

<style scoped>
.container{
  width: 450px;
}

.login_form{
   width: 500px;
    background: #fafafa !important;
    padding: 45px 25px 25px !important;
    border-radius: 3px;
    box-shadow: 1px 1px 14px #0003 !important;
}



</style>
