<template>
  <section class="hawkisupply-section">
    <div class="row">
      <div class="col-md-12  text-center">
        <h2 style="color:#22bde5">Partner With Hawkibusiness Today</h2>
        <!-- make the text bigger -->
        <p>As a B2B Buyer, start receiving competitive quotes for the products or services.</p>
        <p>As a B2B Supplier, grow your business local to Australia wide and start receiving requests from genuine B2B customers.</p>
         <b-button
          size="lg"
          class="my-2 my-sm-0"
          pill
          variant="info"
         @click="$goRoute('Academy')" 
          style="width:400px"
        >
        Learn more about how-Bizisupply-work
        </b-button>
   
        <b-button
          size="lg"
          class="my-2 my-sm-0"
          pill
          variant="info"
          href="https://127.0.0.1/HawkiWeb/login"
          style="width:400px;margin-left:10px;"
        >
          Partner Wtih Us &
          Register Now
        </b-button>
      </div>
    </div>
  </section>
</template>

<script>
export default {};
</script>

<style scoped>
.right-content-section-1 h2 {
  font-size: 36px;
  color: #22bde5;
  text-transform: uppercase;
  font-weight: 700;
  line-height: 43px;
}

.col-md-12.right-content-section-1 {
  margin-left:5%;
}

.right-content-section-1 p {
  line-height: 28px;
  font-weight: 400;
  color: #231f20;
  font-size: 16px;
  width: 90%;
}
partner-btn{
  color:black;
}
.hawkisupply-section {
  display: table;
  padding-bottom:100px;
  width: 100%;
  box-sizing: border-box;
  overflow: hidden;
}
</style>
