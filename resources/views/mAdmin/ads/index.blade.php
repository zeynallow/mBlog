@extends('mAdmin.layouts.app')
@section('content')

  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body table-responsive">
            <h4 class="card-title">@lang('admin.all_ads')</h4>
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

            <table class="table">
              <thead>
                <tr>
                  <th>@lang('admin.position_and_size')</th>
                  <th>@lang('admin.code')</th>
                  <th>@lang('admin.status')</th>
                  <th></th>
                </tr>
              </thead>

              <tbody>
                @if($ads)
                  @foreach ($ads as $key => $ad)
                    <tr>
                      <td>{{$ad->description}}</td>
                      <td>
                        {{$ad->ads_code}}
                      </td>
                      <td>
                        {!!
                          $ad->publish ?
                          '<a href="'.route('mAdmin.ads.disable',$ad->id).'"><span class="badge badge-success"><i class="mdi mdi-eye"></i></span></a>' :
                          '<a href="'.route('mAdmin.ads.enable',$ad->id).'"><span class="badge badge-danger"><i class="mdi mdi-eye"></i></span></a>'
                          !!}
                        </td>
                        <td>
                          <a href="{{ route('mAdmin.ads.edit',$ad->id)}}" class="badge badge-success"><i class="mdi mdi-pencil"></i></a>
                        </td>
                      </tr>
                    @endforeach
                  @endif
                </tbody>
              </table>

            </div>
          </div>
        </div>
      </div>
    </div>
  @endsection
