@extends('mAdmin.layouts.app')
@section('content')

  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-8 grid-margin stretch-card">

        <div class="card">
          <div class="card-body">
            <h4 class="card-title">E-mail settings</h4>
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

            <form class="forms-sample" method="post" action="{{ route('mAdmin.categories.store') }}">
              @csrf

              <div class="row">
                <div class="col-md-4">
                  Protocol
                </div>
                <div class="col-md-8">
                  <select class="form-control" name="email_protocol">
                    <option value="SMTP">SMTP</option>
                    <option value="Mail">Mail</option>
                  </select>
                </div>
              </div>

              <div class="row mt-5">
                <div class="col-md-4">
                  Title
                </div>
                <div class="col-md-8">
                  <input type="text" class="form-control" name="email_title" value="" placeholder="">
                </div>
              </div>

              <div class="row mt-5">
                <div class="col-md-4">
                  Host
                </div>
                <div class="col-md-8">
                  <input type="text" class="form-control" name="email_host" value="" placeholder="">
                </div>
              </div>

              <div class="row mt-5">
                <div class="col-md-4">
                  Port
                </div>
                <div class="col-md-8">
                  <input type="text" class="form-control" name="email_port" value="" placeholder="">
                </div>
              </div>

              <div class="row mt-5">
                <div class="col-md-4">
                  Username
                </div>
                <div class="col-md-8">
                  <input type="text" class="form-control" name="email_username" value="" placeholder="">
                </div>
              </div>

              <div class="row mt-5">
                <div class="col-md-4">
                  Password
                </div>
                <div class="col-md-8">
                  <input type="password" class="form-control" name="email_password" value="" placeholder="">
                </div>
              </div>


              <div class="form-group">
                <button type="submit" class="btn btn-success mr-2">Save</button>
              </div>

            </form>

          </div>
        </div>
      </div>

      <div class="col-md-4 grid-margin stretch-card">
        <div class="row">
          <div class="col-md-12">
            <div class="alert alert-info mt-5">
              <div class="callout">
                <h4>Gmail SMTP</h4>
                <p><strong>Host:&nbsp;&nbsp;</strong>ssl://smtp.googlemail.com</p>
                <p><strong>Port:&nbsp;&nbsp;</strong>465</p>
              </div>
            </div>
          </div>
        </div>
        

      </div>

    </div>
  </div>
@endsection
