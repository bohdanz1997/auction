<template>
  <div>
    <b-row>
      <b-col class="mb-3">
        <b-btn :to="{ name: 'admin.auction.create' }" variant="primary">Додати</b-btn>
      </b-col>
    </b-row>
    <b-row>
      <b-col>
        <b-table
          striped
          hover
          :fields="fields"
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

      fields: () => ([
        { key: 'start_datetime', label: 'Дата початку' },
        { key: 'end_plan_datetime', label: 'Планована дата завершення' },
        { key: 'start_price', label: 'Початкова ціна' },
        { key: 'max_price', label: 'Поточна ціна' },
        { key: 'step', label: 'Крок' },
      ])
    }
  }
</script>

<style scoped>

</style>
