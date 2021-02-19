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
            <a href="{{ route('ideti-knyga') }}" class="post-book">Pasiūlyti knygą</a>
            </div>
        </div>
		<div class="elements">
		<a class="some-element" href="{{ route('mano-knygos') }}">
			<div class="">
				<h2>Pasiūlyta knygų</h2>
				<p>{{ $myBooks->count() }}</p>
			</div>
		</a>

			<div class="some-element">
				<h2>Patvirtintos knygos</h2>
				<p></p>
			</div>
		</div>
		</div>
		<div class="notes">
			<h2>Pranešimai</h2>
			<!-- Single Note -->
			@forelse($userUnreadNotes as $note)
			<div class="single-note">                  
                  <span class="single-note-text">
                    Jūsų pasiūlyta knyga <a href="{{ route('knyga', auth()->user()->bookByIdForNotifications($note->data['book_id'])->slug) }}">{{ auth()->user()->bookByIdForNotifications($note->data['book_id'])->title }}</a> <strong>Patvirtinta </strong>
                  </span>
                  <!-- Buttons -->
                  <div class="single-note-actions">
                   <a href="{{ route('knyga', auth()->user()->bookByIdForNotifications($note->data['book_id'])->slug) }}" class="single-note-look-btn">Peržiūrėti </a>
                  </div>                  
			</div>
			@empty
			<div class="single-note">                  
                  <span class="single-note-text">
                    Pranešimų nėra
                  </span>                 
			</div>
			@endforelse
			<!-- Single Note End -->
		</div>
		<div class="notes">
		<!-- My Books Item -->
		<h2>Pasiūlytos knygos</h2>
		@forelse($myBooks as $myBook)
		
		<div class="single-note">
			<div class="display-flex">
						<img class="book-cover" src="img/1.jpg">
					<div class="display-flex flex-column padding-30">              
						<span class="single-note-text">
						Knygos pavadinimas: <strong> {{ $myBook->title }} </strong>
						</span>
						<span class="single-note-text">
						Įkėlė: <strong>{{ $myBook->user->email }} </strong>
						</span>
						<span class="single-note-text">
						Kaina: <strong> {{ $myBook->price }} </strong>
						</span>
						<span class="single-note-text">
						Įkėlimo data: <strong> {{ $myBook->created_at }}</strong>
						</span>
						<div class="single-note-actions">
							@if($myBook->approved !== 1)
							<a href="{{ route('redaguoti-knyga', $myBook->slug) }}" class="single-note-look-btn">Redagouti </a>
							@else
							<button type="button" class="book-approved-user">Knyga patvirtinta</button>
							@endif
						</div>
					</div>
				</div>
			</div>
			@empty

			@endforelse
			</div>
	</div>
</div>

</head>
<body>


</body>
</html>