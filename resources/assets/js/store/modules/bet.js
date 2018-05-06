import axios from 'axios'
import { findAndUpdate, findById } from '../utils'

export const state = {
  items: []
}

export const getters = {
  items: state => state.items,
}

export const mutations = {
  'BET_SET': (state, { items }) => {
    state.items = items
  },

  'BET_ADD': (state, { item }) => {
    state.items = [...state.items, item]
  },

  'BET_UPDATE': (state, { newItem }) => {
    state.items = state.items.map(findAndUpdate(newItem))
  },

  'BET_REMOVE': (state, { id }) => {
    state.items = state.items.filter(item => !findById(id)(item))
  },
}

export const actions = {
  async fetch ({ commit }) {
    const { data } = await axios.get('/api/bet')
    commit('BET_SET', { items: data })
  },

  add ({ commit }, payload) {
    commit('BET_ADD', { item: payload })
  },

  update ({ commit }, payload) {
    commit('BET_UPDATE', { newItem: payload })
  },

  async remove ({ commit }, payload) {
    const { data } = await axios.delete(`/api/bet/${payload}`)
    commit('BET_REMOVE', { id: data })
  },
}
