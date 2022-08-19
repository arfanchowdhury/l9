<div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading"></div>
                            @if(auth()->user()->roles()->first()->slug == 'admin')
                                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    Dashboard
                                </a>
                            @else
                                <a class="nav-link" href="{{ route('user.dashboard') }}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    Dashboard
                                </a>
                            @endif
                         
                            <div class="sb-sidenav-menu-heading"></div>
                            @if(auth()->user()->roles()->first()->slug == 'admin')
                            <a class="nav-link" href="{{ route('roles.index') }}">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-shield"></i></div>
                                Roles
                            </a>
                            <a class="nav-link" href="{{ route('slides.index') }}">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-chalkboard"></i></div>
                                Slides
                            </a>
                            <a class="nav-link" href="{{ route('categories.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Categories
                            </a>
                            <a class="nav-link" href="{{ route('products.index') }}">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-gift"></i></i></div>
                                Products
                            </a>
                            @endif
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        {{ auth()->user()->roles()->first()->title }}
                    </div>
                </nav>
            </div>