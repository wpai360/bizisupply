<template>
  <div class="how-it">
    <div class="my-5 mx-5 text-center">
      <h1 variant="info">How It all works</h1>
      <p>Change the way you buy & supply forever</p>
      <div class="intro-video mx-auto">
        <b-embed
          type="iframe"
          aspect="16by9"
          src="https://www.youtube.com/embed/HRGiB5MfE3Y"
          allowfullscreen
        ></b-embed>
      </div>
      <workCard />
    </div>
  </div>
</template>



<script>
import workCard from "./workCard.vue";
export default {
  components: {
    workCard
  }
};
</script>

<style scoped>
.how-it {
  height: 600px;
  margin-top: 100px;
}

.intro-video {
  width: 800px;
}

h1 {
  color: #22bde5;
  font-size: 36px;
  font-weight: 700;
  text-transform: uppercase;
}
</style>