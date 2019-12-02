<template>
  <div class="card-div">
    <b-card-group class="mt-5" deck>
      <b-card
        v-for="(card, index) in cardsOne"
        :key="index"
        :ref="`card_${index}`"
        text-variant="black"
        class="text-center"
      >
        <div>
          <p>
            <b-img :src="card.image" alt="image" />
            {{ index +1 }}. {{ card.title }}
          </p>
        </div>
        <b-card-text>
           <ul>
            <li v-if="card.text1 != ''" v-html="card.text1"  />
            <li v-if="card.text2 != ''" v-html="card.text2" />
            <li v-if="card.text3 != ''" v-html="card.text3" />
            <li v-if="card.text4 != ''" v-html="card.text4" />
            <li v-if="card.text5 != ''" v-html="card.text5" />
          </ul>
        </b-card-text>
      </b-card>
    </b-card-group>

    <b-card-group class="mt-5" deck>
      <b-card
        v-for="(card, index) in cardsTwo"
        :key="index"
        :ref="`card_${index}`"
        text-variant="black"
        class="text-center"
      >
        <div>
          <p>
            <b-img :src="card.image" alt="image" />
            {{ index +5 }}. {{ card.title }}
          </p>
        </div>
        <b-card-text>
          <ul>
             <li v-if="card.text1 != ''" v-html="card.text1"  />
            <li v-if="card.text2 != ''" v-html="card.text2" />
            <li v-if="card.text3 != ''" v-html="card.text3" />
            <li v-if="card.text4 != ''" v-html="card.text4" />
            <li v-if="card.text5 != ''" v-html="card.text5" />
          </ul>
        </b-card-text>
      </b-card>
    </b-card-group>
  </div>
</template>

<style scoped>
.card {
  border: none;
}

ul {
  list-style-position: inside;
text-align: left;
}



</style>

<script>
export default {
  name: "Card",
  data() {
    return {
      cardsOne: [
        {
          title: "Create Your Master List",
          text1: "<b>Smart - Quick - Accurate</b>",
          text2: "<b>Buyer</b>: Create your own master list with your frequently purchased items",
          text3: "<b>Supplier</b>: Create your master list with your stock catalog",
          text4: "",
          text5: "",
          image: require("../../assets/how-it-works/service0.png")
        },
        {
          title: "Tell Us What You Want",
          text1: "<b>Buyer</b> selects items from your masterlist or describe the goods or services and preferred delivery date",
          text2: "<b>Buyer</b> selects suppliers anywhere from local to Australia wide",
          text3: "Our software will connect you with potential suppliers",
          text4: "",
          text5: "",
          image: require("../../assets/how-it-works/service1.png")
        },
        {
          title: "Suppliers Quote",
          text1: "<b>Suppliers</b> send the <b>buyer</b> quotes with their: ",
          text2: "Competitive price",
          text3: "Stock availability",
          text4: "Delivery date & arrangements",
          text5: "Payment terms",
          image: require("../../assets/how-it-works/service2.png")
        },
        {
          title: "Buyer Receives The Supplier's Offer",
          text1: "<b>Buyer</b> selects suppliers",
          text2: "Ability to communicate internally through our Hawki chat",
          text3: "",
          text4: "",
          text5: "",
          image: require("../../assets/how-it-works/service3.png")
        }
      ],
      cardsTwo: [
        {
          title: "Buyer's Options Are",
          text1: "<b>Buyer</b> completes the purchase arrangement includes payment terms and delivery date",
          text2: "<b>Buyer</b> places the order on temporary hold for future purchase or reference",
          text3: "<b>Buyer</b> cancel the order(The order will be automatically saved in history)",
          text4: "",
          text5: "",
          image: require("../../assets/how-it-works/service4.png")
        },
        {
          title: "Supplier Confirmation",
          text1: "<b>Supplier</b> confirms supply and delivery date",
          text2: "Activates the invoices to the <b>Buyer</b>",
          text3: "",
          text4: "",
          text5: "",
          image: require("../../assets/how-it-works/service5.png")
        },
        {
          title: "Pay And Delivery",
          text1: "<b>Buyer </b>arranges the payment and accepts delivery terms or click and collect",
          text2: "",
          text3: "",
          text4: "",
          text5: "",
          image: require("../../assets/how-it-works/service6.png")
        },
        {
          title: "Rate The Deal",
          text1: "Rate the Buyer",
          text2: "Rate the Supplier",
          text3: "Rate the Products",
          text4: "",
          text5: "",
          image: require("../../assets/how-it-works/service7.png")
        }
      ]
    };
  }
};
</script>