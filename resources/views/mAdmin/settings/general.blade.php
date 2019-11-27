@extends('mAdmin.layouts.app')
@section('content')

  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">General settings</h4>
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

            <form class="forms-sample" method="post" action="{{ route('mAdmin.settings.generalUpdate') }}">
              @csrf

              <div class="row">
                <div class="col-md-4">
                  Site name
                </div>
                <div class="col-md-8">
                  <input type="text" class="form-control" name="site_name" value="{{ getSetting('site_name') }}" placeholder="">
                </div>
              </div>

              <div class="row mt-5">
                <div class="col-md-4">
                  Site URL
                </div>
                <div class="col-md-8">
                  <input type="text" class="form-control" name="site_url" value="{{ getSetting('site_url') }}" placeholder="">
                </div>
              </div>

              <div class="row mt-5">
                <div class="col-md-4">
                  Timezone
                </div>
                <div class="col-md-8">
                  <select class="form-control" name="timezone">
                    @foreach ($timezonelist as $key => $timezone)
                      <option value="{{$timezone}}" {{(getSetting('timezone') == $timezone) ? 'selected' : ''}}>{{$timezone}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="row mt-5">
                <div class="col-md-4">
                  Multilingual system
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="multilingual_system_1">Activate</label>
                    <input type="radio" name="multilingual_system" id="multilingual_system_1" value="1" {{ (getSetting('multilingual_system') == 1) ? 'checked': '' }}>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="multilingual_system_0">Deactivate</label>
                    <input type="radio" name="multilingual_system" id="multilingual_system_0" value="0" {{ (getSetting('multilingual_system') == 0) ? 'checked': '' }}>
                  </div>
                </div>
              </div>


              <div class="row mt-5">
                <div class="col-md-4">
                  Comment system
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="comment_system_1">Activate</label>
                    <input type="radio" name="comment_system" id="comment_system_1" value="1" {{ (getSetting('comment_system') == 1) ? 'checked': '' }}>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="comment_system_0">Deactivate</label>
                    <input type="radio" name="comment_system" id="comment_system_0" value="0" {{ (getSetting('comment_system') == 0) ? 'checked': '' }}>
                  </div>
                </div>
              </div>

              <div class="row mt-5">
                <div class="col-md-4">
                  Feature posts
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="feature_post_1">Activate</label>
                    <input type="radio" name="feature_post" id="feature_post_1" value="1" {{ (getSetting('feature_post') == 1) ? 'checked': '' }}>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="feature_post_0">Deactivate</label>
                    <input type="radio" name="feature_post" id="feature_post_0" value="0" {{ (getSetting('feature_post') == 0) ? 'checked': '' }}>
                  </div>
                </div>
              </div>

              <div class="row mt-5">
                <div class="col-md-4">
                  Number of Posts per page (Pagination)
                </div>
                <div class="col-md-8">
                  <input type="text" class="form-control" name="pagination_per_page" value="{{ getSetting('pagination_per_page') }}" placeholder="">
                </div>
              </div>


              <div class="row mt-5">
                <div class="col-md-4">
                  About footer
                </div>
                <div class="col-md-8">
                  <textarea class="form-control" name="about_footer">{{ getSetting('about_footer') }}</textarea>
                </div>
              </div>

              <div class="row mt-5">
                <div class="col-md-4">
                  Copyright footer
                </div>
                <div class="col-md-8">
                  <input type="text" class="form-control" name="copyright_footer" value="{{ getSetting('copyright_footer') }}" placeholder="">
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
