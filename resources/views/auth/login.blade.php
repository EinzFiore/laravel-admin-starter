<!DOCTYPE html>
<html lang="en">
@include('layouts.assets.css')
<body>
    <div class="container-fluid p-0">
        <div class="row">
          <div class="col-12">     
            <div class="login-card">
              <div>
                <div><a class="logo" href="index.html"><img class="img-fluid for-light" src="../assets/images/logo/login.png" alt="looginpage"><img class="img-fluid for-dark" src="../assets/images/logo/logo_dark.png" alt="looginpage"></a></div>
                <div class="login-main"> 
                  <form class="theme-form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <h4>Sign in to account</h4>
                    <p>Enter your username & password to login</p>
                    <div class="form-group">
                      <label class="col-form-label">Username</label>
                      <input class="form-control username" name="username" type="username">
                      @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label class="col-form-label">Password</label>
                      <input class="form-control pwd" type="password" name="password" placeholder="*********">
                      @error('password')<div class="invalid-feedback">{{$message}}.</div>@enderror
                    </div>
                    <div class="form-group mb-0">
                      <div class="checkbox p-0">
                        <input id="checkbox1" type="checkbox">
                        <label class="text-muted" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>Remember password</label>
                      </div><a class="link" href="{{ route('password.request') }}">Forgot password?</a>
                      <button class="btn btn-primary btn-block" type="submit" id="error">Sign in</button>
                    </div>
                    <p class="mt-4 mb-0">Don't have account?<a class="ml-2" href="{{ route('register') }}">Create Account</a></p>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
</body>
@include('layouts.assets.js')
@push('script.custom')
<script>
  $(document).on('click', '#error', function(e) {
    if($('.email').val() == '' || $('.pwd').val() == ''){
    swal(
      "Error!", "Sorry, looks like some data are not filled, please try again !", "error"           
    )
    }
  });
</script>
@endpush
</html>