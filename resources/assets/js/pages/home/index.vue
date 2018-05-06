<template>
  <div class="row">
    <div class="col-lg-4 col-md-6"
         v-for="auction in auctions"
    >
      <auction-item :auction="auction" :lot="getLot(auction.lot.id)" />
    </div>
  </div>
</template>

<script>
  import { mapGetters } from 'vuex'
  import AuctionItem from './auction-item'

  export default {
    components: { AuctionItem },

    metaInfo () {
      return { title: 'Головна' }
    },

    computed: {
      ...mapGetters({
        auctions: 'auction/items',
        lots: 'lot/items'
      })
    },

    methods: {
      getLot (lotId) {
        return this.lots.find(x => x.id === lotId)
      }
    }
  }
</script>

<style lang="scss">
</style>