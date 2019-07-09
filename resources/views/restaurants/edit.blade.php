@extends('index')

@section('content')
	<h1 class="title">Edit Restaurant</h1>

	<form method="POST" action="/restaurants/{{$restaurant->id}}" >
        @method('PATCH')
        @csrf
    	<div><input class="input"  value="{{$restaurant->id }}" required type="text" name="id" placeholder="Restaurant id"></div>
    	<div><input class="input"  value="{{$restaurant->rating }}" required type="number" name="rating" placeholder="Restaurant rating"></div>
    	<div><input class="input"  value="{{$restaurant->name }}" required type="text" name="name" placeholder="Restaurant name"></div>
    	<div><input class="input"  value="{{$restaurant->site }}" required type="text" name="site" placeholder="Restaurant site"></div>
    	<div><input class="input"  value="{{$restaurant->email }}" required type="email" name="email" placeholder="Restaurant email"></div>
    	<div><input class="input"  value="{{$restaurant->phone }}" required type="phone" name="phone" placeholder="Restaurant phone"></div>
    	<div><input class="input"  value="{{$restaurant->street }}" required type="text" name="street" placeholder="Restaurant street"></div>
    	<div><input class="input"  value="{{$restaurant->city }}" required type="text" name="city" placeholder="Restaurant city"></div>
    	<div><input class="input"  value="{{$restaurant->state }}" required type="text" name="state" placeholder="Restaurant state"></div>
    	<div><input class="input"  value="{{$restaurant->lat }}" required type="decimal" name="lat" placeholder="Restaurant latitude"></div>
    	<div><input class="input"  value="{{$restaurant->lng }}" required type="decimal" name="lng" placeholder="Restaurant longitude"></div>
        <button class="button is-primary" type="submit" > Edit</button>
    </form>

    <form method="POST" action="/restaurants/{{$restaurant->id}}" >
         @method('DELETE')
         @csrf
        <button class="button" type="submit">Delete</button>
    </form>


@endsection