<template>
  <form @submit.prevent="submit" @keydown="form.onKeydown($event)">
    <b-row>
      <b-col md="6">
        <b-form-input
          v-model="form.price"
          class="price-input"
          type="number"
          size="lg"
        />
        <div class="input-addon">грн</div>
      </b-col>
      <b-col md="6">
        <v-button
          :loading="form.busy"
          type="success"
          large
        >
          Поставити ставку
        </v-button>
      </b-col>
    </b-row>
  </form>
</template>

<script>
  import Form from 'vform'
  import swal from 'sweetalert'

  const alert = type => text => swal({
    text: text,
    icon: type
  })

  const warnAlert = alert('warning')
  const sucsAlert = alert('success')

  export default {
    props: ['auction'],

    data: () => ({
      form: null
    }),

    computed: {
      minPrice () {
        return parseFloat(this.auction.max_price) + parseFloat(this.auction.step)
      },
    },

    created () {
      this.form = new Form({
        price: this.minPrice,
        max_price: 0,
        active: true,
        auction_id: this.auction.id,
      })
    },

    methods: {
      async submit () {
        const data = this.form.data()
        const minPrice = this.minPrice

        if (data.price < minPrice) {
          warnAlert(`Ціна повинна бути не меншою за мінімальну ${minPrice}`)
          return
        }

        try {
          const { data } = await this.form.post('/api/bet')
          sucsAlert(`Вітаємо! Ви перебили поточну ціну на ${data.bet.price} грн`)

          this.form.fill({
            ...this.form.data(),
            price: parseFloat(data.bet.price) + parseFloat(this.auction.step)
          })

          this.$emit('submit', data)
        } catch (err) {
        }
      }
    }
  }
</script>

<style lang="sass">
  .input-addon
    position: absolute
    top: 8px
    right: 23px
    font-size: 20px
    font-weight: bold
    color: #969696

  .price-input
    padding-right: 45px
</style>
