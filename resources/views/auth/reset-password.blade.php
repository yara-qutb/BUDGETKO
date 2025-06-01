
{{-- body --}}

<div class="page" style=" background-image: url('{{ asset('img/auth/Sign.svg') }}'); background-position: center; background-size: cover;">
    <a href="/" style="width: 100%; height: 600px" ></a>
    <div class="main">
        <div class="logo">
            <img src="{{ asset("img/nav/coloredLogo.svg") }}" alt="" />
        </div>
        <div class="main-form">
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                <div class="input">
                    <label for="email" value="{{ __('Email') }}">Email</label>
                    <input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username">
                </div>
                <div class="input">
                    <label for="password" value="{{ __('Password') }}">Password</label>
                    <input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password">
                </div>
                <div class="input">
                    <label for="password_confirmation" value="{{ __('Confirm Password') }}">Confirm Password</label>
                    <input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password">
                </div>
                <div class="button">
                    <button type="submit">Reset Your Password</button>
                </div>
            </form>
        </div>
    </div>  
    

    <a href="/" style="width: 100%; height: 600px; grid-column: 3;" ></a>

</div>
{{-- End of body --}}

{{-- Head --}}
@extends('user.head')

@section('title')
  Forgot Password
@endsection

@section('cssLinks')
  <link rel="stylesheet" href="{{ asset("asset/css/forgot-pass.css") }}" />
  <link rel="stylesheet" href="{{ asset("asset/css/reset-pass.css") }}" />
@endsection

{{-- End head --}}