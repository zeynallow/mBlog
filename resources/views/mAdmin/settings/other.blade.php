@extends('mAdmin.layouts.app')
@section('content')

  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Other settings</h4>
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

            <form class="forms-sample" method="post" action="{{ route('mAdmin.settings.otherUpdate') }}">
              @csrf

              <div class="row mt-5">
                <div class="col-md-4">
                  Facebook APP ID
                </div>
                <div class="col-md-8">
                  <input type="text" class="form-control" name="fb_app_id" value="{{ getSetting('fb_app_id') }}">
                </div>
              </div>

              <div class="row mt-5">
                <div class="col-md-4">
                  Google Analytics Code
                </div>
                <div class="col-md-8">
                  <textarea class="form-control" rows="8" name="google_analytics">{{ getSetting('google_analytics') }}</textarea>
                </div>
              </div>

              <div class="row mt-5">
                <div class="col-md-4">
                  Custom Head Code
                </div>
                <div class="col-md-8">
                  <textarea class="form-control" rows="8" name="custom_head_code">{{ getSetting('custom_head_code') }}</textarea>
                </div>
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-success mr-2">Save</button>
              </div>

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
