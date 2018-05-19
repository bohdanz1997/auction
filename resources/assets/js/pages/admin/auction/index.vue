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
        >
          <template slot="actions" slot-scope="data">
            <b-btn :to="{ name: 'admin.auction.edit', params: { id: data.item.id }}">
              <fa icon="edit"/>
            </b-btn>
            <b-btn @click="removeAuction(data.item.id)">
              <fa icon="trash-alt"/>
            </b-btn>
          </template>
        </b-table>
      </b-col>
    </b-row>
  </div>
</template>

<script>
  import { mapGetters, mapActions } from 'vuex'

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
        { key: 'actions', label: 'Операції' },
      ])
    },

    methods: {
      ...mapActions({
        removeAuction: 'auction/remove'
      }),
    }
  }
</script>

<style scoped>

</style>
