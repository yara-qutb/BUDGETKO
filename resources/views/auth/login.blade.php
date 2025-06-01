
{{-- body --}}
  @extends('user.sign')

  @section('text')
    {{ trans('message.Login to access your account') }}
  @endsection

  @section('action')
    {{ route('login') }}
  @endsection

  @section('logwith')
  <div class="login-with">

    <div class="google">
      <div class="google-link font">
        @if (session('lang') == "ar")
          <a href="{{ route('login.google') }}">
              <span>{{ trans('message.Login with Google') }}</span>
          </a>
          <img src="{{ asset("img/auth/Google.svg") }}" alt="" />
        @else
            <a href="{{ route('login.google') }}">
                <img src="{{ asset("img/auth/Google.svg") }}" alt="" />
                <span>{{ trans('message.Login with Google') }}</span>
            </a>
        @endif
        
      </div>
    </div>

    <div class="facebook">
      <div class="facebook-link font">
        @if (session('lang') == "ar")
        <a href="/forgot-password"><span>نسيت كلمة المرور؟</span></a>
        @else
          <a href="/forgot-password"><span>Forgot Your Password?</span></a>
        @endif
      </div>
    </div>

  </div>
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