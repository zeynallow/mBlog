@extends('mAdmin.layouts.app')
@section('content')

  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body table-responsive">
            <h4 class="card-title">@lang('admin.all_posts')</h4>
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
            @if($posts && count($posts))
              <table class="table">
                <thead>
                  <tr>
                    <th>@lang('admin.id')</th>
                    <th>@lang('admin.cover')</th>
                    <th>@lang('admin.post')</th>
                    <th>@lang('admin.author')</th>
                    <th></th>
                    <th>@lang('admin.created_at')</th>
                    <th></th>
                  </tr>
                </thead>

                <tbody>

                  @foreach ($posts as $key => $post)
                    <tr>
                      <td>{{$post->id}}</td>
                      <td>
                          <img width="100" src="{{ ($post->cover) ? url($post->cover) : url('/assets/img/no-thumbnail.jpg') }}" class="img-responsive">
                      </td>
                      <td>
                        @isset($post->post_data()[0])
                          {{$post->post_data()[0]->title}}
                        @endisset
                      </td>
                      <td>{{($post->author) ? $post->author->name : ''}}</td>
                      <td>
                        {!!
                          $post->publish ?
                          '<span class="badge badge-success"><i class="mdi mdi-eye"></i></span>' :
                          '<span class="badge badge-danger"><i class="mdi mdi-eye"></i></span>'
                          !!}

                          {!!$post->featured ?
                            '<a href="'.route('mAdmin.posts.removeFeature',$post->id).'"  class="badge badge-success">'.trans('admin.remove_featured').'</a>' :
                            '<a href="'.route('mAdmin.posts.setAsFeature',$post->id).'" class="badge badge-info">'.trans('admin.set_as_featured').'</a>'
                            !!}

                          </td>
                          <td>{{$post->created_at}}</td>
                          <td>
                            <a href="{{ route('mAdmin.posts.edit',$post->id)}}" class="badge badge-success"><i class="mdi mdi-pencil"></i></a>
                            <a href="{{ route('mAdmin.posts.destroy',$post->id)}}" class="badge badge-danger confirm-delete-alert"><i class="mdi mdi-delete"></i></a>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>

                @else
                  <div class="alert alert-info">
                    No posts
                  </div>
                @endif

                <div style="padding:10px;">
                  {{$posts}}
                </div>


              </div>
            </div>
          </div>
        </div>
      </div>
    @endsection
