<template>
  <div class="row">
    <div v-show="authCheck" class="col-lg-4 col-md-6"
         v-for="auction in auctionsRight"
    >
      <auction-item :auction="auction" :lot="getLot(auction.lot.id)" />
    </div>
    <div v-show="!authCheck" class="col mt-5">
      <div class="greet">
        <img class="greet-img" src="/images/pic.jpg" alt="">
      </div>
      <div class="greet-msg text-center">
        <p>
          Привіт! На нашому сайті ви можете взяти участь у аукціонах по продажу домашніх улюбленців
          та придбати собі одного, який вам сподобається. Щоб почати торги увійдіть або створіть ноий акаунт
        </p>
        <b-btn :to="{ name: 'register' }">Увійти</b-btn>
        <b-btn :to="{ name: 'login' }">Зареєструватись</b-btn>
      </div>
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

<style lang="sass">
  .greet
    text-align: center
    &-img
      height: 400px
    &-msg
      margin-top: 1rem
      padding: 0 8rem
      p
        font-size: 24px
        color: #555

</style>
