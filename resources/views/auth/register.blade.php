<!DOCTYPE html>
<html lang="en">
@extends('layouts.assets.css')
<body>
<div class="container-fluid p-0"> 
    <div class="row">
      <div class="col-12">     
        <div class="login-card">
          <div>
            <div><a class="logo" href="index.html"><img class="img-fluid for-light" src="../assets/images/logo/login.png" alt="looginpage"><img class="img-fluid for-dark" src="../assets/images/logo/logo_dark.png" alt="looginpage"></a></div>
            <div class="login-main"> 
              <form class="theme-form" method="POST" action="{{ route('register') }}">
                @csrf
                <h4>Create your account</h4>
                <p>Enter your personal details to create account</p>
                <div class="form-group">
                  <label class="col-form-label pt-0">Your Name</label>
                  <div class="form-row">
                    <div class="col-12">
                      <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}" required="" placeholder="Your name">
                      @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-form-label pt-0">Username</label>
                  <div class="form-row">
                    <div class="col-12">
                      <input class="form-control @error('username') is-invalid @enderror" type="text" name="username" value="{{ old('username') }}" required="">
                      @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-form-label">Email Address</label>
                  <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" required="" placeholder="Test@gmail.com">
                  @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label class="col-form-label">Password</label>
                  <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" required="" placeholder="*********">
                  @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="form-group">
                  <label class="col-form-label">Password Confirm</label>
                  <input class="form-control" name="password_confirmation" type="password" required="" placeholder="*********">
                </div>
                <div class="form-group mb-0">
                  <button class="btn btn-primary btn-block" type="submit">Create Account</button>
                </div>
                <p class="mt-4 mb-0">Already have an account?<a class="ml-2" href="{{route('login')}}">Sign in</a></p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>
@extends('layouts.assets.js')
</html>
