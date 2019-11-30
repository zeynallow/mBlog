<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>mAdmin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('mAdmin_assets/vendors/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('mAdmin_assets/vendors/base/vendor.bundle.base.css') }}">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('mAdmin_assets/css/style.min.css') }}">
  <link rel="stylesheet" href="{{ asset('mAdmin_assets/vendors/sweetalert2/sweetalert2.min.css') }}">
  <!-- endinject -->
  <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('mAdmin_assets/images/apple-icon-57x57.png') }}">
  <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('mAdmin_assets/images/apple-icon-60x60.png') }}">
  <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('mAdmin_assets/images/apple-icon-72x72.png') }}">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('mAdmin_assets/images/apple-icon-76x76.png') }}">
  <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('mAdmin_assets/images/apple-icon-114x114.png') }}">
  <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('mAdmin_assets/images/apple-icon-120x120.png') }}">
  <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('mAdmin_assets/images/apple-icon-144x144.png') }}">
  <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('mAdmin_assets/images/apple-icon-152x152.png') }}">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('mAdmin_assets/images/apple-icon-180x180.png') }}">
  <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('mAdmin_assets/images/android-icon-192x192.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('mAdmin_assets/images/favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('mAdmin_assets/images/favicon-96x96.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('mAdmin_assets/images/favicon-16x16.png') }}">
  <link rel="manifest" href="{{ asset('mAdmin_assets/images/manifest.json') }}">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="{{ asset('mAdmin_assets/images/ms-icon-144x144.png') }}">
  <meta name="theme-color" content="#ffffff">
  @stack('css')
</head>

<body>
  <div class="container-scroller">
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
          <a class="navbar-brand brand-logo" href="{{route('mAdmin.index')}}"><img src="{{ asset('mAdmin_assets/images/logo.svg') }}" alt="logo"/></a>
          <a class="navbar-brand brand-logo-mini" href="{{route('mAdmin.index')}}"><img src="{{ asset('mAdmin_assets/images/logo-mini.svg') }}" alt="logo"/></a>
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-sort-variant"></span>
          </button>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <span class="nav-profile-name">{{ auth()->user()->name }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}">
                <i class="mdi mdi-logout text-primary"></i>
                @lang('admin.logout')
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      @include('mAdmin.partials.sidebar')
      <!-- partial -->
      <div class="main-panel" id="app">

        @yield('body')
        @yield('content')


        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2019 <a href="https://mazzapp.com/" target="_blank">mazzApp</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">mAdmin 1.1</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{asset('mAdmin_assets/vendors/base/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->
  <script src="{{asset('mAdmin_assets/js/off-canvas.js') }}"></script>
  <script src="{{asset('mAdmin_assets/js/hoverable-collapse.js') }}"></script>
  <script src="{{asset('mAdmin_assets/vendors/sweetalert2/sweetalert2.min.js')}}"></script>
  <script src="{{asset('mAdmin_assets/js/template.js') }}"></script>

  @if($message = Session::get('success'))
    <script type="text/javascript">
    Toast.fire({
      icon: 'success',
      title: '{{$message}}'
    })
    </script>
  @endif

  @if($message = Session::get('error'))
    <script type="text/javascript">
    Toast.fire({
      icon: 'error',
      title: '{{$message}}'
    })
    </script>
  @endif

  @if($message = Session::get('warning'))
    <script type="text/javascript">
    Toast.fire({
      icon: 'warning',
      title: '{{$message}}'
    })
    </script>
  @endif

  @if($message = Session::get('info'))
    <script type="text/javascript">
    Toast.fire({
      icon: 'info',
      title: '{{$message}}'
    })
    </script>
  @endif


  @stack('js')
</body>

</html>
