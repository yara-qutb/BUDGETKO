<div class="page" style=" background-image: url('{{ asset('img/auth/Sign.svg') }}'); background-position: center; background-size: cover;">
  <a href="/" style="width: 100%; height: 600px" ></a>
  <div class="main">
        <div class="text">
          <h3>@yield('text')</h3>
        </div>
        <div class="main-form">
          <form method="POST" action="@yield('action')" class="form-control">
            @csrf
            <div class="form">

              <div class="inputs">
                @yield('name')
                <div class="input">
                  <input type="email" name="email" :value="old('email')" required autofocus autocomplete="username" id="email" class="form-control"  placeholder="{{ trans('message.Enter E-mail address') }}" />
                  {{-- Start Errors --}}
                  @if ($errors->has('email'))
                    <div class="error">
                      <ul>
                        <li style="color: #D50000; ">{{ $errors->first('email') }}</li>
                      </ul>
                    </div>
                  @endif
                  {{-- End Errors --}}
                </div>

                <div class="input">
                  <input type="password" id="password" name="password" required autocomplete="new-password" placeholder="{{ trans('message.Password') }}" class="form-control" />
                  {{-- Start Errors --}}
                  @if ($errors->has('password'))
                    <div class="error">
                      <ul>
                        <li style="color: #D50000; ">{{ $errors->first('password') }}</li>
                      </ul>
                    </div>
                  @endif
                  {{-- End Errors --}}
                </div>

                @yield('con-pass')

                @if (session('lang') == "ar")
                    <i class="fa-regular fa-eye-slash pass" id="toggle-password" style="left: 8%;"></i>
                @else
                    <i class="fa-regular fa-eye-slash pass" id="toggle-password" style="right: 8%;"></i>
                @endif



                @yield('eye')

              </div>
              <div class="lines">
                {{-- <span class="line ln"></span>
                <span class="or">{{ trans('message.or') }}</span>
                <span class="line"></span> --}}
              </div>


              @yield('logwith')

              <div class="button">
                <button  id="loginButton"  type="submit">@yield('button')</button>
              </div>
              <div class="login">
                @yield('login')
              </div>
            </div>
          </form>
        </div>
  </div>
  <a href="/" style="width: 100%; height: 600px; grid-column: 3;" ></a>
</div>
    <script src="{{ asset("asset/js/sign.js") }}"></script>
</body>
</html>
