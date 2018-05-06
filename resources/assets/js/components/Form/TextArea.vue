<template>
  <textarea
    class="form-control"
    v-model="form[field]"
    :class="{ 'is-invalid': form.errors.has(field) }"
    :rows="rows"
    :name="field"
  >
  </textarea>

</template>

<script>
  export default {
    name: "FormTextArea",
    props: {
      form: {
        type: Object,
      },
      field: {
        type: String,
      },
      rows: {
        type: Number,
        default: 5,
      },
    },
  }
</script>

<style scoped>

</style>