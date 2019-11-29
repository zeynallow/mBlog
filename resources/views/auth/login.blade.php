@extends('mBlog.layouts.app')

@section('content')
  <div class="container">
    <div class="row pt-40">
      <div class="col-xs-12">
        <div class="breadcrumbs-menu text-center">
          <h2>@lang('site.sign_in')</h2>
        </div>
      </div>
    </div>
    <div class="row pt-40">
      <div class="col-md-4 col-md-offset-4">
        <form method="POST" action="{{ route('login') }}" class="custom-input">
          @csrf

          <div class="form-group">
            <label for="email">@lang('site.email')</label>
            <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

              @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group">
              <label for="password">@lang('site.password')</label>
              <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <a class="color-black" href="/password/reset">@lang('site.forgot_password')</a>
              <div class="form-group mt-10 text-center">
                <button type="submit" class="form-control btn theme-btn">
                  @lang('site.sign_in')
                </button>
              </div>
              <div class="text-center">
                <div>@lang('site.or')</div>
                <a class="color-black" href="/register">@lang('site.sign_up')</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    @endsection
