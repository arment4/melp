<template>
  <div>
    <v-btn
      color="blue"
      class="white--text"
      @click="openModal">
      Agregar restaurante
      <v-icon right dark>add</v-icon>
    </v-btn>

    <v-data-table :items="restaurants">
    </v-data-table>
  </div>
</template>

<script>
export default {
  name: 'RestaurantsList',
  data () {
    return {
      restaurants: []
    }
  },
  async mounted () {
    const responseJson = await fetch('/api/restaurants')
    const response = await responseJson.json()
  },
  methods: {
    openModal () {
      this.bus.$emit('OPEN_MODAL')
    }
  }
}
</script>
