<!----------------------------------------------------------- start nav ----------------------------------------------------------->

<nav>
    <div class="row in-nav">
        <div class="logo-img col-auto">
            <a href="/" class="">
                @if (session('lang') == 'ar')
                    <img class="logo" src="{{ asset('img/nav/ar_logo.svg') }}" alt=""
                        style="width: 100%; margin: 2%; " />
                @else
                    <img class="logo" src="{{ asset('img/nav/new logo.svg') }}" alt="" style="width: 88%;" />
                @endif

            </a>
        </div>

        <div class="col-5 search row">

                <form class="search-form col-11" action="{{route('search')}}" method="GET">
                        @csrf
                        <input type="search" name="key" id="" placeholder="{{ trans('message.search_here') }}" />
                        @if (session('lang') == 'ar')
                                <button type="submit" style="justify-content: space-around;">
                        @else
                                <button type="submit" style="justify-content: space-between;">
                        @endif
                                <div class="s-img">
                                        @if (session('lang') == 'ar')
                                        <img src="{{ asset('img/nav/magnifying.svg') }}" class="right: 2%;" alt="" />
                                        @else
                                        <img src="{{ asset('img/nav/magnifying.svg') }}" class="left: 2%;" alt="" />
                                        @endif
                                </div>
                                <span>{{ trans('message.search') }}</span>
                                </button>
                </form>
        </div>

        @if (session('lang') == 'ar')
            <div class="col nav-icons"
                style="grid-template-columns:  13% 15% 14% 12% 2% 22% 3% 18%; grid-template-rows: 20% 65% 15%;">
                <div class="nav-icon nav-dropdown lang">
                    <a href="change/ar"><span>AR <img src="{{ asset('img/nav/arrow.svg') }}" alt=""></span></a>
                    <div class="dropdown-nav-content">
                        <ul>
                            <a href="change/en"><span>EN</span></a>
                        </ul>
                    </div>
                </div>
            @else
                @guest()
                    <div class="col nav-icons"
                        style="grid-template-columns: 13% 18% 15% 12% 2% 17% 3% 17%; grid-template-rows: 20% 65% 15%;">
                    @endguest
                    @auth()
                        <div class="col nav-icons"
                            style="grid-template-columns: 13% 18% 15% 12% 2% 25% 3% 0%; grid-template-rows: 20% 65% 15%;">
                            {{-- <div class="col nav-icons" style="grid-template-columns: 13% 18% 15% 12% 2% 21% 3% 17%; grid-template-rows: 20% 65% 15%;"> --}}
                        @endauth
                        <div class="nav-icon nav-dropdown lang">
                            <a href="{{route('change.language', ['lang' => 'en'])}}"><span>EN <img src="{{ asset('img/nav/arrow.svg') }}"
                                        alt=""></span></a>
                            <div class="dropdown-nav-content">
                                <ul>
                                    <a href="change/ar"><span>AR</span></a>
                                </ul>
                            </div>
                        </div>
        @endif

        <div class="nav-icon budget">
            <a href="/budget_search"><img class="b-img" src="{{ asset('img/nav/budget.svg') }}" alt="" /></a>
            <a href="/budget_search"><span> {{ trans('message.budget') }}</span></a>
        </div>
        <div class="nav-icon fav">
            <a href="/favorite"><i class="fa-regular fa-heart"></i></a>
            <a href="/favorite"><span> {{ trans('message.favorite') }}</span></a>
        </div>
        <div class="nav-icon cart">
            <a href="/cart"><i class="uil uil-shopping-cart"></i></a>
            <a href="/cart"><span> {{ trans('message.cart') }}</span> </a>
        </div>
        @guest()
            <div class="nav-icon login"><a href="/login"><span>{{ trans('message.Login') }}</span></a></div>
            <div class="nav-icon sign"><a href="/register"><span>{{ trans('message.Sign up') }}</span></a></div>
        @endguest
        @auth()
            @if (session('lang') == 'ar')
            <div class="nav-icon profile" style="border-right: 1px dashed #235bb1;">
            @else
            <div class="nav-icon profile" style="border-left: 1px dashed #235bb1;">
            @endif
                {{-- <span>{{ trans('message.hello') }} <span>{{ $userName }}</span></span> --}}
                <img src="{{ asset('img/nav/user.svg') }}" alt="">
                <span><span>{{ trans('message.hello') }} <span>{{ $userName }}</span></span> <i class="fa-solid fa-caret-down" style="color: #556987;"></i></span>
                {{-- <span>{{ trans('message.my_account') }} <i class="fa-solid fa-caret-down" style="color: #556987;"></i></span> --}}
                <div class="the_drop_down">
                    <span><a href="/community"><img src="{{ asset('img/nav/community.svg') }}" alt="">
                        {{ trans('message.Community') }}</a></span>
                    <span><a href="/profile"><img src="{{ asset('img/nav/profile.svg') }}" alt="">
                            {{ trans('message.profile') }}</a></span>
                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <button type="submit"><img src="{{ asset('img/nav/logout.svg') }}" alt="">
                            {{ trans('message.logout') }}</button>
                    </form>
                </div>
            </div>
        @endauth

    </div>
    </div>
</nav>

