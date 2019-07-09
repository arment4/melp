<template>
  <v-layout row justify-center>
    <v-dialog v-model="dialog" persistent max-width="600px">

    <p class="display-1">Añade un restaurante</p>

    <hr>
    <br>

    <v-layout align-center justify-center row fill-height>
      <v-text-field placeholder="Nombre del restaurante" prepend-inner-icon="business"/>
      <div class="text-xs-center">
        Raiting
        <v-rating v-model="rating"></v-rating>
      </div>
    </v-layout>

    <v-text-field placeholder="Sitio web" prepend-inner-icon="link"/>

    <v-layout align-center justify-center row fill-height>
      <v-text-field type="email" placeholder="Restaurant email" prepend-inner-icon="email"/>
      <v-text-field mask="###  ###  ####" type="phone" placeholder="Restaurant phone" prepend-inner-icon="phone"/>
    </v-layout>

    <v-text-field placeholder="Calle" prepend-inner-icon="rate_review"/>

    <v-text-field placeholder="Estado" prepend-inner-icon="domain"/>
    <v-text-field placeholder="Ciudad" prepend-inner-icon="location_city"/>

    <v-layout align-center justify-center row fill-height>
      <v-text-field placeholder="Latitude" prepend-inner-icon="swap_horiz"/>
      <v-text-field placeholder="Longitude" prepend-inner-icon="swap_vert"/>
    </v-layout>

    <v-btn flat small color="red">Cancelar</v-btn>
    <v-btn color="blue">Guardar</v-btn>
    </v-dialog>
  </v-layout>
</template>

<script>
export default {
  name: 'addRestaurantModal',
  data () {
    return {
      dialog: false,
      rating: 5
    }
  },
  created () {
    this.bus.$on('OPEN_MODAL', () => {
      this.dialog = true
    })
  },
  async mounted () {

  },
  methods: {
    openModal () {
    }
  }
}
</script>


<style lang="scss">
  .v-dialog.v-dialog--active.v-dialog--persistent {
    background-color: white !important;
    padding: 15px;
  }
</style>
