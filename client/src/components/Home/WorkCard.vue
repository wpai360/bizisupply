<template>
  <div class="card-div">
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
            />
            {{ index +1 }}. {{ card.title }}
          </p>
        </div>
        <b-popover
          target="pop-1"
          triggers="hover"
          placement="top"
        >
          <template v-slot:title>
            Buyer MasterList
          </template>
          Research shows 70 to 80% of products ordered are repetead on a regular basis in most businesses
        </b-popover>
        <b-popover
          target="pop-2"
          triggers="hover"
          placement="top"
        >
          <template v-slot:title>
            Supplier MasterList
          </template>
          We use your master list to match the buyer’s request with brand name, serial/item No. and image
        </b-popover>

        <b-popover
          target="pop-3"
          triggers="hover"
          placement="top"
        >
          <template v-slot:title>
            Save new products in to master list
          </template>
          Our smart platform will ask you if you want to save the new product to your masterlist for future-order
        </b-popover>
        <b-popover
          target="pop-4"
          triggers="hover"
          placement="top"
        >
          <template v-slot:title>
            Stock availability
          </template>
          In stock now/ backorder/ not avaliable
        </b-popover>

        <b-popover
          target="pop-5"
          triggers="hover"
          placement="top"
        >
          <template v-slot:title>
            Transport options
          </template>
          Supplier own delivery service/ local contract delivery service/WiseTech global
        </b-popover>
        <b-card-text>
          <ul>
            <li
              v-if="card.text1 != ''"
              v-html="card.text1"
            />
            <li
              v-if="card.text2 != ''"
              v-html="card.text2"
            />
            <li
              v-if="card.text3 != ''"
              v-html="card.text3"
            />
            <li
              v-if="card.text4 != ''"
              v-html="card.text4"
            />
            <li
              v-if="card.text5 != ''"
              v-html="card.text5"
            />
            <li
              v-if="card.text6 != ''"
              v-html="card.text6"
            />
          </ul>
        </b-card-text>
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
            />
            {{ index +5 }}. {{ card.title }}
          </p>
        </div>
        <b-card-text>
          <ul>
            <li
              v-if="card.text1 != ''"
              v-html="card.text1"
            />
            <li
              v-if="card.text2 != ''"
              v-html="card.text2"
            />
            <li
              v-if="card.text3 != ''"
              v-html="card.text3"
            />
            <li
              v-if="card.text4 != ''"
              v-html="card.text4"
            />
            <li
              v-if="card.text5 != ''"
              v-html="card.text5"
            />
            <li
              v-if="card.text6 != ''"
              v-html="card.text6"
            />
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
          text2: "<b>Buyer</b>: Create your own <u id='pop-1' style='text-decoration: none; border-bottom: 2px solid #3498db'> master list</u> with your frequently purchased items",
          text3: "<b>Supplier</b>: Create your <u id='pop-2' style='text-decoration: none; border-bottom: 2px solid #3498db'>  master list</u> from your inventory",
          text4: "",
          text5: "",
          text6:"",
          image: require("../../assets/how-it-works/service0.png")
        },
        {
          title: "Tell Us What You Want",
          text1: "<b>Buyer</b> selects items from your master list or you <u id='pop-3' style='text-decoration: none; border-bottom: 2px solid #3498db'>  describe the goods or services</u> and preferred delivery date",
          text2: "<b>Buyer</b> indicates the region of supply from local to Australia wide",
          text3: "<b>Buyer</b> our platform will connect you with potential suppliers for competetive pricing",
          text4: "<b>Buyer</b> activates preferred suppliers from your list and this order will only be send to your selected suppliers",
          text5: "",
          text6:"",
          image: require("../../assets/how-it-works/service1.png")
        },
        {
          title: "Suppliers Quote",
          text1: "<b>Suppliers</b> send the <b>buyer</b> quotes with their: ",
          text2: "Competitive price",
          text3: "<u id='pop-4' style='text-decoration: none; border-bottom: 2px solid #3498db'>  Stock availability</u>",
          text4: "Delivery date",
          text5: "Click and collect OR <u id='pop-5' style='text-decoration: none; border-bottom: 2px solid #3498db'>  transport options</u>",
          text6: "Payment terms",
          image: require("../../assets/how-it-works/service2.png")
        },
        {
          title: "Buyer Receives The Supplier's Offer",
          text1: "<b>Buyer</b> selects suppliers",
          text2: "Ability to communicate internally through our Hawki chat by text, voice or video call",
          text3: "",
          text4: "",
          text5: "",
          text6:"",
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
          text6:"",
          image: require("../../assets/how-it-works/service4.png")
        },
        {
          title: "Supplier Confirmation",
          text1: "<b>Supplier</b> confirms supply and delivery date",
          text2: "Activates the invoices to the <b>Buyer</b>",
          text3: "",
          text4: "",
          text5: "",
          text6:"",
          image: require("../../assets/how-it-works/service5.png")
        },
        {
          title: "Pay And Delivery",
          text1: "<b>Buyer </b>arranges the payment and accepts delivery terms or click and collect",
          text2: "",
          text3: "",
          text4: "",
          text5: "",
          text6: "",
          image: require("../../assets/how-it-works/service6.png")
        },
        {
          title: "Rate The Deal",
          text1: "Rate the Buyer",
          text2: "Rate the Supplier & Products",
          text3: "",
          text4: "<b>Buyer</b> Add the high rate supplier in to your preferred supplier list",
          text5: "",
          text6:"",
          image: require("../../assets/how-it-works/service7.png")
        }
      ]
    };
  }
};
</script>
