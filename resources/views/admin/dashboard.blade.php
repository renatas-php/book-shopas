<!doctype html>
<html lang="en">
<head>

<!-- Basic Page Needs
================================================== -->
<title>Hireo</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- CSS
================================================== -->

@include('includes.css')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@include('partials.topnav')



</head>

<body>

<div class="container">
	
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
				<p>{{ $bookObject->countBooks(true) }}</p>
			</div>

			<div class="some-element">
				<h2>Nepatvirtintos knygos</h2>
				<p>{{ $bookObject->countBooks(false) }}</p>
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
						Knygos pavadinimas: <strong> {{ $book->title }} </strong>
						</span>
						<span class="single-note-text">
						Įkėlė: <strong>{{ $book->user->email }} </strong>
						</span>
						<span class="single-note-text">
						Kaina: <strong> 200.00 Eur </strong>
						</span>
						<span class="single-note-text">
						Įkėlimo data: <strong> 2012-10-12</strong>
						</span>
						<div class="single-note-actions">
							@if($book->approved === 1)
							<button type="" class="single-note-look-btn turn-off">Išjungti </button>
							@else
							<form class="approve" action="{{ route('patvirtinti-knyga', $book->id) }}" method="POST" book="{{ $book->id }}">
							@csrf 
							@method('PUT')
							<button type="submit" class="approve-button">Patvirtinti </button>
							</form>
							@endif
							<a href="{{ route('redaguoti-knyga', $book->id) }}" class="single-note-look-btn">Redagouti </a>
						</div>
					</div>
				</div>
			</div>
			@endforeach
			<!-- Single Note End -->
			
		</div>		
	</div>
</div>

<script>

$(document).ready(function() {
	$('.approve-button').on("click", function() {
		$(this).hide();
	}); 

		$('.approve').on("submit", function(e) {
			e.preventDefault();    

			let book = $(this).attr('book');        
			console.log(book);

			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			$.ajax({

				url: "patvirtinti/" + book,
				method: 'PUT',
				data: {
					book:book
				},
				success: function(response)
					{    
					console.log('kkkkk');
					}

			});
       

    	});
})

</script>

</body>

</html>
