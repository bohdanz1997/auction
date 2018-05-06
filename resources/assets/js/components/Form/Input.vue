<template>
  <input
    v-model="form[field]"
    :class="{ 'is-invalid': form.errors.has(field) }"
    class="form-control"
    :type="type"
    :name="field"
  >
</template>

<script>
  export default {
    name: "FormInput",
    props: ['form', 'type', 'field']
  }
</script>

<style scoped>

</style>