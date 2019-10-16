<template>
  <section class="hawkisupply-section">
    <div class="row">
      <div class="col-md-6 images-men-sec"></div>
      <div class="col-md-6 right-content-section-1">
        <h2>Partner With HawkiSupply Today</h2>
        <p>As a Buyer, start receiving competitive quotes for the products or services you want to purchase.</p>
        <p>As a Supplier, start receiving requests for your products or services from customers who have an immediate need to buy.</p>
          <b-button
            size="lg"
            class="my-2 my-sm-0"
            pill
            variant="info"
            href="https://127.0.0.1/HawkiWeb/login"
          >
            Register Now
          </b-button>
        </div>
      </div>

  </section>
</template>

<script>
export default {};
</script>

<style scoped>
.right-content-section-1 h2 {
  font-size: 36px;
  color: #22bde5;
  text-transform: uppercase;
  font-weight: 700;
  line-height: 43px;
}

.col-md-6.right-content-section-1 {
  width: 49%;
}

.right-content-section-1 p {
  line-height: 28px;
  font-weight: 400;
  color: #231f20;
  font-size: 16px;
  width: 90%;
}

.hawkisupply-section {
  display: table;
  padding: 100px 0;
  width: 100%;
  box-sizing: border-box;
  overflow: hidden;
}
</style>
