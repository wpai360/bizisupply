<template>
  <section class="hawkisupply-section">
    <div class="row">

      <div class="col-md-6" style="folat:right; padding-left:30px;text-align:center">
        <p style="color:#22bde5;"> <b>Our master list is the <i style="font-size:20px;">smart quick accurate</i> way to navigate our platform</b></p>
        <b-embed
          type="video"
          aspect="16by9"
          autoplay
          controls
        >
        <source  src="../../assets/master.mp4" type="video/mp4">
        </b-embed>                                
      </div>
      <div class="col-md-6 right-content-section-1" style="">
        <!-- make the text bigger -->
        <h3>B2B Buyers</h3> <h4>Partner with us to create your master list made up of the most frequently used products.</h4>

         <h4>Our smart platform will connect your business to selected suppliers local or Australia wide.</h4>
         <h3 style="margin-top:10%;">B2B Suppliers</h3><h4>Build your master list from your current product inventory. </h4>
         <h4>Our smart platform will connect your business with buyers local or Australia wide.</h4>
      </div>
    </div>
  </section>
</template>

<script>
export default {};
</script>

<style scoped>
.right-content-section-1 h3 {
  color: #22bde5;
  text-transform: uppercase;
  font-weight: 700;
  line-height: 43px;
}

.col-md-6.right-content-section-1 {
  width: 49%;
  float:left;
}

.right-content-section-1 p {
  line-height: 28px;
  font-weight: 400;
  color: #231f20;
  font-size: 16px;
  width: 90%;
}

.hawkisupply-section {
  display: table;
  padding: 100px 0;
  width: 100%;
  box-sizing: border-box;
  overflow: hidden;
}
</style>
