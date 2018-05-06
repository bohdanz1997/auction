<template>
  <table class="table table-hover">
    <thead>
      <tr>
        <th v-for="column in columns">
          {{ column.label }}
        </th>
        <th v-if="canDoOperations">
          Операції
        </th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="item in data">
        <td v-for="column in columns">
          {{ getItemData(column, item) }}
        </td>
        <td v-show="canDoOperations">
          <fa v-if="editable" @click="edit(item)" icon="pencil-alt" />
          <fa v-if="removeable" @click="remove(item)" icon="trash-alt" />
        </td>
      </tr>
    </tbody>
  </table>
</template>

<script>
  export default {
    name: "VTable",
    props: {
      columns: {
        type: Array,
        default: [],
      },
      data: {
        type: Array,
        default: [],
      },
      editable: {
        type: Boolean,
        default: false,
      },
      removeable: {
        type: Boolean,
        default: false,
      },
    },
    computed: {
      canDoOperations() {
        return this.editable || this.removeable
      }
    },
    methods: {
      edit(item) {
        this.$emit('edit-item', item)
      },

      remove(item) {
        this.$emit('remove-item', item)
      },

      getItemData(column, item) {
        if (column.template) {
          return column.template
        }

        const field = item[column.field]
        if (column.prop) {
          return field[column.prop]
        }

        return field
      }
    },
  }
</script>

<style scoped>

</style>