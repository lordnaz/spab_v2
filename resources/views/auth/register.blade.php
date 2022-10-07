@extends('layouts/fullLayoutMaster')

@section('title', 'Register Page')

@section('page-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/pages/authentication.css')) }}">
@endsection

@section('content')
  <div class="auth-wrapper auth-basic px-2">
    <div class="auth-inner my-2">
      <!-- Register Basic -->
      <div class="card mb-0">
        <div class="card-body">
          <a href="#" class="brand-logo">
          <img src="/img/aswara.png" width ="60" >
            <h2 class="brand-text text-primary ms-1">{!! __('locale.register_title') !!}</h2>
          </a>

          <h4 class="card-title mb-1">{!! __('locale.register_desc') !!}</h4>
          <p class="card-text mb-2">{!! __('locale.register_desc_2') !!}</p>


          <form class="auth-register-form mt-2" method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-1">
              <label for="register-username" class="form-label">{!! __('locale.register_name') !!}</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="register-username"
                name="name" aria-describedby="register-username" tabindex="1"/>
              @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="mb-1">
              <label for="register-nric" class="form-label">{!! __('locale.nric') !!}</label>
              <input type="number" class="form-control @error('nric') is-invalid @enderror" id="register-nric"
                name="nric" aria-describedby="register-nric" tabindex="1"/>
              @error('nric')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="mb-1">
              <label for="register-email" class="form-label">{!! __('locale.Email') !!}</label>
              <input type="text" class="form-control @error('email') is-invalid @enderror" id="register-email"
                name="email" aria-describedby="register-email" tabindex="1"/>
              @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="mb-1">
              <label for="register-phoneno" class="form-label">Nombor Telefon</label>
              <input type="number" class="form-control @error('phoneno') is-invalid @enderror" id="register-phoneno"
                name="phoneno" aria-describedby="register-phoneno" tabindex="1"/>
              @error('phoneno')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            

            <div class="mb-1">
              <label for="register-password" class="form-label">{!! __('locale.Password') !!}</label>

              <div class="input-group input-group-merge form-password-toggle @error('password') is-invalid @enderror">
                <input type="password" class="form-control form-control-merge @error('password') is-invalid @enderror"
                  id="register-password" name="password"
                  placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                  aria-describedby="register-password" tabindex="3" />
                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
              </div>
              @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="mb-1">
              <label for="register-password-confirm" class="form-label">{!! __('locale.confirm_password') !!}</label>

              <div class="input-group input-group-merge form-password-toggle">
                <input type="password" class="form-control form-control-merge" id="register-password-confirm"
                  name="password_confirmation"
                  placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                  aria-describedby="register-password" tabindex="3" />
                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
              </div>
            </div>
          
            <button type="submit" class="btn btn-primary w-100" tabindex="5">{!! __('locale.register_btn') !!}</button>
          </form>

          <p class="text-center mt-2">
            <span>{!! __('locale.has_account') !!}</span>
            @if (Route::has('login'))
              <a href="{{ route('login') }}" class="text-primary">
                <span><b>{!! __('locale.Login_Button') !!}</b></span>
              </a>
            @endif
          </p>

          <!-- <div class="divider my-2">
            <div class="divider-text">or</div>
          </div> -->

          <!-- <div class="auth-footer-btn d-flex justify-content-center">
            <a href="#" class="btn btn-facebook">
              <i data-feather="facebook"></i>
            </a>
            <a href="#" class="btn btn-twitter white">
              <i data-feather="twitter"></i>
            </a>
            <a href="#" class="btn btn-google">
              <i data-feather="mail"></i>
            </a>
            <a href="#" class="btn btn-github">
              <i data-feather="github"></i>
            </a>
          </div> -->
        </div>
      </div>
      <!-- /Register basic -->
    </div>
  </div>
@endsection
