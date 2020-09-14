<template>
  <section class="hawkisupply-section">
    <div class="row">

      <div class="col-md-6" style="folat:right; padding-left:30px;text-align:center">

       <p style="color:#22bde5; font-size:16px;"><b> We are partenered with a world leading logistics company to help arrange your <i style="font-size:20px; color:#34495e">delivery</i> </b></p>
       <p style="color:#22bde5; font-size:16px;"><b> Payment goes direct to suppliers, we take <i style="font-size:20px; color:#34495e">no comission or fees</i> </b></p>
        <b-embed
          type="video"
          aspect="16by9"
          autoplay
          controls
          loop
        >
        <source  src="../../assets/section5.mp4" type="video/mp4">
        </b-embed>                                
      </div>
      <div class="col-md-6 right-content-section-1" style="">
        <!-- make the text bigger -->

         <h3 style="margin-top:10%;">B2B Suppliers</h3><h4>Supplier confirms supply, delivery date and activates the invoices to the Buyer.</h4>
        <h3 style="margin-top:10%;">B2B Buyers</h3><h4>Arranges the payment and accepts delivery terms or click and collect</h4>
         
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
