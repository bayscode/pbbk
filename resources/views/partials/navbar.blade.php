    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #26246D">
        <div class="container">
            <img src="{{ asset('img/logoweb.svg') }}" alt="" width="30" height="24"
                class="d-inline-block align-text-top">
            <a class="navbar-brand text-decoration-none" href="{{ url('home') }}">BaysVR</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-decoration-none active" aria-current="page" href="{{ url('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-decoration-none active" aria-current="page" href="{{ url('catalog') }}">Catalog</a>
                    </li>
                    @if (Auth::user())
                        <li class="nav-item">
                            <a class="nav-link text-decoration-none active" aria-current="page" href="{{ url('user') }}">User</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-decoration-none active" aria-current="page" href="{{ url('category') }}">Category</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-decoration-none active" aria-current="page" href="{{ url('product') }}">Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-decoration-none active" aria-current="page" href="{{ url('slider') }}">Slider</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-decoration-none active" aria-current="page" href="{{ url('note') }}">Note</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-decoration-none active" aria-current="page" href="{{ url('logout') }}">Logout</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link text-decoration-none active" aria-current="page" href="{{ url('login') }}">Login</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    {{-- End Navbar --}}
