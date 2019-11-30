@extends('translation::layout')

@section('content')

  @if(count($languages))
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">

              <h4 class="card-title">{{ __('translation::translation.languages') }}</h4>

                <a href="{{ route('languages.create') }}" class="btn btn-success pull-right">
                  {{ __('translation::translation.add') }}
                </a>

                <table class="table">

                  <thead>
                    <tr>
                      <th>{{ __('translation::translation.language_name') }}</th>
                      <th>{{ __('translation::translation.locale') }}</th>
                    </tr>
                  </thead>

                  <tbody>
                    @foreach($languages as $language => $name)
                      <tr>
                        <td>
                          {{ $name }}
                        </td>
                        <td>
                          <a href="{{ route('languages.translations.index', $language) }}">
                            {{ $language }}
                          </a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>


            </div>
          </div>
        </div>
      </div>
    </div>

  @endif

@endsection
