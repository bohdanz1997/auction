<template>
  <div>
    <b-row>
      <b-col>
        <b-btn :to="{ name: 'admin.auction.create' }" variant="primary">Додати</b-btn>
      </b-col>
    </b-row>
    <b-row>
      <b-col>
        <b-table
          striped
          hover
          :items="auctions"
        />
      </b-col>
    </b-row>
  </div>
</template>

<script>
  import { mapGetters } from 'vuex'

  export default {
    computed: {
      ...mapGetters({
        auctions: 'auction/items'
      }),
    }
  }
</script>

<style scoped>

</style>