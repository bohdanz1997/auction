<template>
  <b-carousel
    id="carousel1"
    style="text-shadow: 1px 1px 2px #333;"
    controls
    indicators
    background="#ababab"
    :interval="4000"
    img-width="1024"
    img-height="480"
    v-model="slide"
    @sliding-start="onSlideStart"
    @sliding-end="onSlideEnd"
  >

    <b-carousel-slide
      v-for="image in images"
      :img-src="image"
      :key="image"
    />

  </b-carousel>
</template>

<script>
  export default {
    name: 'Slider',

    props: ['images'],

    data () {
      return {
        slide: 0,
        sliding: null
      }
    },

    methods: {
      onSlideStart (slide) {
        this.sliding = true
      },

      onSlideEnd (slide) {
        this.sliding = false
      }
    }
  }
</script>
