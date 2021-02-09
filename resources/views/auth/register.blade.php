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
	<div class="main-nav">
		<ul class="">
			<li><a href="" class="nav-link">Nuoroda</a></li>
			<li><a href="" class="nav-link">Nuoroda</a></li>
			<li><a href="" class="nav-link">Nuoroda</a></li>
			<li><a href="" class="nav-link">Nuoroda</a></li>
			<li><a href="" class="nav-link login">Prisijungti</a></li>
		</ul>
	</div>
	
	<div class="login-register">
				<!-- Welcome Text -->
				<div class="welcome-text">
					<h3>We're glad to see you again!</h3>
					<span>Neturite paskyros? <a href="pages-register.html">Prisijungti!</a></span>
				</div>
					
				<!-- Form -->
				<form method="POST" action="{{ route('register') }}">
                        @csrf
					<div class="">
						<i class=""></i>
						<input type="text" name="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="El. pašto adresas"/>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
					</div>
					<div class="date-of-birth">
						<i class=""></i>
						<input type="text" class="" name="years" placeholder="Gimimo metai" required>
                        <select name="month" placeholder="Mėnuo">
                            <option value="1">Sausis</option>
                        </select>			
					</div>

					<div class="">
						<i class=""></i>
						<input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Slaptažodis">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
					</div>
					<div class="">
						<i class=""></i>
						<input type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Patvirtinti slaptažodį">
					</div>
					
				
				
				<!-- Button -->
				<button class="btn-reg-log" type="submit">Registruotis <i class="icon-material-outline-arrow-right-alt"></i></button>
				</form>
				<!-- Social Login -->
				<div class="social-login-separator"><span>or</span></div>
				<div class="social-login-buttons">
					<button class="facebook-login ripple-effect"><i class="icon-brand-facebook-f"></i> Log In via Facebook</button>
					<button class="google-login ripple-effect"><i class="icon-brand-google-plus-g"></i> Log In via Google+</button>
				</div>
			<img class="right-image" src="images/login.png">
	</div>
</div>

</head>
<body>


</body>
</html>

