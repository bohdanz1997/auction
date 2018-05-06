<template>
  <input
    @change="onChange"
    :multiple="multiple ? 'multiple' : ''"
    :class="{ 'is-invalid': form.errors.has(field) }"
    :name="field"
    class="form-control"
    type="file"
  >
</template>

<script>
  export default {
    name: "FormFile",
    props: {
      form: {
        type: Object,
      },
      field: {
        type: String,
      },
      multiple: {
        type: Boolean,
        default: false,
      },
    },
    methods: {
      onChange(e) {
        this.$emit('change', e.target.files)
      },
    }
  }
</script>

<style scoped>

</style>