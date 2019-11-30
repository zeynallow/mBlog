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
        @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" class="custom-input">
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
              <button type="submit" class="form-control btn theme-btn">
                @lang('site.send_password_reset_link')
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  @endsection
