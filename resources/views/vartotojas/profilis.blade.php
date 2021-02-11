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






<div class="container">
	<div class="main-nav">
		<ul class="">
			<li><a href="" class="nav-link">Nuoroda</a></li>
			<li><a href="" class="nav-link">Nuoroda</a></li>
			<li><a href="" class="nav-link">Nuoroda</a></li>
			<li><a href="" class="nav-link">Nuoroda</a></li>
			<li><a href="" class="nav-link login">Prisijungti</a></li>
			<li><a href="" class=""><i class="fas fa-user"></i></a></li>
		</ul>
	</div>
	<div class="dashboard-container">
		<div class="dashboard-top">
			<h1 class="title">Jūsų profilio informacija, Renatai!</h1>
			<p class="sub-title">Čia galite atnaujinti savo profilio informaciją.</p>		
		</div>

		<div class="post-book">
			<form action="{{ route('ideti') }}" method="POST" enctype="multipart/form-data">
            @csrf
			  <div class="form-group">
			    <label for="exampleFormControlInput1">Knygos pavadinimas</label>
			    <input type="text" name="title" class="form-control" placeholder="">
			  </div>
			  <div class="form-group">
			    <label for="exampleFormControlInput1">Autorius</label>
			    <input type="text" name="author" class="form-control" placeholder="">
			  </div>
			  <div class="form-group">
			    <label for="exampleFormControlSelect1">Žanras</label>
			    <select name="genre[]" class="form-control" id="exampleFormControlSelect1" multiple>
				 
			      <option></option>
			    
			    </select>
			  </div>
			   <div class="form-group">
			    <label for="exampleFormControlInput1">Kaina</label>
			    <input type="text" name="price" class="form-control" placeholder="">
			  </div>
			  <div class="form-group">
			    <label for="exampleFormControlFile1">Viršelio nuotrauka</label>
			    <input name="cover_img" type="file" class="form-control-file" id="cover_img">
			  </div>
			  <div class="form-group">
			    <label for="exampleFormControlTextarea1">Aprašymas</label>
			    <textarea class="form-control" name="description" rows="3"></textarea>
			  </div>
			  <div class="form-group">
			    <button type="submit" class="btn-post-book">Išsaugoti</button>
			  </div>
			</form>			
		</div>

	</div>
</div>

</head>
<body>


</body>
</html>