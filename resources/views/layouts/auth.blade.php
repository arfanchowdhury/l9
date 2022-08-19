<!DOCTYPE html>
<html lang="en">
    <head>
        @include('partials.head')
    </head>
    <body>
        <!-- Navigation-->
        @include('partials.nav')
        <!-- Header-->
        
            @yield('content')
        
        <!-- Footer -->
        
       
        @include('partials.scripts')
    </body>
</html>
