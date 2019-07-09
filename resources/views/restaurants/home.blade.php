@extends('index')

@section('content')
  <v-app id="app">

    <h1 class="display-3">Restaurantes</h1>

    <restaurants-list></restaurants-list>
    <add-restaurant-modal></add-restaurant-modal>
  </v-app>
@endsection
