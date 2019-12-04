<!-- Footer Section Start -->
<footer class="mt-50">
  <div class="footer-widget-area drak-bg ptb-100">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-4 mobi-mb-30">
          <div class="footer-widget about">
            <p>{{getSetting('about_footer')}}</p>
          </div>
        </div>
        <!-- /.Widget end -->
        <div class="col-xs-12 col-sm-4 col-md-5 mobi-mb-30">
          <div class="footer-widget address">
            <div class="title mb-10">
              <h4 class="mb-5">@lang('site.popular_posts')</h4>
            </div>
            <div class="posts">
              <ul>
                @if(getPopularPosts())
                  @foreach (getPopularPosts() as $key => $popular_post)
                    @isset($popular_post->post_data()[0])
                      <li><a href="{{route('post.show',[$popular_post->id,$popular_post->slug])}}"><i class="zmdi zmdi-chevron-right"></i> {{$popular_post->post_data()[0]->title}}</a></li>
                    @endisset
                  @endforeach
                @endif
              </ul>
            </div>
          </div>
        </div>
        <!-- /.Widget end -->
        <div class="col-xs-12 col-sm-4 col-md-3">
          <div class="footer-widget social-media">
            <div class="title mb-20">
              <h4>@lang('site.social_networks')</h4>
            </div>
            <div class="social-link">
              <ul class=" d-inblock">
                @if(getSetting('facebook_link'))
                  <li><a href="{{getSetting('facebook_link')}}" target="_blank"><i class="zmdi zmdi-facebook"></i> Facebook</a></li>
                @endif
                @if(getSetting('twitter_link'))
                  <li><a href="{{getSetting('twitter_link')}}" target="_blank"><i class="zmdi zmdi-twitter"></i> Twitter</a></li>
                @endif
                @if(getSetting('instagram_link'))
                  <li><a href="{{getSetting('instagram_link')}}" target="_blank"><i class="zmdi zmdi-instagram"></i> Instagram</a></li>
                @endif
                @if(getSetting('pinterest_link'))
                  <li><a href="{{getSetting('pinterest_link')}}" target="_blank"><i class="zmdi zmdi-pinterest"></i> Pinterest</a></li>
                @endif
                @if(getSetting('linkedin_link'))
                  <li><a href="{{getSetting('linkedin_link')}}" target="_blank"><i class="zmdi zmdi-linkedin"></i> LinkedIn</a></li>
                @endif
              </ul>
            </div>
            <!-- Change your social media link -->
          </div>
        </div>
        <!-- /.Widget end -->
      </div>
    </div>
  </div>
  <!-- /.Widget Area End -->
  <div class="copyright black-bg ptb-15">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 text-center">
          <div class="text">
            <p>{!!getSetting('copyright_footer')!!}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<!-- Footer Section End -->
