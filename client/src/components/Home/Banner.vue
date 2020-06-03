<template>
  <div class="banner">
    <h1> Partner With Us - Find Competitive Pricing - To Grow Your Bottom Line And Business</h1>
    <!-- B2B Innovation Connectinng Agricultural &amp; Horticultural to Supply Chain -->
    <!-- <?php echo base_url();?>assets/images/hawk.png" -->

    <b-img
      :src="require('../../assets/hawk.png')"
      right
      style="margin-top:100px;"
      />

      <div class="intro">
        <h2>
          B2B Buyer
          <b-img
            class="introIcon"
            :src="require('../../assets/farmer.png')"
            />
        </h2>

        <ul>
          <li>Build your own MasterList with the most purchases items</li>
          <li>COMPETITIVE B2B PRICING from new suppliers or your preferred suppliers</li> 
          <li>Access your supplychain local to Australia wide</li>
          <li>Pay only a monthly fee to use our innovative software</li>
        </ul>
      </div>
      <div class="intro">
        <h2>
          B2B Supplier
          <b-img
            class="introIcon"
            :src="require('../../assets/sheds.png')"
            />
        </h2>

        <ul>
          <li>Build your own Masterlist from stock inventory</li>
          <li>Engage current & new B2B customers ready to buy</li>
          <li>Supply online to expand your market share local to Australia wide</li>
          <li>Reduce your operational cost with the <b>smart platform</b></li>
          <li>Pay only a monthly fee to use our innovative software</li>
        </ul>
      </div>

      <div class="intro">
        <h2>
           Buy and Supply Using MasterList
          <b-img
            class="introIcon"
            :src="require('../../assets/list.png')"
            />
        </h2>

        <ul>
          <li>The <b>Masterlist</b> makes all buyer and supplier operation <b>smart - quick - accurate</b></li>
        </ul>
      </div>
      <div class="arrowbox">
        <div class="chevron"></div>
        <div class="chevron"></div>
        <div class="chevron"></div>
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
  height: 800px;
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
  margin-top:100px;
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
/*Arrow*/
.arrowbox {
  align-items: center;
  width: 100%;
  z-index:999;
  margin-left:50%;
}

.chevron {
  position: absolute;
  width: 2.1rem;
  height: 0.48rem;
  opacity: 0;
  -webkit-transform: scale(0.3);
  transform: scale(0.3);
  -webkit-animation: move-chevron 3s ease-out infinite;
  animation: move-chevron 3s ease-out infinite;
}

.chevron:first-child {
  -webkit-animation: move-chevron 3s ease-out 1s infinite;
  animation: move-chevron 3s ease-out 1s infinite;
}

.chevron:nth-child(2) {
  -webkit-animation: move-chevron 3s ease-out 2s infinite;
  animation: move-chevron 3s ease-out 2s infinite;
}

.chevron:before,
.chevron:after {
  content: "";
  position: absolute;
  top: 0;
  height: 100%;
  width: 50%;
  background: white;
}

.chevron:before {
  left: 0;
  -webkit-transform: skewY(30deg);
  transform: skewY(30deg);
}

.chevron:after {
  right: 0;
  width: 50%;
  -webkit-transform: skewY(-30deg);
  transform: skewY(-30deg);
}

@-webkit-keyframes move-chevron {
  25% {
    opacity: 1;
  }
  33.3% {
    opacity: 1;
    -webkit-transform: translateY(2.28rem);
    transform: translateY(2.28rem);
  }
  66.6% {
    opacity: 1;
    -webkit-transform: translateY(3.12rem);
    transform: translateY(3.12rem);
  }
  100% {
    opacity: 0;
    -webkit-transform: translateY(4.8rem) scale(0.5);
    transform: translateY(4.8rem) scale(0.5);
  }
}

@keyframes move-chevron {
  25% {
    opacity: 1;
  }
  33.3% {
    opacity: 1;
    -webkit-transform: translateY(2.28rem);
    transform: translateY(2.28rem);
  }
  66.6% {
    opacity: 1;
    -webkit-transform: translateY(3.12rem);
    transform: translateY(3.12rem);
  }
  100% {
    opacity: 0;
    -webkit-transform: translateY(4.8rem) scale(0.5);
    transform: translateY(4.8rem) scale(0.5);
  }
}

</style>
