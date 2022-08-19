<!DOCTYPE html>
<html lang="en">
    <head>
        @include('partials.head')
    </head>
    <body>
        <!-- Navigation-->
        @include('partials.nav')
        <!-- Section-->
        <section >
            @yield('content')
        </section>
        <!-- Footer-->
        @include('partials.footer')
        @include('partials.scripts')
    </body>
</html>
