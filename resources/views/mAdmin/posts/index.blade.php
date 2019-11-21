@extends('mAdmin.layouts.app')
@section('content')

  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">All Posts</h4>
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
                  <th>Cover</th>
                  <th>Post</th>
                  <th>Category</th>
                  <th>Author</th>
                  <th></th>
                  <th>Created at</th>
                  <th></th>
                </tr>
              </thead>

              <tbody>
                @if($posts)
                  @foreach ($posts as $key => $post)
                    <tr>
                      <td>{{$post->id}}</td>
                      <td>
                        @if($post->cover)
                          <img width="100" src="{{$post->cover}}" class="img-responsive">
                        @endif
                      </td>
                      <td>
                        @if($post->post_data)
                          {{$post->post_data[0]->title}}
                        @endif
                      </td>
                      <td>
                        {{($post->category) ? $post->category->category_data[0]->title : ''}}
                        {{($post->subcategory) ? '/' . $post->subcategory->category_data[0]->title : ''}}
                      </td>
                      <td>{{($post->author) ? $post->author->name : ''}}</td>
                      <td>
                        {!!
                          $post->publish ?
                          '<span class="badge badge-success"><i class="mdi mdi-eye"></i></span>' :
                          '<span class="badge badge-danger"><i class="mdi mdi-eye"></i></span>'
                          !!}

                          {!!$post->featured ?
                            '<a href="'.route('mAdmin.posts.removeFeature',$post->id).'"  class="badge badge-success">Remove Featured</a>' :
                            '<a href="'.route('mAdmin.posts.setAsFeature',$post->id).'" class="badge badge-info">Set as Feature</a>'
                          !!}

                        </td>
                        <td>{{$post->created_at}}</td>
                        <td>
                          <a href="{{ route('mAdmin.posts.edit',$post->id)}}" class="badge badge-success"><i class="mdi mdi-pencil"></i></a>
                          <a href="{{ route('mAdmin.posts.destroy',$post->id)}}" class="badge badge-danger confirm-delete-alert"><i class="mdi mdi-delete"></i></a>
                        </td>
                      </tr>
                    @endforeach
                  @endif
                </tbody>
              </table>

              <div style="padding:10px;">
                {{$posts}}
              </div>


            </div>
          </div>
        </div>
      </div>
    </div>
  @endsection
