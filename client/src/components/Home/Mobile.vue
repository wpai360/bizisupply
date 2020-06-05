<template>
  <div>
    <section id="banner">
      <video
        id="videobcg"
        preload="auto"
        autoplay="true"
        loop="loop"
        muted="muted"
        volume="0"
      >
        <source
          src="../../assets/phone.mp4"
          type="video/mp4"
        >
        <source
          src="movie.webm"
          type="video/webm"
        >Sorry, your browser does not support HTML5 video.
      </video>
      <div class="row">
        <div class="col-md-6 left-content-section">
          <h2>Your supply chain is now in your pocket 24/7</h2>
          <p>
            <font-awesome-icon :icon="['fas', 'check-square']" />Recall Your Own MASTERLIST With Most Purchased Products
          </p>
          <p>
            <font-awesome-icon :icon="['fas', 'check-square']" />Get A Competitive Quote From Many Trusted & Rated Suppliers
          </p>
          <p>
            <font-awesome-icon :icon="['fas', 'check-square']" />Easy-Fast & In Your Pocket or the Plam of Your Hand
          </p>
          <b-img :src="require('../../assets/android-button.png')" />
          <b-img
            class="ml-3"
            :src="require('../../assets/iphone-button.png')"
          />

          <div class="btnnn-section" />
        </div>
      </div>
    </section>
  </div>
</template>

<script>
export default {};
</script>

<style scoped>
#banner {
  margin-top: 500px;
  position: relative;
  height: 800px;
  width: 100%;
  overflow: hidden;
}

#videobcg {
  position: absolute;
  top: 0;
  left: 0;
  min-width: 100%;
  min-height: 100%;
  height: auto;
  width: auto;
  z-index: -100;
}

.left-content-section h2 {
  font-size: 36px;
  color: #ecf0f1;
  /* color: #22bde5; */
  text-transform: uppercase;
  font-weight: 700;

  line-height: 43px;
}

.col-md-6.left-content-section {
  margin-top: 5%;
  width: 49%;
  text-align: left;
  left: 15%;
}

.left-content-section p {
  font-weight: 400;
  color: #ecf0f1;
  font-size: 18px;
  width: 90%;
}
</style>

