<template>
  <div>
    <b-modal
      id="modal-1"
      centered
      hide-footer
      title="Unlock bizisupply academy to know more"
    >
      <b-container fluid>
        <b-row
          v-for="type in types"
          :key="type"
          class="my-2"
        >
          <b-col sm="3 my-2">
            <label :for="`type-${type}`">{{ type }}:</label>
          </b-col>
          <b-col sm="9 my-2">
            <b-form-input
              :id="`type-${type}`"
              :type="type"
            />
          </b-col>
        </b-row>
        <b-row class="justify-content-md-center my-3">
          <b-button
            class="mx-auto"
            pill
            variant="info"
          >
            Submit
          </b-button>
        </b-row>
        <b-row class="justify-content-md-center">
          <p>By clicking submit, you agree to our Terms and Policy</p>
        </b-row>
      </b-container>
    </b-modal>
  </div>
</template>

<style scoped>
</style>

<script>
export default {
  data() {
    return {
      types: ['Business name', 'Name', 'Email', 'Post code']
    }
  },
  mounted: function() {
    this.$nextTick(function(){
      setTimeout(() => this.$bvModal.show('modal-1'), 5000 );
    })
  }
}
</script>
