<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="{{url('assets/img/favicon.ico')}}" type="image/x-icon" />
  {{-- Google Font --}}
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,600;1,500&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{url('assets/css/style.css')}}">
  
  <title>@yield('title')</title>

  @stack('before-style')
  @include('includes.style')
  @stack('after-style')

  </head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  @stack('before-navbar')
  @include('includes.navbar')
  @stack('after-navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @stack('before-sidebar')
  @include('includes.sidebar')
  @stack('after-sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2020 Sumbang Saran.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('sweetalert::alert')
 
@stack('before-script')
@include('includes.script')
@stack('after-script')

</body>
</html>
