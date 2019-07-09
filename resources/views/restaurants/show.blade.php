@extends('index')

@section('content')
	<h1 class="title">Restaurants</h1>

	<div>
		<form method="POST" action="/restaurants/upload" enctype="multipart/form-data">
			 @csrf
			<div>
			   <label for="file">Choose file to upload</label>
			   <input type="file" id="file" name="file">
			</div>
			<div>
			   <button>Upload</button>
			</div>
		</form>
	</div>
	<ul>
		@foreach($restaurants as $restaurant)
			<li>
				<a href="/restaurants/{{ $restaurant->id }}/edit">
					<label>id ={{ $restaurant->id  }}</label>
					<label>Name = {{ $restaurant->name  }}</label>
					<label>Email ={{ $restaurant->email  }}</label>
				</a>
			</li>
		@endforeach
	</ul>


@endsection
