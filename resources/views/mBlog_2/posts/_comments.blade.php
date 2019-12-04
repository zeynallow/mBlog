@foreach($comments as $comment)
  <div class="display-comment pb-10" @if($comment->parent_id != null) style="margin-left:40px;" @endif>
    <div class="comment-view mb-20">
      <strong>{{ $comment->user->name }}</strong>
      <small class="pull-right">{{$comment->created_at->diffForHumans()}}</small>
      <p>{{ $comment->body }}</p>
      @if(auth()->check())
        <button type="button" class="sm-btn" onclick="commentReply({{$comment->id}})"><i class="zmdi zmdi-mail-reply"></i>@lang('site.reply')</button>
      @else
        <button type="button" class="sm-btn" data-toggle="modal" data-target="#loginModal"><i class="zmdi zmdi-mail-reply"></i>@lang('site.reply')</button>
      @endif
    </div>

    <form class="custom-input" id="comment_reply_{{$comment->id}}" method="post" action="{{ route('post.commentStore') }}" style="display:none;">
      @csrf
      <div class="form-group">
        <input type="text" name="body" placeholder="Your reply"/>
        <input type="hidden" name="post_id" value="{{ $post_id }}" />
        <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
      </div>
      <div class="form-group">
        <button type="submit" class="btn theme-btn mt-20">@lang('site.reply')</button>
      </div>
    </form>

    @include('mBlog.posts._comments', ['comments' => $comment->replies])
  </div>
@endforeach
