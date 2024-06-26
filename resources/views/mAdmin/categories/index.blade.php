@extends('mAdmin.layouts.app')
@section('content')

  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body table-responsive">
            <h4 class="card-title">@lang('admin.all_categories')</h4>
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


            @if($categories && count($categories))
              <table class="table">
                <thead>
                  <tr>
                    <th>@lang('admin.id')</th>
                    <th>@lang('admin.category_name')</th>
                    <th>@lang('admin.parent_category')</th>
                    <th></th>
                    <th>@lang('admin.menu_position')</th>
                    <th></th>
                  </tr>
                </thead>

                <tbody>
                  @foreach ($categories as $key => $category)
                    <tr>
                      <td>{{$category->id}}</td>
                      <td>
                        @isset($category->category_data_all[0])
                          {{$category->category_data_all[0]->title}}
                        @endisset
                      </td>
                      <td>
                        {{($category->subcategory_data()) ? $category->subcategory_data()->title : ''}}
                      </td>
                      <td>
                        {!!
                          $category->show_on_menu ?
                          '<a href="'.route('mAdmin.categories.hideFromMenu',$category->id).'" class="badge badge-success">'.trans('admin.hide_from_menu').'</a>' :
                          '<a href="'.route('mAdmin.categories.showOnMenu',$category->id).'" class="badge badge-info">'.trans('admin.add_to_menu').'</a>'
                          !!}
                        </td>
                        <td>{{$category->menu_position}}</td>
                        <td>
                          <a href="{{ route('mAdmin.categories.edit',$category->id)}}" class="badge badge-success"><i class="mdi mdi-pencil"></i></a>
                          <a href="{{ route('mAdmin.categories.destroy',$category->id)}}" class="badge badge-danger confirm-delete-alert"><i class="mdi mdi-delete"></i></a>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
            @else
              <div class="alert alert-info">
                No categories
              </div>
            @endif

            <div style="padding:10px;">
              {{$categories}}
            </div>


          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
