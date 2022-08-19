<!DOCTYPE html>
<html lang="en">
    <head>
        @include('dashboard.partials.head')
    </head>
    <body class="sb-nav-fixed">
        @include('dashboard.partials.nav')
        <div id="layoutSidenav">
            @include('dashboard.partials.sidenav')
            <div id="layoutSidenav_content">
                <main>
                    @yield('content')
                </main>
                <!-- @include('dashboard.partials.footer') -->
            </div>
        </div>
        @include('dashboard.partials.scripts')
    </body>
</html>
