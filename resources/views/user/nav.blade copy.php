<!----------------------------------------------------------- start nav ----------------------------------------------------------->

<nav>
    <div class="row in-nav">
      <div class="logo-img col-auto">
        <a href="/" class="">
          @if (session('lang') == "ar")
          <img class="logo" src="{{ asset('img/nav/ar_logo.svg') }}" alt="" style="width: 100%; margin: 2%; "/>
          @else
          <img class="logo" src="{{ asset('img/nav/logo.svg') }}" alt="" style="width: 88%;"/>    
          @endif
         
        </a>
      </div>

      <div class="col-5 search row">
        @if (session('lang') == "ar")
          <img src="{{ asset('img/nav/magnifying.svg') }}" class="right: 2%;" alt="" />
        @else
          <img src="{{ asset('img/nav/magnifying.svg') }}" class="left: 2%;" alt="" />
        @endif

        <form class="search-form col-11" >
          {{-- <form class="search-form col-11" method="post" action="{{route('search')}}"> --}}
          @csrf
          <input
            type="search"
            name="key"
            id=""
            placeholder="{{ trans('message.What_are_you_looking_for') }}"
          />
        </form>
      </div>

      @if (session('lang') == "ar")
        <div class="col nav-icons" style="grid-template-columns:  13% 15% 14% 12% 2% 22% 3% 18%; grid-template-rows: 20% 65% 15%;">              
          <div class="nav-icon lang">
            <i class="fa-solid fa-language" style="color: #ffffff;"></i>
            <a href="change/en"><span>English</span></a>
          </div>
        @else
        @guest()
        <div class="col nav-icons" style="grid-template-columns: 13% 18% 15% 12% 2% 17% 3% 17%; grid-template-rows: 20% 65% 15%;">
        @endguest
        @auth()
        <div class="col nav-icons" style="grid-template-columns: 13% 18% 15% 12% 2% 21% 3% 17%; grid-template-rows: 20% 65% 15%;">
        @endauth
          <div class="nav-icon lang">
            <i class="fa-solid fa-language" style="color: #ffffff;"></i>
            <a href="change/ar"><span>العربية</span></a>
          </div>         
        @endif

        <div class="nav-icon budget"> 
          <img class="b-img" src="{{ asset('img/nav/hand.svg') }}" alt="" />
          <a href="/budget_search"><span> {{ trans('message.budget') }}</span></a>
        </div>
        <div class="nav-icon fav"> 
          <i class="fa-regular fa-heart"></i>
          <a href="/favorite"><span> {{ trans('message.favorite') }}</span></a>
        </div>
        <div class="nav-icon cart">
          <i class="uil uil-shopping-cart"></i>
          <a href="/cart"><span>  {{ trans('message.cart') }}</span> </a>
        </div>
        @guest()
        <div class="nav-icon login"><a href="/login"><span>{{ trans('message.Login') }}</span></a></div>
        <div class="nav-icon sign"><a href="/register"><span>{{ trans('message.Sign up') }}</span></a></div>
        @endguest
        @auth()
          <div class="nav-icon profile">
            <span>{{ trans('message.hello') }} <span>{{ $userName }}</span></span>
            <span>{{ trans('message.my_account') }} <i class="fa-solid fa-caret-down" style="color: #ffffff;"></i></span>
            <div class="the_drop_down">
              <span><a href="/community"><img src="{{ asset('img/nav/community.svg') }}" alt=""> Community</a></span>
              <span><a href="/profile"><img src="{{ asset('img/nav/profile.svg') }}" alt=""> {{ trans('message.profile') }}</a></span>
              <form action="logout" method="POST">
                @csrf
                <button type="submit"><img src="{{ asset('img/nav/logout.svg') }}" alt=""> {{ trans('message.logout') }}</button>
              </form>
            </div>
          </div>
        @endauth

      </div>
    </div>
</nav>

<!----------------------------------------------------------- sec nav ----------------------------------------------------------->

