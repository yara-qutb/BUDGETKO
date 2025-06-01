@extends('user.layout')

{{-- Head --}}

@section('title')
Product
@endsection

@section('cssLinks')
  <link rel="stylesheet" href="{{ asset('asset/css/product.css') }}" />
@endsection

{{-- End head --}}

{{-- Body --}}
@section('body')
<main>
    <br>
    <br>
    <br>
    <div class="container">@include('success')</div>

    <div class="container">
      <div class="row main_products">
        <!-- ============================ Product Image and Prices ============================ -->
        <div class="col-lg-8 col-12">
          <div class="row prod-images">
            <!-- ----product images---- -->
            <div class="col-4">
              <img
                src="<?php echo $product['image']; ?>"
                id="main-img"
                class="main-img"
                alt="..."
              />
              <div class="images">
                <img
                  src="<?php echo $product['image']; ?>"
                  id="img"
                  class="img-mini"
                  onclick="changeimg(this)"
                  alt="..."
                />
                <img
                  src="<?php echo $product['image']; ?>"
                  id="img"
                  class="img-mini"
                  onclick="changeimg(this)"
                  alt="..."
                />
              </div>
            </div>
            <!-- -----Product info ------- -->
            <div class="col-8">
              <h4 class="prod-title"><?php echo $product['name']; ?></h4>
              <div class="prices justify-content-between">
                  <p>{{$site_counter}} {{ trans('message.Stores_starting_from') }}</p>
                  @if (session('lang') == "ar")
                    <p class="price"><span><?php echo $product['price']; ?></span> {{ trans('message.egp') }}</p>
                  @else
                    <p class="price">{{ trans('message.egp') }}<span><?php echo $product['price']; ?></span></p>
                  @endif
              </div>
              <div class="buttons justify-content-between">
                <form action="{{route('addToCart')}}" method="POST">
                  @csrf
                  <input type="hidden" name="pro_name" value="{{$product['name']}}">
                  <input type="hidden" name="pro_image"value="{{$product['image']}}">
                  <input type="hidden" name="pro_from"value="raneen">
                  <input type="hidden" name="pro_price"value="{{$product['price']}}">
                  <button class="cart">{{ trans('message.add_to_cart') }} <i class=" uil uil-shopping-cart"></i></button>
                </form>
                <form action="{{route('addToFavorite')}}" method="POST">
                  @csrf
                  <input type="hidden" name="pro_name" value="{{$product['name']}}">
                  <input type="hidden" name="pro_image"value="{{$product['image']}}">
                  <input type="hidden" name="pro_from"value="raneen">
                  <input type="hidden" name="pro_price"value="{{$product['price']}}">
                  <button class="fav">{{ trans('message.add_to_favorite') }} <i class="fa-regular fa-heart"></i></button>
                </form>
                <form action="{{route('goToCommunity')}}" method="POST">
                    @csrf
                    <input type="hidden" name="pro_name" value="{{$product['name']}}">
                    <input type="hidden" name="pro_image"value="{{$product['image']}}">
                    <input type="hidden" name="pro_from"value="raneen">
                    <input type="hidden" name="pro_price"value="{{$product['price']}}">
                    <input type="hidden" name="pro_link"value="{{$product['link']}}">
                    <button class="communitylink">{{ trans('message.post_on_community') }} <i class="fa-solid fa-user-group"></i> </button>
                </form>
              </div>


              <!-- -----------site prices------------ -->
              @if(!empty($data_raneen['products'][0]['name']) )
                <div class="cardd">
                    <div class="info">
                        <p class="sites-text">{{$data_raneen['products'][0]['name']}}</p>
                        @if (session('lang') == "ar")
                        <p class="price"><span>{{$data_raneen['products'][0]['price']}}</span> {{ trans('message.egp') }}</p>
                    @else
                        <p class="price">{{ trans('message.egp') }}<span>{{$data_raneen['products'][0]['price']}}</span></p>
                    @endif
                    </div>

                    <div class="site-name">
                        <a  target="_blank" href="{{$data_raneen['products'][0]['link']}}">
                            <img src="{{ asset('img/budget-details/raneen.svg') }}" alt="">
                        </a>
                        <a class="order" target="_blank" href="{{$data_raneen['products'][0]['link']}}">{{ trans('message.order_now') }}</a>
                    </div>
                </div>
              @endif

              @if(!empty($data_jumia['products'][0]['name']))
                <div class="cardd amazon">
                    <div class="info">

                        <p class="sites-text">{{$data_jumia['products'][0]['name']}}</p>
                        @if (session('lang') == "ar")
                        <p class="price"><span>{{$data_jumia['products'][0]['price']}}</span> {{ trans('message.egp') }}</p>
                    @else
                        <p class="price">{{ trans('message.egp') }}<span>{{$data_jumia['products'][0]['price']}}</span></p>
                    @endif
                    </div>

                    <div class="site-name">
                        <a target="_blank" href="{{$data_jumia['products'][0]['link']}}"><img src="{{ asset('img/budget-details/JMIA.svg') }}" alt=""></a>
                        <a class="order" target="_blank" href="{{$data_jumia['products'][0]['link']}}">{{ trans('message.order_now') }}</a>

                    </div>
                </div>
              @endif

              @if(!empty($data_elaraby['products'][0]['name']))
                <div class="cardd jumia">
                    <div class="info">

                        <p class="sites-text">{{$data_elaraby['products'][0]['name']}}</p>
                        @if (session('lang') == "ar")
                        <p class="price"><span>{{$data_elaraby['products'][0]['name']}}</span> {{ trans('message.egp') }}</p>
                    @else
                        <p class="price">{{ trans('message.egp') }}<span>{{$data_elaraby['products'][0]['name']}}</span></p>
                    @endif
                    </div>

                    <div class="site-name">
                        <a target="_blank" href="{{$data_elaraby['products'][0]['link']}}">
                            <img src="{{ asset('img/budget-details/elaraby.svg') }}" alt="">
                        </a>
                        <a class="order" target="_blank" href="{{$data_elaraby['products'][0]['link']}}">{{ trans('message.order_now') }}</a>

                    </div>
                </div>
              @endif
            </div>
          </div>
        </div>

        <!-- ======================================= Similar Products ============================== -->

          <div class="col-lg-4 col-12">
              <div class="row similar">
                  <h2 class="text-center">{{ trans('message.Similar_Products') }}</h2>
                  <?php $rand = rand(0,count($data['products'])-6); ?>
                    @if(!empty($data['products']))

                        @for($c=$rand; $c < ($rand+6) ;$c++)

                            <div class="col-6">
                            <div class="card">
                                <div class="image">
                                    <form action="{{route('search_product')}}" method="get">
                                        <button type="submit">
                                                <img
                                                    src="{{ $data['products'][$c]['image'] }}"
                                                    class="card-img-top"
                                                    alt="..."
                                                />
                                        </button>

                                        <input type="hidden" name="pro_from" value="{{ $data['site'] }}">
                                        <input type="hidden" name="pro_name" value="{{ $data['products'][$c]['name'] }}">
                                        <input type="hidden" name="pro_price" value="{{ $data['products'][$c]['price'] }}">
                                        <input type="hidden" name="pro_image" value="{{ $data['products'][$c]['image'] }}">
                                        <input type="hidden" name="pro_link" value="{{ $data['products'][$c]['link'] }}">
                                </form>
                                <form action="{{route('addToFavorite')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="pro_name" value="{{ $data['products'][$c]['name'] }}">
                                    <input type="hidden" name="pro_image"value="{{ $data['products'][$c]['image'] }}">
                                    <input type="hidden" name="pro_from"value="{{ $data['site'] }}">
                                    <input type="hidden" name="pro_price"value="{{ $data['products'][$c]['price'] }}">
                                    <button class="heart">
                                    <i class="fa-regular heart-style fa-heart"></i>
                                    </button>
                                </form>
                                <form action="{{route('addToCart')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="pro_name" value="{{ $data['products'][$c]['name'] }}">
                                    <input type="hidden" name="pro_image"value="{{ $data['products'][$c]['image'] }}">
                                    <input type="hidden" name="pro_from"value="{{ $data['site'] }}">
                                    <input type="hidden" name="pro_price"value="{{ $data['products'][$c]['price'] }}">
                                    <button class="cart">
                                    <i class="cart-style uil uil-shopping-cart"></i>
                                    </button>
                                </form>
                                </div>
                                <div class="card-body">
                                <h5 class="item-title card-title">
                                    {{ $data['products'][$c]['name'] }}
                                </h5>
                                <a target="_blank" style="text-decoration: none" href="{{ $data['products'][$c]['link'] }}">
                                    <div class="item-body">
                                    <p>{{ trans('message.from') }} {{ $data['site']}}</p>
                                    @if (session('lang') == "ar")
                                    <p class="price"><span>{{ $data['products'][$c]['price'] }}</span> {{ trans('message.egp') }}</p>
                                    <i style="color: #000" class="fa-solid fa-chevron-left"></i>
                                    @else
                                    <p class="price">{{ trans('message.egp') }}<span>{{ $data['products'][$c]['price'] }}</span></p>
                                    <i style="color: #000" class="fa-solid fa-chevron-right"></i>
                                    @endif
                                </div></a>

                                <p>4 {{ trans('message.online_shops') }}</p>

                                </div>
                            </div>
                            </div>

                        @endfor
                    @endif


              </div>
          </div>
      </div>
    </div>
</main>
@endsection
{{-- End Body --}}


{{-- Footer --}}
@section('jsLinks')
<script
src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
crossorigin="anonymous"
></script>
<!-- ======================================MY JS====================================== -->
<script src="{{ asset('asset/js/product.js') }}"></script>
@endsection
{{-- End Footer --}}
