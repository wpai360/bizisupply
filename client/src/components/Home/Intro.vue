<template>
  <div class="how-it">
    <div class="my-5 mx-5 text-center">
     
      <p >B2B only, Change the way you buy & supply forever</p>
      <div class="intro-video mx-auto">
        <b-embed
          type="iframe"
          aspect="16by9"
          src="../../assets/tempvideo.mp4"
          allowfullscreen
        >
        </b-embed>
      </div>
    </div>
  </div>
</template>



<script>
import WorkCard from "./WorkCard.vue";
export default {
  components: {
    WorkCard
  }
};
</script>

<style scoped>
.how-it {
  height: 700px;
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

p {
  font-size: 30px;
  color:#22bde5;
  text-transform:uppercase;
}
</style>
