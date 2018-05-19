<template>
  <div>
    <div class="top-right links">
      <template v-if="authenticated">
        <router-link :to="{ name: 'home' }">
          {{ $t('home') }}
        </router-link>
      </template>
      <template v-else>
        <router-link :to="{ name: 'login' }">
          {{ $t('login') }}
        </router-link>
        <router-link :to="{ name: 'register' }">
          {{ $t('register') }}
        </router-link>
      </template>
    </div>

    <div class="text-center">
      <div class="title mb-4">
        {{ title }}
      </div>

      <div>
        <img src="/images/pic.jpg" alt="">
      </div>
      <div class="text-center">
        <p>
          Привіт! На нашому сайті ви можете взяти участь у аукціонах по продажу домашніх улюбленців
          та придбати собі одного, який вам сподобається. Щоб почати торги увійдіть або створіть ноий акаунт
        </p>
        <b-btn :to="{ name: 'register' }">Увійти</b-btn>
        <b-btn :to="{ name: 'login' }">Зареєструватись</b-btn>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'

export default {
  layout: 'basic',

  metaInfo () {
    return { title: this.$t('home') }
  },

  data: () => ({
    title: window.config.appName
  }),

  computed: mapGetters({
    authenticated: 'auth/check'
  })
}
</script>

<style scoped>
.top-right {
  position: absolute;
  right: 10px;
  top: 18px;
}

.title {
  font-size: 85px;
}
</style>
