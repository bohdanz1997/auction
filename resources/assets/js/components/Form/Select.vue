<template>
  <select
    v-model="form[field]"
    :class="{ 'is-invalid': form.errors.has(field) }"
    :name="field"
    class="form-control"
    type="text"
  >
    <slot />
  </select>
</template>

<script>
  export default {
    name: "FormSelect",
    props: ['form', 'field']
  }
</script>

<style scoped>

</style>