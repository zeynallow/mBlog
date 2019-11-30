@extends('mAdmin.layouts.app')
@section('content')

  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">@lang('admin.all_pages')</h4>
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
                  <th>@lang('admin.id')</th>
                  <th>@lang('admin.page')</th>
                  <th></th>
                  <th>@lang('admin.created_at')</th>
                  <th></th>
                </tr>
              </thead>

              <tbody>
                @if($pages)
                  @foreach ($pages as $key => $page)
                    <tr>
                      <td>{{$page->id}}</td>
                      <td>
                        @isset($page->page_data()[0])
                          {{$page->page_data()[0]->title}}
                        @endisset
                      </td>
                      <td>
                        {!!
                          $page->publish ?
                          '<span class="badge badge-success"><i class="mdi mdi-eye"></i></span>' :
                          '<span class="badge badge-danger"><i class="mdi mdi-eye"></i></span>'
                          !!}
                        </td>
                        <td>{{$page->created_at}}</td>
                        <td>
                          <a href="{{ route('mAdmin.pages.edit',$page->id)}}" class="badge badge-success"><i class="mdi mdi-pencil"></i></a>
                          <a href="{{ route('mAdmin.pages.destroy',$page->id)}}" class="badge badge-danger confirm-delete-alert"><i class="mdi mdi-delete"></i></a>
                        </td>
                      </tr>
                    @endforeach
                  @endif
                </tbody>
              </table>

              <div style="padding:10px;">
                {{$pages}}
              </div>


            </div>
          </div>
        </div>
      </div>
    </div>
  @endsection
