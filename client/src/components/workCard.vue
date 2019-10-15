<template>
  <div>
    <b-card-group
      class="mt-5"
      deck
    >
      <b-card
        v-for="(card, index) in cardsOne"
        :key="index"
        :ref="`card_${index}`"
        text-variant="black"
        class="text-center"
      >
        <div>
          <h4>
            <b-img
              :src="card.image"
              alt="image"
            />
          </h4>
        </div>
        <b-card-text>{{ card.text }}</b-card-text>
      </b-card>
    </b-card-group>

    <b-card-group
      class="mt-5"
      deck
    >
      <b-card
        v-for="(card, index) in cardsTwo"
        :key="index"
        :ref="`card_${index}`"
        text-variant="black"
        class="text-center"
      >
        <div>
          <h4>
            <b-img
              :src="card.image"
              alt="image"
            />
          </h4>
        </div>
        <b-card-text>{{ card.text }}</b-card-text>
      </b-card>
    </b-card-group>
  </div>
</template>

<style scoped>
.card {
  border: none;
}
</style>

<script>
export default {
  name: "Card",
  data() {
    return {
      cardsOne: [
        { title: "gallery", text: "text1", image: require('../assets/how-it-works/service0.png') },
        { title: "gallery", text: "text2", image: require('../assets/how-it-works/service1.png') },
        { title: "gallery", text: "text3", image: require('../assets/how-it-works/service2.png') },
        { title: "gallery", text: "text4", image: require('../assets/how-it-works/service3.png') }
      ],
      cardsTwo: [
        { title: "gallery", text: "text5", image: require('../assets/how-it-works/service4.png') },
        { title: "gallery", text: "text6", image: require('../assets/how-it-works/service5.png') },
        { title: "gallery", text: "text7", image: require('../assets/how-it-works/service6.png') },
        { title: "gallery", text: "text8", image: require('../assets/how-it-works/service7.png') }
      ]
    };
  }
};
</script>