<template>
  <card title="Редагування лоту">
    <form enctype="multipart/form-data" @submit.prevent="update" @keydown="form.onKeydown($event)">
      <alert-success :form="form" :message="$t('info_updated')"/>

      <form-group label="Імя">
        <form-input type="text" :form="form" field="name" />
        <has-error :form="form" field="name"/>
      </form-group>

      <form-group label="Дата народження">
        <form-input type="date" :form="form" field="birth_date" />
        <has-error :form="form" field="birth_date"/>
      </form-group>

      <form-group label="Порода">
        <form-select :form="form" field="breed_id">
          <option value="1">Булььдог</option>
          <option value="2">Пудель</option>
        </form-select>
        <has-error :form="form" field="breed_id"/>
      </form-group>

      <form-group label="Стать">
        <form-select :form="form" field="gender_id">
          <option value="1">Чол</option>
          <option value="2">Жін</option>
        </form-select>
        <has-error :form="form" field="gender_id"/>
      </form-group>

      <form-group label="Сертифікат">
        <form-select :form="form" field="cert_id">
          <option value="1">Породистий</option>
          <option value="2">Неородистий</option>
        </form-select>
        <has-error :form="form" field="cert_id"/>
      </form-group>

      <form-group label="Короткий опис">
        <form-input type="text" :form="form" field="short_description" />
        <has-error :form="form" field="short_description"/>
      </form-group>

      <form-group label="Повний опис">
        <form-text-area :form="form" field="description" />
        <has-error :form="form" field="description"/>
      </form-group>

      <div class="form-group row">
        <div class="col-md-9 ml-md-auto">
          <v-button :loading="form.busy" type="success">Редагувати</v-button>
        </div>
      </div>
    </form>
  </card>
</template>

<script>
  import Form from 'vform'
  import { mapActions, mapGetters } from 'vuex'
  import { findItemById } from "../../../store/utils"

  export default {
    props: ['id'],

    data: () => ({
      form: null,
    }),

    created () {
      this.form = new Form(findItemById(this.id)(this.lots))
    },

    computed: {
      ...mapGetters({
        lots: 'lot/items'
      })
    },

    methods: {
      ...mapActions({
        updateLot: 'lot/update'
      }),

      async update () {
        try {
          const { data } = await this.form.put(`/api/lot/${this.id}`)
          this.updateLot(data)
          this.$router.push({ name: 'admin.lot' })
        } catch (err) {}
      }
    }
  }
</script>

<style scoped>

</style>
