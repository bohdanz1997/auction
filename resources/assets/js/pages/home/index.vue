<template>
  <div class="row">
    <div v-show="authCheck" class="col-lg-4 col-md-6"
         v-for="auction in auctionsRight"
    >
      <auction-item :auction="auction" :lot="getLot(auction.lot.id)" />
    </div>
    <div v-show="!authCheck" class="col mt-5">
      <h2 class="text-center">Уійдіть або зареєструйтесь щоб переглядати лоти</h2>
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
        lots: 'lot/items',
        authCheck: 'auth/check'
      }),

      auctionsRight () {
        return this.auctions.reverse()
      },
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
