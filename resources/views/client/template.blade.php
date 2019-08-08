<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Reservation</title>


  <link href="{{URL::to('dashboard/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{URL::to('dashboard/css/bootstrap-theme.css')}}" rel="stylesheet">
 
  <link href="{{URL::to('dashboard/css/elegant-icons-style.css')}}" rel="stylesheet" />
  <link href="{{URL::to('dashboard/css/font-awesome.min.css')}}" rel="stylesheet" />
  <link href="{{URL::to('dashboard/css/widgets.css')}}" rel="stylesheet">
  <link href="{{URL::to('dashboard/css/style.css')}}" rel="stylesheet">
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script src="{{URL::to('tables/jquery-1.12.3.js')}}"></script>
   
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

  @yield('styles')
</head>

<body>
 
  <section id="container" class="">
  
    @include('client.nav')
    @include('client.side')
   
    <section id="main-content">
      <section class="wrapper">
       @yield('contents')
      </section>
    </section>
  

 

</body>

  <script src="{{URL::to('dashboard/js/bootstrap.min.js')}}"></script>
  <script src="{{URL::to('dashboard/js/jquery.scrollTo.min.js')}}"></script>
  <script src="{{URL::to('dashboard/js/jquery.nicescroll.js')}}"></script>
  <script src="{{URL::to('dashboard/js/scripts.js')}}"></script>

  @yield('scripts');
</html>
