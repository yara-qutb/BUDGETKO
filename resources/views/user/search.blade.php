@extends('user.layout')

{{-- Head --}}

@section('title')
    Search
@endsection

@section('cssLinks')
    <link rel="stylesheet" href="{{ asset('asset/css/normalize.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset/css/home.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset/css/price.css') }}">
@endsection

{{-- End head --}}

{{-- Body --}}
@section('body')
    <br>
    <div class="container">@include('success')</div>

    <!-- ============================= Recommended Start =============================== -->


    <section class="recommend">
        <div class="container">
            @include('errors')

            {{-- price range --}}
            <div class="row">
                <div class="col-3">
                    <h4>{{trans('message.filter_option')}}</h4>
                    <div class="website">
                        <h5>{{trans('message.by_website')}}</h5>
                        <div class="website-filter">
                            <label class="fltr-lbl"><input type="checkbox" class="website-filter" value="jumia" checked> {{trans('message.jumia')}}</label>
                            <label class="fltr-lbl"><input type="checkbox" class="website-filter" value="raneen" checked> {{trans('message.raneen')}}</label>
                            <label class="fltr-lbl"><input type="checkbox" class="website-filter" value="elaraby" checked> {{trans('message.elaraby')}}</label>
                        </div>
                    </div>
                    <div class="price-range">
                        <h5>{{trans('message.Price_Range')}}</h5>
                        <div class="field">
                            <span class="slider-track"></span>
                            <input name="max_value" id="max-input-id" class="max-val" type="range" min="0" max="50000" value="20000">
                            <input name="min_value" id="min-input-id" class="min-val" type="range" min="0" max="50000" value="10" >

                            <span class="min-tooltip">10 LE</span>
                            <span class="max-tooltip">20000 LE</span>
                            {{-- <div class="tooltip min-tooltip"><span>$100</span></div>

                            <div class="tooltip max-tooltip"><span>$50000</span></div> --}}
                        </div>
                    </div>
                </div>

                <div class="col-9">

                    <div class="row justify-content-center">
                        <h3>{{ trans('message.Results_for') }}: "{{ $key }}"</h3>

                        <div class="slider_outer" data-website="jumia">

                            @if (!empty($data_jumia))
                                <h4 class="text">{{ trans('message.result_jumia') }}</h4>
                                <div class="slider-content search-slid" id="content">
                                    @foreach ($data_jumia['products'] as $product)
                                        @if (!empty($product))
                                            @if ($product['name'] != null)
                                                <div class="col-lg-2 col-sm-4 col-5 pro">
                                                    <div class="card">
                                                        <div class="image">
                                                            <form action="{{ route('search_product') }}" method="get">
                                                                @csrf
                                                                <button type="submit" class="img-btn"><img
                                                                        src="{{ $product['image'] }}" class="card-img-top"
                                                                        alt="..." /></button>
                                                                <input type="hidden" name="pro_name"
                                                                    value="{{ $product['name'] }}">
                                                                <input type="hidden" name="pro_image"
                                                                    value="{{ $product['image'] }}">
                                                                <input type="hidden" name="pro_price"
                                                                    value="{{ $product['price'] }}">
                                                                <input type="hidden" name="pro_link"
                                                                    value="{{ $product['link'] }}">
                                                                <input type="hidden" name="pro_from" value="Jumia">
                                                                <input type="hidden" value="{{ $key }}" name="search_key" >

                                                            </form>
                                                            <form action="{{ route('addToFavorite') }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="pro_name"
                                                                    value="{{ $product['name'] }}">
                                                                <input type="hidden"
                                                                    name="pro_image"value="{{ $product['image'] }}">
                                                                <input type="hidden" name="pro_link"
                                                                    value="{{ $product['link'] }}">
                                                                <input type="hidden"
                                                                    name="pro_price"value="{{ $product['price'] }}">
                                                                <input type="hidden" name="pro_from"value="Jumia">
                                                                <button class="heart">
                                                                    <i class="fa-regular heart-style fa-heart"></i>
                                                                </button>
                                                            </form>
                                                            <form action="{{ route('addToCart') }}" method="POST">
                                                                @csrf
                                                                <input type="hidden"
                                                                    name="pro_name"value="{{ $product['name'] }}">
                                                                <input type="hidden" name="pro_image"
                                                                    value="{{ $product['image'] }}">
                                                                <input type="hidden" name="pro_price"
                                                                    value="{{ $product['price'] }}">
                                                                <input type="hidden" name="pro_link"
                                                                    value="{{ $product['link'] }}">
                                                                <input type="hidden" name="pro_from" value="Jumia">
                                                                <button class="cart-btn">
                                                                    <i class="cart-style uil uil-shopping-cart"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                        <div class="card-body">
                                                            @if (session('lang') == 'ar')
                                                                <a href="/product">
                                                                    <h5 class="item-title card-title"
                                                                        style="direction: ltr">{{ $product['name'] }}</h5>
                                                                </a>
                                                            @else
                                                                <a href="/product">
                                                                    <h5 class="item-title card-title">
                                                                        {{ $product['name'] }}</h5>
                                                                </a>
                                                            @endif
                                                            <div class="item-body">
                                                                <p>{{ trans('message.from') }} Jumia</p>
                                                                @if (session('lang') == 'ar')
                                                                    <p class="price"><span
                                                                            class="product-price">{{ $product['price'] }}</span>{{ trans('message.egp') }}
                                                                    </p>
                                                                @else
                                                                    <p class="price">{{ trans('message.egp') }}<span
                                                                            class="product-price">{{ $product['price'] }}</span>
                                                                    </p>
                                                                @endif
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @else
                                            <div>
                                                <h4 class="text">{{ trans('message.no_result_jumia') }}</h4>
                                            </div>
                                        @endif
                                    @endforeach
                                    <button type="button" id="right-button" class="buttonr c-right _prev"><i
                                            class="fa-solid fa-chevron-right"></i></button>
                                    <button type="button" id="left-button" class="buttonl c-left _prev"><i
                                            class="fa-solid fa-chevron-left"></i></button>
                                </div>
                            @else
                                <div>
                                    <h4 class="text">{{ trans('message.no_result_jumia') }}</h4>
                                </div>
                            @endif

                        </div>
                        <div class="slider_outer" data-website="raneen">

                            @if (!empty($data_raneen))
                                <h4 class="text">{{ trans('message.result_raneen') }}</h4>
                                <div class="slider-content search-slid" id="content2">
                                    @foreach ($data_raneen['products'] as $product)
                                        @if (!empty($product))
                                            @if ($product['name'] != null)
                                                <div class="col-lg-2 col-sm-4 col-5 pro">
                                                    <div class="card">
                                                        <div class="image">
                                                            <form action="{{ route('search_product') }}" method="get">
                                                                @csrf
                                                                <button type="submit" class="img-btn">
                                                                    <img src="{{ $product['image'] }}"
                                                                        class="card-img-top"
                                                                        alt="{{ $product['name'] }}" />
                                                                </button>
                                                                <input type="hidden" name="pro_name"
                                                                    value="{{ $product['name'] }}">
                                                                <input type="hidden" name="pro_image"
                                                                    value="{{ $product['image'] }}">
                                                                <input type="hidden" name="pro_price"
                                                                    value="{{ $product['price'] }}">
                                                                <input type="hidden" name="pro_link"
                                                                    value="{{ $product['link'] }}">
                                                                <input type="hidden" name="pro_from" value="raneen">
                                                                <input type="hidden" name="search_key"
                                                                    value="{{ $key }}">

                                                            </form>
                                                            <form action="{{ route('addToFavorite') }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="pro_name"
                                                                    value="{{ $product['name'] }}">
                                                                <input type="hidden" name="pro_image"
                                                                    value="{{ $product['image'] }}">
                                                                <input type="hidden" name="pro_price"
                                                                    value="{{ $product['price'] }}">
                                                                <input type="hidden" name="pro_from" value="raneen">
                                                                <button class="heart">
                                                                    <i class="fa-regular heart-style fa-heart"></i>
                                                                </button>
                                                            </form>
                                                            <form action="{{ route('addToCart') }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="pro_name"
                                                                    value="{{ $product['name'] }}">
                                                                <input type="hidden" name="pro_image"
                                                                    value="{{ $product['image'] }}">
                                                                <input type="hidden" name="pro_price"
                                                                    value="{{ $product['price'] }}">
                                                                <input type="hidden" name="pro_from" value="raneen">
                                                                <button class="cart-btn">
                                                                    <i class="cart-style uil uil-shopping-cart"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                        <div class="card-body">
                                                            @if (session('lang') == 'ar')
                                                                <a href="/product">
                                                                    <h5 class="item-title card-title"
                                                                        style="direction: ltr">{{ $product['name'] }}</h5>
                                                                </a>
                                                            @else
                                                                <a href="/product">
                                                                    <h5 class="item-title card-title">
                                                                        {{ $product['name'] }}</h5>
                                                                </a>
                                                            @endif
                                                            <div class="item-body">
                                                                <p>{{ trans('message.from') }} raneen</p>
                                                                @if (session('lang') == 'ar')
                                                                    <p class="price"><span
                                                                            class="product-price">{{ $product['price'] }}</span>{{ trans('message.egp') }}
                                                                    </p>
                                                                @else
                                                                    <p class="price">{{ trans('message.egp') }}<span
                                                                            class="product-price">{{ $product['price'] }}</span>
                                                                    </p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @else
                                            <div>
                                                <h4 class="text">{{ trans('message.no_result_raneen') }}</h4>
                                            </div>
                                        @endif
                                    @endforeach
                                    <button type="button" id="right-button2" class="button2r c-right _prev"><i
                                            class="fa-solid fa-chevron-right"></i></button>
                                    <button type="button" id="left-button2" class="button2l c-left _prev"><i
                                            class="fa-solid fa-chevron-left"></i></button>
                                </div>
                            @else
                                <div>
                                    <h4 class="text">{{ trans('message.no_result_raneen') }}</h4>
                                </div>
                            @endif
                        </div>
                        <div class="slider_outer" data-website="elaraby">

                            @if (!empty($data_elaraby))
                                <h4 class="text">{{ trans('message.result_elarabi') }}</h4>
                                <div class="slider-content search-slid" id="content3">
                                    @foreach ($data_elaraby['products'] as $product)
                                        @if (!empty($product))
                                            @if ($product['name'] != null)
                                                <div class="col-lg-2 col-sm-4 col-5 pro">
                                                    <div class="card">
                                                        <div class="image">
                                                            <form action="{{ route('search_product') }}" method="get">
                                                                @csrf
                                                                <button type="submit" class="img-btn">
                                                                    <img src="{{ $product['image'] }}"
                                                                        class="card-img-top"
                                                                        alt="{{ $product['name'] }}" />
                                                                </button>
                                                                <input type="hidden" name="pro_name"
                                                                    value="{{ $product['name'] }}">
                                                                <input type="hidden" name="pro_image"
                                                                    value="{{ $product['image'] }}">
                                                                <input type="hidden" name="pro_price"
                                                                    value="{{ $product['price'] }}">
                                                                <input type="hidden" name="pro_link"
                                                                    value="{{ $product['link'] }}">
                                                                <input type="hidden" name="pro_from" value="elaraby">
                                                                <input type="hidden" name="search_key"
                                                                    value="{{ $key }}">
                                                            </form>
                                                            <form action="{{ route('addToFavorite') }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="pro_name"
                                                                    value="{{ $product['name'] }}">
                                                                <input type="hidden" name="pro_image"
                                                                    value="{{ $product['image'] }}">
                                                                <input type="hidden" name="pro_price"
                                                                    value="{{ $product['price'] }}">
                                                                <input type="hidden" name="pro_from" value="elaraby">
                                                                <button class="heart">
                                                                    <i class="fa-regular heart-style fa-heart"></i>
                                                                </button>
                                                            </form>
                                                            <form action="{{ route('addToCart') }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="pro_name"
                                                                    value="{{ $product['name'] }}">
                                                                <input type="hidden" name="pro_image"
                                                                    value="{{ $product['image'] }}">
                                                                <input type="hidden" name="pro_price"
                                                                    value="{{ $product['price'] }}">
                                                                <input type="hidden" name="pro_from" value="elaraby">
                                                                <button class="cart-btn">
                                                                    <i class="cart-style uil uil-shopping-cart"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                        <div class="card-body">
                                                            @if (session('lang') == 'ar')
                                                                <a href="/product">
                                                                    <h5 class="item-title card-title"
                                                                        style="direction: ltr">{{ $product['name'] }}</h5>
                                                                </a>
                                                            @else
                                                                <a href="/product">
                                                                    <h5 class="item-title card-title">
                                                                        {{ $product['name'] }}</h5>
                                                                </a>
                                                            @endif
                                                            <div class="item-body">
                                                                <p>{{ trans('message.from') }} elaraby</p>
                                                                @if (session('lang') == 'ar')
                                                                    <p class="price"><span
                                                                            class="product-price">{{ $product['price'] }}</span>{{ trans('message.egp') }}
                                                                    </p>
                                                                @else
                                                                    <p class="price">{{ trans('message.egp') }}<span
                                                                            class="product-price">{{ $product['price'] }}</span>
                                                                    </p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @else
                                            <div>
                                                <h4 class="text">{{ trans('message.no_result_elarabi') }}</h4>
                                            </div>
                                        @endif
                                    @endforeach
                                    <button type="button" id="right-button3" class="button3r c-right _prev"><i
                                            class="fa-solid fa-chevron-right"></i></button>
                                    <button type="button" id="left-button3" class="button3l c-left _prev"><i
                                            class="fa-solid fa-chevron-left"></i></button>
                                </div>
                            @else
                                <div>
                                    <h4 class="text">{{ trans('message.no_result_elarabi') }}</h4>
                                </div>
                            @endif
                        </div>

                    </div>

                </div>
            </div>





        </div>
    </section>
@endsection
{{-- End Body --}}


{{-- Footer --}}
@section('jsLinks')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="asset/js/home.js"></script>
    <script src="{{ asset('asset/js/home.js') }}"></script>
    <script src="{{ asset('asset/js/price.js') }}"></script>

@endsection
{{-- End Footer --}}
