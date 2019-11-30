@extends('translation::layout')

@section('content')
  @php
  $locales = \App\Locale::all();
  @endphp

  <div class="content-wrapper">

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Site Languages</h4>

            <table class="table">
              <thead>
                <tr>
                  <th>Code</th>
                  <th>Language</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($locales as $key => $locale)
                  <tr>
                    <td>{{$locale->code}}</td>
                    <td>{{$locale->name}}</td>
                    <td>
                      @if($locale->default)
                        <span class="badge badge-success">Default</span>
                      @else
                        <a href="{{route('mAdmin.settings.localeUpdate',$locale->code)}}">
                          <span class="badge badge-info">Set as Default</span>
                        </a>
                      @endif
                    </td>
                    <td><a href="{{route('mAdmin.settings.deleteLanguage',$locale->code)}}">
                      <span class="badge badge-danger"><i class="mdi mdi-delete"></i></span>
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

  <br/>
  <br/>
  @if(count($languages))
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">

            <h4 class="card-title">Translations</h4>

            <a href="{{ route('languages.create') }}" class="btn btn-success pull-right">
              {{ __('translation::translation.add') }}
            </a>

            <table class="table">

              <thead>
                <tr>
                  <th>{{ __('translation::translation.language_name') }}</th>
                  <th>{{ __('translation::translation.locale') }}</th>
                  <th></th>
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
                    <td>
                      @if(!checkLocale($language))
                        <a href="{{route('mAdmin.settings.addLanguage',$language)}}">
                          <span class="badge badge-success">+ Add to site</span>
                        </a>
                      @endif
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
