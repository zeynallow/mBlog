@extends('mAdmin.layouts.app')
@section('content')

  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">@lang('admin.edit_ads') - {{$ads->description}}</h4>
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

            <form class="forms-sample" method="post" action="{{ route('mAdmin.ads.update',$ads->id) }}">
              @csrf

              <div class="form-group">
                <label for="ads_code">@lang('admin.code')</label>
                <textarea class="form-control" rows="6" name="ads_code" id="ads_code">{!!$ads->ads_code!!}</textarea>
              </div>

              <div class="form-check form-check-flat form-check-primary">
                <label class="form-check-label">
                  <input type="checkbox" name="publish" class="form-check-input" {{($ads->publish) ? 'checked' : ''}}>
                  @lang('site.publish')
                  <i class="input-helper"></i>
                </label>
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-success mr-2">@lang('admin.update_ads')</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
