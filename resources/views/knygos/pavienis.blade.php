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
					<div class="user-rating">Knygos įvertinimas:
						@if(!empty($rating))
						@for ($i = 0; $i < $rating; $i++)
						<i class="fas fa-star"></i>
						@endfor
						@else
						nėra
						@endif
						({{ number_format($rating,1) }})
					</div>
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
		@foreach($book->comments as $comment)
		<div class="comment">
			<div class="comment-author">
				<img src="{{ asset('img/1.jpg') }}">
				<h2>{{ $comment->user->email }}</h2>
			</div>
			<div class="user-rating">
			@for ($i = 0; $i < $comment->rating; $i++)
			<i class="fas fa-star"></i>
			@endfor
			</div>
			<div class="actual-comment">
			<p>{{ $comment->comment }}<span>{{ $comment->created_at }}</span></p>
			</div>
		</div>
		@endforeach
		<form class="comments" action="{{ route('komentuoti') }}" method="POST" id="comment">
		@csrf
		<div class="rating-div">
						<strong>Įvertinkite</strong>
						<div class="rate">
						<input type="radio" id="star5" name="rating" value="5" />
						<label for="star5" title="text">5 stars</label>
						<input type="radio" id="star4" name="rating" value="4" />
						<label for="star4" title="text">4 stars</label>
						<input type="radio" id="star3" name="rating" value="3" />
						<label for="star3" title="text">3 stars</label>
						<input type="radio" id="star2" name="rating" value="2" />
						<label for="star2" title="text">2 stars</label>
						<input type="radio" id="star1" name="rating" value="1" />
						<label for="star1" title="text">1 star</label>
						</div>
						<div class="clearfix"></div>
					</div>
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