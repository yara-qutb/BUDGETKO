
{{-- body --}}
  @extends('user.sign')

  @section('text')
    {{ trans('message.Login to access your account') }}
  @endsection

  @section('action')
    {{ route('login') }}
  @endsection

  @section('google')
    {{ trans('message.Login with Google') }}
  @endsection

  @section('facebook')
    {{ trans('message.Login with Facebook') }}
  @endsection

  @section('button')
    {{ trans('message.Login') }}
  @endsection

  @section('login')
    <span>{{ trans('message.Dont have account?') }} <a href="{{ route("register") }}">{{ trans('message.Sign up') }}</a></span>
  @endsection
    
{{-- End body --}}


{{-- Head --}}
  @extends('user.head')

  @section('title')
    Login
  @endsection

  @section('cssLinks')
    <link rel="stylesheet" href="{{ asset("asset/css/login.css") }}" />
    <link rel="stylesheet" href="{{ asset("asset/css/main_auth.css") }}" />
  @endsection

{{-- End head --}}