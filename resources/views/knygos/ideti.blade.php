<!doctype html>
<html lang="en">
<head>

<!-- Basic Page Needs
================================================== -->
<title>Hireo</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS
================================================== -->
@include('includes.css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">






<div class="container">
	<div class="main-nav">
		<ul class="">
			<li><a href="" class="nav-link">Nuoroda</a></li>
			<li><a href="" class="nav-link">Nuoroda</a></li>
			<li><a href="" class="nav-link">Nuoroda</a></li>
			<li><a href="" class="nav-link">Nuoroda</a></li>
			<li><a href="" class="nav-link login">Prisijungti</a></li>
			<li><a href="" class=""><i class="fas fa-user"></i></a></li>
		</ul>
	</div>
	<div class="dashboard-container">
		<div class="dashboard-top">
			<h1 class="title">Labas, Renatai!</h1>
			<p class="sub-title">Turite nereikalingų knygų, parduokite jas čia.</p>		
		</div>
			@if ($errors->any())
				<div class="alert alert-danger">
					<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
					</ul>
				</div>
			@endif
		<div class="post-book">
			<form action="{{ isset($book) ? route('atnaujinti-knyga', $book) : route('ideti') }}" method="POST" enctype="multipart/form-data">
            @csrf
			@if(isset($book))
			@method('PUT')
			@endif
			  <div class="form-group">
			    <label for="exampleFormControlInput1">Knygos pavadinimas</label>
			    <input type="text" name="title" class="form-control" placeholder="" value="{{ isset($book) ? $book->title : '' }}">
			  </div>
			  <div class="form-group">
			    <label for="exampleFormControlInput1">Autorius</label>
			    <select name="author[]" class="form-control" id="exampleFormControlSelect1" multiple>
				 @foreach($authors as $author)
			      <option value="{{ $author->id }}">{{ $author->name }}</option>
			     @endforeach
			    </select>
			  </div>
			  <div class="form-group">
			    <label for="exampleFormControlSelect1">Žanras</label>
			    <select name="genre[]" class="form-control" id="exampleFormControlSelect1" multiple>
				 @foreach($genres as $genre)
			      <option value="{{ $genre->id }}">{{ $genre->name }}</option>
			     @endforeach
			    </select>
			  </div>
			   <div class="form-group">
			    <label for="exampleFormControlInput1">Kaina</label>
			    <input type="text" name="price" class="form-control" placeholder="" value="{{ isset($book) ? $book->price : '' }}">
			  </div>
			  @if(isset($book))
			  <div class="form-group">
			    <label for="exampleFormControlInput1">Nuolaida</label>
			    <input type="text" name="discount" class="form-control" placeholder="" value="{{ isset($book) ? $book->discount : '' }}">
			  </div>
			  @endif
			  <div class="form-group">
			    <label for="exampleFormControlFile1">Viršelio nuotrauka</label>
			    <input name="cover_img" type="file" class="form-control-file" id="cover_img">
				<img src="{{ isset($book) ? $book->cover_img : '' }}">
			  </div>
			  <div class="form-group">
			    <label for="exampleFormControlTextarea1">Aprašymas</label>
			    <textarea class="form-control" name="description" rows="3">{{ isset($book) ? $book->description : '' }}</textarea>
			  </div>
			  <div class="form-group">
			    <button type="submit" class="btn-post-book">Išsaugoti</button>
			  </div>
			</form>			
		</div>

	</div>
</div>

</head>
<body>


</body>
</html>