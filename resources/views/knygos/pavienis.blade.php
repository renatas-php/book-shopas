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
	<div class="search-box">
		<h3>
			<strong>Hire experts or be hired for any job, any time.</strong>
				<br>
			<span>Thousands of small businesses use <strong class="color">Hireo</strong> to turn their ideas into reality.</span>
		</h3>
		<div class="search-input">
			<input id="autocomplete-input" type="text" placeholder="Paieška">
			<button class="btn-search">Ieškoti</button>
		</div>		
	</div>
	<div class="book-single">
		<div class="book-cover">
			<img src="{{ asset($book->cover_img) }}">
		</div>
		<div class="book-info">
			<div class="main-info">
				<h1 class="title">{{ $book->title }}</h1>
				<div class="author-rating">
					<h2 class="author">{{ $book->author }}</h2>
					<div class="rating"></div>
				</div>
				<p class="genre">
                @foreach( $book->genre as $gen )
                {{ $gen }}
                @endforeach
                </p>
			</div>
			<div class="description">
				{{ $book->description }}
			</div>
		</div>
		
	</div>
</div>

</head>
<body>


</body>
</html>