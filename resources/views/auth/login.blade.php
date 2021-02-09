

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
					<span>Neturite paskyros? <a href="{{ route('register') }}">Užsiregistruok!</a></span>
				</div>
			<form method="POST" action="{{ route('login') }}">
                @csrf	
				<!-- Form -->
					<div class="input-with-icon-left">
						<i class="icon-material-baseline-mail-outline"></i>
						<input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="El. pašto adresas" required autocomplete="email" autofocus>
                                
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
					</div>

					<div class="input-with-icon-left">
						<i class="icon-material-outline-lock"></i>
						<input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Slaptažodis" required/>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
					</div>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Pamiršote slaptažodį?') }}
                                    </a>
                                @endif
				
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
				<!-- Button -->
				<button class="btn-reg-log" type="submit">Prisijungti <i class="icon-material-outline-arrow-right-alt"></i></button>
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