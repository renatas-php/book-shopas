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
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">

@include('includes.css')
@include('partials.topnav')

<div class="container">
<div class="dashboard-container">
		<div class="dashboard-top">
			<p class="sub-title">Pridėkite autorių</p>		
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
			<form action="{{ isset($author) ? route('author-update', $author->id) : route('author-store') }}" method="POST">
            @csrf
            @if(isset($author))
            @method('PUT')
            @endif		
			  <div class="form-group">
			    <label for="exampleFormControlTextarea1">Autoriaus pavadinimas</label>
			    <input class="form-control" name="name" value="{{ isset($author) ? $author->name : '' }}" rows="3">
              </div>
			  <div class="form-group">
			    <button type="submit" class="btn-post-book">Siųsti</button>
			  </div>
			</form>			
		</div>

	</div>
</div>

</head>
<body>


</body>
</html>