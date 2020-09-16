<template>
  <section class="hawkisupply-section">
  <div class="section-heading">
    3. Supplier's quote

     <b-img src="../../assets/how-it-works/service3.png"
            />
    </div>
    <div class="row">

      <div class="col-md-6" style="folat:right; padding-left:30px;text-align:center">
        <p style="color:#22bde5; font-size:20px;"> <b>B2B buyers have open their doors to Australia wide suppliers </b></p>
        <p style="color:#22bde5; font-size:20px;"> <b>Our platform will lower the cost of doing business  </b></p>
        <b-embed
          type="video"
          aspect="16by9"
          autoplay
          controls
          loop
        >
        <source  src="../../assets/offer.mp4" type="video/mp4">
        </b-embed>                                
      </div>
      <div class="col-md-6 right-content-section-1" style="">
        <h3>B2B Suppliers</h3> <h4>Send the buyer quotes with:
        
         Competitive price, 
         Stock availability,
         Delivery date,
         Click & collect or Delivery arrangement
         Payment terms</h4>
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
