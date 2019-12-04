@extends('mAdmin.layouts.app')
@section('content')

  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body table-responsive">
            <h4 class="card-title">@lang('admin.all_comments')</h4>
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
                  <th>@lang('admin.id')</th>
                  <th>@lang('admin.comment')</th>
                  <th>@lang('admin.post')</th>
                  <th>@lang('admin.user')</th>
                  <th>@lang('admin.created_at')</th>
                  <th></th>
                </tr>
              </thead>

              <tbody>
                @if($comments)
                  @foreach ($comments as $key => $comment)
                    <tr>
                      <td>{{$comment->id}}</td>
                      <td>{{$comment->body}}</td>
                      <td>
                        @if($comment->post)
                          <a target="_blank" href="{{ route('post.show',['post_id'=>$comment->post->id,'slug'=>$comment->post->slug]) }}">{{$comment->post->slug}}</a>
                        @endif
                      </td>
                      <td>
                        @if($comment->post)
                          <a target="_blank" href="{{route('mAdmin.users.edit',$comment->user->id)}}">{{$comment->user->name}}</a>
                        @endif
                      </td>
                      <td>{{$comment->created_at}}</td>
                      <td>
                        <a href="{{ route('mAdmin.comments.destroy',$comment->id)}}" class="badge badge-danger confirm-delete-alert"><i class="mdi mdi-delete"></i></a>
                      </td>
                    </tr>
                  @endforeach
                @endif
              </tbody>
            </table>

            <div style="padding:10px;">
              {{$comments}}
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
