@extends('mBlog.layouts.app')

@section('content')

  <div class="container">
    <div class="row pt-40">
      <div class="col-xs-12">
        <div class="breadcrumbs-menu text-center">
          <h2>Confirm Password</h2>
        </div>
      </div>
    </div>

    Please confirm your password before continuing.

    <div class="row pt-40">
      <div class="col-md-4 col-md-offset-4">

        <form method="POST" action="{{ route('password.confirm') }}" class="custom-input">
          @csrf

          <div class="form-group">
            <label for="password">Password</label>
            <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

              @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group row mb-0">
              <div class="col-md-8 offset-md-4">
                <button type="submit" class="form-control btn btn-primary">
                  Confirm Password
                </button>

                @if (Route::has('password.request'))
                  <a class="btn btn-link" href="{{ route('password.request') }}">
                    Forgot Your Password?
                  </a>
                @endif
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  @endsection
