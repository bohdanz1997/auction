<template>
  <div class="lot">
    <card>
      <div class="lot-img">
        <router-link :to="{ name: 'lot.view', params: { id: auction.id } }">
          <img :src="lot.main_picture" alt="">
        </router-link>
      </div>
      <div class="lot-header">
        <router-link to="/lot/1">
          {{ lot.name }}
        </router-link>
      </div>
      <div class="lot-content">
        <div class="lot-description">
          <ul>
            <li>Порода: <span>{{ lot.breed.name }}</span></li>
            <li>Стать: <span>{{ lot.gender.name }}</span></li>
            <li>Сертифікат: <span>{{ lot.cert.name }}</span></li>
          </ul>
        </div>
        <div class="lot-date">
          {{ lot.start_datetime }}
        </div>
        <div class="lot-price">
          {{ auction.start_price }}
          <span class="currency">грн</span>
        </div>
      </div>
    </card>
  </div>
</template>

<script>
  import { mapGetters } from 'vuex'

  export default {
    props: ['auction', 'lot'],

    computed: {
      ...mapGetters({
        auctions: 'auction/items'
      }),
    }
  }
</script>

<style lang="scss">
  .lot {
    .card {
      &:hover {
        box-shadow: 0 1px 6px 2px rgba(0, 0, 0, 0.05);
      }
    }
    &-header {
      text-align: center;
      padding: 0.75rem;
      font-size: 22px;
    }
    &-img {
      display: flex;
      justify-content: center;
      max-height: 300px;
      img {
        height: 220px;
        max-width: 100%;
      }
    }
    &-content {
      padding: 1rem;
      text-align: center;
    }
    &-date {
      color: #ababab;
      font-size: 14px;
    }
    &-description {
      ul {
        padding-left: 0;
      }
      li {
        list-style-type: none;
        color: #969696;
        font-weight: bold;
        font-size: 13px;

        span {
          color: #000000;
        }
      }
    }
    &-price {
      font-weight: bold;
      font-size: 22px;
      .currency {
        font-size: 14px;
        color: #737373;
      }
    }
  }
</style>