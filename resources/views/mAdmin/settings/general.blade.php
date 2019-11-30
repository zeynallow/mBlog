@extends('mAdmin.layouts.app')
@section('content')

  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">@lang('admin.general_settings')</h4>
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
                  @lang('admin.site_name')
                </div>
                <div class="col-md-8">
                  <input type="text" class="form-control" name="site_name" value="{{ getSetting('site_name') }}" placeholder="">
                </div>
              </div>

              <div class="row mt-5">
                <div class="col-md-4">
                  @lang('admin.site_url')
                </div>
                <div class="col-md-8">
                  <input type="text" class="form-control" name="site_url" value="{{ getSetting('site_url') }}" placeholder="">
                </div>
              </div>

              <div class="row mt-5">
                <div class="col-md-4">
                  @lang('admin.timezone')
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
                  @lang('admin.multilingual_system')
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="multilingual_system_1">@lang('admin.activate')</label>
                    <input type="radio" name="multilingual_system" id="multilingual_system_1" value="1" {{ (getSetting('multilingual_system') == 1) ? 'checked': '' }}>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="multilingual_system_0">@lang('admin.deactivate')</label>
                    <input type="radio" name="multilingual_system" id="multilingual_system_0" value="0" {{ (getSetting('multilingual_system') == 0) ? 'checked': '' }}>
                  </div>
                </div>
              </div>


              <div class="row mt-5">
                <div class="col-md-4">
                   @lang('admin.comment_system')
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="comment_system_1">@lang('admin.activate')</label>
                    <input type="radio" name="comment_system" id="comment_system_1" value="1" {{ (getSetting('comment_system') == 1) ? 'checked': '' }}>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="comment_system_0">@lang('admin.deactivate')</label>
                    <input type="radio" name="comment_system" id="comment_system_0" value="0" {{ (getSetting('comment_system') == 0) ? 'checked': '' }}>
                  </div>
                </div>
              </div>

              <div class="row mt-5">
                <div class="col-md-4">
                  @lang('admin.feature_posts')
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="feature_post_1">@lang('admin.activate')</label>
                    <input type="radio" name="feature_post" id="feature_post_1" value="1" {{ (getSetting('feature_post') == 1) ? 'checked': '' }}>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="feature_post_0">@lang('admin.deactivate')</label>
                    <input type="radio" name="feature_post" id="feature_post_0" value="0" {{ (getSetting('feature_post') == 0) ? 'checked': '' }}>
                  </div>
                </div>
              </div>

              <div class="row mt-5">
                <div class="col-md-4">
                  @lang('admin.pagination')
                </div>
                <div class="col-md-8">
                  <input type="text" class="form-control" name="pagination_per_page" value="{{ getSetting('pagination_per_page') }}" placeholder="">
                </div>
              </div>


              <div class="row mt-5">
                <div class="col-md-4">
                  @lang('admin.about_footer')
                </div>
                <div class="col-md-8">
                  <textarea class="form-control" name="about_footer">{{ getSetting('about_footer') }}</textarea>
                </div>
              </div>

              <div class="row mt-5">
                <div class="col-md-4">
                  @lang('admin.copyright_footer')
                </div>
                <div class="col-md-8">
                  <input type="text" class="form-control" name="copyright_footer" value="{{ getSetting('copyright_footer') }}" placeholder="">
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
