@extends('mAdmin.layouts.app')
@section('content')

  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body table-responsive">
            <h4 class="card-title">@lang('admin.all_users')</h4>
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
                  <th>@lang('admin.name')</th>
                  <th>@lang('admin.email')</th>
                  <th>@lang('admin.role')</th>
                  <th>@lang('admin.created_at')</th>
                  <th></th>
                </tr>
              </thead>

              <tbody>
                @if($users)
                  @foreach ($users as $key => $user)
                    <tr>
                      <td>{{$user->id}}</td>
                      <td>{{$user->name}}</td>
                      <td>{{$user->email}}</td>
                      <td>{{($user->role) ? $user->role->role_name : ''}}</td>
                      <td>{{$user->created_at}}</td>
                      <td>
                        <a href="{{ route('mAdmin.users.edit',$user->id)}}" class="badge badge-success"><i class="mdi mdi-pencil"></i></a>
                        <a href="{{ route('mAdmin.users.destroy',$user->id)}}" class="badge badge-danger confirm-delete-alert"><i class="mdi mdi-delete"></i></a>
                      </td>
                    </tr>
                  @endforeach
                @endif
              </tbody>
            </table>

            <div style="padding:10px;">
              {{$users}}
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
