<!-- Footer Section Start -->
<footer class="mt-50">
  <div class="footer-widget-area drak-bg ptb-100">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-5 mobi-mb-30">
          <div class="footer-widget about">
            <p>{{getSetting('about_footer')}}</p>

          </div>
        </div>
        <!-- /.Widget end -->
        <div class="col-xs-12 col-sm-4 col-md-4 mobi-mb-30">
          <div class="footer-widget address">
            <div class="title mb-20">
              <h4>Contact Us</h4>
            </div>
            <ul>
              <li><span>Phone:</span> <a href="tel:+9985874589">+998 587 4589</a></li>
              <li><span>Email:</span> <a href="mailto:personalinfo@mail.com">personalinfo@mail.com</a></li>
              <li class="mb-10"><span>Address:</span> 10 East 12 Street, Office
                <br /> 120, Florida, United State
              </li>
            </ul>
          </div>
        </div>
        <!-- /.Widget end -->
        <div class="col-xs-12 col-sm-4 col-md-3">
          <div class="footer-widget social-media">
            <div class="title mb-20">
              <h4>Social Networks</h4>
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
