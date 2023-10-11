@extends('layouts.app')

@section('content')

    <div class="container" style="border: 2px solid rgb(16, 137, 211);">
        <div class="heading">{{ __('Login') }}</div>
            @if(Session::has('error'))
                <div class="alert alert-danger">
                {{ Session::get('error')}}
                </div>
            @endif
        <form method="POST" class="form" action="{{ route('login') }}">
           @csrf
          <input class="input @error('email') is-invalid @enderror" type="email" name="email" id="email" placeholder="{{ __('Email Address') }}">
                @error('email')
                    <span class=" text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
          <input class="input @error('password') is-invalid @enderror" type="password" name="password" id="password" placeholder="{{ __('Password') }}">
          
            @error('password')
                    <span class=" text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
          <span class="forgot-password"> 
               @if (Route::has('password.request'))
                    <a class="" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </span>
          <input class="login-button" type="submit" value="Sign In">
          
        </form>
   </div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                   @if(Session::has('error'))
                    <div class="alert alert-danger">
                             {{ Session::get('error')}}
                    </div>
                    @endif
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" autofocus>

                                @error('email')
                                    <span class=" text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="current-password">

                                @error('password')
                                    <span class=" text-danger " role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                        <label for="CaptchaCode" class="col-md-4 col-form-label text-md-end">{{ __('Captcha') }}</label>


                            <div class="col-md-6">
                                {!! captcha_image_html('ExampleCaptcha') !!}
                                <br/>
                                <input type="text" class="form-control @error('CaptchaCode') is-invalid @enderror" id="CaptchaCode" name="CaptchaCode">
                                    @error('CaptchaCode')
                                        <span class="text-danger invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <input type="hidden" value="{{ session()->get('salt') }}" name="salttaxt">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                           
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                            <!-- onclick="return getPass();" -->
                                <button type="submit"  class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ URL::asset('/public/assets/modules/jquery.min.js')}}"></script>
<script src="{{ URL::asset('/public/assets/js/sha512.js')}}"></script>
<script src="{{ URL::asset('/public/assets/js/getpwd.js')}}"></script>

<script>
		function getPass()
		{

			var salt = $('#BDC_VCID_ExampleCaptcha').val(); 
			
			
			var exp=/((?=.*\d)(?=.*[a-z])(?=.*[@#$%]).{6,10})/;

			var pvalue = $('#password').val();

			if(pvalue == ''){
				alert ("Please enter Password");
			}

			if (pvalue!=''){
				if (pvalue.search(exp)==-1) 
				{
				  //  return false;
				}
				if (pvalue!='')
				{

					var tttt=pvalue;
					var hash=sha512(pvalue);
					$('#password').val(hash);
					
				}
			}
			//$('#loginSubBTN').trigger('click');
		}

        </script>
@endsection
