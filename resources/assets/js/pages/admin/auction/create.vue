<template>
  <card title="Створення аукціону">
    <form enctype="multipart/form-data" @submit.prevent="update" @keydown="form.onKeydown($event)">
      <alert-success :form="form" message="Створено успішно"/>

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
          <v-button :loading="form.busy" type="success">Створити</v-button>
        </div>
      </div>
    </form>
  </card>
</template>

<script>
  import Form from 'vform'
  import { mapGetters, mapActions } from 'vuex'

  export default {
    data: () => ({
      form: new Form({
        start_datetime: null,
        end_datetime: null,
        end_plan_datetime: null,
        start_price: 0,
        step: 0,
        message: null,
        lot_id: null
      })
    }),

    computed: {
      ...mapGetters({
        lots: 'lot/items'
      })
    },

    methods: {
      ...mapActions({
        addAuction: 'auction/add',
        fetchLots: 'lot/fetch'
      }),

      async update () {
        const { data } = await this.form.post('/api/auction')

        this.addAuction(data)
        await this.fetchLots()

        this.$router.push({ name: 'admin.auction' })
      }
    }
  }
</script>

<style scoped>

</style>
