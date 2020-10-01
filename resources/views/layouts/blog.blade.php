<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

   <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">

   <title>{{ config('app.name', 'Laravel') }}</title>

   <!-- Scripts -->
   <script src="{{ asset('js/app.js') }}" defer></script>

   <!-- Fonts -->
   <link rel="dns-prefetch" href="//fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

   <!-- Styles -->
   <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>

  <!-- Navigation -->
  @include('layouts.partials.nav')

  <!-- Page Content -->
  <div class="container main-content">

    <div class="row" style=" padding-top: 60px;">

      <!-- Blog Entries Column -->
       
      <div class="col-md-8" >
            @yield('content')
      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">
        @yield('sidebar')
        </div>

        <!-- Side Widget -->
        <div class="card my-4">
          <h5 class="card-header">Side Widget</h5>
          <div class="card-body">
            You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
          </div>
        </div>

      </div>
      

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  @include('layouts.partials.footer')

</body>

</html>

