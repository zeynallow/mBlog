@extends('mAdmin.layouts.app')
@section('content')

  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">

        <div class="card">
          <div class="card-body">
            <h4 class="card-title">@lang('admin.email_settings')</h4>
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
            @php
            $email_protocols = [
              'SMTP','Mail'
            ];
          @endphp
          <form class="forms-sample" method="post" action="{{ route('mAdmin.settings.emailUpdate') }}">
            @csrf

            <div class="row">
              <div class="col-md-4">
                @lang('admin.protocol')
              </div>
              <div class="col-md-8">
                <select class="form-control" name="email_protocol">
                  @foreach ($email_protocols as $key => $email_protocol)
                    <option value="{{$email_protocol}}" {{(getSetting('email_protocol') == $email_protocol) ? 'selected' : ''}}>{{$email_protocol}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="row mt-5">
              <div class="col-md-4">
                @lang('admin.title')
              </div>
              <div class="col-md-8">
                <input type="text" class="form-control" name="email_title" value="{{getSetting('email_title')}}" placeholder="">
              </div>
            </div>

            <div class="row mt-5">
              <div class="col-md-4">
                @lang('admin.host')
              </div>
              <div class="col-md-8">
                <input type="text" class="form-control" name="email_host" value="{{getSetting('email_host')}}" placeholder="">
              </div>
            </div>

            <div class="row mt-5">
              <div class="col-md-4">
                @lang('admin.port')
              </div>
              <div class="col-md-8">
                <input type="text" class="form-control" name="email_port" value="{{getSetting('email_title')}}" placeholder="">
              </div>
            </div>

            <div class="row mt-5">
              <div class="col-md-4">
                @lang('admin.email_address')
              </div>
              <div class="col-md-8">
                <input type="text" class="form-control" name="email_address" value="{{getSetting('email_address')}}" placeholder="">
              </div>
            </div>

            <div class="row mt-5">
              <div class="col-md-4">
                @lang('admin.username')
              </div>
              <div class="col-md-8">
                <input type="text" class="form-control" name="email_username" value="{{getSetting('email_username')}}" placeholder="">
              </div>
            </div>

            <div class="row mt-5">
              <div class="col-md-4">
                @lang('admin.password')
              </div>
              <div class="col-md-8">
                <input type="password" class="form-control" name="email_password" value="{{getSetting('email_password')}}" placeholder="">
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
