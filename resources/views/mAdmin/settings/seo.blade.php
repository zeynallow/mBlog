@extends('mAdmin.layouts.app')
@section('content')

  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">@lang('admin.seo_settings')</h4>
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

            <div class="row mt-5">
              <div class="col-md-4">
                Sitemap:
              </div>
              <div class="col-md-8">
                <a href="{{route('sitemap.index')}}">{{route('sitemap.index')}}</a>
              </div>
            </div>

            <form class="forms-sample" method="post" action="{{ route('mAdmin.settings.seoUpdate') }}">
              @csrf

              <div class="row mt-5">
                <div class="col-md-4">
                  @lang('admin.title')
                </div>
                <div class="col-md-8">
                  <input type="text" class="form-control" name="site_title" value="{{ getSetting('site_title') }}">
                </div>
              </div>

              <div class="row mt-5">
                <div class="col-md-4">
                  @lang('admin.description')
                </div>
                <div class="col-md-8">
                  <input type="text" class="form-control" name="meta_description" value="{{ getSetting('meta_description') }}">
                </div>
              </div>

              <div class="row mt-5">
                <div class="col-md-4">
                  @lang('admin.keywords')
                </div>
                <div class="col-md-8">
                  <input type="text" class="form-control" name="meta_keywords" value="{{ getSetting('meta_keywords') }}">
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
