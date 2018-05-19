<template>
  <card title="Редагування аукціону">
    <form enctype="multipart/form-data" @submit.prevent="update" @keydown="form.onKeydown($event)">
      <form-group label="Лот">
        <form-select :form="form" field="lot_id">
          <option v-for="lot in lots" :value="lot.id">{{ lot.name }}</option>
        </form-select>
        <has-error :form="form" field="lot_id"/>
      </form-group>

      <form-group label="Дата початку">
        <form-input type="date" :form="form" field="start_datetime" />
        <has-error :form="form" field="start_datetime"/>
      </form-group>

      <form-group label="Дата завершення планована">
        <form-input type="date" :form="form" field="end_plan_datetime" />
        <has-error :form="form" field="end_plan_datetime"/>
      </form-group>

      <form-group label="Початкова ціна">
        <form-input type="number" :form="form" field="start_price" />
        <has-error :form="form" field="start_price"/>
      </form-group>

      <form-group label="Крок">
        <form-input type="number" :form="form" field="step" />
        <has-error :form="form" field="step"/>
      </form-group>

      <form-group label="Повідомлення">
        <form-text-area :form="form" field="message" />
        <has-error :form="form" field="message"/>
      </form-group>

      <div class="form-group row">
        <div class="col-md-9 ml-md-auto">
          <v-button :loading="form.busy" type="success">Зберегти</v-button>
        </div>
      </div>
    </form>
  </card>
</template>

<script>
  import Form from 'vform'
  import { mapGetters, mapActions } from 'vuex'
  import { findItemById } from "../../../store/utils"

  export default {
    props: ['id'],

    data: () => ({
      form: null,
    }),

    mounted () {
      this.form = new Form(findItemById(this.id)(this.auctions))
    },

    computed: {
      ...mapGetters({
        auctions: 'auction/items',
        lots: 'lot/items'
      })
    },

    methods: {
      ...mapActions({
        fetchLots: 'lot/fetch',
        updateAuction: 'auction/update',
      }),

      async update () {
        const { data } = await this.form.put(`/api/auction/${this.id}`)

        this.updateAuction(data)
        await this.fetchLots()

        this.$router.push({ name: 'admin.auction' })
      }
    }
  }
</script>

<style scoped>

</style>
