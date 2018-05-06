<template>
  <div class="row">
    <div class="col-lg-4 col-md-6" v-for="lot in lots">
      <lot-item :lot="lot" />
    </div>
  </div>
</template>

<script>
  import axios from 'axios'
  import LotItem from './lot-item'

  export default {
    components: { LotItem },

    metaInfo () {
      return { title: 'Головна' }
    },

    data: () => ({
      lots: [],
    }),

    async created() {
      const response = await axios.get('/api/lot')
      this.lots = response.data
    },

  }
</script>

<style lang="scss">
</style>