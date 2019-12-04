<!-- Modal Login -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title" id="loginModalLabel">@lang('site.sign_in')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="alert alert-danger print-error-msg" style="display:none">
          <ul></ul>
        </div>

        <form class="custom-input" id="loginForm">
          @csrf

          <div class="form-group">
            <label for="l_email">@lang('site.email')</label>
            <input id="l_email" type="email" name="email" value=""  autocomplete="email" autofocus>
          </div>

          <div class="form-group">
            <label for="l_password">@lang('site.password')</label>
            <input id="l_password" type="password" name="password"  autocomplete="current-password">
          </div>
          <a class="color-black" href="/password/reset">@lang('site.forgot_password')</a>
          <div class="form-group  text-center mt-10">
            <button type="submit" class="form-control btn theme-btn">
              @lang('site.sign_in')
            </button>
          </div>
          <div class="text-center">
            <div>@lang('site.or')</div>
            <a class="color-black" href="/register">@lang('site.sign_up')</a>
          </div>


        </form>
      </div>
    </div>
  </div>
</div>

@push('js')
  <script type="text/javascript">
  $("#loginForm").submit(function(){
    $.ajax({
      method: "POST",
      url: "{{route('login.xhr')}}",
      data: $(this).serialize(),
      success: function (data){

        if(data.status == "success"){
          location.reload();
        }else{
          $(".print-error-msg").show();
          $(".print-error-msg").html(data.message)
        }
      },
      error: function (data){
        $(".print-error-msg").show();
        $(".print-error-msg").html('@lang('site.something_went_error')')
      }
    });
    return false;
  });
</script>
@endpush
