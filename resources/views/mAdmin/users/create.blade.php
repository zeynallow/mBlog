@extends('mAdmin.layouts.app')
@section('content')

  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Create User</h4>
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

            <form class="forms-sample" method="post" action="{{ route('mAdmin.users.store') }}">
              @csrf

              <div class="form-group">
                <label for="role_id">Role</label>
                <select class="form-control" id="role_id" name="role_id">
                  <option value="0">Select...</option>
                  @if($user_roles)
                  @foreach ($user_roles as $key => $user_role)
                    <option value="{{$user_role->id}}">{{$user_role->role_name}}</option>
                  @endforeach
                @endif
                </select>
              </div>

              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="">
              </div>

              <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" value="">
              </div>

              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" value="">
              </div>

              <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" value="">
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-success mr-2">Create User</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
