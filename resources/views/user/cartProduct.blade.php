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
                  <p>4 {{ trans('message.Stores_starting_from') }}</p>
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
              </div>


              <!-- -----------site prices------------ -->
              <div class="cardd">
                  <div class="info">
                      <div class="stars">
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                          (8)
                      </div>
                      <p class="sites-text">Samsung Refrigerator RS66A8100S9/MR 670L - Silver- (local warranty) Samsung Refrigerator RS66A8100S9/MR 670L - Silver- (local warranty)</p>
                      @if (session('lang') == "ar")
                    <p class="price"><span>11056</span> {{ trans('message.egp') }}</p>
                  @else
                    <p class="price">{{ trans('message.egp') }}<span>11056</span></p>
                  @endif
                  </div>

                  <div class="site-name">
                      <img src="{{ asset('img/budget-details/noon.svg') }}" alt="">
                      <button>{{ trans('message.order_now') }}</button>
                  </div>
              </div>

              <div class="cardd amazon">
                  <div class="info">
                      <div class="stars">
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                          (8)
                      </div>
                      <p class="sites-text">Samsung Refrigerator RS66A8100S9/MR 670L - Silver- (local warranty) Samsung Refrigerator RS66A8100S9/MR 670L - Silver- (local warranty)</p>
                      @if (session('lang') == "ar")
                    <p class="price"><span>11056</span> {{ trans('message.egp') }}</p>
                  @else
                    <p class="price">{{ trans('message.egp') }}<span>11056</span></p>
                  @endif
                  </div>

                  <div class="site-name">
                      <img src="{{ asset('img/budget-details/noon.svg') }}" alt="">
                      <button>{{ trans('message.order_now') }}</button>
                  </div>
              </div>


              <div class="cardd jumia">
                  <div class="info">
                      <div class="stars">
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                          (8)
                      </div>
                      <p class="sites-text">Samsung Refrigerator RS66A8100S9/MR 670L - Silver- (local warranty) Samsung Refrigerator RS66A8100S9/MR 670L - Silver- (local warranty)</p>
                      @if (session('lang') == "ar")
                    <p class="price"><span>11056</span> {{ trans('message.egp') }}</p>
                  @else
                    <p class="price">{{ trans('message.egp') }}<span>11056</span></p>
                  @endif
                  </div>

                  <div class="site-name">
                      <img src="{{ asset('img/budget-details/noon.svg') }}" alt="">
                      <button>{{ trans('message.order_now') }}</button>
                  </div>
              </div>              
            </div>
          </div>
        </div>

        <!-- ======================================= Similar Products ============================== -->
       
          <div class="col-lg-4 col-12">
              <div class="row similar"> 
                  <h2 class="text-center">{{ trans('message.Similar_Products') }}</h2>
                  <div class="col-6">
                      <div class="card">
                        <div class="image">
                          <a href="/product"><img
                            src="{{ asset('img/products/product.svg') }}"
                            class="card-img-top"
                            alt="..."
                          /></a>
                          <form action="">
                            <button class="heart">
                              <i class="fa-regular fa-heart"></i>
                            </button>
                            <button class="cart">
                              <i class="cart-style uil uil-shopping-cart"></i>
                            </button>
                          </form>
                        </div>
                        <div class="card-body">
                          <h5 class="item-title card-title">
                            Samsung Refrigerator RS66A8100S9
                          </h5>
                          <div class="item-body">
                            <p>{{ trans('message.from') }} {{ trans('message.amazon') }}</p>
                            @if (session('lang') == "ar")
                              <p class="price"><span>11056</span> {{ trans('message.egp') }}</p>
                              <i class="fa-solid fa-chevron-left"></i>
                            @else
                              <p class="price">{{ trans('message.egp') }}<span>11056</span></p>
                              <i class="fa-solid fa-chevron-right"></i>
                            @endif
                          </div>
                          <p>4 {{ trans('message.online_shops') }}</p>
                          <!-- ================================ SITE PRICES=================================== -->
                          <form action="">
                            <button class="site-prices">
                              <img src="{{ asset('img/budget-details/noon.svg') }}" alt="" />
                              @if (session('lang') == "ar")
                              <p class="price"><span>11056</span> {{ trans('message.egp') }}</p>
                              <i class="fa-solid fa-chevron-left"></i>
                            @else
                              <p class="price">{{ trans('message.egp') }}<span>11056</span></p>
                              <i class="fa-solid fa-chevron-right"></i>
                            @endif
                              </button>
                            <button class="site-prices">
                              <img src="{{ asset('img/budget-details/JMIA.svg') }}" alt="" />
                              @if (session('lang') == "ar")
                              <p class="price"><span>11056</span> {{ trans('message.egp') }}</p>
                              <i class="fa-solid fa-chevron-left"></i>
                            @else
                              <p class="price">{{ trans('message.egp') }}<span>11056</span></p>
                              <i class="fa-solid fa-chevron-right"></i>
                            @endif
                              </button>
                            <button class="site-prices">
                              <img
                                style="width: 15% !important"
                                src="img/budget-details/raneen.svg"
                                alt=""
                              />
                              @if (session('lang') == "ar")
                              <p class="price"><span>11056</span> {{ trans('message.egp') }}</p>
                              <i class="fa-solid fa-chevron-left"></i>
                            @else
                              <p class="price">{{ trans('message.egp') }}<span>11056</span></p>
                              <i class="fa-solid fa-chevron-right"></i>
                            @endif
                              </button>
                          </form>
                        </div>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="card">
                        <div class="image">
                          <a href="/product"><img
                            src="{{ asset('img/products/product.svg') }}"
                            class="card-img-top"
                            alt="..."
                          /></a>
                          <form action="">
                            <button class="heart">
                              <i class="fa-regular fa-heart"></i>
                            </button>
                            <button class="cart">
                              <i class="cart-style uil uil-shopping-cart"></i>
                            </button>
                          </form>
                        </div>
                        <div class="card-body">
                          <h5 class="item-title card-title">
                            Samsung Refrigerator RS66A8100S9
                          </h5>
                          <div class="item-body">
                            <p>{{ trans('message.from') }} {{ trans('message.amazon') }}</p>
                            @if (session('lang') == "ar")
                              <p class="price"><span>11056</span> {{ trans('message.egp') }}</p>
                              <i class="fa-solid fa-chevron-left"></i>
                            @else
                              <p class="price">{{ trans('message.egp') }}<span>11056</span></p>
                              <i class="fa-solid fa-chevron-right"></i>
                            @endif
                          </div>
                          <p>4 {{ trans('message.online_shops') }}</p>
                          <!-- ================================ SITE PRICES=================================== -->
                          <form action="">
                            <button class="site-prices">
                              <img src="{{ asset('img/budget-details/noon.svg') }}" alt="" />
                              @if (session('lang') == "ar")
                              <p class="price"><span>11056</span> {{ trans('message.egp') }}</p>
                              <i class="fa-solid fa-chevron-left"></i>
                            @else
                              <p class="price">{{ trans('message.egp') }}<span>11056</span></p>
                              <i class="fa-solid fa-chevron-right"></i>
                            @endif
                              </button>
                            <button class="site-prices">
                              <img src="{{ asset('img/budget-details/JMIA.svg') }}" alt="" />
                              @if (session('lang') == "ar")
                              <p class="price"><span>11056</span> {{ trans('message.egp') }}</p>
                              <i class="fa-solid fa-chevron-left"></i>
                            @else
                              <p class="price">{{ trans('message.egp') }}<span>11056</span></p>
                              <i class="fa-solid fa-chevron-right"></i>
                            @endif
                              </button>
                            <button class="site-prices">
                              <img
                                style="width: 15% !important"
                                src="img/budget-details/raneen.svg"
                                alt=""
                              />
                              @if (session('lang') == "ar")
                              <p class="price"><span>11056</span> {{ trans('message.egp') }}</p>
                              <i class="fa-solid fa-chevron-left"></i>
                            @else
                              <p class="price">{{ trans('message.egp') }}<span>11056</span></p>
                              <i class="fa-solid fa-chevron-right"></i>
                            @endif
                              </button>
                          </form>
                        </div>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="card">
                        <div class="image">
                          <a href="/product"><img
                            src="{{ asset('img/products/product.svg') }}"
                            class="card-img-top"
                            alt="..."
                          /></a>
                          <form action="">
                            <button class="heart">
                              <i class="fa-regular fa-heart"></i>
                            </button>
                            <button class="cart">
                              <i class="cart-style uil uil-shopping-cart"></i>
                            </button>
                          </form>
                        </div>
                        <div class="card-body">
                          <h5 class="item-title card-title">
                            Samsung Refrigerator RS66A8100S9
                          </h5>
                          <div class="item-body">
                            <p>{{ trans('message.from') }} {{ trans('message.amazon') }}</p>
                            @if (session('lang') == "ar")
                              <p class="price"><span>11056</span> {{ trans('message.egp') }}</p>
                              <i class="fa-solid fa-chevron-left"></i>
                            @else
                              <p class="price">{{ trans('message.egp') }}<span>11056</span></p>
                              <i class="fa-solid fa-chevron-right"></i>
                            @endif
                          </div>
                          <p>4 {{ trans('message.online_shops') }}</p>
                          <!-- ================================ SITE PRICES=================================== -->
                          <form action="">
                            <button class="site-prices">
                              <img src="{{ asset('img/budget-details/noon.svg') }}" alt="" />
                              @if (session('lang') == "ar")
                              <p class="price"><span>11056</span> {{ trans('message.egp') }}</p>
                              <i class="fa-solid fa-chevron-left"></i>
                            @else
                              <p class="price">{{ trans('message.egp') }}<span>11056</span></p>
                              <i class="fa-solid fa-chevron-right"></i>
                            @endif
                            </button>
                            <button class="site-prices">
                              <img src="{{ asset('img/budget-details/JMIA.svg') }}" alt="" />
                              @if (session('lang') == "ar")
                              <p class="price"><span>11056</span> {{ trans('message.egp') }}</p>
                              <i class="fa-solid fa-chevron-left"></i>
                            @else
                              <p class="price">{{ trans('message.egp') }}<span>11056</span></p>
                              <i class="fa-solid fa-chevron-right"></i>
                            @endif
                            </button>
                            <button class="site-prices">
                              <img
                                style="width: 15% !important"
                                src="img/budget-details/raneen.svg"
                                alt=""
                              />
                              @if (session('lang') == "ar")
                              <p class="price"><span>11056</span> {{ trans('message.egp') }}</p>
                              <i class="fa-solid fa-chevron-left"></i>
                            @else
                              <p class="price">{{ trans('message.egp') }}<span>11056</span></p>
                              <i class="fa-solid fa-chevron-right"></i>
                            @endif
                              </button>
                          </form>
                        </div>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="card">
                        <div class="image">
                          <a href="/product"><img
                            src="{{ asset('img/products/product.svg') }}"
                            class="card-img-top"
                            alt="..."
                          /></a>
                          <form action="{{route('addToFavorite')}}" method="POST">
                            @csrf
                            <input type="hidden" name="pro_name" value="{{$product['name']}}">
                            <input type="hidden" name="pro_image"value="{{$product['image']}}">
                            <input type="hidden" name="pro_from"value="raneen">
                            <input type="hidden" name="pro_price"value="{{$product['price']}}">
                            <button class="heart">
                              <i class="fa-regular fa-heart"></i>
                            </button>
                          </form>
                          <form action="{{route('addToCart')}}" method="POST">
                            @csrf
                            <input type="hidden" name="pro_name" value="{{$product['name']}}">
                            <input type="hidden" name="pro_image"value="{{$product['image']}}">
                            <input type="hidden" name="pro_from"value="raneen">
                            <input type="hidden" name="pro_price"value="{{$product['price']}}">
                            <button class="cart">
                              <i class="cart-style uil uil-shopping-cart"></i>
                            </button>
                          </form>
                        </div>
                        <div class="card-body">
                          <h5 class="item-title card-title">
                            Samsung Refrigerator RS66A8100S9
                          </h5>
                          <div class="item-body">
                            <p>{{ trans('message.from') }} {{ trans('message.amazon') }}</p>
                            @if (session('lang') == "ar")
                              <p class="price"><span>11056</span> {{ trans('message.egp') }}</p>
                              <i class="fa-solid fa-chevron-left"></i>
                            @else
                              <p class="price">{{ trans('message.egp') }}<span>11056</span></p>
                              <i class="fa-solid fa-chevron-right"></i>
                            @endif
                          </div>
                          <p>4 {{ trans('message.online_shops') }}</p>
                          <!-- ================================ SITE PRICES=================================== -->
                          <form action="">
                            <button class="site-prices">
                              <img src="{{ asset('img/budget-details/noon.svg') }}" alt="" />
                              @if (session('lang') == "ar")
                              <p class="price"><span>11056</span> {{ trans('message.egp') }}</p>
                              <i class="fa-solid fa-chevron-left"></i>
                            @else
                              <p class="price">{{ trans('message.egp') }}<span>11056</span></p>
                              <i class="fa-solid fa-chevron-right"></i>
                            @endif
                              </button>
                            <button class="site-prices">
                              <img src="{{ asset('img/budget-details/JMIA.svg') }}" alt="" />
                              @if (session('lang') == "ar")
                              <p class="price"><span>11056</span> {{ trans('message.egp') }}</p>
                              <i class="fa-solid fa-chevron-left"></i>
                            @else
                              <p class="price">{{ trans('message.egp') }}<span>11056</span></p>
                              <i class="fa-solid fa-chevron-right"></i>
                            @endif
                              </button>
                            <button class="site-prices">
                              <img
                                style="width: 15% !important"
                                src="img/budget-details/raneen.svg"
                                alt=""
                              />
                              @if (session('lang') == "ar")
                              <p class="price"><span>11056</span> {{ trans('message.egp') }}</p>
                              <i class="fa-solid fa-chevron-left"></i>
                            @else
                              <p class="price">{{ trans('message.egp') }}<span>11056</span></p>
                              <i class="fa-solid fa-chevron-right"></i>
                            @endif
                              </button>
                          </form>
                        </div>
                      </div>
                    </div>
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