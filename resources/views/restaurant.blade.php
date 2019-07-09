@extends('index')

@section('content')
	<h1 class="title">Restaurants</h1>

	@foreach($restaurants as $restaurant)

		<li>{{ $restaurant->id }}</li>

	@endforeach


@endsection
