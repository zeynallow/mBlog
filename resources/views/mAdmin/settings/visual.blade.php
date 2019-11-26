@extends('mAdmin.layouts.app')
@push('css')
  <style media="screen">
  .custom-checkbox {
    position: relative;
    float: left;
    margin-right: 30px;
  }
  .regular-checkbox {
    display: none;
  }
  .regular-checkbox+label {
    background-color: #ddd;
    box-shadow: 0 1px 2px rgba(0,0,0,0.05), inset 0 -15px 10px -12px rgba(0,0,0,0.05);
    padding: 15px;
    border-radius: 2px;
    display: inline-block;
    position: relative;
    cursor: pointer;
    margin: 0;
  }
  .regular-checkbox:checked+label:after {
    content: '\2714';
    font-size: 22px;
    position: absolute;
    top: -2px;
    left: 7.5px;
    color: #fff;
  }
  </style>
@endpush
@section('content')

  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Visual settings</h4>
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

            <form class="forms-sample" method="post" action="{{ route('mAdmin.settings.visualUpdate') }}">
              @csrf
              @php
              $fonts = [
                'Poppins',
                'Montserrat'
              ];
              @endphp
              <div class="row">
                <div class="col-md-4">
                  Primary Font
                </div>
                <div class="col-md-8">
                  <select class="form-control" name="primary_font">

                    @foreach ($fonts as $key => $font)
                      <option value="{{$font}}" {{(getSetting('primary_font') == $font) ? 'selected' : ''}}>{{$font}}</option>
                    @endforeach

                  </select>
                </div>
              </div>

              <div class="row mt-5">
                <div class="col-md-4">
                  Secondary Font
                </div>
                <div class="col-md-8">
                  <select class="form-control" name="secondary_font">
                    @foreach ($fonts as $key => $font)
                      <option value="{{$font}}" {{(getSetting('secondary_font') == $font) ? 'selected' : ''}}>{{$font}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="row mt-5">
                <div class="col-md-4">
                  Select color
                </div>
                <div class="col-md-8">
                  <div class="row">
                    <div class="custom-checkbox">
                      <input type="radio" name="site_color" id="color1" value="default" class="regular-checkbox" {{(getSetting('site_color') == "default") ? 'checked' : ''}}>
                      <label for="color1" style="background-color: #0494b1;"></label>
                    </div>

                    <div class="custom-checkbox">
                      <input type="radio" name="site_color" id="color2" value="red" class="regular-checkbox" {{(getSetting('site_color') == "red") ? 'checked' : ''}}>
                      <label for="color2" style="background-color: #e74c3c;"></label>
                    </div>

                    <div class="custom-checkbox">
                      <input type="radio" name="site_color" id="color3" value="green" class="regular-checkbox" {{(getSetting('site_color') == "green") ? 'checked' : ''}}>
                      <label for="color3" style="background-color: #4ba567;"></label>
                    </div>

                    <div class="custom-checkbox">
                      <input type="radio" name="site_color" id="color4" value="orange" class="regular-checkbox" {{(getSetting('site_color') == "orange") ? 'checked' : ''}}>
                      <label for="color4" style="background-color: #f48b3d;"></label>
                    </div>

                    <div class="custom-checkbox">
                      <input type="radio" name="site_color" id="color5" value="purple" class="regular-checkbox" {{(getSetting('site_color') == "purple") ? 'checked' : ''}}>
                      <label for="color5" style=" background-color: #8260a8;"></label>
                    </div>

                    <div class="custom-checkbox">
                      <input type="radio" name="site_color" id="color6" value="mountain-meadow" class="regular-checkbox" {{(getSetting('site_color') == "mountain-meadow") ? 'checked' : ''}}>
                      <label for="color6" style="background-color: #16a085;"></label>
                    </div>

                    <div class="custom-checkbox">
                      <input type="radio" name="site_color" id="color7" value="blue" class="regular-checkbox" {{(getSetting('site_color') == "blue") ? 'checked' : ''}}>
                      <label for="color7" style=" background-color: #01b1d7;"></label>
                    </div>

                    <div class="custom-checkbox">
                      <input type="radio" name="site_color" id="color8" value="yellow" class="regular-checkbox" {{(getSetting('site_color') == "yellow") ? 'checked' : ''}}>
                      <label for="color8" style=" background-color: #f2d438;"></label>
                    </div>

                    <div class="custom-checkbox">
                      <input type="radio" name="site_color" id="color9" value="dark" class="regular-checkbox" {{(getSetting('site_color') == "dark") ? 'checked' : ''}}>
                      <label for="color9" style="background-color: #555;"></label>
                    </div>

                    <div class="custom-checkbox">
                      <input type="radio" name="site_color" id="color10" value="pink" class="regular-checkbox" {{(getSetting('site_color') == "pink") ? 'checked' : ''}}>
                      <label for="color10" style="background-color: #e25abc;"></label>
                    </div>

                  </div>
                </div>
              </div>

              <div class="row mt-5">
                <div class="col-md-4">
                  Logo
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    @if(getSetting('site_logo'))
                      <img width="100" src="{{ getSetting('site_logo') }}" alt="">
                    @endif
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <a class="btn btn-default btn-sm btn-file-upload">
                      <input type="file" name="site_logo" accept=".png, .jpg, .jpeg, .gif">
                    </a>
                  </div>
                </div>
              </div>

              <div class="row mt-5">
                <div class="col-md-4">
                  Favicon
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    @if(getSetting('site_favicon'))
                      <img width="100" src="{{ getSetting('site_favicon') }}" alt="">
                    @endif
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <a class="btn btn-default btn-sm btn-file-upload">
                      <input type="file" name="site_favicon" accept=".png, .jpg, .jpeg, .gif">
                    </a>
                  </div>
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
