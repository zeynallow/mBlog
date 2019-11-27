<!doctype html>
<html class="no-js" lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="mBlog - MazzBlog">

  <title>mBlog</title>

  <!-- favicon -->
  @if(getSetting('site_favicon'))
    <link rel="shortcut icon" type="image/x-icon" href="{{getSetting('site_favicon')}}">
  @endif

  <!-- style css -->
  <link rel="stylesheet" href="{{ asset('assets/css/master.css') }}">
  @if(getSetting('site_color') && getSetting('site_color') != "default")
    <link rel="stylesheet" href="{{ asset('assets/css/colors') .'/'. getSetting('site_color') .'.css'}}">
  @endif
  <!-- modernizr js -->
  <script src="{{ asset('assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>

  @if(getSetting('custom_head_code'))
    {!!getSetting('custom_head_code')!!}
  @endif

  @stack('css')
</head>

<body>
  <!--[if lt IE 8]>
  <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
  <![endif]-->
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <div id="loading-wrap">
    <div class="loading-effect"></div>
  </div>
  <div class="header-space"></div>

  @include('mBlog.partials.header')

  @yield('content')

  @include('mBlog.partials.footer')
  @include('mBlog.partials.login')


  <!-- All JS Here -->
  <script src="{{ asset('assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
  <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins.js') }}"></script>
  <script src="{{ asset('assets/js/main.js') }}"></script>
  @stack('js')

  @if(getSetting('google_analytics'))
    {!!getSetting('google_analytics')!!}
  @endif

</body>


</html>
