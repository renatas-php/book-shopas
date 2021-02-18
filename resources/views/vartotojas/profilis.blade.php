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
			<h1 class="title">Jūsų profilio informacija, {{ $user->email }}</h1>
			<p class="sub-title">Čia galite atnaujinti savo profilio informaciją.</p>		
		</div>

		<div class="post-book">
			<form action="{{ route('profilis-atnaujinti', auth()->user()->id) }}" method="POST">
            @csrf
            @method('PUT')
			  <div class="form-group">
			    <label for="exampleFormControlInput1">Jūsų el. paštas</label>
			    <input type="text" name="email" class="form-control" value="{{ $user->email }}">
			  </div>
			  <div class="display-flex justify-space-btw">
					<div class="form-group flex-49">
						<label for="exampleFormControlInput1">Gimimo metai</label>
						<input type="text" name="years" class="form-control" value="{{ $user->years }}">
					</div>
					<div class="form-group flex-49">
						<label for="exampleFormControlSelect1">Mėnuo</label>
						<select name="month" class="form-control">
						@foreach($months as $month)										 
						<option value="{{ $month }}"
						@if ($user->month == $month )
						selected
						@endif
						>{{ $month }}</option>
						@endforeach	    
						</select>
					</div>
			  </div>

			   <div class="form-group">
			    <label for="exampleFormControlInput1">Senas Slaptažodis</label>
			    <input type="password" class="form-control" value="{{ $user->password }}" readonly>
			  </div>
			  <div class="form-group">
			    <label for="exampleFormControlInput1">Naujas Slaptažodis</label>
			    <input type="password" name="password" value="" class="form-control">
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