<nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="{{ route('index') }}">Shop</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link {{ request()->routeIs('index') ? 'active' : ''}}"  href="{{ route('index') }}">Home</a></li>
                        <li class="nav-item"><a class="nav-link {{ request()->routeIs('shop') ? 'active' : ''}}" href="{{ route('shop') }}">Shop</a></li>
                    </ul>
                    <div class="d-flex">
                        @guest
                            <a type="button" class="btn btn-outline-dark me-1" href="{{ route('auth.register') }}">Register</a>
                            <a type="button" class="btn btn-dark me-1" href="{{ route('auth.login') }}">Login</a>
                        @endguest
                        @auth
                        <a type="button" class="btn btn-dark me-1" href="{{ route('admin.dashboard') }}" > Dashboard </a>
                        @endauth
                        <div class="d-flex">
                            @if(!\Gloudemans\Shoppingcart\Facades\Cart::content()->isEmpty())
                                <a class="btn btn-outline-dark" href="{{ route('cart.index') }}">
                                    <i class="bi-cart-fill me-1"></i>
                                    Cart
                                    <span class="badge bg-dark text-white ms-1 rounded-pill">{{\Gloudemans\Shoppingcart\Facades\Cart::content()->count()}}</span>
                                </a>
                            @endif
                        </div>
                    </div>
                    
                </div>
            </div>
        </nav>