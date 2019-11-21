<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>mAdmin - Login</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('mAdmin/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('mAdmin/vendors/base/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('mAdmin/css/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('mAdmin/images/favicon.png')}}"/>
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="{{asset('mAdmin/images/logo.svg')}}" alt="logo">
              </div>

              <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                  <label for="email">E-mail</label>
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                      @error('password')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>

                    <div class="form-group">
                      <div class="form-check">
                        <label class="form-check-label text-muted">
                          <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                          Keep me signed in
                          <i class="input-helper"></i>
                        </label>
                      </div>
                    </div>

                    <div class="form-group mb-0">
                      <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                        Daxil ol
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
      </div>
      <!-- container-scroller -->
      <!-- plugins:js -->
      <script src="{{asset('mAdmin/vendors/base/vendor.bundle.base.js')}}"></script>
      <!-- endinject -->
      <!-- inject:js -->
      <script src="{{asset('mAdmin/js/off-canvas.js')}}"></script>
      <script src="{{asset('mAdmin/js/hoverable-collapse.js')}}"></script>
      <script src="{{asset('mAdmin/js/template.js')}}"></script>
      <!-- endinject -->
    </body>

    </html>
