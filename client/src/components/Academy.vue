
<template>
  <div id="academy">
  <Intro1/>
  <Intro2/>
  <Intro3/>
  <Intro4/>
  <Intro5/>
  <Intro6/>
  <Plan/>
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
import Plan from './Home/Plan.vue';
export default {
  name: 'Academy',
  components: {
    Intro1,
    Intro2,
    Intro3,
    Intro4,
    Intro5,
    Intro6,
    Plan
  }
}
</script>
