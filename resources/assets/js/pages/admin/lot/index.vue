<template>
  <card title="Лоти">
    <router-link :to="{ name: 'admin.lot.create' }" class="btn btn-primary">
      Створити
    </router-link>
    <div class="mt-3">
      <b-table
        striped
        hover
        :fields="fields"
        :items="lots"
      >
        <template slot="actions" slot-scope="data">
          <b-btn :to="{ name: 'admin.lot.edit', params: { id: data.item.id }}">
            <fa icon="edit"/>
          </b-btn>
          <b-btn @click="removeLot(data.item.id)">
            <fa icon="trash-alt"/>
          </b-btn>
        </template>
      </b-table>
    </div>
  </card>
</template>

<script>
  import { mapGetters, mapActions } from 'vuex'

  export default {
    middleware: 'auth',

    computed: {
      ...mapGetters({
        lots: 'lot/items'
      }),

      fields: () => ([
        { key: 'name', label: 'Ім\'я' },
        { key: 'breed.name', label: 'Порода' },
        { key: 'short_description', label: 'Короткий опис' },
        { key: 'actions', label: 'Операції' },
      ]),
    },

    methods: {
      ...mapActions({
        removeLot: 'lot/remove'
      })
    },
  }
</script>

<style scoped>

</style>
