<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.layouts.head')
  </head>
  <body>
    <div class="grid-container">

      <!-- Header -->
      @include('admin.layouts.header')
      <!-- End Header -->

      <!-- Sidebar -->
      @include('admin.layouts.sidebar')

      <!-- End Sidebar -->

      <!-- Main -->
      <main class="main-container">
        @yield('content')
      </main>
      <!-- End Main -->

    </div>

    <!-- Scripts -->
    <!-- ApexCharts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
    <!-- Custom JS -->
    <script src="{{asset('js/scripts.js')}}"></script>
  </body>
</html>