<template>
  <div class="mb-5">
    <b-row>
      <b-col class="mb-3">
        <h3>{{ lot.name }}</h3>
        <b-breadcrumb
          :items="breadcrumbs"
        />
      </b-col>
    </b-row>
    <b-row>
      <b-col>
        <slider
          :images="lotImages"
        />
      </b-col>
      <b-col>
        <b-row>
          <b-col class="mb-3">
            <h2>{{ lot.description }}</h2>
            <b-list-group>
              <b-list-group-item
                v-for="c in characteristics"
                :key="c.value"
              >
                <b-row>
                  <b-col class="c c-text">{{ c.text }}</b-col>
                  <b-col class="c c-value">{{ c.value }}</b-col>
                </b-row>
              </b-list-group-item>
            </b-list-group>
            <div>
            </div>
          </b-col>
        </b-row>
        <b-row>
          <b-col>
            <card>
              <div class="mb-4">
                <b-row>
                  <b-col class="c c-text">Поточна ціна:</b-col>
                  <b-col class="c c-value">{{ auction.max_price }} грн</b-col>
                </b-row>
                <b-row>
                  <b-col class="c c-text">Крок:</b-col>
                  <b-col class="c c-value">{{ auction.step }} грн</b-col>
                </b-row>
              </div>
              <bet-form
                :auction="auction"
                @submit="doBet"
              />
            </card>
          </b-col>
        </b-row>
        <b-row>
          <b-col class="mt-3">
            <h4>Історія ставок
              <b-btn class="float-right" variant="primary" @click="showHistory = !showHistory">
                {{ showHistory ? 'Сховати' : 'Показати' }}
              </b-btn>
            </h4>
            <b-table v-show="showHistory"
              hover
              :fields="fields"
              :items="betsForLot"
            />
          </b-col>
        </b-row>
      </b-col>
    </b-row>
  </div>
</template>

<script>
  import * as R from 'ramda'
  import moment from 'moment'
  import { mapGetters, mapActions } from 'vuex'
  import LotItem from './auction-item'
  import BetForm from './form'
  import Slider from "../../components/Slider"

  const mapIds = R.map(x => x.id)

  export default {
    props: ['id'],

    components: {Slider, LotItem, BetForm },

    data: () => ({
      showHistory: false,
    }),

    computed: {
      ...mapGetters({
        auctions: 'auction/items',
        bets: 'bet/items',
        lots: 'lot/items'
      }),

      breadcrumbs () {
        return [
          { text: 'Головна', to: { name: 'home' }},
          { text: this.lot.name, active: true }
        ]
      },

      characteristics () {
        const { breed, cert, gender } = this.lot
        const daysToEnd = moment(this.auction.end_plan_datetime)
          .diff(moment(), 'days')

        return [
          { text: 'Порода', value: breed.name },
          { text: 'Стать', value: gender.name },
          { text: 'Сертифікат', value: cert.name },
          { text: 'Зроблено ставок', value: this.auction.bets.length },
          { text: 'До закінчення', value: `${daysToEnd} днів` }
        ]
      },

      fields: () => ([
        { key: 'price', label: 'Ціна' },
        { key: 'user.name', label: 'Автор' },
        { key: 'created_at', label: 'Створений' },
      ]),

      lot () {
        return this.lots.find(x => mapIds(x.auctions).includes(this.auction.id))
      },

      lotImages () {
        return this.lot.pictures.map(x => `/${x.path}`)
      },

      auction () {
        return this.auctions.find(x => x.id === parseFloat(this.id))
      },

      betsForLot () {
        return this.bets.filter(x => x.auction_id === this.auction.id)
      }
    },

    methods: {
      ...mapActions({
        addBet: 'bet/add',
        updateAuction: 'auction/update'
      }),

      getLot (lotId) {
        return this.lots.find(x => x.id === lotId)
      },

      doBet ({ bet, auction }) {
        this.addBet(bet)
        this.updateAuction(auction)
      }
    }
  }
</script>

<style lang="sass">
  .c
    font-weight: bold
    &-text
      color: #969696
</style>
