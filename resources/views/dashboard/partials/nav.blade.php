<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Start Bootstrap</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            @auth
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    @if(auth()->user()->roles()->first()->slug == 'admin')
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="{{ route('admin.dashboard') }}" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ auth()->user()->first_name }} </a>
                    @else  
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="{{ route('user.dashboard') }}" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ auth()->user()->first_name }} </a>
                    @endif
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                        <form action="{{ route('auth.logout') }}" method="post">
                            @csrf
                            <li><a class="dropdown-item" href="{{ route('auth.profile') }}">Edit Profile</a></li>
                            <li><a class="dropdown-item" href="{{ route('auth.change.password') }}">Settings</a></li>
                            <li><hr class="dropdown-divider" /></li>
                            <li><button class="dropdown-item" type="submit">Logout</a></li>
                        </form>
                        
                    </ul>
                </li>
            </ul>
            @endauth
        </nav>