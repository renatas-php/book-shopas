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
<link rel="stylesheet" href="css/style.css">
<div class="container">
	<div class="main-nav">
		<ul class="">
			<li><a href="" class="nav-link">Nuoroda</a></li>
			<li><a href="" class="nav-link">Nuoroda</a></li>
			<li><a href="" class="nav-link">Nuoroda</a></li>
			<li><a href="" class="nav-link">Nuoroda</a></li>
			<li><a href="{{ route('login') }}" class="nav-link login">Prisijungti</a></li>
		</ul>
	</div>
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
			<img class="main-img" src="img/1.jpg">
			<div class="description">
				<h1 class="title">Vandamo biografija</h1>
				<p class="author">Haris Poteris</p>
				<p class="price">21.00 Eur</p>
				<div class="button-section">
				<a href="" class="button-look">Placiau</a>
				</div>
			</div>
		</div>
        @endforeach
		<!-- Book Item End -->
		<!-- Book Item -->
		<div class="book-item">
			<img class="main-img" src="img/1.jpg">
			<div class="description">
				<h1 class="title">Vandamo biografija</h1>
				<p class="author">Haris Poteris</p>
				<p class="price">21.00 Eur</p>
				<div class="button-section">
				<a href="" class="button-look">Placiau</a>
				</div>
			</div>
		</div>
		<!-- Book Item End -->
		<!-- Book Item -->
		<div class="book-item">
			<img class="main-img" src="img/1.jpg">
			<div class="description">
				<h1 class="title">Vandamo biografija</h1>
				<p class="author">Haris Poteris</p>
				<p class="price">21.00 Eur</p>
				<div class="button-section">
				<a href="" class="button-look">Placiau</a>
				</div>
			</div>
		</div>
		<!-- Book Item End -->
		<!-- Book Item -->
		<div class="book-item">
			<img class="main-img" src="img/1.jpg">
			<div class="description">
				<h1 class="title">Vandamo biografija</h1>
				<p class="author">Haris Poteris</p>
				<p class="price">21.00 Eur</p>
				<div class="button-section">
				<a href="" class="button-look">Placiau</a>
				</div>
			</div>
		</div>
		<!-- Book Item End -->
		<!-- Book Item -->
		<div class="book-item">
			<img class="main-img" src="img/1.jpg">
			<div class="description">
				<h1 class="title">Vandamo biografija</h1>
				<p class="author">Haris Poteris</p>
				<p class="price">21.00 Eur</p>
				<div class="button-section">
				<a href="" class="button-look">Placiau</a>
				</div>
			</div>
		</div>
		<!-- Book Item End -->
	</div>
</div>

</head>
<body>


</body>
</html>