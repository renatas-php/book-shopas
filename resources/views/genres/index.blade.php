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

@include('partials.topnav')

<div class="container">
	<div class="dashboard-container">
		<div class="dashboard-top">
        <div class="display-flex align-items-center justify-space-btw">
        <div class="left">
			<h1 class="title">Labas, {{ auth()->user()->email }}!</h1>
			<p class="sub-title">Malonu Jus vėl matyti prisijungus.</p>
            </div>
            <div class="right">
            <a href="{{ route('ideti-zanra') }}" class="post-book">Pridėti žanrą</a>
            </div>
        </div>
		<div class="elements">
		<a class="some-element" href="{{ route('mano-knygos') }}">
			<div class="">
				<h2>Pasiūlyta knygų</h2>
				<p>2</p>
			</div>
		</a>

			<div class="some-element">
				<h2>Patvirtintos knygos</h2>
				<p>2</p>
			</div>
		</div>
		</div>
		<div class="notes">
			<h2>Autoriai</h2>
			<!-- Single Author -->
			@foreach($genres as $genre)
			<div class="single-note flex-for-authors">                  
                  <span class="single-note-text">
                    Žanro pavadinimas: <strong>{{ $genre->name }}</strong>
					<span class="number">{{ $genre->books->count() }} </span>
                  </span>
                  <!-- Buttons -->
                  <div class="single-note-actions">
                   <a href="{{ route('genre-edit', $genre->id) }}" class="single-note-look-btn">Redagouti </a>
                  </div>                  
			</div>
			@endforeach
			<!-- Single Author End -->
		</div>		
	</div>
</div>

</head>
<body>


</body>
</html>