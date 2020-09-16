<template>
  <section class="hawkisupply-section">
  <div class="section-heading">
    4. Buyer receives the supplier's quotes

     <b-img src="../../assets/how-it-works/service4.png"
            />
    </div>
    <div class="row">
    <div class="col-md-6 right-content-section-1" style="padding-left:30px;">
        <!-- make the text bigger -->
        <h3>B2B Buyers</h3> <h4>Receives and selects supplier's quote</h4>

         <h4>Communicate internally through chat application</h4>
      </div>

      <div class="col-md-6" style="folat:right; text-align:center">
      <p style="color:#22bde5; font-size:16px;"> <b> <i style="font-size:18px; color:#34495e">Availability, delivery cost and payment terms </i>should all be factored when selecting</b></p>
      <p style="color:#22bde5; font-size:16px;"> <b>A new way of doing business by<i style="font-size:18px; color:#34495e"> video chat or text </i>through our platform </b></p>
        <b-embed
          type="video"
          aspect="16by9"
          autoplay
          controls
          loop
        >
        <source  src="../../assets/acceptoffer.mp4" type="video/mp4">
        </b-embed>                                
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
