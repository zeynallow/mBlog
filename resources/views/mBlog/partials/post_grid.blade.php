<!--post-->
<div class="col-md-4">
  <div class="blog-post mt-25">
    <div class="thumb">
      <a href="{{ route('post.show',['post_id'=>$post->id,'slug'=>$post->slug]) }}"><img src="{{ $post->cover }}" alt="{{$post->post_data()[0]->title}}" /></a>
    </div>
    <div class="blog-text pt-25">
      <a href="{{ route('post.show',['post_id'=>$post->id,'slug'=>$post->slug]) }}"><h3>{{$post->post_data()[0]->title}}</h3></a>
      <h6>{{$post->created_at->diffForHumans()}}  | {{($post->author) ? $post->author->name : ''}}</h6>
      <p>{!! str_limit($post->post_data()[0]->text,100) !!}</p>
      <a class="read-more mt-25" href="{{ route('post.show',['post_id'=>$post->id,'slug'=>$post->slug]) }}">@lang('site.read_more')</a>
    </div>
  </div>
</div>
<!--post end-->
