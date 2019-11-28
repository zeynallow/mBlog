@extends('mBlog.layouts.app')

@section('content')
  <div class="container">
    <div class="row pt-40">
      <div class="col-xs-12">
        <div class="breadcrumbs-menu text-center">
          <h2>Update Profile</h2>
        </div>
      </div>
    </div>
    <div class="row pt-40">
      <div class="col-md-4 col-md-offset-4">

        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        @if($message = Session::get('success'))
          <div class="alert alert-success">
            {{$message}}
          </div>
        @endif

        <form method="POST" action="{{ route('profile.update') }}" class="custom-input">
          @csrf

          <div class="form-group">
            <label for="name">Name</label>

            <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>
              @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group">
              <label for="email">E-mail</label>
              <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">
                @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="password">Password</label>
                <input id="password" placeholder="Leave empty to keep the same" type="password" class="@error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                  @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="password-confirm">Confirm Password</label>
                  <input id="password-confirm" type="password" name="password_confirmation" autocomplete="new-password">
                </div>

                <div class="form-group">
                  <button type="submit" class="btn theme-btn">
                    Update
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>

      @endsection