<div class="hed-nav">
    <!-- <div class="row in-snav"> -->
    <div class="col-2 cat-dropdown">
      <span>{{ trans('message.all_categories') }} <img src="{{ asset('img/nav/dropdown.svg') }}" alt="" /></span>
      <div class="dropdown-content">
        <ul>
          <li class="dropdown-item">
            <a href='{{route('category',['locale' => app()->getLocale(), 'trans' => trans('message.mobiles')]) }}'>{{ trans('message.electronics') }}</a>
            @if (session('lang') == "ar")              
              <div class="in-dropdown-content" style="right:100%;">
            @else
              <div class="in-dropdown-content" style="left:100%;">         
            @endif
              <ul>
                <li>Most Popular</li>
                <li class="dropdown-item">
                  <a href='{{route('category',['locale' => app()->getLocale(), 'trans' => trans('message.mobiles')]) }}'>{{ trans('message.mobiles') }}</a>
                  @if (session('lang') == "ar")              
                  <div class="in-dropdown-content" style="right:100%;">
                  @else
                    <div class="in-dropdown-content" style="left:100%;">         
                  @endif
                    <ul>
                      <li>Sub-Item 1</li>
                      <li>Sub-Item 2</li>
                      <li>Sub-Item 3</li>
                    </ul>
                  </div>
                </li>
                <li><a href='{{route('category',['locale' => app()->getLocale(), 'trans' => trans('message.tablets')]) }}'>{{ trans('message.tablets') }}</a></li>
                <li><a href='{{route('category',['locale' => app()->getLocale(), 'trans' => trans('message.home_appliances')]) }}'>{{ trans('message.home_appliances') }}</a></li>
                <li><a href='{{route('category',['locale' => app()->getLocale(), 'trans' => trans('message.camera_photo_video')]) }}'>{{ trans('message.camera_photo_video') }}</a></li>
                <li><a href='{{route('category',['locale' => app()->getLocale(), 'trans' => trans('message.televisions')]) }}'>{{ trans('message.televisions') }}</a></li>
                <li><a href='{{route('category',['locale' => app()->getLocale(), 'trans' => trans('message.headphones')]) }}'>{{ trans('message.headphones') }}</a></li>
                <li><a href='{{route('category',['locale' => app()->getLocale(), 'trans' => trans('message.video_games')]) }}'>{{ trans('message.video_games') }}</a></li>
              </ul>
            </div>
          </li>
          <li class="dropdown-item">
            Item 2
            @if (session('lang') == "ar")              
              <div class="in-dropdown-content" style="right:100%;">
            @else
              <div class="in-dropdown-content" style="left:100%;">         
            @endif
              <ul>
                <li>Sub-Item 1</li>
                <li>Sub-Item 2</li>
                <li>Sub-Item 3</li>
              </ul>
            </div>
          </li>
          <li class="dropdown-item">
            Item 3
            @if (session('lang') == "ar")              
              <div class="in-dropdown-content" style="right:100%;">
            @else
              <div class="in-dropdown-content" style="left:100%;">         
            @endif
              <ul>
                <li>Sub-Item 1</li>
                <li>Sub-Item 2</li>
                <li>Sub-Item 3</li>
              </ul>
            </div>
          </li>
        </ul>
      </div>
    </div>
    <div class="col cat">
      <a href='{{route('category',['locale' => app()->getLocale(), 'trans' => trans('message.electronics')]) }}'>{{ trans('message.electronics') }}</a>
      <a href='{{route('category',['locale' => app()->getLocale(), 'trans' => trans('message.home')]) }}'>{{ trans('message.home') }}</a>
      <a href='{{route('category',['locale' => app()->getLocale(), 'trans' => trans('message.mobiles')]) }}'>{{ trans('message.mobiles') }}</a>
      <a href='{{route('category',['locale' => app()->getLocale(), 'trans' => trans('message.baby_and_toys')]) }}'>{{ trans('message.baby_and_toys') }}</a>
      <a href='{{route('category',['locale' => app()->getLocale(), 'trans' => trans('message.Supermarket')]) }}'>{{ trans('message.Supermarket') }}</a>
      <a href='{{route('category',['locale' => app()->getLocale(), 'trans' => trans('message.men')]) }}'>{{ trans('message.men') }}</a>
      <a href='{{route('category',['locale' => app()->getLocale(), 'trans' => trans('message.women')]) }}'>{{ trans('message.women') }}</a>
      <a href='{{route('category',['locale' => app()->getLocale(), 'trans' => trans('message.beauty_and_health')]) }}'>{{ trans('message.beauty_and_health') }}</a>
    </div>
    <!-- </div> -->
</div>

<!----------------------------------------------------------- end nav ----------------------------------------------------------->
