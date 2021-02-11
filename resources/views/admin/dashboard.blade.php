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


<div class="container">
	@include('partials.topnav')
	<div class="dashboard-container">
		<div class="dashboard-top">
        <div class="display-flex align-items-center justify-space-btw">
        <div class="left">
			<h1 class="title">Labas, {{ auth()->user()->email }}!</h1>
			<p class="sub-title">Malonu Jus vėl matyti prisijungus.</p>
            </div>
            <div class="right">
            <a href="" class="post-book">Patvirtintos knygos</a>
            </div>
        </div>
		<div class="elements">
			<div class="some-element">
				<h2>Aktyvių knygų</h2>
				<p>2</p>
			</div>

			<div class="some-element">
				<h2>Nepatvirtintos knygos</h2>
				<p>2</p>
			</div>
		</div>
		</div>
		<div class="notes">
			<h2>Pasiūlytos, bet dar nepatvirtintos knygos</h2>
			<!-- Single Note -->
			@foreach($books as $book)
			<div class="single-note">
				<div class="display-flex">
						<img class="book-cover" src="img/1.jpg">
					<div class="display-flex flex-column padding-30">              
						<span class="single-note-text">
						<strong>Knygos pavadinimas:</strong> <a href="#">Karo Menas</a>
						</span>
						<span class="single-note-text">
						<strong>Įkėlė:</strong> renatas.kdfjdsk
						</span>
						<span class="single-note-text">
						<strong>Kaina:</strong> 200.00 Eur
						</span>
						<span class="single-note-text">
						<strong>Įkėlimo data:</strong> 2012-10-12
						</span>
						<div class="single-note-actions">
							<a href="" class="single-note-look-btn">Patvirtinti </a>
							<a href="" class="single-note-look-btn">Atmesti </a>
						</div>
					</div>
				</div>
			</div>
			@endforeach
			<!-- Single Note End -->
			
		</div>		
	</div>
</div>

</head>
<body>


</body>
</html>