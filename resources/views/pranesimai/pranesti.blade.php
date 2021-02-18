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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
@include('partials.topnav')
<div class="container">
	<div class="dashboard-container">
		<div class="dashboard-top">
			<p class="sub-title">Praneškite apie netinkamai atvaizduotą informaciją apie knygą</p>		
		</div>

		<div class="post-book">
			<form action="{{ route('pranesti', $book->slug) }}" method="POST">
            @csrf
			  <div class="form-group">
			    <label for="exampleFormControlInput1">Knygos pavadinimas</label>
			    <a href="">{{ $book->title }}</a>
			  </div>
			  <div class="form-group">
			    <label for="exampleFormControlInput1">Netinkamumo priežastis</label>
			    <select name="reason" class="form-control" id="exampleFormControlSelect1">
                @php 
                $reasons = ['Netinkamas aprašymas', 'Neteisinga viršelio nuotrauka', 'Neteisingai nurodytas autorius', 'Kita'];
                @endphp
				 @foreach($reasons as $reason)
			      <option value="{{ $reason }}">{{ $reason }}</option>
			     @endforeach
			    </select>
			  </div>
			  <div class="form-group">
			    <label for="exampleFormControlTextarea1">Komentaras</label>
			    <textarea class="form-control" name="description" rows="3"></textarea>
			  </div>
			  <div class="form-group">
              <input type="hidden" name="book_id" value="{{ $book->id }}">
			    <button type="submit" class="btn-post-book">Siųsti</button>
			  </div>
			</form>			
		</div>

	</div>
</div>

</head>
<body>


</body>
</html>