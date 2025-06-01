{{-- body --}}

<div class="page"
    style=" background-image: url('{{ asset('img/auth/Sign.svg') }}'); background-position: center; background-size: cover;">
    <a href="/" style="width: 100%; height: 600px"></a>
    <div class="main">
        <div class="logo">
            <img src="{{ asset('img/nav/coloredLogo.svg') }}" alt="" />
        </div>
        <div class="text">
            @if (session('lang') == "ar")
                <p>نسيت كلمة السر؟ لا مشكلة. فقط أخبرنا بعنوان بريدك الإلكتروني وسنرسل إليك عبر البريد الإلكتروني رابط إعادة تعيين كلمة المرور الذي سيسمح لك باختيار كلمة مرور جديدة.</p>
            @else
                <p>Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
            @endif
        </div>
        <div class="main-form">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                @if (session('status'))
                    <div class="status mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif
                @if (session('lang') == "ar")
                    <div class="input" style="    margin-right: 8% !important;">                
                @else
                    <div class="input">                
                @endif
                    <label for="email" value="{{ __('Email') }}">{{ trans('message.email') }}</label>
                    <input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                        required autofocus autocomplete="username">
                </div>
                <div class="button">
                    @if (session('lang') == "ar")
                        <button type="submit">إعادة تعيين كلمة المرور</button>
                    @else
                        <button type="submit">Email Password Reset Link</button>
                    @endif
                </div>
            </form>
        </div>
    </div>


    <a href="/" style="width: 100%; height: 600px; grid-column: 3;"></a>

</div>
{{-- End of body --}}

{{-- Head --}}
@extends('user.head')

@section('title')
    Forgot Password
@endsection

@section('cssLinks')
    <link rel="stylesheet" href="{{ asset('asset/css/forgot-pass.css') }}" />
@endsection

{{-- End head --}}
