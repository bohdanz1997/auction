<template>
  <div class="wrapper">
    <div class="main-layout">
      <navbar/>

      <div class="container mt-4">
        <child/>
      </div>
    </div>
    <div class="footer">
      <div class="site-name">Аукціон</div>
      <div class="copy">Всі права захищені</div>
      <div class="clearfix"></div>
    </div>
  </div>
</template>

<script>
import Navbar from '~/components/Navbar'

export default {
  name: 'MainLayout',

  components: {
    Navbar
  }
}
</script>

<style lang="sass">
  .wrapper
    display: flex
    flex-direction: column
    justify-content: space-between
    height: 100vh

  .footer
    bottom: 0
    background-color: #eee
    margin-top: 2rem
    padding: 1.5rem
    .site-name
      float: left
    .copy
      float: right
</style>
