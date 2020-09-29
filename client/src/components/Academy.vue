
<template>
  <div id="academy">
  <Intro1/>
  <Intro2/>
  <Intro3/>
  <Intro4/>
  <Intro5/>
  <Intro6/>
  <div class="text-center mb-5">
   <b-button
          size="lg"
          class="my-2 my-sm-0"
          pill
          variant="info"
          href="https://127.0.0.1/login"
          style="width:500px;margin-left:10px;"
        >
          Partner Wtih Us &
          Register Now
        </b-button>
  </div>
  </div>
</template>

<script>
import Banner from './Home/Banner.vue';
import Intro1 from './Academy/Intro1.vue';
import Intro2 from './Academy/Intro2.vue';
import Intro3 from './Academy/Intro3.vue';
import Intro4 from './Academy/Intro4.vue';
import Intro5 from './Academy/Intro5.vue';
import Intro6 from './Academy/Intro6.vue';
export default {
  name: 'Academy',
  components: {
    Intro1,
    Intro2,
    Intro3,
    Intro4,
    Intro5,
    Intro6
  }
}
</script>
