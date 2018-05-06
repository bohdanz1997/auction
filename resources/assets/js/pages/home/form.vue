<template>
  <form @submit.prevent="submit" @keydown="form.onKeydown($event)">
    <b-row>
      <b-col md="6">
        <b-form-input type="number"/>
      </b-col>
      <b-col md="6">
        <v-button :loading="form.busy" type="success">
          Поставити ставку
        </v-button>
      </b-col>
    </b-row>
  </form>
</template>

<script>
  import Form from 'vform'

  export default {
    props: ['auction'],

    data: () => ({
      form: null
    }),

    created () {
      this.form = new Form({
        price: 0,
        max_price: 0,
        active: true,
        auction_id: this.auction.id,
      })
    },

    methods: {
      async submit () {
        try {
          const { data } = await this.form.post('/api/bet')
          this.$emit('submit', data)
        } catch (err) {
        }
      }
    }
  }
</script>

<style scoped>

</style>