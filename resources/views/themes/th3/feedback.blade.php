@extends('layouts.themes')

@section('content')
@include("../themes.th3.includes.breadcrumb")
<!--************************breadcrumb********************-->

<!--**********************************mid part******************-->
<div class="container card" style="border: 2px solid rgb(16, 137, 211)">
                   @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif 
                    @if(Session::has('error'))
                    <div class="alert alert-danger">
                             {{ Session::get('error')}}
                    </div>
                    @endif
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
    <span class="heading">Feedback Form</span>
    <form class="form" action="{{URL ::to('/feedback/process/')}}" method="post">
    @csrf
      <div class="group">
      <input placeholder="‎" type="text" name="name">
      <label for="name">Name</label>
      @if($errors->has('name'))
				<span class="text-danger">{{ $errors->first('name') }}</span>
      @endif
      </div>
  <div class="group">
      <input placeholder="‎" type="email" id="email" name="email" >
      <label for="email">Email</label>
      @if($errors->has('email'))
				<span class="text-danger">{{ $errors->first('email') }}</span>
      @endif
      </div>
      <div class="group">
        <input placeholder="‎" type="text" id="phone" name="phone" >
        <label for="Phone">Phone</label>
        @if($errors->has('phone'))
				<span class="text-danger">{{ $errors->first('phone') }}</span>
      @endif
        </div>
  <div class="group">
      <textarea placeholder="‎" id="comment" name="comments" rows="5"></textarea>
      <label for="comment">Comment</label>
      @if($errors->has('comments'))
				<span class="text-danger">{{ $errors->first('comments') }}</span>
      @endif
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
      <!-- <button type="submit">Submit</button> -->
      <input class="login-button" type="submit" value="Submit" />
    </form>
  </div>
  @endsection