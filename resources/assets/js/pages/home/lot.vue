<template>
  <b-row>
    <b-col>
      <lot-item
        :auction="auction"
        :lot="getLot(auction.lot.id)"
      />
    </b-col>
    <b-col>
      <b-row>
        <b-col>
          <card>
            <bet-form
              :auction="auction"
              @submit="addBet"
            />
          </card>
        </b-col>
      </b-row>
      <b-row>
        <b-col>
          <b-table
            hover
            striped
            :fields="fields"
            :items="betsForLot"
          />
        </b-col>
      </b-row>
    </b-col>
  </b-row>
</template>

<script>
  import { mapGetters, mapActions } from 'vuex'
  import LotItem from './auction-item'
  import BetForm from './form'

  export default {
    props: ['id'],

    components: { LotItem, BetForm },

    computed: {
      ...mapGetters({
        auctions: 'auction/items',
        bets: 'bet/items',
        lots: 'lot/items'
      }),

      fields: () => ([
        { key: 'price', label: 'Ціна' },
        { key: 'user.name', label: 'Автор' },
        { key: 'created_at', label: 'Створений' },
      ]),

      auction () {
        return this.auctions.find(x => x.id === parseFloat(this.id))
      },

      betsForLot () {
        return this.bets.filter(x => x.auction_id === this.auction.id)
      }
    },

    methods: {
      ...mapActions({
        addBet: 'bet/add'
      }),

      getLot (lotId) {
        return this.lots.find(x => x.id === lotId)
      }
    }
  }
</script>

<style scoped>

</style>