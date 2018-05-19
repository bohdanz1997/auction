import axios from 'axios'
import { findAndUpdate, findById } from '../utils'

export const state = {
  items: []
}

export const getters = {
  items: state => state.items,
}

export const mutations = {
  'AUCTION_SET': (state, { items }) => {
    state.items = items
  },

  'AUCTION_ADD': (state, { item }) => {
    state.items = [...state.items, item]
  },

  'AUCTION_UPDATE': (state, { newItem }) => {
    state.items = state.items.map(findAndUpdate(newItem))
  },

  'AUCTION_REMOVE': (state, { id }) => {
    state.items = state.items.filter(item => !findById(id)(item))
  },
}

export const actions = {
  async fetch ({ commit }) {
    const { data } = await axios.get('/api/auction')
    commit('AUCTION_SET', { items: data })
  },

  async add ({ commit }, payload) {
    commit('AUCTION_ADD', { item: payload })
  },

  async update ({ commit }, payload) {
    commit('AUCTION_UPDATE', { newItem: payload })
  },

  async remove ({ commit }, payload) {
    const { data } = await axios.delete(`/api/auction/${payload}`)
    commit('AUCTION_REMOVE', { id: data.id })
  },
}
