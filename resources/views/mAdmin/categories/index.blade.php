@extends('mAdmin.layouts.app')
@section('content')

  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">All Categories</h4>
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
                  <th>ID</th>
                  <th>Category Name</th>
                  <th>Parent Category</th>
                  <th></th>
                  <th>Menu Position</th>
                  <th></th>
                </tr>
              </thead>

              <tbody>
                @if($categories)
                  @foreach ($categories as $key => $category)
                    <tr>
                      <td>{{$category->id}}</td>
                      <td>
                        @if($category->category_data)
                          {{$category->category_data[0]->title}}
                        @endif
                      </td>
                      <td>
                        {{($category->subcategory_data()) ? $category->subcategory_data()->title : ''}}
                      </td>
                      <td>
                        {!!
                          $category->show_on_menu ?
                          '<span class="badge badge-success">Show Menu</span>' :
                          '<span class="badge badge-info">Add to menu</span>'
                          !!}
                        </td>
                        <td>{{$category->menu_position}}</td>
                        <td>
                          <a href="#" class="badge badge-success"><i class="mdi mdi-pencil"></i></a>
                          <a href="#" class="badge badge-danger"><i class="mdi mdi-delete"></i></a>
                        </td>
                      </tr>
                    @endforeach
                  @endif
                </tbody>
              </table>

              <div style="padding:10px;">
                {{$categories}}
              </div>


            </div>
          </div>
        </div>
      </div>
    </div>
  @endsection
