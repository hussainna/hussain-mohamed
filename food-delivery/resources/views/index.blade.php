<!DOCTYPE html>
    <html lang="en">
    <head>
        @include('layouts.head')
    </head>
    <body>
         <!--=============== HEADER ===============-->
        @include('layouts.header')

        @yield('content')

    <!--=============== FOOTER ===============-->
    @include('layouts.footer')

    <!--=============== SCROLL UP ===============-->
    <a href="#" class="scrollup" id="scroll-up">
        <i class='bx bx-up-arrow-alt scrollup__icon'></i>
    </a>

    <!--=============== MAIN JS ===============-->
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.js')}}"></script>

</body>
</html>             
              
