<template>
  <div class="banner">
    <h1>Why Partner With Us To Grow Your Business?</h1>
<!-- B2B Innovation Connectinng Agricultural &amp; Horticultural to Supply Chain -->
    <!-- <?php echo base_url();?>assets/images/hawk.png" -->

    <b-img
      :src="require('../../assets/hawk.png')" 
      right 
    />

    <div class="intro">
      <h2>For Buyer</h2>

      <b-img 
        class="introIcon" 
        :src="require('../../assets/farmer.png')" 
      />
      <p>Obtain CURRENT & NEW SUPPLIERS &amp; COMPETITIVE PRICING</p>
      <p>from local or Australia wide</p>
      <p>(NO-COST to use our standard smart software * T&amp;C apply)</p>
    </div>
    <div class="intro">
      <h2>For Supplier</h2>

      <b-img 
        class="introIcon" 
        :src="require('../../assets/sheds.png')"
      />

      <p>Supply online to minimise your operational cost and</p>
      <p>engage CURRENT & NEW customers ready to buy local or</p>
      <p>Australia wide</p>
      <p>(PAY ONLY A MONTHLY FEE to use our smart software, Join us now to enjoy free trail)</p>
    </div>
    <section class="hover" />
  </div>
</template>
<script>
export default {};
</script>
<style  scoped>
p {
  margin-left: 5%;
  font-size: 1.3em;
}

h1 {
  text-align: center;
  padding-top: 2%;
}
.banner {
  background-color: #00b7e9;
  height: 675px;
  color: white;
  width: auto;
}

.intro {
  margin-left: 15%;
}
.introIcon {
  width: 25px;
  height: 25px;
  margin-left: 25px;
}

.div-wrapper {
  position: relative;
}

/* cover the hawk image's bottom, will become invalid when resolution over 4k */
.hover {
  padding-top: 80px;
  margin-top: 100px;
  background: #ffffff;
  position: relative;
}

.div-wrapper img {
  position: absolute;
}
</style>