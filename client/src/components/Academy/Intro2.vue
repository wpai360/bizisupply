<template>
  <section class="hawkisupply-section">
  <div class="section-heading">
    2. Tell us what you want

     <b-img src="../../assets/how-it-works/service1.png"
            />
    </div>
    <div class="row">
    
    <div class="col-md-6 right-content-section-1" style="padding-left:30px;">
        <!-- make the text bigger -->
        <h3>B2B Buyers</h3> 

        <h4>Selects items from your master list</h4>
        <h4>You describe the goods or services if not in your master list</h4>
        <h4>Select your preferred delivery date</h4>
        <h4>Indicates the region of supply from local to Australia wide</h4>
        <h4>Our platform will connect you with potential suppliers for competetive pricing</h4>
        <h4>Attach photos if it's avaliable</h4>
        <h4>Three chocie to obtain competetive pricing: </h4>
        <h4>1. Preferred suppliers only</h4>
        <h4>2. Preferred suppliers and open biding</h4>
        <h4>3. Open biding only</h4>
         
      </div>

      <div class="col-md-6" style="folat:right; text-align:center">
       <p style="color:#22bde5; font-size:16px;"> <b><i style="font-size:20px; color:#34495e">Wholesale - Trade - Bulk Buys</i> have always being competetive now more than ever</b></p>
       <p style="color:#22bde5; font-size:16px;"> <b>Our platform will bring out sharp pencils from suppliers anywhere in Australia, guaranteed</b></p>
        <b-embed
          type="video"
          aspect="16by9"
          autoplay
          controls
          loop
        >
        <source  src="../../assets/order.mp4" type="video/mp4">
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
