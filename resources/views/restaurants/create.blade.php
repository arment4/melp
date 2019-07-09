@extends('index')

@section('content')
	<h1 class="title">Edit Restaurant</h1>

	<form method="POST" action="/restaurants" >
    	@csrf
    	<div><input class="input" required type="text" name="id" placeholder="Restaurant id"></div>
    	<div><input class="input" required type="number" name="rating" placeholder="Restaurant rating"></div>
    	<div><input class="input" required type="text" name="name" placeholder="Restaurant name"></div>
    	<div><input class="input" required type="text" name="site" placeholder="Restaurant site"></div>
    	<div><input class="input" required type="email" name="email" placeholder="Restaurant email"></div>
    	<div><input class="input" required type="phone" name="phone" placeholder="Restaurant phone"></div>
    	<div><input class="input" required type="text" name="street" placeholder="Restaurant street"></div>
    	<div><input class="input" required type="text" name="city" placeholder="Restaurant city"></div>
    	<div><input class="input" required type="text" name="state" placeholder="Restaurant state"></div>
    	<div><input class="input" required type="decimal" name="lat" placeholder="Restaurant latitude"></div>
    	<div><input class="input" required type="decimal" name="lng" placeholder="Restaurant longitude"></div>
    	<div>
            <button class="button is-primary" type="submit" > save </button>
        </div>
    </form>


@endsection