@extends('user.layout')

{{-- Head --}}

@section('title')
    Budget Details
@endsection

@section('cssLinks')
    <link rel="stylesheet" href="{{ asset('asset/css/budget-details.css') }}" />
@endsection

{{-- End head --}}

{{-- Body --}}
@section('body')
    <div class="container">
        <div>
            <br />
            <br />
            <br />
        </div>
        @include('success')
        <div class="row main-page">
            <div class="hed">
                <h2>{{ trans('message.Budget_Details') }}</h2>
            </div>
            {{-- ////////////////////////////////////////////////ROW//////////////////////////////// --}}

<?php
$total=0;?>
           <h3>{{trans('message.Results')}} : {{$count}}</h3>
            @for ($i = 0; $i < $count; $i++)
                <div class="row products">

                    @if (!empty($search_products[1]))
                        <div class="col-6 row product">
                            @if (session('lang') == 'ar')
                                <div class="col pro-img" style="border-left: 1px solid #c6c6c6;">
                            @else
                                <div class="col pro-img" style="border-right: 1px solid #c6c6c6;">
                            @endif
                                <form action="{{route('search_product')}}" method="get">
                                    @csrf
                                    <input type="hidden" name="pro_name" value="{{ $search_products[1][$i][1]['name'] }}">
                                    <input type="hidden" name="pro_image" value="{{ $search_products[1][$i][1]['image'] }}">
                                    <input type="hidden" name="pro_price" value="{{ $search_products[1][$i][1]['price'] }}">
                                    <input type="hidden" name="pro_link" value="{{ $search_products[1][$i][1]['link'] }}">
                                    <input type="hidden" name="pro_from" value="{{ $search_products[1][$i][0] }}">
                                    <button type="submit"><img src='{{ $search_products[1][$i][1]['image'] }}' alt="" /></button>
                                </form>
                                </div>
                                <div class="col-5 pro-info">
                                    <div class="pro-text">
                                        <div class="pro-name">{{ $search_products[1][$i][1]['name'] }}</div>
                                        <div class="img-from">
                                            <a target="_blank" href="{{$search_products[1][$i][1]['link']}}"><img src="img/budget-details/{{$search_products[1][$i][0]}}.svg" alt="" /></a>
                                        </div>
                                    </div>
                                    <div class="pro-price">
                                        @if (session('lang') == 'ar')
                                            <span class="price">{{ $search_products[1][$i][1]['price'] }} <span
                                                    class="egp">{{ trans('message.egp') }}</span></span>
                                        @else
                                            <span class="price"><span class="egp">{{ trans('message.egp') }}
                                                </span>{{ $search_products[1][$i][1]['price'] }}</span>
                                        @endif

                                    </div>
                                    <div class="btns">
                                        <div class="from">{{ trans('message.from') }} {{ $search_products[1][$i][0] }}</div>
                                        <form action="{{route('addToFavorite')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="pro_name" value="{{$search_products[1][$i][1]['name']}}">
                                            <input type="hidden" name="pro_image"value="{{$search_products[1][$i][1]['image']}}">
                                            <input type="hidden" name="pro_from"value="{{ $search_products[1][$i][0] }}">
                                            <input type="hidden" name="pro_price"value="{{$search_products[1][$i][1]['price']}}">
                                            <button type="submit" class="fav-btn">
                                                {{ trans('message.add_to_favorite') }}
                                                <i class="fa-regular fa-heart"></i>
                                            </button>
                                        </form>
                                        <form action="{{route('addToCart')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="pro_name" value="{{$search_products[1][$i][1]['name']}}">
                                            <input type="hidden" name="pro_image"value="{{$search_products[1][$i][1]['image']}}">
                                            <input type="hidden" name="pro_from"value="{{ $search_products[1][$i][0] }}">
                                            <input type="hidden" name="pro_price"value="{{$search_products[1][$i][1]['price']}}">
                                            
                                            <button type="submit" class="cart-btn">
                                                <span>{{ trans('message.add_to_cart') }}</span>
                                                <i class="uil uil-shopping-cart"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                        </div>

                        <?php $total = floatval($search_products[1][$i][1]['price']); ?>
                    @endif


                    @if (!empty($search_products[2]))
                        <div class="col-6 row product">
                            @if (session('lang') == 'ar')
                                <div class="col pro-img" style="border-left: 1px solid #c6c6c6;">
                            @else
                                <div class="col pro-img" style="border-right: 1px solid #c6c6c6;">
                            @endif
                            <form action="{{route('search_product')}}" method="get">
                                @csrf
                                <input type="hidden" name="pro_name" value="{{ $search_products[2][$i][1]['name'] }}">
                                <input type="hidden" name="pro_image" value="{{ $search_products[2][$i][1]['image'] }}">
                                <input type="hidden" name="pro_price" value="{{ $search_products[2][$i][1]['price'] }}">
                                <input type="hidden" name="pro_link" value="{{ $search_products[2][$i][1]['link'] }}">
                                <input type="hidden" name="pro_from" value="{{ $search_products[2][$i][0] }}">
                                <button type="submit"><img src='{{ $search_products[2][$i][1]['image'] }}' alt="" /></button>
                            </form>
                                </div>
                                <div class="col-5 pro-info">
                                    <div class="pro-text">
                                        <div class="pro-name">{{ $search_products[2][$i][1]['name'] }}</div>
                                        <div class="img-from">
                                            <a target="_blank" href="{{$search_products[2][$i][1]['link']}}"><img src="img/budget-details/{{$search_products[2][$i][0]}}.svg" alt="" /></a>
                                        </div>
                                    </div>
                                    <div class="pro-price">
                                        @if (session('lang') == 'ar')
                                            <span class="price">{{ $search_products[2][$i][1]['price'] }} <span
                                                    class="egp">{{ trans('message.egp') }}</span></span>
                                        @else
                                            <span class="price"><span class="egp">{{ trans('message.egp') }}
                                                </span>{{ $search_products[2][$i][1]['price'] }}</span>
                                        @endif

                                    </div>
                                    <div class="btns">
                                        <div class="from">{{ trans('message.from') }} {{ $search_products[2][$i][0] }}</div>
                                        
                                        <form action="{{route('addToFavorite')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="pro_name" value="{{$search_products[2][$i][1]['name']}}">
                                            <input type="hidden" name="pro_image"value="{{$search_products[2][$i][1]['image']}}">
                                            <input type="hidden" name="pro_from"value="{{ $search_products[2][$i][0] }}">
                                            <input type="hidden" name="pro_price"value="{{$search_products[2][$i][1]['price']}}">
                                            <button type="submit" class="fav-btn">
                                                {{ trans('message.add_to_favorite') }}
                                                <i class="fa-regular fa-heart"></i>
                                            </button>
                                        </form>
                                        <form action="{{route('addToCart')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="pro_name" value="{{$search_products[2][$i][1]['name']}}">
                                            <input type="hidden" name="pro_image"value="{{$search_products[2][$i][1]['image']}}">
                                            <input type="hidden" name="pro_from"value="{{ $search_products[2][$i][0] }}">
                                            <input type="hidden" name="pro_price"value="{{$search_products[2][$i][1]['price']}}">
                                            
                                            <button type="submit" class="cart-btn">
                                                <span>{{ trans('message.add_to_cart') }}</span>
                                                <i class="uil uil-shopping-cart"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                        </div>

                        <?php $total += floatval($search_products[2][$i][1]['price']); ?>
                    @endif


                    @if (!empty($search_products[3]))
                        <div class="col-6 row product">
                            @if (session('lang') == 'ar')
                                <div class="col pro-img" style="border-left: 1px solid #c6c6c6;">
                            @else
                                <div class="col pro-img" style="border-right: 1px solid #c6c6c6;">
                            @endif
                            <form action="{{route('search_product')}}" method="get">
                                @csrf
                                <input type="hidden" name="pro_name" value="{{ $search_products[3][$i][1]['name'] }}">
                                <input type="hidden" name="pro_image" value="{{ $search_products[3][$i][1]['image'] }}">
                                <input type="hidden" name="pro_price" value="{{ $search_products[3][$i][1]['price'] }}">
                                <input type="hidden" name="pro_link" value="{{ $search_products[3][$i][1]['link'] }}">
                                <input type="hidden" name="pro_from" value="{{ $search_products[3][$i][0] }}">
                                <button type="submit"><img src='{{ $search_products[3][$i][1]['image'] }}' alt="" /></button>
                            </form>
                                </div>
                                <div class="col-5 pro-info">
                                    <div class="pro-text">
                                        <div class="pro-name">{{ $search_products[3][$i][1]['name'] }}</div>
                                        <div class="img-from">
                                            <a target="_blank" href="{{$search_products[3][$i][1]['link']}}"><img src="img/budget-details/{{$search_products[3][$i][0]}}.svg" alt="" /></a>
                                        </div>
                                    </div>
                                    <div class="pro-price">
                                        @if (session('lang') == 'ar')
                                            <span class="price">{{ $search_products[3][$i][1]['price'] }} <span
                                                    class="egp">{{ trans('message.egp') }}</span></span>
                                        @else
                                            <span class="price"><span class="egp">{{ trans('message.egp') }}
                                                </span>{{ $search_products[3][$i][1]['price'] }}</span>
                                        @endif

                                    </div>
                                    <div class="btns">
                                        <div class="from">{{ trans('message.from') }} {{ $search_products[3][$i][0] }}</div>
                                        <form action="{{route('addToFavorite')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="pro_name" value="{{$search_products[3][$i][1]['name']}}">
                                            <input type="hidden" name="pro_image"value="{{$search_products[3][$i][1]['image']}}">
                                            <input type="hidden" name="pro_from"value="{{ $search_products[3][$i][0] }}">
                                            <input type="hidden" name="pro_price"value="{{$search_products[3][$i][1]['price']}}">
                                            <button type="submit" class="fav-btn">
                                                {{ trans('message.add_to_favorite') }}
                                                <i class="fa-regular fa-heart"></i>
                                            </button>
                                        </form>
                                        <form action="{{route('addToCart')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="pro_name" value="{{$search_products[3][$i][1]['name']}}">
                                            <input type="hidden" name="pro_image"value="{{$search_products[3][$i][1]['image']}}">
                                            <input type="hidden" name="pro_from"value="{{ $search_products[3][$i][0] }}">
                                            <input type="hidden" name="pro_price"value="{{$search_products[3][$i][1]['price']}}">
                                            
                                            <button type="submit" class="cart-btn">
                                                <span>{{ trans('message.add_to_cart') }}</span>
                                                <i class="uil uil-shopping-cart"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                        </div>

                        <?php $total += floatval($search_products[3][$i][1]['price']); ?>
                    @endif

                    @if (!empty($search_products[4]))
                        <div class="col-6 row product">
                            @if (session('lang') == 'ar')
                                <div class="col pro-img" style="border-left: 1px solid #c6c6c6;">
                            @else
                                <div class="col pro-img" style="border-right: 1px solid #c6c6c6;">
                            @endif
                            <form action="{{route('search_product')}}" method="get">
                                @csrf
                                <input type="hidden" name="pro_name" value="{{ $search_products[4][$i][1]['name'] }}">
                                <input type="hidden" name="pro_image" value="{{ $search_products[4][$i][1]['image'] }}">
                                <input type="hidden" name="pro_price" value="{{ $search_products[4][$i][1]['price'] }}">
                                <input type="hidden" name="pro_link" value="{{ $search_products[4][$i][1]['link'] }}">
                                <input type="hidden" name="pro_from" value="{{ $search_products[4][$i][0] }}">
                                <button type="submit"><img src='{{ $search_products[4][$i][1]['image'] }}' alt="" /></button>
                            </form>
                                </div>
                                <div class="col-5 pro-info">
                                    <div class="pro-text">
                                        <div class="pro-name">{{ $search_products[4][$i][1]['name'] }}</div>
                                        <div class="img-from">
                                            <a target="_blank" href="{{$search_products[4][$i][1]['link']}}"><img src="img/budget-details/{{$search_products[4][$i][0]}}.svg" alt="" /></a>
                                        </div>
                                    </div>
                                    <div class="pro-price">
                                        @if (session('lang') == 'ar')
                                            <span class="price">{{ $search_products[4][$i][1]['price'] }} <span
                                                    class="egp">{{ trans('message.egp') }}</span></span>
                                        @else
                                            <span class="price"><span class="egp">{{ trans('message.egp') }}
                                                </span>{{ $search_products[4][$i][1]['price'] }}</span>
                                        @endif

                                    </div>
                                    <div class="btns">
                                        <div class="from">{{ trans('message.from') }} {{ $search_products[4][$i][0] }}</div>
                                        <form action="{{route('addToFavorite')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="pro_name" value="{{$search_products[4][$i][1]['name']}}">
                                            <input type="hidden" name="pro_image"value="{{$search_products[4][$i][1]['image']}}">
                                            <input type="hidden" name="pro_from"value="{{ $search_products[4][$i][0] }}">
                                            <input type="hidden" name="pro_price"value="{{$search_products[4][$i][1]['price']}}">
                                            <button type="submit" class="fav-btn">
                                                {{ trans('message.add_to_favorite') }}
                                                <i class="fa-regular fa-heart"></i>
                                            </button>
                                        </form>
                                        <form action="{{route('addToCart')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="pro_name" value="{{$search_products[4][$i][1]['name']}}">
                                            <input type="hidden" name="pro_image"value="{{$search_products[4][$i][1]['image']}}">
                                            <input type="hidden" name="pro_from"value="{{ $search_products[4][$i][0] }}">
                                            <input type="hidden" name="pro_price"value="{{$search_products[4][$i][1]['price']}}">
                                            
                                            <button type="submit" class="cart-btn">
                                                <span>{{ trans('message.add_to_cart') }}</span>
                                                <i class="uil uil-shopping-cart"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                        </div>

                        <?php $total += floatval($search_products[4][$i][1]['price']); ?>
                    @endif

                    @if (!empty($search_products[5]))
                        <div class="col-6 row product">
                            @if (session('lang') == 'ar')
                                <div class="col pro-img" style="border-left: 1px solid #c6c6c6;">
                            @else
                                <div class="col pro-img" style="border-right: 1px solid #c6c6c6;">
                            @endif
                            <form action="{{route('search_product')}}" method="get">
                                @csrf
                                <input type="hidden" name="pro_name" value="{{ $search_products[5][$i][1]['name'] }}">
                                <input type="hidden" name="pro_image" value="{{ $search_products[5][$i][1]['image'] }}">
                                <input type="hidden" name="pro_price" value="{{ $search_products[5][$i][1]['price'] }}">
                                <input type="hidden" name="pro_link" value="{{ $search_products[5][$i][1]['link'] }}">
                                <input type="hidden" name="pro_from" value="{{ $search_products[5][$i][0] }}">
                                <button type="submit"><img src='{{ $search_products[5][$i][1]['image'] }}' alt="" /></button>
                            </form>
                                </div>
                                <div class="col-5 pro-info">
                                    <div class="pro-text">
                                        <div class="pro-name">{{ $search_products[5][$i][1]['name'] }}</div>
                                        <div class="img-from">
                                            <a target="_blank" href="{{$search_products[5][$i][1]['link']}}"><img src="img/budget-details/{{$search_products[5][$i][0]}}.svg" alt="" /></a>
                                        </div>
                                    </div>
                                    <div class="pro-price">
                                        @if (session('lang') == 'ar')
                                            <span class="price">{{ $search_products[5][$i][1]['price'] }} <span
                                                    class="egp">{{ trans('message.egp') }}</span></span>
                                        @else
                                            <span class="price"><span class="egp">{{ trans('message.egp') }}
                                                </span>{{ $search_products[5][$i][1]['price'] }}</span>
                                        @endif

                                    </div>
                                    <div class="btns">
                                        <div class="from">{{ trans('message.from') }} {{ $search_products[5][$i][0] }}</div>
                                        <form action="{{route('addToFavorite')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="pro_name" value="{{$search_products[5][$i][1]['name']}}">
                                            <input type="hidden" name="pro_image"value="{{$search_products[5][$i][1]['image']}}">
                                            <input type="hidden" name="pro_from"value="{{ $search_products[5][$i][0] }}">
                                            <input type="hidden" name="pro_price"value="{{$search_products[5][$i][1]['price']}}">
                                            <button type="submit" class="fav-btn">
                                                {{ trans('message.add_to_favorite') }}
                                                <i class="fa-regular fa-heart"></i>
                                            </button>
                                        </form>
                                        <form action="{{route('addToCart')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="pro_name" value="{{$search_products[5][$i][1]['name']}}">
                                            <input type="hidden" name="pro_image"value="{{$search_products[5][$i][1]['image']}}">
                                            <input type="hidden" name="pro_from"value="{{ $search_products[5][$i][0] }}">
                                            <input type="hidden" name="pro_price"value="{{$search_products[5][$i][1]['price']}}">
                                            
                                            <button type="submit" class="cart-btn">
                                                <span>{{ trans('message.add_to_cart') }}</span>
                                                <i class="uil uil-shopping-cart"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                        </div>

                        <?php $total += floatval($search_products[5][$i][1]['price']); ?>
                    @endif

                    <div class="col-6 row total">
                        <p>{{trans('message.total')}}: {{ $total }}</p>
                    </div>
                </div>
            @endfor


        </div>

    </div>
@endsection
{{-- End Body --}}
