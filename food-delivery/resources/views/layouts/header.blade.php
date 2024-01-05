<header class="header" id="header">
    <nav class="nav container">
        <a href="#" class="nav__logo">Delivery</a>

        <div class="nav__menu" id="nav-menu">
            <ul class="nav__list">
                <li class="nav__item">
                    <a href="/" class="nav__link active-link">Home</a>
                </li>
                <li class="nav__item">
                    <a href="#about" class="nav__link">About us</a>
                </li>
                @if (Auth::check()) <!-- Check if user is logged in -->
    <li class="nav__item">
        <a href="{{ route('logout') }}" class="nav__link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </li>
    @else
                <li class="nav__item">
                    <a href="/register" class="nav__link">Register</a>
                </li>
                <li class="nav__item">
                    <a href="/login" class="nav__link">Login</a>
                </li>
                @endif

                <i class='bx bx-toggle-left change-theme' id="theme-button"></i>
            </ul>
        </div>

        <div class="nav__toggle" id="nav-toggle">
            <i class='bx bx-grid-alt'></i>
        </div>

        <a href="/cart" class="button button__header">Cart</a>
    </nav>
</header>