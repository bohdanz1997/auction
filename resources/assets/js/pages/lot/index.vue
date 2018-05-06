<template>
  <card title="Лоти">
    <router-link :to="{ name: 'admin.lot.create' }" class="btn btn-primary">
      Створити
    </router-link>
    <div class="mt-3">
      <v-table
        :columns="columns"
        :data="lots"
        @remove-item="removeLot"
        removeable
      />
    </div>
  </card>
</template>

<script>
  import axios from 'axios'

  export default {
    middleware: 'auth',

    data: () => ({
      lots: [],
    }),

    computed: {
      columns: () => ([
        { field: 'name', label: 'Ім\'я' },
        { field: 'breed', label: 'Порода', prop: 'name' },
        { field: 'short_description', label: 'Короткий опис' },
      ])
    },

    async created() {
      const response = await axios.get('/api/lot')
      this.lots = response.data
    },

    methods: {
      async removeLot(lot) {
        const response = await axios.delete(`api/lot/${lot.id}`)
        this.lots = this.lots.filter(x => x.id !== lot.id)
      },
    },
  }
</script>

<style scoped>

</style>