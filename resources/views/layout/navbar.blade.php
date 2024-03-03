<nav class="navbar sticky-top navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="/images/logo.svg" alt="Logo" width="60" height="me-auto"
                class="d-inline-block align-text-top" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link fw-bold" href="/home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold" href="#">Explore</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold" href="{{ route('photo.index2') }}">My Post</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 profile-menu">
                <li class="nav-item dropstart">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="profile-pic">
                            @isset(Auth::user()->photo_profile)
                                <img src="{{ asset('images/' . Auth::user()->photo_profile) }}" />
                            @else
                                <img src="/images/blank.jpeg" />
                            @endisset
                        </div>
                        <!-- You can also use icon as follows: -->
                        <!--  <i class="fas fa-user"></i> -->
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="/profile"><i class="fas fa-sliders-h fa-fw"></i>
                                Profile</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="/post"><i class="fas fa-cog fa-fw"></i> Post</a>
                        </li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <a href="#" class="dropdown-item"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    <i class="fas fa-sign-out-alt fa-fw"></i> Log Out
                                </a>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
