@extends('mBlog.layouts.app')

@section('content')
  <div class="container">
    <div class="row pt-40">
      <div class="col-xs-12">
        <div class="breadcrumbs-menu text-center">
          <h2>@lang('site.reset_password')</h2>
        </div>
      </div>
    </div>
    <div class="row pt-40">
      <div class="col-md-4 col-md-offset-4">
        <form method="POST" action="{{ route('password.update') }}" class="custom-input">
          @csrf

          <input type="hidden" name="token" value="{{ $token }}">

          <div class="form-group">
            <label for="email">@lang('site.email')</label>
            <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

              @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group">
              <label for="password">@lang('site.password')</label>
              <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="password-confirm">@lang('site.confirm_password')</label>
                <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
              </div>

              <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                  <button type="submit" class="form-control btn theme-btn">
                    @lang('site.reset_password')
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    @endsection
