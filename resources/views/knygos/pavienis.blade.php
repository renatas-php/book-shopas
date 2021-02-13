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
<div>
	<div class="book-single">
		<div class="book-cover">
			<img src="{{ asset($book->cover_img) }}">
		</div>
		<div class="book-info">
			<div class="main-info">
				<h1 class="title">{{ $book->title }}</h1>
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
			<a href="{{ route('pranesimas', $book->id) }}" class="report-book">Pranešti apie knygą!</a>
		</div>
	</div>

		<div class="comment-section">
		<h1 class="title">Komentarai</h1>
		@foreach($comments as $comment)
		<div class="comment">
			<div class="comment-author">
				<img src="{{ asset('img/1.jpg') }}">
				<h2>{{ $comment->user->email }}</h2>
			</div>
			<div class="actual-comment">
			<p>{{ $comment->comment }}<span>{{ $comment->created_at }}</span></p>
			</div>
		</div>
		@endforeach
		<form class="comments" action="{{ route('komentuoti') }}" method="POST" id="comment">
		@csrf
		<textarea class="comment-area" name="comment"></textarea>
		<input type="hidden" name="book_id"  value="{{ $book->id }}">
		<button class="comment-btn" form="comment">Komentuoti</button>
		</form>
		</div>
		
	</div>
</div>

</head>
<body>


</body>
</html>