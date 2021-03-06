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
@livewireStyles
@include('includes.css')
@include('partials.topnav')
</head>
<body>
<div class="container">
	
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
<div>
	<div class="book-single">
		<div class="book-cover">
			@if($book->discount)
			<span class="discount">{{ ($book->discount / $book->price) * 100 }}%</span>
			@endif
			<img src="{{ asset($book->cover_img) }}">
		</div>
		<div class="book-info">
			<div class="main-info">
				<h1 class="title">{{ $book->title }}
				@livewire('rating', ['book' => $book->id])
				</h1>
				<div class="author-rating">
				@foreach($book->authors as $author)				
				<h2 class="author">{{ $author->name }}</h2>				
				@endforeach					
					<div class="rating"></div>
				</div>
				@foreach( $book->genres as $genre )
				<p class="genre">
                {{ $genre->name }}
				</p>
                @endforeach
                
			</div>
			<div class="description">
				{{ $book->description }}
			</div>
			<a href="{{ route('pranesimas', $book->slug) }}" class="report-book">Pranešti apie knygą!</a>
		</div>
	</div>

		<div class="comment-section">
		<h1 class="title">Komentarai</h1>
				@livewire('comments', ['book' => $book->id])
				@livewire('add-comment', ['book' => $book->id])
		</div>
		
	</div>
</div>

@livewireScripts
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>