<template>
  <div class="lot">
    <card>
      <div class="lot-img">
        <router-link to="/lot/1">
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
          120.00
          <span class="currency">грн</span>
        </div>
      </div>
    </card>
  </div>
</template>

<script>
  export default {
    name: "lot-item",
    props: ['lot'],
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
        max-height: 300px;
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
      li {
        list-style-type: none;
        font-size: 13px;
        color: #000000;
        span {
          color: #969696;
          font-weight: bold;
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