<template>
  <div class="banner">
    <h1> Partner With Us - Find Competitive Pricing - To Grow Your Business And Your Bottom Line</h1>
    <!-- B2B Innovation Connectinng Agricultural &amp; Horticultural to Supply Chain -->
    <!-- <?php echo base_url();?>assets/images/hawk.png" -->

    <b-img
      :src="require('../../assets/hawk.png')"
      right
    />

    <div class="intro">
      <h2>
        For Buyer
        <b-img
          class="introIcon"
          :src="require('../../assets/farmer.png')"
        />
      </h2>

      <ul>
        <li>COMPETITIVE B2B PRICING from current & new suppliers</li>
        <li>Open your supplychain local to Australia wide</li>
        <li>NO-FEES to use our standard smart software (* T&amp;C apply)</li>
      </ul>
    </div>
    <div class="intro">
      <h2>
        For Supplier
        <b-img
          class="introIcon"
          :src="require('../../assets/sheds.png')"
        />
      </h2>

      <ul>
         <li>Engage current & new B2B customers ready to buy</li>
        <li>Supply online to expand your market share local to Australia wide</li>
        <li>Reduce your operational cost with the smart - quick - accurate software</li>
        <li>PAY ONLY A MONTHLY FEE to use our innovative software</li>
      </ul>
    </div>

    <div class="intro">
      <h2>
        Create Your MasterList To Buy and Supply
        <b-img
          class="introIcon"
          :src="require('../../assets/list.png')"
        />
      </h2>

      <ul>
        <li>The Masterlist makes all buyer and supplier operation smart, quick and accurate</li>
        <li><b>Buyer</b> build your own MasterList with your most purchases items</li>
        <li><b>Supplier</b> build your own Masterlist from stock inventory</li>
        
      </ul>
    </div>
    <section class="hover" />
  </div>
</template>
<script>
export default {};
</script>
<style  scoped>
li {
  margin-left: 5%;
  font-size: 1.3em;
}

h1 {
  text-align: center;
  padding-top: 2%;
}
.banner {
  background-color: #00b7e9;
  height: 720px;
  color: white;
  width: auto;
}

.intro {
  margin-top:2%;
  margin-left: 15%;
}
.introIcon {
  width: 25px;
  height: 25px;
  margin-left: 10px;
}

.div-wrapper {
  position: relative;
}

/* cover the hawk image's bottom, will become invalid when resolution over 4k */
.hover {
  padding-top: 70px;

  background: #ffffff;
  position: relative;
}

.div-wrapper img {
  position: absolute;
}
.big-text {
  float: left;
  font-size: 40px;
  margin-left:20px;
  margin-right: 10px;
}
</style>
