@extends('mBlog.layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">Verify Your Email Address</div>

          <div class="card-body">
            @if (session('resent'))
              <div class="alert alert-success" role="alert">
                A fresh verification link has been sent to your email address
              </div>
            @endif

            Before proceeding, please check your email for a verification link.
            If you did not receive the email,
            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
              @csrf
              <button type="submit" class="btn btn-link p-0 m-0 align-baseline">click here to request another</button>.
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
