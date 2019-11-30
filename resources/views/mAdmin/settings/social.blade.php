@extends('mAdmin.layouts.app')
@section('content')

  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">@lang('admin.social_settings')</h4>
            <hr/>

            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <form class="forms-sample" method="post" action="{{ route('mAdmin.settings.socialUpdate') }}">
              @csrf

              <div class="row mt-5">
                <div class="col-md-4">
                  Facebook
                </div>
                <div class="col-md-8">
                  <input type="text" class="form-control" name="facebook_link" value="{{ getSetting('facebook_link') }}" placeholder="">
                </div>
              </div>

              <div class="row mt-5">
                <div class="col-md-4">
                  Twitter
                </div>
                <div class="col-md-8">
                  <input type="text" class="form-control" name="twitter_link" value="{{ getSetting('twitter_link') }}" placeholder="">
                </div>
              </div>

              <div class="row mt-5">
                <div class="col-md-4">
                  Instagram
                </div>
                <div class="col-md-8">
                  <input type="text" class="form-control" name="instagram_link" value="{{ getSetting('instagram_link') }}" placeholder="">
                </div>
              </div>

              <div class="row mt-5">
                <div class="col-md-4">
                  Pinterest
                </div>
                <div class="col-md-8">
                  <input type="text" class="form-control" name="pinterest_link" value="{{ getSetting('pinterest_link') }}" placeholder="">
                </div>
              </div>

              <div class="row mt-5">
                <div class="col-md-4">
                  LinkedIn
                </div>
                <div class="col-md-8">
                  <input type="text" class="form-control" name="linkedin_link" value="{{ getSetting('linkedin_link') }}" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-success mr-2">@lang('admin.save')</button>
              </div>

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
