<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>mAdmin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('mAdmin/vendors/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('mAdmin/vendors/base/vendor.bundle.base.css') }}">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('mAdmin/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('mAdmin/vendors/sweetalert2/sweetalert2.min.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('mAdmin/images/favicon.png') }}">
  @stack('css')
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
          <a class="navbar-brand brand-logo" href="../../index.html"><img src="{{ asset('mAdmin/images/logo.svg') }}" alt="logo"/></a>
          <a class="navbar-brand brand-logo-mini" href="../../index.html"><img src="{{ asset('mAdmin/images/logo-mini.svg') }}" alt="logo"/></a>
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-sort-variant"></span>
          </button>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-4 w-100">
          <li class="nav-item nav-search d-none d-lg-block w-100">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="search">
                  <i class="mdi mdi-magnify"></i>
                </span>
              </div>
              <input type="text" class="form-control" placeholder="Search now" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <span class="nav-profile-name">{{ auth()->user()->name }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="mdi mdi-settings text-primary"></i>
                Settings
              </a>
              <a class="dropdown-item" href="{{ route('logout') }}">
                <i class="mdi mdi-logout text-primary"></i>
                Logout
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
      <div class="main-panel">

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
  <script src="{{asset('mAdmin/vendors/base/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{asset('mAdmin/js/off-canvas.js') }}"></script>
  <script src="{{asset('mAdmin/js/hoverable-collapse.js') }}"></script>
  <script src="{{asset('mAdmin/vendors/sweetalert2/sweetalert2.min.js')}}"></script>
  <script src="{{asset('mAdmin/js/template.js') }}"></script>

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
