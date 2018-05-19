import * as R from 'ramda'

export const findItemById = id => R.find(findById(id))

export const findById = id => item => item.id === id
export const updateItem = newItem => oldItem => ({
  ...oldItem,
  ...newItem,
})
export const findAndUpdate = newItem => item => (
  findById(newItem.id)(item) ? updateItem(newItem)(item) : item
)
