<!doctype html>
<html lang="en">
<head>

<!-- Basic Page Needs
================================================== -->
<title>Knygynas</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS
================================================== -->
@include('includes.css')
<div class="container">
	@include('partials.topnav')
	<div class="top-box">
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
	<a href="{{ route('ideti-knyga') }}" class="post-book">Pasiūlyti knygą</a>
	</div>
	<div class="books-container">
		<!-- Book Item -->
        @foreach($books as $book)
		
		<div class="book-item">
		<a href="{{ route('knyga', $book->slug) }}">
			@if($book->lastWeek($book->created_at))
			<span class="this-week">Šios savaitės</span>
			@endif
			<img class="main-img" src="{{ asset($book->cover_img) }}">
			<div class="description">
				<h1 class="title">{{ $book->title }}</h1>
				@foreach($book->authors as $author)
				<p class="author">				
				{{ $author->name }}				
				</p>
				@endforeach
				<p class="price">{{ $book->price }}.00 Eur</p>
				<div class="button-section">
				<a href="" class="button-look">Plačiau</a>
				</div>
			</div>
		</a>
		</div>
        @endforeach
		<!-- Book Item End -->
	</div>
</div>

</head>
<body>


</body>
</html>