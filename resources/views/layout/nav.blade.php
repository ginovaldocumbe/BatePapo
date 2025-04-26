<nav class="navbar navbar-expand-lg bg-dark border-bottom border-bottom-dark ticky-top bg-body-tertiary"
    data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand fw-light" href="/"><span class="fas fa-brain me-1"> </span>Ideas</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                {{-- languages options en and pt --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ app()->getLocale() == 'pt' ? 'PT' : 'EN' }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('lang', ['lang' => 'en']) }}">EN</a></li>
                        <li><a class="dropdown-item" href="{{ route('lang', ['lang' => 'pt']) }}">PT</a></li>
                    </ul>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link  {{ Route::is('login') ? 'active' : '' }}" aria-current="page"
                            href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  {{ Route::is('register') ? 'active' : '' }}"
                            href="{{ route('register') }}">Register</a>
                    </li>
                @endguest
                @auth
                    @if (Auth::user()->is_admin)
                        <li class="nav-item">
                            <a class="nav-link  {{ Route::is('admin.dashboard') ? 'active' : '' }}"
                                href="{{ route('admin.dashboard') }}">Admin
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link  {{ Route::is('users.show') || Route::is('users.edit') ? 'active' : '' }}"
                            href="{{ route('users.show', Auth::user()) }}">

                            {{ Auth::user()->name }}
                            <img style="max-width:20px" class="me-2 avatar-sm rounded-image"
                                src="{{ Auth::user()->getImageUrl() }}" alt="{{ Auth::user()->name }}">
                        </a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="btn btn-danger btn-sm">Logout</button>
                        </form>
                    </li>
                @endauth



            </ul>
        </div>
    </div>
</nav>
