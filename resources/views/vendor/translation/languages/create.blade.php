@extends('translation::layout')

@section('body')
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">

            <h4 class="card-title">{{ __('translation::translation.add_language') }}</h4>

            <form action="{{ route('languages.store') }}" method="POST">

              <fieldset>

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="panel-body p-4">

                  @include('translation::forms.text', ['field' => 'name', 'label' => __('translation::translation.language_name'), ])

                  @include('translation::forms.text', ['field' => 'locale', 'label' => __('translation::translation.locale'), ])

                </div>
                
              </fieldset>


              <button class="btn btn-success">
                {{ __('translation::translation.save') }}
              </button>


            </form>

          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
