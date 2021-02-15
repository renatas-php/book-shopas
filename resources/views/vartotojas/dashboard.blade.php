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
            <a href="{{ route('ideti-knyga') }}" class="post-book">Pasiūlyti knygą</a>
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
			<h2>Pranešimai</h2>
			<!-- Single Note -->
			@foreach($userUnreadNotes as $note)
			<div class="single-note">                  
                  <span class="single-note-text">
                    Jūsų pasiūlyta knyga <a href="{{ route('knyga', auth()->user()->bookByIdForNotifications($note->data['book_id'])->slug) }}">{{ auth()->user()->bookByIdForNotifications($note->data['book_id'])->title }}</a> <strong>Patvirtinta </strong>
                  </span>
                  <!-- Buttons -->
                  <div class="single-note-actions">
                   <a href="{{ route('knyga', auth()->user()->bookByIdForNotifications($note->data['book_id'])->slug) }}" class="single-note-look-btn">Peržiūrėti </a>
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