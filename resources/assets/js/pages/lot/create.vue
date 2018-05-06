<template>
  <card title="Створення лоту">
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

      <form-group label="Головна картинка">
        <form-file @change="selectMainPicture" :form="form" field="main_picture" />
        <has-error :form="form" field="main_picture"/>
      </form-group>

      <form-group label="Картинки">
        <form-file @change="selectPictures" multiple :form="form" field="pictures" />
        <has-error :form="form" field="pictures"/>
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
  import objectToFormData from '../../objectToFormData'

  export default {
    name: "create",
    data: () => ({
      form: new Form({
        name: '',
        birth_date: '',
        description: '',
        short_description: '',
        main_picture: null,
        pictures: [],
        start_datetime: '',
        end_datetime: '',
        breed_id: '',
        gender_id: '',
        cert_id: '',
      })
    }),
    methods: {
      selectMainPicture(files) {
        this.form.main_picture = files[0]
      },
      selectPictures(files) {
        this.form.pictures = files
      },
      async update () {
        await this.form.submit('post', '/api/lot', {
          transformRequest: [data => objectToFormData(data)],
        })
        this.$router.push({ name: 'admin.lot' })
      }
    }
  }
</script>

<style scoped>

</style>