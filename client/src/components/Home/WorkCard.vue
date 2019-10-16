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
          <p>
            <b-img
              :src="card.image"
              alt="image"
            />{{ index +1 }}. {{ card.title }}
          </p>
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
          <p>
            <b-img
              :src="card.image"
              alt="image"
            />{{ index +5 }}. {{ card.title }}
          </p>
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
        { title: "Create Your Master List", text: "", image: require('../../assets/how-it-works/service0.png') },
        { title: "Tell Us What You Want", text: "", image: require('../../assets/how-it-works/service1.png') },
        { title: "Suppliers Quote", text: "", image: require('../../assets/how-it-works/service2.png') },
        { title: "Buyer Receives The Supplier's Offer", text: "", image: require('../../assets/how-it-works/service3.png') }
      ],
      cardsTwo: [
        { title: "Buyer's Options Are", text: "", image: require('../../assets/how-it-works/service4.png') },
        { title: "Supplier Confirmation", text: "", image: require('../../assets/how-it-works/service5.png') },
        { title: "Pay And Delivery", text: "", image: require('../../assets/how-it-works/service6.png') },
        { title: "Rate The Deal", text: "", image: require('../../assets/how-it-works/service7.png') }
      ]
    };
  }
};
</script>