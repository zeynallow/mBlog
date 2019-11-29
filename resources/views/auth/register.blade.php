@extends('mBlog.layouts.app')

@section('content')
  <div class="container">
    <div class="row pt-40">
      <div class="col-xs-12">
        <div class="breadcrumbs-menu text-center">
          <h2>Sign Up</h2>
        </div>
      </div>
    </div>
    <div class="row pt-40">
      <div class="col-md-4 col-md-offset-4">
        <form method="POST" action="{{ route('register') }}" class="custom-input">
          @csrf

          <div class="form-group">
            <label for="name">Name</label>

              <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>

            <div class="form-group">
              <label for="email">E-mail</label>
              <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="password">Password</label>
                  <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>

                <div class="form-group">
                  <label for="password-confirm">Confirm Password</label>
                    <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
                </div>

                <div class="form-group">
                    <button type="submit" class="form-control btn theme-btn">
                      Register
                    </button>
                </div>
              </form>
            </div>
          </div>
        </div>

      @endsection
