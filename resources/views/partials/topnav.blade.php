<div class="main-nav">
		<ul class="">
			<li><a href="{{ route('index') }}" class="nav-link">Pradinis</a></li>
			<li><a href="{{ route('index') }}" class="nav-link">Knygos</a></li>
			<li><a href="{{ route('index') }}" class="nav-link">Apie</a></li>
			<li><a href="{{ route('index') }}" class="nav-link">Kontaktai</a></li>
            @if(!auth()->user())
			<li><a href="{{ route('login') }}" class="nav-link login">Prisijungti</a></li>
            @else
            <li>
            <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="nav-link login">Atsijungti</button>
            </form>
            </li>
            @endif
            
            @if(auth()->user())
            @include('partials.notifications')
            @endif
            
		</ul>
	</div>
