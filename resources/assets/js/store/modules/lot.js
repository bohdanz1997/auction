import axios from 'axios'
import { findAndUpdate, findById } from '../utils'

export const state = {
  items: []
}

export const getters = {
  items: state => state.items,
}

export const mutations = {
  'LOT_SET': (state, { items }) => {
    state.items = items
  },

  'LOT_ADD': (state, { item }) => {
    state.items = [...state.items, item]
  },

  'LOT_UPDATE': (state, { newItem }) => {
    state.items = state.items.map(findAndUpdate(newItem))
  },

  'LOT_REMOVE': (state, { id }) => {
    state.items = state.items.filter(item => !findById(id)(item))
  },
}

export const actions = {
  async fetch ({ commit }) {
    const { data } = await axios.get('/api/lot')
    commit('LOT_SET', { items: data })
  },

  add ({ commit }, payload) {
    commit('LOT_ADD', { item: payload })
  },

  set({ commit }, payload) {
    commit('LOT_SET', { items: payload })
  },

  update ({ commit }, payload) {
    commit('LOT_UPDATE', { newItem: payload })
  },

  async remove ({ commit }, payload) {
    const { data } = await axios.delete(`/api/lot/${payload}`)
    commit('LOT_REMOVE', { id: data })
  },
}
