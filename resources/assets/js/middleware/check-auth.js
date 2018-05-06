import store from '~/store'

export default async (to, from, next) => {
  if (!store.getters['auth/check'] && store.getters['auth/token']) {
    try {
      await Promise.all([
        store.dispatch('auth/fetchUser'),
        store.dispatch('auction/fetch'),
        store.dispatch('lot/fetch'),
        store.dispatch('bet/fetch')
      ])
    } catch (e) {
      console.log(e)
    }
  }

  next()
}
