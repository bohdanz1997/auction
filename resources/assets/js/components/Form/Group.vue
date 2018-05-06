<template>
  <div class="form-group row">
    <label class="col-md-3 col-form-label text-md-right">{{ label }}</label>
    <div class="col-md-7">
      <slot />
    </div>
  </div>
</template>

<script>
  export default {
    name: "FormGroup",
    props: ['label'],
  }
</script>

<style scoped>

</style>