<!----------------------------------------------------------- sec nav ----------------------------------------------------------->
{{-- route search --}}
<div class="hed-nav">
    <!-- <div class="row in-snav"> -->
    <div class="container">
        @if (session('lang') == 'ar')
                <div class="col-2 cat-dropdown drop" style="width: 6.666667% !important;">
                        <span>{{ trans('message.electronics') }}</span>
                        <div class="dropdown-content dropcontent" style="right: -76px; width: 274% !important;">
        @else
                <div class="col-2 cat-dropdown drop" style="width: 11.666667% !important;">
                        <span>{{ trans('message.electronics') }}</span>
                        <div class="dropdown-content dropcontent" style="right: -20px; width: 135% !important;">
        @endif
                                <ul>

                                        <li>{{ trans('message.most_pop') }}</li>
                                        <li class="dropdown-item">
                                                <a href='{{ route('category', ['trans' => trans('message.mobiles')]) }}'>{{ trans('message.mobiles') }}</a>
                                                @if (session('lang') == "ar")
                                                        <div class="in-dropdown-content" style="right:100%;">
                                                @else
                                                        <div class="in-dropdown-content" style="left:100%;">
                                                @endif
                                                                <ul>
                                                                        <li>{{ trans('message.brand') }}</li>
                                                                        <li><a href='{{ route('category', ['trans' => trans('message.mobile_samsung')]) }}'>{{ trans('message.samsung') }}</a></li>
                                                                        <li><a href='{{ route('category', ['trans' => trans('message.mobile_oppo')]) }}'>{{ trans('message.oppo') }}</a></li>
                                                                        <li><a href='{{ route('category', ['trans' => trans('message.mobile_apple')]) }}'>{{ trans('message.apple') }}</a></li>
                                                                        <li><a href='{{ route('category', ['trans' => trans('message.mobile_huawei')]) }}'>{{ trans('message.huawei') }}</a></li>
                                                                        <li><a href='{{ route('category', ['trans' => trans('message.mobile_nokia')]) }}'>{{ trans('message.nokia') }}</a></li>
                                                                        <li><a href='{{ route('category', ['trans' => trans('message.mobile_realme')]) }}'>{{ trans('message.realme') }}</a></li>
                                                                        <li><a href='{{ route('category', ['trans' => trans('message.mobile_infinix')]) }}'>{{ trans('message.infinix') }}</a></li>
                                                                        <li><a href='{{ route('category', ['trans' => trans('message.mobile_redmi')]) }}'>{{ trans('message.redmi') }}</a></li>
                                                                </ul>
                                                        </div>

                                        </li>
                                        <li class="dropdown-item"><a href='{{ route('category', ['trans' => trans('message.tablets')]) }}'>{{ trans('message.tablets') }}</a>
                                                @if (session('lang') == "ar")
                                                        <div class="in-dropdown-content" style="right:100%;">
                                                @else
                                                        <div class="in-dropdown-content" style="left:100%;">
                                                @endif
                                                                <ul>
                                                                        <li>{{ trans('message.brand') }}</li>
                                                                        <li><a href='{{ route('category', ['trans' => trans('message.tablet_samsung')]) }}'>{{ trans('message.samsung') }}</a></li>
                                                                        <li><a href='{{ route('category', ['trans' => trans('message.tablet_apple')]) }}'>{{ trans('message.apple') }}</a></li>
                                                                        <li><a href='{{ route('category', ['trans' => trans('message.tablet_huawei')]) }}'>{{ trans('message.huawei') }}</a></li>
                                                                        <li><a href='{{ route('category', ['trans' => trans('message.tablet_nokia')]) }}'>{{ trans('message.nokia') }}</a></li>
                                                                        <li><a href='{{ route('category', ['trans' => trans('message.tablet_realme')]) }}'>{{ trans('message.realme') }}</a></li>
                                                                        <li><a href='{{ route('category', ['trans' => trans('message.tablet_infinix')]) }}'>{{ trans('message.infinix') }}</a></li>
                                                                        <li><a href='{{ route('category', ['trans' => trans('message.tablet_redmi')]) }}'>{{ trans('message.redmi') }}</a></li>
                                                                </ul>
                                                        </div>
                                        </li>
                                        <li class="dropdown-item"><a href='{{ route('category', ['trans' => trans('message.laptops')]) }}'>{{ trans('message.laptops') }}</a>
                                                @if (session('lang') == "ar")
                                                        <div class="in-dropdown-content" style="right:100%;">
                                                @else
                                                        <div class="in-dropdown-content" style="left:100%;">
                                                @endif
                                                                <ul>
                                                                        <li>{{ trans('message.brand') }}</li>
                                                                        <li><a href='{{ route('category', ['trans' => trans('message.laptop_hp')]) }}'>{{ trans('message.hp') }}</a></li>
                                                                        <li><a href='{{ route('category', ['trans' => trans('message.laptop_dell')]) }}'>{{ trans('message.dell') }}</a></li>
                                                                        <li><a href='{{ route('category', ['trans' => trans('message.laptop_apple')]) }}'>{{ trans('message.apple') }}</a></li>
                                                                        <li><a href='{{ route('category', ['trans' => trans('message.laptop_lenovo')]) }}'>{{ trans('message.lenovo') }}</a></li>
                                                                        <li><a href='{{ route('category', ['trans' => trans('message.laptop_microsoft')]) }}'>{{ trans('message.microsoft') }}</a></li>
                                                                        <li><a href='{{ route('category', ['trans' => trans('message.laptop_macBook')]) }}'>{{ trans('message.MacBook') }}</a></li>
                                                                        <li><a href='{{ route('category', ['trans' => trans('message.laptop_samsung')]) }}'>{{ trans('message.samsung') }}</a></li>
                                                                        <li><a href='{{ route('category', ['trans' => trans('message.laptop_huawei')]) }}'>{{ trans('message.huawei') }}</a></li>
                                                                </ul>
                                                        </div>
                                        </li>
                                        <li class="dropdown-item"><a href='{{ route('category', ['trans' => trans('message.televisions')]) }}'>{{ trans('message.televisions') }}</a>
                                                @if (session('lang') == "ar")
                                                        <div class="in-dropdown-content" style="right:100%;">
                                                @else
                                                        <div class="in-dropdown-content" style="left:100%;">
                                                @endif
                                                                <ul>
                                                                        <li>{{ trans('message.brand') }}</li>
                                                                        <li><a href='{{ route('category', ['trans' => trans('message.television_lg')]) }}'>{{ trans('message.lg') }}</a></li>
                                                                        <li><a href='{{ route('category', ['trans' => trans('message.television_Sony')]) }}'>{{ trans('message.Sony') }}</a></li>
                                                                        <li><a href='{{ route('category', ['trans' => trans('message.television_samsung')]) }}'>{{ trans('message.samsung') }}</a></li>
                                                                </ul>
                                                        </div>
                                        </li>
                                        <li><a href='{{ route('category', ['trans' => trans('message.headphones')]) }}'>{{ trans('message.headphones') }}</a></li>
                                        <li><a href='{{ route('category', ['trans' => trans('message.camera_photo_video')]) }}'>{{ trans('message.camera_photo_video') }}</a></li>
                                        <li><a href='{{ route('category', ['trans' => trans('message.video_games')]) }}'>{{ trans('message.video_games') }}</a></li>
                                </ul>
                        </div>
                </div>


        <div class="col-2 cat-dropdown2 drop" style="width: 7.666667% !important;">
            @if (session('lang') == 'ar')
            <span>{{ trans('message.home') }}</span>
            <div class="dropdown-content2 dropcontent" style="right: -73px; width: 269% !important;">
            @else
            <span>{{ trans('message.home') }}</span>
            <div class="dropdown-content2 dropcontent" style="right: -45px; width: 197% !important;">
            @endif
                <ul>
                    <li>{{ trans('message.most_pop') }}</li>
                    <li  class="dropdown-item"><a href='{{ route('category', ['trans' => trans('message.home_decor')]) }}'>{{ trans('message.home_decor') }}</a>
                        @if (session('lang') == "ar")
                                <div class="in-dropdown-content" style="right:100%;">
                        @else
                                <div class="in-dropdown-content" style="left:100%;">
                        @endif
                                        <ul>
                                                <li>{{ trans('message.brand') }}</li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Mirrors')]) }}'>{{ trans('message.Mirrors') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Wall_Decor')]) }}'>{{ trans('message.Wall_Decor') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Vases')]) }}'>{{ trans('message.Vases') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Candle_stands')]) }}'>{{ trans('message.Candle_stands') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Fresh_flowers')]) }}'>{{ trans('message.Fresh_flowers') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Planters')]) }}'>{{ trans('message.Planters') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Clocks')]) }}'>{{ trans('message.Clocks') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Rugs')]) }}'>{{ trans('message.Rugs') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Baskets')]) }}'>{{ trans('message.Baskets') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Figurines')]) }}'>{{ trans('message.Figurines') }}</a></li>
                                        </ul>
                                </div>
                    </li>
                    <li  class="dropdown-item"><a href='{{ route('category', ['trans' => trans('message.home_appliances')]) }}'>{{ trans('message.home_appliances') }}</a>
                        @if (session('lang') == "ar")
                                <div class="in-dropdown-content" style="right:100%;">
                        @else
                                <div class="in-dropdown-content" style="left:100%;">
                        @endif
                                        <ul>
                                                <li>{{ trans('message.brand') }}</li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Fan')]) }}'>{{ trans('message.Fan') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Oven')]) }}'>{{ trans('message.Oven') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Refrigerator')]) }}'>{{ trans('message.Refrigerator') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Microwave')]) }}'>{{ trans('message.Microwave') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Blender')]) }}'>{{ trans('message.Blender') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Air_Conditioner')]) }}'>{{ trans('message.Air_Conditioner') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Dishwasher')]) }}'>{{ trans('message.Dishwasher') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Toaster')]) }}'>{{ trans('message.Toaster') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Stove')]) }}'>{{ trans('message.Stove') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Coffee_Maker')]) }}'>{{ trans('message.Coffee_Maker') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Kettle')]) }}'>{{ trans('message.Kettle') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Television')]) }}'>{{ trans('message.Television') }}</a></li>
                                        </ul>
                                </div>
                    </li>
                    <li  class="dropdown-item"><a href='{{ route('category', ['trans' => trans('message.furniture')]) }}'>{{ trans('message.furniture') }}</a>
                        @if (session('lang') == "ar")
                                <div class="in-dropdown-content" style="right:100%;">
                        @else
                                <div class="in-dropdown-content" style="left:100%;">
                        @endif
                                        <ul>
                                                <li>{{ trans('message.brand') }}</li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Bed')]) }}'>{{ trans('message.Bed') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Table')]) }}'>{{ trans('message.Table') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Chairs')]) }}'>{{ trans('message.Chairs') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Chests')]) }}'>{{ trans('message.Chests') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Clocks')]) }}'>{{ trans('message.Clocks') }}</a></li>
                                        </ul>
                                </div>
                    </li>
                    <li><a href='{{ route('category', ['trans' => trans('message.tools_home_improv')]) }}'>{{ trans('message.tools_home_improv') }}</a>
                    </li>
                    <li><a href='{{ route('category', ['trans' => trans('message.bath_bedding')]) }}'>{{ trans('message.bath_bedding') }}</a></li>
                </ul>
            </div>
        </div>


        <div class="col-2 cat-dropdown3 drop" style="width: 7.666667% !important;">
            <span>{{ trans('message.c_mobiles') }}</span>
            @if (session('lang') == 'ar')
                <div class="dropdown-content3 dropcontent" style="right: -92px; width: 318% !important;">
            @else
                <div class="dropdown-content3 dropcontent" style="right: -52px; width: 189% !important;">
            @endif
                <ul>
                    <li>{{ trans('message.most_pop') }}</li>
                    <li  class="dropdown-item"><a href='{{ route('category', ['trans' => trans('message.mobile_new_arrivals')]) }}'>{{ trans('message.mobile_new_arrivals') }}</a>
                        @if (session('lang') == "ar")
                                                        <div class="in-dropdown-content" style="right:100%;">
                                                @else
                                                        <div class="in-dropdown-content" style="left:100%;">
                                                @endif
                                                                <ul>
                                                                        <li>{{ trans('message.brand') }}</li>
                                                                        <li><a href='{{ route('category', ['trans' => trans('message.mobile_samsung')]) }}'>{{ trans('message.samsung') }}</a></li>
                                                                        <li><a href='{{ route('category', ['trans' => trans('message.mobile_oppo')]) }}'>{{ trans('message.oppo') }}</a></li>
                                                                        <li><a href='{{ route('category', ['trans' => trans('message.mobile_apple')]) }}'>{{ trans('message.apple') }}</a></li>
                                                                        <li><a href='{{ route('category', ['trans' => trans('message.mobile_huawei')]) }}'>{{ trans('message.huawei') }}</a></li>
                                                                        <li><a href='{{ route('category', ['trans' => trans('message.mobile_nokia')]) }}'>{{ trans('message.nokia') }}</a></li>
                                                                        <li><a href='{{ route('category', ['trans' => trans('message.mobile_realme')]) }}'>{{ trans('message.realme') }}</a></li>
                                                                        <li><a href='{{ route('category', ['trans' => trans('message.mobile_infinix')]) }}'>{{ trans('message.infinix') }}</a></li>
                                                                        <li><a href='{{ route('category', ['trans' => trans('message.mobile_redmi')]) }}'>{{ trans('message.redmi') }}</a></li>
                                                                </ul>
                                                        </div>
                    </li>
                    <li  class="dropdown-item"><a href='{{ route('category', ['trans' => trans('message.all_mob_phones')]) }}'>{{ trans('message.all_mob_phones') }}</a>
                        @if (session('lang') == "ar")
                                                        <div class="in-dropdown-content" style="right:100%;">
                                                @else
                                                        <div class="in-dropdown-content" style="left:100%;">
                                                @endif
                                                                <ul>
                                                                        <li>{{ trans('message.brand') }}</li>
                                                                        <li><a href='{{ route('category', ['trans' => trans('message.mobile_samsung')]) }}'>{{ trans('message.samsung') }}</a></li>
                                                                        <li><a href='{{ route('category', ['trans' => trans('message.mobile_oppo')]) }}'>{{ trans('message.oppo') }}</a></li>
                                                                        <li><a href='{{ route('category', ['trans' => trans('message.mobile_apple')]) }}'>{{ trans('message.apple') }}</a></li>
                                                                        <li><a href='{{ route('category', ['trans' => trans('message.mobile_huawei')]) }}'>{{ trans('message.huawei') }}</a></li>
                                                                        <li><a href='{{ route('category', ['trans' => trans('message.mobile_nokia')]) }}'>{{ trans('message.nokia') }}</a></li>
                                                                        <li><a href='{{ route('category', ['trans' => trans('message.mobile_realme')]) }}'>{{ trans('message.realme') }}</a></li>
                                                                        <li><a href='{{ route('category', ['trans' => trans('message.mobile_infinix')]) }}'>{{ trans('message.infinix') }}</a></li>
                                                                        <li><a href='{{ route('category', ['trans' => trans('message.mobile_redmi')]) }}'>{{ trans('message.redmi') }}</a></li>
                                                                </ul>
                                                        </div>
                    </li>
                    <li  class="dropdown-item"><a href='{{ route('category', ['trans' => trans('message.all_tables')]) }}'>{{ trans('message.all_tables') }}</a>
                        @if (session('lang') == "ar")
                                <div class="in-dropdown-content" style="right:100%;">
                        @else
                                <div class="in-dropdown-content" style="left:100%;">
                        @endif
                                        <ul>
                                                <li>{{ trans('message.brand') }}</li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.tablet_samsung')]) }}'>{{ trans('message.samsung') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.tablet_apple')]) }}'>{{ trans('message.apple') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.tablet_huawei')]) }}'>{{ trans('message.huawei') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.tablet_nokia')]) }}'>{{ trans('message.nokia') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.tablet_realme')]) }}'>{{ trans('message.realme') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.tablet_infinix')]) }}'>{{ trans('message.infinix') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.tablet_redmi')]) }}'>{{ trans('message.redmi') }}</a></li>
                                        </ul>
                                </div>
                    </li>
                    <li><a
                            href='{{ route('category', ['trans' => trans('message.smartwatches_acces')]) }}'>{{ trans('message.smartwatches_acces') }}</a>
                    </li>
                    <li><a
                            href='{{ route('category', ['trans' => trans('message.wireless_earphones')]) }}'>{{ trans('message.wireless_earphones') }}</a>
                    </li>
                    <li><a
                            href='{{ route('category', ['trans' => trans('message.selfie_stick')]) }}'>{{ trans('message.selfie_stick') }}</a>
                    </li>
                </ul>
            </div>
        </div>

        @if (session('lang') == 'ar')
                <div class="col-2 cat-dropdown4 drop" style="width: 14.666667% !important;">
        @else
                <div class="col-2 cat-dropdown4 drop" style="width: 11.666667% !important;">
        @endif
            <span>{{ trans('message.baby_and_toys') }}</span>
            @if (session('lang') == 'ar')
                <div class="dropdown-content4 dropcontent" style="right: -41px; width: 165% !important;">
            @else
                <div class="dropdown-content4 dropcontent" style="right: -50px; width: 160% !important;">
            @endif

                <ul>
                    <li>{{ trans('message.most_pop') }}</li>
                    <li  class="dropdown-item"><a
                            href='{{ route('category', ['trans' => trans('message.strollers_prams_accessories')]) }}'>{{ trans('message.strollers_prams_accessories') }}</a>
                        @if (session('lang') == "ar")
                                        <div class="in-dropdown-content" style="right:100%;">
                                @else
                                        <div class="in-dropdown-content" style="left:100%;">
                                @endif
                                                <ul>
                                                        <li>{{ trans('message.brand') }}</li>
                                                        <li><a href='{{ route('category', ['trans' => trans('message.Pampers')]) }}'>{{ trans('message.Pampers') }}</a></li>
                                                        <li><a href='{{ route('category', ['trans' => trans('message.Baay_Joy')]) }}'>{{ trans('message.Baay_Joy') }}</a></li>
                                                        <li><a href='{{ route('category', ['trans' => trans('message.Johnsons')]) }}'>{{ trans('message.Johnsons') }}</a></li>
                                                        <li><a href='{{ route('category', ['trans' => trans('message.LOVI')]) }}'>{{ trans('message.LOVI') }}</a></li>
                                                        <li><a href='{{ route('category', ['trans' => trans('message.Sanosan')]) }}'>{{ trans('message.Sanosan') }}</a></li>
                                                        <li><a href='{{ route('category', ['trans' => trans('message.Chicco')]) }}'>{{ trans('message.Chicco') }}</a></li>

                                                </ul>
                                        </div>
                    </li>
                    <li  class="dropdown-item"><a
                            href='{{ route('category', ['trans' => trans('message.car_seats')]) }}'>{{ trans('message.car_seats') }}</a>
                    @if (session('lang') == "ar")
                                <div class="in-dropdown-content" style="right:100%;">
                        @else
                                <div class="in-dropdown-content" style="left:100%;">
                        @endif
                                        <ul>
                                                <li>{{ trans('message.brand') }}</li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Pampers')]) }}'>{{ trans('message.Pampers') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Baay_Joy')]) }}'>{{ trans('message.Baay_Joy') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Johnsons')]) }}'>{{ trans('message.Johnsons') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.LOVI')]) }}'>{{ trans('message.LOVI') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Sanosan')]) }}'>{{ trans('message.Sanosan') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Chicco')]) }}'>{{ trans('message.Chicco') }}</a></li>
                                        </ul>
                                </div></li>
                    <li  class="dropdown-item"><a
                            href='{{ route('category', ['trans' => trans('message.bathing_skincare')]) }}'>{{ trans('message.bathing_skincare') }}</a>
                    @if (session('lang') == "ar")
                                <div class="in-dropdown-content" style="right:100%;">
                        @else
                                <div class="in-dropdown-content" style="left:100%;">
                        @endif
                                        <ul>
                                                <li>{{ trans('message.brand') }}</li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Pampers')]) }}'>{{ trans('message.Pampers') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Baay_Joy')]) }}'>{{ trans('message.Baay_Joy') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Johnsons')]) }}'>{{ trans('message.Johnsons') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.LOVI')]) }}'>{{ trans('message.LOVI') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Sanosan')]) }}'>{{ trans('message.Sanosan') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Chicco')]) }}'>{{ trans('message.Chicco') }}</a></li>
                                        </ul>
                                </div></li>
                    <li  class="dropdown-item"><a
                            href='{{ route('category', ['trans' => trans('message.feeding')]) }}'>{{ trans('message.feeding') }}</a>
                    @if (session('lang') == "ar")
                                <div class="in-dropdown-content" style="right:100%;">
                        @else
                                <div class="in-dropdown-content" style="left:100%;">
                        @endif
                                        <ul>
                                                <li>{{ trans('message.brand') }}</li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Pampers')]) }}'>{{ trans('message.Pampers') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Baay_Joy')]) }}'>{{ trans('message.Baay_Joy') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Johnsons')]) }}'>{{ trans('message.Johnsons') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.LOVI')]) }}'>{{ trans('message.LOVI') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Sanosan')]) }}'>{{ trans('message.Sanosan') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Chicco')]) }}'>{{ trans('message.Chicco') }}</a></li>
                                        </ul>
                                </div></li>
                    <li  class="dropdown-item"><a
                            href='{{ route('category', ['trans' => trans('message.baby_toddler_toys')]) }}'>{{ trans('message.baby_toddler_toys') }}</a>
                    @if (session('lang') == "ar")
                                <div class="in-dropdown-content" style="right:100%;">
                        @else
                                <div class="in-dropdown-content" style="left:100%;">
                        @endif
                                        <ul>
                                                <li>{{ trans('message.brand') }}</li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Pampers')]) }}'>{{ trans('message.Pampers') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Baay_Joy')]) }}'>{{ trans('message.Baay_Joy') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Johnsons')]) }}'>{{ trans('message.Johnsons') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.LOVI')]) }}'>{{ trans('message.LOVI') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Sanosan')]) }}'>{{ trans('message.Sanosan') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Chicco')]) }}'>{{ trans('message.Chicco') }}</a></li>
                                        </ul>
                                </div></li>
                     <li  class="dropdown-item"><a
                                href='{{ route('category', ['trans' => trans('message.toys_games')]) }}'>{{ trans('message.toys_games') }}</a>
                                                @if (session('lang') == "ar")
                                                                <div class="in-dropdown-content" style="right:100%;">
                                                        @else
                                                                <div class="in-dropdown-content" style="left:100%;">
                                                        @endif
                                                                        <ul>
                                                                                <li>{{ trans('message.brand') }}</li>
                                                                                <li><a href='{{ route('category', ['trans' => trans('message.Pampers')]) }}'>{{ trans('message.Pampers') }}</a></li>
                                                                                <li><a href='{{ route('category', ['trans' => trans('message.Baay_Joy')]) }}'>{{ trans('message.Baay_Joy') }}</a></li>
                                                                                <li><a href='{{ route('category', ['trans' => trans('message.Johnsons')]) }}'>{{ trans('message.Johnsons') }}</a></li>
                                                                                <li><a href='{{ route('category', ['trans' => trans('message.LOVI')]) }}'>{{ trans('message.LOVI') }}</a></li>
                                                                                <li><a href='{{ route('category', ['trans' => trans('message.Sanosan')]) }}'>{{ trans('message.Sanosan') }}</a></li>
                                                                                <li><a href='{{ route('category', ['trans' => trans('message.Chicco')]) }}'>{{ trans('message.Chicco') }}</a></li>
                                                                        </ul>
                                                                </div></li>
                </ul>
            </div>
        </div>

        @if (session('lang') == 'ar')
                <div class="col-2 cat-dropdown5 drop" style="width: 10.666667% !important;">
        @else
                <div class="col-2 cat-dropdown5 drop" style="width: 12.666667% !important;">
        @endif

                        <span>{{ trans('message.Supermarket') }}</span>
                        <div class="dropdown-content5 dropcontent" style="right: -33px; width: 140% !important;">
                                <ul>
                                <li>{{ trans('message.most_pop') }}</li>
                                <li  class="dropdown-item"><a href='{{ route('category', ['trans' => trans('message.rice_grains')]) }}'>{{ trans('message.rice_grains') }}</a>

                                        @if (session('lang') == "ar")
                                                <div class="in-dropdown-content" style="right:100%;">
                                        @else
                                                <div class="in-dropdown-content" style="left:100%;">
                                        @endif
                                                        <ul>
                                                                <li>{{ trans('message.brand') }}</li>
                                                                <li><a href='{{ route('category', ['trans' => trans('message.Oxi')]) }}'>{{ trans('message.Oxi') }}</a></li>
                                                                <li><a href='{{ route('category', ['trans' => trans('message.Crystal')]) }}'>{{ trans('message.Crystal') }}</a></li>
                                                                <li><a href='{{ route('category', ['trans' => trans('message.Persil')]) }}'>{{ trans('message.Persil') }}</a></li>
                                                                <li><a href='{{ route('category', ['trans' => trans('message.Crystal')]) }}'>{{ trans('message.Crystal') }}</a></li>
                                                                <li><a href='{{ route('category', ['trans' => trans('message.Ariel')]) }}'>{{ trans('message.Ariel') }}</a></li>
                                                                <li><a href='{{ route('category', ['trans' => trans('message.Downy')]) }}'>{{ trans('message.Downy') }}</a></li>

                                                        </ul>
                                                </div>
                                </li>
                                <li  class="dropdown-item"><a href='{{ route('category', ['trans' => trans('message.pasta_noodles')]) }}'>{{ trans('message.pasta_noodles') }}</a>


                                        @if (session('lang') == "ar")
                                                <div class="in-dropdown-content" style="right:100%;">
                                        @else
                                                <div class="in-dropdown-content" style="left:100%;">
                                        @endif
                                                        <ul>
                                                                <li>{{ trans('message.brand') }}</li>
                                                                <li><a href='{{ route('category', ['trans' => trans('message.Oxi')]) }}'>{{ trans('message.Oxi') }}</a></li>
                                                                <li><a href='{{ route('category', ['trans' => trans('message.Crystal')]) }}'>{{ trans('message.Crystal') }}</a></li>
                                                                <li><a href='{{ route('category', ['trans' => trans('message.Persil')]) }}'>{{ trans('message.Persil') }}</a></li>
                                                                <li><a href='{{ route('category', ['trans' => trans('message.Crystal')]) }}'>{{ trans('message.Crystal') }}</a></li>
                                                                <li><a href='{{ route('category', ['trans' => trans('message.Ariel')]) }}'>{{ trans('message.Ariel') }}</a></li>
                                                                <li><a href='{{ route('category', ['trans' => trans('message.Downy')]) }}'>{{ trans('message.Downy') }}</a></li>

                                                        </ul>
                                                </div>
                                </li>
                                <li  class="dropdown-item"><a href='{{ route('category', ['trans' => trans('message.bathing_skincare')]) }}'>{{ trans('message.bathing_skincare') }}</a>


                                        @if (session('lang') == "ar")
                                                <div class="in-dropdown-content" style="right:100%;">
                                        @else
                                                <div class="in-dropdown-content" style="left:100%;">
                                        @endif
                                                        <ul>
                                                                <li>{{ trans('message.brand') }}</li>
                                                                <li><a href='{{ route('category', ['trans' => trans('message.Oxi')]) }}'>{{ trans('message.Oxi') }}</a></li>
                                                                <li><a href='{{ route('category', ['trans' => trans('message.Crystal')]) }}'>{{ trans('message.Crystal') }}</a></li>
                                                                <li><a href='{{ route('category', ['trans' => trans('message.Persil')]) }}'>{{ trans('message.Persil') }}</a></li>
                                                                <li><a href='{{ route('category', ['trans' => trans('message.Crystal')]) }}'>{{ trans('message.Crystal') }}</a></li>
                                                                <li><a href='{{ route('category', ['trans' => trans('message.Ariel')]) }}'>{{ trans('message.Ariel') }}</a></li>
                                                                <li><a href='{{ route('category', ['trans' => trans('message.Downy')]) }}'>{{ trans('message.Downy') }}</a></li>

                                                        </ul>
                                                </div>
                                </li>
                                <li  class="dropdown-item"><a href='{{ route('category', ['trans' => trans('message.feeding')]) }}'>{{ trans('message.feeding') }}</a>


                                        @if (session('lang') == "ar")
                                                <div class="in-dropdown-content" style="right:100%;">
                                        @else
                                                <div class="in-dropdown-content" style="left:100%;">
                                        @endif
                                                        <ul>
                                                                <li>{{ trans('message.brand') }}</li>
                                                                <li><a href='{{ route('category', ['trans' => trans('message.Oxi')]) }}'>{{ trans('message.Oxi') }}</a></li>
                                                                <li><a href='{{ route('category', ['trans' => trans('message.Crystal')]) }}'>{{ trans('message.Crystal') }}</a></li>
                                                                <li><a href='{{ route('category', ['trans' => trans('message.Persil')]) }}'>{{ trans('message.Persil') }}</a></li>
                                                                <li><a href='{{ route('category', ['trans' => trans('message.Crystal')]) }}'>{{ trans('message.Crystal') }}</a></li>
                                                                <li><a href='{{ route('category', ['trans' => trans('message.Ariel')]) }}'>{{ trans('message.Ariel') }}</a></li>
                                                                <li><a href='{{ route('category', ['trans' => trans('message.Downy')]) }}'>{{ trans('message.Downy') }}</a></li>

                                                        </ul>
                                                </div>
                                </li>
                                </ul>
                        </div>
                </div>

        <div class="col-2 cat-dropdown6 drop" style="width: 6.666667% !important;">
            <span>{{ trans('message.fashion') }}</span>
            <div class="dropdown-content6 dropcontent" style="right: -45px; width: 186% !important;">
                <ul>
                    <li>{{ trans('message.most_pop') }}</li>
                    <li  class="dropdown-item"><a href='{{ route('category', ['trans' => trans('message.womers_fashion')]) }}'>{{ trans('message.womers_fashion') }}</a>

                        @if (session('lang') == "ar")
                                <div class="in-dropdown-content" style="right:100%;">
                        @else
                                <div class="in-dropdown-content" style="left:100%;">
                        @endif
                                        <ul>
                                                <li>{{ trans('message.brand') }}</li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Nike')]) }}'>{{ trans('message.Nike') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Adidas')]) }}'>{{ trans('message.Adidas') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Reebok')]) }}'>{{ trans('message.Reebok') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Puma')]) }}'>{{ trans('message.Puma') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Tommy_Hilfiger')]) }}'>{{ trans('message.Tommy_Hilfiger') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Hugo_Boss')]) }}'>{{ trans('message.Hugo_Boss') }}</a></li>
                                        </ul>
                                </div>
                    </li>
                    <li class="dropdown-item"><a
                            href='{{ route('category', ['trans' => trans('message.mens_fashion')]) }}'>{{ trans('message.mens_fashion') }}</a>

                            @if (session('lang') == "ar")
                                <div class="in-dropdown-content" style="right:100%;">
                        @else
                                <div class="in-dropdown-content" style="left:100%;">
                        @endif
                                        <ul>
                                                <li>{{ trans('message.brand') }}</li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Nike')]) }}'>{{ trans('message.Nike') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Adidas')]) }}'>{{ trans('message.Adidas') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Reebok')]) }}'>{{ trans('message.Reebok') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Puma')]) }}'>{{ trans('message.Puma') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Tommy_Hilfiger')]) }}'>{{ trans('message.Tommy_Hilfiger') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Hugo_Boss')]) }}'>{{ trans('message.Hugo_Boss') }}</a></li>
                                        </ul>
                                </div>
                   </li>
                    <li class="dropdown-item"><a
                            href='{{ route('category', ['trans' => trans('message.girls_fashion')]) }}'>{{ trans('message.girls_fashion') }}</a>

                            @if (session('lang') == "ar")
                                <div class="in-dropdown-content" style="right:100%;">
                        @else
                                <div class="in-dropdown-content" style="left:100%;">
                        @endif
                                        <ul>
                                                <li>{{ trans('message.brand') }}</li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Nike')]) }}'>{{ trans('message.Nike') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Adidas')]) }}'>{{ trans('message.Adidas') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Reebok')]) }}'>{{ trans('message.Reebok') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Puma')]) }}'>{{ trans('message.Puma') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Tommy_Hilfiger')]) }}'>{{ trans('message.Tommy_Hilfiger') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Hugo_Boss')]) }}'>{{ trans('message.Hugo_Boss') }}</a></li>
                                        </ul>
                                </div>
                    </li>
                    <li class="dropdown-item"><a
                            href='{{ route('category', ['trans' => trans('message.boys_fashion')]) }}'>{{ trans('message.boys_fashion') }}</a>

                            @if (session('lang') == "ar")
                                <div class="in-dropdown-content" style="right:100%;">
                        @else
                                <div class="in-dropdown-content" style="left:100%;">
                        @endif
                                        <ul>
                                                <li>{{ trans('message.brand') }}</li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Nike')]) }}'>{{ trans('message.Nike') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Adidas')]) }}'>{{ trans('message.Adidas') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Reebok')]) }}'>{{ trans('message.Reebok') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Puma')]) }}'>{{ trans('message.Puma') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Tommy_Hilfiger')]) }}'>{{ trans('message.Tommy_Hilfiger') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Hugo_Boss')]) }}'>{{ trans('message.Hugo_Boss') }}</a></li>
                                        </ul>
                                </div>
                    </li>
                    <li class="dropdown-item"><a
                            href='{{ route('category', ['trans' => trans('message.mens_watches')]) }}'>{{ trans('message.mens_watches') }}</a>

                            @if (session('lang') == "ar")
                                <div class="in-dropdown-content" style="right:100%;">
                        @else
                                <div class="in-dropdown-content" style="left:100%;">
                        @endif
                                        <ul>
                                                <li>{{ trans('message.brand') }}</li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Nike')]) }}'>{{ trans('message.Nike') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Adidas')]) }}'>{{ trans('message.Adidas') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Reebok')]) }}'>{{ trans('message.Reebok') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Puma')]) }}'>{{ trans('message.Puma') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Tommy_Hilfiger')]) }}'>{{ trans('message.Tommy_Hilfiger') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Hugo_Boss')]) }}'>{{ trans('message.Hugo_Boss') }}</a></li>
                                        </ul>
                                </div>
                    </li>
                    <li  class="dropdown-item"><a
                            href='{{ route('category', ['trans' => trans('message.bags_and_luggage')]) }}'>{{ trans('message.bags_and_luggage') }}</a>

                            @if (session('lang') == "ar")
                                <div class="in-dropdown-content" style="right:100%;">
                        @else
                                <div class="in-dropdown-content" style="left:100%;">
                        @endif
                                        <ul>
                                                <li>{{ trans('message.brand') }}</li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Nike')]) }}'>{{ trans('message.Nike') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Adidas')]) }}'>{{ trans('message.Adidas') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Reebok')]) }}'>{{ trans('message.Reebok') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Puma')]) }}'>{{ trans('message.Puma') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Tommy_Hilfiger')]) }}'>{{ trans('message.Tommy_Hilfiger') }}</a></li>
                                                <li><a href='{{ route('category', ['trans' => trans('message.Hugo_Boss')]) }}'>{{ trans('message.Hugo_Boss') }}</a></li>
                                        </ul>
                                </div>
                    </li>
                </ul>
            </div>
        </div>

        @if (session('lang') == 'ar')
                <div class="col-2 cat-dropdown7 drop" style="width: 13.666667% !important;">
        @else
                <div class="col-2 cat-dropdown7 drop" style="width: 13.666667% !important;">
        @endif
                <span>{{ trans('message.beauty_and_health') }}</span>
                <div class="dropdown-content7 dropcontent" style="right: 0px; width: 97% !important;">
                        <ul>
                        <li>{{ trans('message.most_pop') }}</li>
                        <li  class="dropdown-item"><a  href='{{ route('category', ['trans' => trans('message.makeup')]) }}'>{{ trans('message.makeup') }}</a>


                                        @if (session('lang') == "ar")
                                                <div class="in-dropdown-content" style="right:100%;">
                                        @else
                                                <div class="in-dropdown-content" style="left:100%;">
                                        @endif
                                                        <ul>
                                                                <li>{{ trans('message.brand') }}</li>
                                                                <li><a href='{{ route('category', ['trans' => trans('message.Essence')]) }}'>{{ trans('message.Essence') }}</a></li>
                                                                <li><a href='{{ route('category', ['trans' => trans('message.CatRlce')]) }}'>{{ trans('message.CatRlce') }}</a></li>
                                                                <li><a href='{{ route('category', ['trans' => trans('message.Calvin_Klein')]) }}'>{{ trans('message.Calvin_Klein') }}</a></li>
                                                                <li><a href='{{ route('category', ['trans' => trans('message.Garnier')]) }}'>{{ trans('message.Garnier') }}</a></li>
                                                                <li><a href='{{ route('category', ['trans' => trans('message.LOreal_Parise')]) }}'>{{ trans('message.LOreal_Parise') }}</a></li>
                                                                <li><a href='{{ route('category', ['trans' => trans('message.Maybelline_New_York')]) }}'>{{ trans('message.Maybelline_New_York') }}</a></li>

                                                        </ul>
                                                </div>
                        </li>
                        <li  class="dropdown-item"><a href='{{ route('category', ['trans' => trans('message.haircare')]) }}'>{{ trans('message.haircare') }}</a>


                                        @if (session('lang') == "ar")
                                                <div class="in-dropdown-content" style="right:100%;">
                                        @else
                                                <div class="in-dropdown-content" style="left:100%;">
                                        @endif
                                                        <ul>
                                                                <li>{{ trans('message.brand') }}</li>
                                                                <li><a href='{{ route('category', ['trans' => trans('message.Essence')]) }}'>{{ trans('message.Essence') }}</a></li>
                                                                <li><a href='{{ route('category', ['trans' => trans('message.CatRlce')]) }}'>{{ trans('message.CatRlce') }}</a></li>
                                                                <li><a href='{{ route('category', ['trans' => trans('message.Calvin_Klein')]) }}'>{{ trans('message.Calvin_Klein') }}</a></li>
                                                                <li><a href='{{ route('category', ['trans' => trans('message.Garnier')]) }}'>{{ trans('message.Garnier') }}</a></li>
                                                                <li><a href='{{ route('category', ['trans' => trans('message.LOreal_Parise')]) }}'>{{ trans('message.LOreal_Parise') }}</a></li>
                                                                <li><a href='{{ route('category', ['trans' => trans('message.Maybelline_New_York')]) }}'>{{ trans('message.Maybelline_New_York') }}</a></li>

                                                        </ul>
                                                </div>
                        </li>
                        <li  class="dropdown-item"><a href='{{ route('category', ['trans' => trans('message.skincare')]) }}'>{{ trans('message.skincare') }}</a>


                                        @if (session('lang') == "ar")
                                                <div class="in-dropdown-content" style="right:100%;">
                                        @else
                                                <div class="in-dropdown-content" style="left:100%;">
                                        @endif
                                                        <ul>
                                                                <li>{{ trans('message.brand') }}</li>
                                                                <li><a href='{{ route('category', ['trans' => trans('message.Essence')]) }}'>{{ trans('message.Essence') }}</a></li>
                                                                <li><a href='{{ route('category', ['trans' => trans('message.CatRlce')]) }}'>{{ trans('message.CatRlce') }}</a></li>
                                                                <li><a href='{{ route('category', ['trans' => trans('message.Calvin_Klein')]) }}'>{{ trans('message.Calvin_Klein') }}</a></li>
                                                                <li><a href='{{ route('category', ['trans' => trans('message.Garnier')]) }}'>{{ trans('message.Garnier') }}</a></li>
                                                                <li><a href='{{ route('category', ['trans' => trans('message.LOreal_Parise')]) }}'>{{ trans('message.LOreal_Parise') }}</a></li>
                                                                <li><a href='{{ route('category', ['trans' => trans('message.Maybelline_New_York')]) }}'>{{ trans('message.Maybelline_New_York') }}</a></li>

                                                        </ul>
                                                </div>
                        </li>
                        <li  class="dropdown-item"><a href='{{ route('category', ['trans' => trans('message.personal_care')]) }}'>{{ trans('message.personal_care') }}</a>


                                        @if (session('lang') == "ar")
                                                <div class="in-dropdown-content" style="right:100%;">
                                        @else
                                                <div class="in-dropdown-content" style="left:100%;">
                                        @endif
                                                        <ul>
                                                                <li>{{ trans('message.brand') }}</li>
                                                                <li><a href='{{ route('category', ['trans' => trans('message.Essence')]) }}'>{{ trans('message.Essence') }}</a></li>
                                                                <li><a href='{{ route('category', ['trans' => trans('message.CatRlce')]) }}'>{{ trans('message.CatRlce') }}</a></li>
                                                                <li><a href='{{ route('category', ['trans' => trans('message.Calvin_Klein')]) }}'>{{ trans('message.Calvin_Klein') }}</a></li>
                                                                <li><a href='{{ route('category', ['trans' => trans('message.Garnier')]) }}'>{{ trans('message.Garnier') }}</a></li>
                                                                <li><a href='{{ route('category', ['trans' => trans('message.LOreal_Parise')]) }}'>{{ trans('message.LOreal_Parise') }}</a></li>
                                                                <li><a href='{{ route('category', ['trans' => trans('message.Maybelline_New_York')]) }}'>{{ trans('message.Maybelline_New_York') }}</a></li>

                                                        </ul>
                                                </div>
                        </li>
                        <li  class="dropdown-item"><a href='{{ route('category', ['trans' => trans('message.makeup')]) }}'>{{ trans('message.makeup') }}</a>


                                        @if (session('lang') == "ar")
                                                <div class="in-dropdown-content" style="right:100%;">
                                        @else
                                                <div class="in-dropdown-content" style="left:100%;">
                                        @endif
                                                        <ul>
                                                                <li>{{ trans('message.brand') }}</li>
                                                                <li><a href='{{ route('category', ['trans' => trans('message.Essence')]) }}'>{{ trans('message.Essence') }}</a></li>
                                                                <li><a href='{{ route('category', ['trans' => trans('message.CatRlce')]) }}'>{{ trans('message.CatRlce') }}</a></li>
                                                                <li><a href='{{ route('category', ['trans' => trans('message.Calvin_Klein')]) }}'>{{ trans('message.Calvin_Klein') }}</a></li>
                                                                <li><a href='{{ route('category', ['trans' => trans('message.Garnier')]) }}'>{{ trans('message.Garnier') }}</a></li>
                                                                <li><a href='{{ route('category', ['trans' => trans('message.LOreal_Parise')]) }}'>{{ trans('message.LOreal_Parise') }}</a></li>
                                                                <li><a href='{{ route('category', ['trans' => trans('message.Maybelline_New_York')]) }}'>{{ trans('message.Maybelline_New_York') }}</a></li>

                                                        </ul>
                                                </div>
                        </li>
                        <li  class="dropdown-item"><a href='{{ route('category', ['trans' => trans('message.haircare')]) }}'>{{ trans('message.haircare') }}</a>


                                        @if (session('lang') == "ar")
                                                <div class="in-dropdown-content" style="right:100%;">
                                        @else
                                                <div class="in-dropdown-content" style="left:100%;">
                                        @endif
                                                        <ul>
                                                                <li>{{ trans('message.brand') }}</li>
                                                                <li><a href='{{ route('category', ['trans' => trans('message.Essence')]) }}'>{{ trans('message.Essence') }}</a></li>
                                                                <li><a href='{{ route('category', ['trans' => trans('message.CatRlce')]) }}'>{{ trans('message.CatRlce') }}</a></li>
                                                                <li><a href='{{ route('category', ['trans' => trans('message.Calvin_Klein')]) }}'>{{ trans('message.Calvin_Klein') }}</a></li>
                                                                <li><a href='{{ route('category', ['trans' => trans('message.Garnier')]) }}'>{{ trans('message.Garnier') }}</a></li>
                                                                <li><a href='{{ route('category', ['trans' => trans('message.LOreal_Parise')]) }}'>{{ trans('message.LOreal_Parise') }}</a></li>
                                                                <li><a href='{{ route('category', ['trans' => trans('message.Maybelline_New_York')]) }}'>{{ trans('message.Maybelline_New_York') }}</a></li>

                                                        </ul>
                                                </div>
                        </li>
                        </ul>
                </div>
                </div>


                <div class="col-2 cat-dropdown8 drop" style="width: 16.666667% !important;">
                        <span>{{ trans('message.sport_fitness') }}</span>
                        @if (session('lang') == 'ar')
                                <div class="dropdown-content8 dropcontent" style="right: 27px; width: 86% !important;">
                        @else
                                <div class="dropdown-content8 dropcontent" style="right: -22px; width: 117% !important;">
                        @endif
                                <ul>
                                <li>{{ trans('message.most_pop') }}</li>
                                <li><a
                                        href='{{ route('category', ['trans' => trans('message.fitness_strength')]) }}'>{{ trans('message.fitness_strength') }}</a>
                                </li>
                                <li><a
                                        href='{{ route('category', ['trans' => trans('message.yoga')]) }}'>{{ trans('message.Yoga') }}</a>
                                </li>
                                <li><a
                                        href='{{ route('category', ['trans' => trans('message.cardio')]) }}'>{{ trans('message.cardio') }}</a>
                                </li>
                                <li><a
                                        href='{{ route('category', ['trans' => trans('message.water_sports')]) }}'>{{ trans('message.water_sports') }}</a>
                                </li>
                                <li><a
                                        href='{{ route('category', ['trans' => trans('message.team_sports')]) }}'>{{ trans('message.team_sports') }}</a>
                                </li>
                                <li><a
                                        href='{{ route('category', ['trans' => trans('message.combat_sports')]) }}'>{{ trans('message.combat_sports') }}</a>
                                </li>
                                <li><a
                                        href='{{ route('category', ['trans' => trans('message.hunting_fishing')]) }}'>{{ trans('message.hunting_fishing') }}</a>
                                </li>
                                <li><a
                                        href='{{ route('category', ['trans' => trans('message.skates_scooters')]) }}'>{{ trans('message.skates_scooters') }}</a>
                                </li>
                                <li><a
                                        href='{{ route('category', ['trans' => trans('message.camping_outdoor')]) }}'>{{ trans('message.camping_outdoor') }}</a>
                                </li>
                                </ul>
                        </div>
                </div>

        @if (session('lang') == 'ar')
        <div class="col-2 cat-dropdown9 drop" style="width: 12.666667% !important;">
        @else
        <div class="col-2 cat-dropdown9 drop" style="width: 10.666667% !important;">
        @endif
            <span>{{ trans('message.music') }}</span>
            <div class="dropdown-content9 dropcontent" style="right: -4px; width: 113% !important;">
                <ul>
                    <li>{{ trans('message.most_pop') }}</li>
                    <li><a
                            href='{{ route('category', ['trans' => trans('message.Piano')]) }}'>{{ trans('message.Piano') }}</a>
                    </li>
                    <li><a
                            href='{{ route('category', ['trans' => trans('message.Violin')]) }}'>{{ trans('message.Violin') }}</a>
                    </li>
                    <li><a
                            href='{{ route('category', ['trans' => trans('message.Guitar')]) }}'>{{ trans('message.Guitar') }}</a>
                    </li>
                    <li><a
                            href='{{ route('category', ['trans' => trans('message.Flutes')]) }}'>{{ trans('message.Flutes') }}</a>
                    </li>
                    <li><a
                            href='{{ route('category', ['trans' => trans('message.Percussion')]) }}'>{{ trans('message.Percussion') }}</a>
                    </li>
                </ul>
            </div>
        </div>


    </div>

</div>

<!----------------------------------------------------------- end nav ----------------------------------------------------------->
