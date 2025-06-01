

{{-- body --}}
  @extends('user.sign')

  @section('text')
    {{ trans('message.Sign Up to create an account') }}
  @endsection

  @section('action')
    {{ route('register') }}
  @endsection

  @section('name')
    <div class="input">
      <input type="text" id="name" name="name" :value="old('name')" required autofocus class="form-control" autocomplete="name" placeholder="{{ trans('message.Full Name') }}"  />   
      {{-- Start Errors --}}
      @if ($errors->has('name'))
      <div class="error">
        <ul>
          <li style="color: #D50000; ">{{ $errors->first('name') }}</li>
        </ul>
      </div>
      @endif
      {{-- End Errors --}}
    </div>
  @endsection

  @section('con-pass')
    <div class="input">
      <input type="password" id="password_confirmation" name="password_confirmation"  class="form-control @error('password_confirmation') is-invalid @enderror"  autocomplete="new-password" placeholder="{{ trans('message.Confirm Password') }}"/>
      {{-- Start Errors --}}
      @if ($errors->has('pasword_confirmation'))
      <div class="error">
        <ul>
          <li style="color: #D50000; ">{{ $errors->first('password_confirmation') }}</li>
        </ul>
      </div>
      @endif
      {{-- End Errors --}}
    </div>
  @endsection
    
  @section('eye')
    @if (session('lang') == "ar")
        <i class="fa-regular fa-eye-slash con_pass" id="toggle-confirm-password" style="left: 8%;"></i>
    @else
        <i class="fa-regular fa-eye-slash con_pass" id="toggle-confirm-password" style="right: 8%;"></i>
    @endif
  @endsection

  @section('google')
    {{ trans('message.Login with Google') }}
  @endsection

  @section('facebook')
    {{ trans('message.Login with Facebook') }}
  @endsection

  @section('button')
    {{ trans('message.Sign up') }}
  @endsection

  @section('login')
    <span>{{ trans('message.Already have an account?') }} <a href="{{ route("login") }}">{{ trans('message.Login') }}</a></span>
  @endsection
    
{{-- End body --}}

{{-- Head --}}
@extends('user.head')

@section('title')
  {{ trans('message.Sign up') }}
@endsection

@section('cssLinks')
  <link rel="stylesheet" href="{{ asset("asset/css/signup.css") }}" />
  <link rel="stylesheet" href="{{ asset("asset/css/main_auth.css") }}" />
@endsection

{{-- End head --}}

