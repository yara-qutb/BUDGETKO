@extends('user.layout')

{{-- Head --}}

@section('title')
  Budgetko
@endsection

@section('cssLinks')
    <link rel="stylesheet" href="asset/css/normalize.css" />
    <link rel="stylesheet" href="asset/css/home.css" />
@endsection

{{-- End head --}}

{{-- Body --}}
@section('body')
<section class="recommend">
    <div class="container">
      <div class="row justify-content-center">
        <h2 >{{ trans('message.recommended') }}</h2>
        <div class="col-lg-2 col-sm-4 col-5">
          <div class="card">
            <div class="image">
              <a href="/product"><img
                src="img/products/product.svg"
                class="card-img-top"
                alt="..."
              /></a>
              
              <form action="">
                <button class="heart">
                  <i class="fa-regular fa-heart"></i>
                </button>
                <button class="cart-btn">
                  <i class="cart-style uil uil-shopping-cart"></i>
                </button>
              </form>
            </div>
            <div class="card-body">
              <h5 class="item-title card-title">
                Samsung Refrigerator RS66A8100S9
              </h5>
              <div class="item-body">
                @if (session('lang') == "ar")
                  <p>{{ trans('message.from') }} {{ trans('message.amazon') }}</p>
                  <p class="price"><span>11056</span>{{ trans('message.egp') }}</p>
                @else
                  <p>{{ trans('message.amazon') }} {{ trans('message.from') }}</p>
                  <p class="price">{{ trans('message.egp') }}<span>11056</span></p>
                @endif
              </div>
              @if (session('lang') == "ar")
                  <p>{{ trans('message.online_shops') }} 4</p>
                @else
                  <p>4 {{ trans('message.online_shops') }}</p>
                @endif
              <!-- ================================ SITE PRICES=================================== -->
              <form action="">
                <button class="site-prices">
                  <img src="img/budget-details/noon.svg" alt="" />
                  
                  @if (session('lang') == "ar")
                    <p><span>116000</span> {{ trans('message.egp') }}</p>
                    <i class="fa-solid fa-chevron-left"></i>
                  @else 
                    <p>{{ trans('message.egp') }}<span>116000</span></p>
                    <i class="fa-solid fa-chevron-right"></i>    
                  @endif
                </button>
                <button class="site-prices">
                  <img src="img/budget-details/JMIA.svg" alt="" />
                  @if (session('lang') == "ar")
                    <p><span>116000</span> {{ trans('message.egp') }}</p>
                    <i class="fa-solid fa-chevron-left"></i>
                  @else 
                    <p>{{ trans('message.egp') }}<span>116000</span></p>
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
                    <p><span>116000</span> {{ trans('message.egp') }}</p>
                    <i class="fa-solid fa-chevron-left"></i>
                  @else 
                    <p>{{ trans('message.egp') }}<span>116000</span></p>
                    <i class="fa-solid fa-chevron-right"></i>    
                  @endif
                </button>
              </form>
            </div>
          </div>
        </div>

        <div class="col-lg-2 col-sm-4 col-5">
          <div class="card">
            <div class="image">
              <a href="/product"><img
                src="img/products/product.svg"
                class="card-img-top"
                alt="..."
              /></a>
              <form action="">
                <button class="heart">
                  <i class="fa-regular fa-heart"></i>
                </button>
                <button class="cart-btn">
                  <i class="cart-style uil uil-shopping-cart"></i>
                </button>
              </form>
            </div>
            <div class="card-body">
              <h5 class="item-title card-title">
                Samsung Refrigerator RS66A8100S9
              </h5>
              <div class="item-body">
                @if (session('lang') == "ar")
                  <p>{{ trans('message.from') }} {{ trans('message.amazon') }}</p>
                  <p class="price"><span>11056</span>{{ trans('message.egp') }}</p>
                @else
                  <p>{{ trans('message.amazon') }} {{ trans('message.from') }}</p>
                  <p class="price">{{ trans('message.egp') }}<span>11056</span></p>
                @endif
              </div>
              @if (session('lang') == "ar")
                  <p>{{ trans('message.online_shops') }} 4</p>
                @else
                  <p>4 {{ trans('message.online_shops') }}</p>
                @endif
              <!-- ================================ SITE PRICES=================================== -->
              <form action="">
                <button class="site-prices">
                  <img src="img/budget-details/noon.svg" alt="" />
                  @if (session('lang') == "ar")
                    <p><span>116000</span> {{ trans('message.egp') }}</p>
                    <i class="fa-solid fa-chevron-left"></i>
                  @else 
                    <p>{{ trans('message.egp') }}<span>116000</span></p>
                    <i class="fa-solid fa-chevron-right"></i>    
                  @endif
                                  </button>
              </form>
            </div>
          </div>
        </div>

        <div class="col-lg-2 col-sm-4 col-5">
          <div class="card">
            <div class="image">
              <a href="/product"><img
                src="img/products/product.svg"
                class="card-img-top"
                alt="..."
              /></a>
              <form action="">
                <button class="heart">
                  <i class="fa-regular fa-heart"></i>
                </button>
                <button class="cart-btn">
                  <i class="cart-style uil uil-shopping-cart"></i>
                </button>
              </form>
            </div>
            <div class="card-body">
              <h5 class="item-title card-title">
                Samsung Refrigerator RS66A8100S9
              </h5>
              <div class="item-body">
                @if (session('lang') == "ar")
                  <p>{{ trans('message.from') }} {{ trans('message.amazon') }}</p>
                  <p class="price"><span>11056</span>{{ trans('message.egp') }}</p>
                @else
                  <p>{{ trans('message.amazon') }} {{ trans('message.from') }}</p>
                  <p class="price">{{ trans('message.egp') }}<span>11056</span></p>
                @endif
              </div>
              @if (session('lang') == "ar")
                  <p>{{ trans('message.online_shops') }} 4</p>
                @else
                  <p>4 {{ trans('message.online_shops') }}</p>
                @endif
              <!-- ================================ SITE PRICES=================================== -->
              <form action="">
                <button class="site-prices">
                  <img src="img/budget-details/noon.svg" alt="" />
                  @if (session('lang') == "ar")
                    <p><span>116000</span> {{ trans('message.egp') }}</p>
                    <i class="fa-solid fa-chevron-left"></i>
                  @else 
                    <p>{{ trans('message.egp') }}<span>116000</span></p>
                    <i class="fa-solid fa-chevron-right"></i>    
                  @endif
                                  </button>
                <button class="site-prices">
                  <img src="img/budget-details/JMIA.svg" alt="" />
                  @if (session('lang') == "ar")
                    <p><span>116000</span> {{ trans('message.egp') }}</p>
                    <i class="fa-solid fa-chevron-left"></i>
                  @else 
                    <p>{{ trans('message.egp') }}<span>116000</span></p>
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
                    <p><span>116000</span> {{ trans('message.egp') }}</p>
                    <i class="fa-solid fa-chevron-left"></i>
                  @else 
                    <p>{{ trans('message.egp') }}<span>116000</span></p>
                    <i class="fa-solid fa-chevron-right"></i>    
                  @endif
                                  </button>
              </form>
            </div>
          </div>
        </div>

        <div class="col-lg-2 col-sm-4 col-5">
          <div class="card">
            <div class="image">
              <a href="/product"><img
                src="img/products/product.svg"
                class="card-img-top"
                alt="..."
              /></a>
              <form action="">
                <button class="heart">
                  <i class="fa-regular fa-heart"></i>
                </button>
                <button class="cart-btn">
                  <i class="cart-style uil uil-shopping-cart"></i>
                </button>
              </form>
            </div>
            <div class="card-body">
              <h5 class="item-title card-title">
                Samsung Refrigerator RS66A8100S9
              </h5>
              <div class="item-body">
                @if (session('lang') == "ar")
                  <p>{{ trans('message.from') }} {{ trans('message.amazon') }}</p>
                  <p class="price"><span>11056</span>{{ trans('message.egp') }}</p>
                @else
                  <p>{{ trans('message.amazon') }} {{ trans('message.from') }}</p>
                  <p class="price">{{ trans('message.egp') }}<span>11056</span></p>
                @endif
              </div>
              @if (session('lang') == "ar")
                  <p>{{ trans('message.online_shops') }} 4</p>
                @else
                  <p>4 {{ trans('message.online_shops') }}</p>
                @endif
              <!-- ================================ SITE PRICES=================================== -->
              <form action="">
                <button class="site-prices">
                  <img src="img/budget-details/noon.svg" alt="" />
                  @if (session('lang') == "ar")
                    <p><span>116000</span> {{ trans('message.egp') }}</p>
                    <i class="fa-solid fa-chevron-left"></i>
                  @else 
                    <p>{{ trans('message.egp') }}<span>116000</span></p>
                    <i class="fa-solid fa-chevron-right"></i>    
                  @endif
                                  </button>
                <button class="site-prices">
                  <img src="img/budget-details/JMIA.svg" alt="" />
                  @if (session('lang') == "ar")
                    <p><span>116000</span> {{ trans('message.egp') }}</p>
                    <i class="fa-solid fa-chevron-left"></i>
                  @else 
                    <p>{{ trans('message.egp') }}<span>116000</span></p>
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
                    <p><span>116000</span> {{ trans('message.egp') }}</p>
                    <i class="fa-solid fa-chevron-left"></i>
                  @else 
                    <p>{{ trans('message.egp') }}<span>116000</span></p>
                    <i class="fa-solid fa-chevron-right"></i>    
                  @endif
                                  </button>
              </form>
            </div>
          </div>
        </div>

        <div class="col-lg-2 col-sm-4 col-5">
          <div class="card">
            <div class="image">
              <a href="/product"><img
                src="img/products/product.svg"
                class="card-img-top"
                alt="..."
              /></a>
              <form action="">
                <button class="heart">
                  <i class="fa-regular fa-heart"></i>
                </button>
                <button class="cart-btn">
                  <i class="cart-style uil uil-shopping-cart"></i>
                </button>
              </form>
            </div>
            <div class="card-body">
              <h5 class="item-title card-title">
                Samsung Refrigerator RS66A8100S9
              </h5>
              <div class="item-body">
                @if (session('lang') == "ar")
                  <p>{{ trans('message.from') }} {{ trans('message.amazon') }}</p>
                  <p class="price"><span>11056</span>{{ trans('message.egp') }}</p>
                @else
                  <p>{{ trans('message.amazon') }} {{ trans('message.from') }}</p>
                  <p class="price">{{ trans('message.egp') }}<span>11056</span></p>
                @endif
              </div>
              @if (session('lang') == "ar")
                  <p>{{ trans('message.online_shops') }} 4</p>
                @else
                  <p>4 {{ trans('message.online_shops') }}</p>
                @endif
              <!-- ================================ SITE PRICES=================================== -->
              <form action="">
                <button class="site-prices">
                  <img src="img/budget-details/noon.svg" alt="" />
                  @if (session('lang') == "ar")
                    <p><span>116000</span> {{ trans('message.egp') }}</p>
                    <i class="fa-solid fa-chevron-left"></i>
                  @else 
                    <p>{{ trans('message.egp') }}<span>116000</span></p>
                    <i class="fa-solid fa-chevron-right"></i>    
                  @endif
                                  </button>
                <button class="site-prices">
                  <img src="img/budget-details/JMIA.svg" alt="" />
                  @if (session('lang') == "ar")
                    <p><span>116000</span> {{ trans('message.egp') }}</p>
                    <i class="fa-solid fa-chevron-left"></i>
                  @else 
                    <p>{{ trans('message.egp') }}<span>116000</span></p>
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
                    <p><span>116000</span> {{ trans('message.egp') }}</p>
                    <i class="fa-solid fa-chevron-left"></i>
                  @else 
                    <p>{{ trans('message.egp') }}<span>116000</span></p>
                    <i class="fa-solid fa-chevron-right"></i>    
                  @endif
                                  </button>
              </form>
            </div>
          </div>
        </div>

        <div class="col-lg-2 col-sm-4 col-5">
          <div class="card">
            <div class="image">
              <a href="/product"><img
                src="img/products/product.svg"
                class="card-img-top"
                alt="..."
              /></a>
              <form action="">
                <button class="heart">
                  <i class="fa-regular fa-heart"></i>
                </button>
                <button class="cart-btn">
                  <i class="cart-style uil uil-shopping-cart"></i>
                </button>
              </form>
            </div>
            <div class="card-body">
              <h5 class="item-title card-title">
                Samsung Refrigerator RS66A8100S9
              </h5>
              <div class="item-body">
                @if (session('lang') == "ar")
                  <p>{{ trans('message.from') }} {{ trans('message.amazon') }}</p>
                  <p class="price"><span>11056</span>{{ trans('message.egp') }}</p>
                @else
                  <p>{{ trans('message.amazon') }} {{ trans('message.from') }}</p>
                  <p class="price">{{ trans('message.egp') }}<span>11056</span></p>
                @endif
              </div>
              @if (session('lang') == "ar")
                  <p>{{ trans('message.online_shops') }} 4</p>
                @else
                  <p>4 {{ trans('message.online_shops') }}</p>
                @endif
              <!-- ================================ SITE PRICES=================================== -->
              <form action="">
                <button class="site-prices">
                  <img src="img/budget-details/noon.svg" alt="" />
                  @if (session('lang') == "ar")
                    <p><span>116000</span> {{ trans('message.egp') }}</p>
                    <i class="fa-solid fa-chevron-left"></i>
                  @else 
                    <p>{{ trans('message.egp') }}<span>116000</span></p>
                    <i class="fa-solid fa-chevron-right"></i>    
                  @endif
                                  </button>
                <button class="site-prices">
                  <img src="img/budget-details/JMIA.svg" alt="" />
                  @if (session('lang') == "ar")
                    <p><span>116000</span> {{ trans('message.egp') }}</p>
                    <i class="fa-solid fa-chevron-left"></i>
                  @else 
                    <p>{{ trans('message.egp') }}<span>116000</span></p>
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
                    <p><span>116000</span> {{ trans('message.egp') }}</p>
                    <i class="fa-solid fa-chevron-left"></i>
                  @else 
                    <p>{{ trans('message.egp') }}<span>116000</span></p>
                    <i class="fa-solid fa-chevron-right"></i>    
                  @endif
                                  </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ============================= Recommended end =============================== -->

  <!-- ============================= Most fav start =============================== -->

  <section class="most-fav">
    <div class="container">
      <h2>{{ trans('message.most_favorite_by_users') }}</h2>
      <div class="row justify-content-center">
        <div class="col-lg-2 col-sm-4 col-5">
          <div class="card">
            <div class="image">
              <a href="/product"><img
                src="img/products/product.svg"
                class="card-img-top"
                alt="..."
              /></a>
              <form action="">
                <button class="heart">
                  <i class="fa-regular fa-heart"></i>
                </button>
                <button class="cart-btn">
                  <i class="cart-style uil uil-shopping-cart"></i>
                </button>
              </form>
            </div>
            <div class="card-body">
              <h5 class="item-title card-title">
                Samsung Refrigerator RS66A8100S9
              </h5>
              <div class="item-body">
                @if (session('lang') == "ar")
                  <p>{{ trans('message.from') }} {{ trans('message.amazon') }}</p>
                  <p class="price"><span>11056</span>{{ trans('message.egp') }}</p>
                @else
                  <p>{{ trans('message.amazon') }} {{ trans('message.from') }}</p>
                  <p class="price">{{ trans('message.egp') }}<span>11056</span></p>
                @endif
              </div>
              @if (session('lang') == "ar")
                  <p>{{ trans('message.online_shops') }} 4</p>
                @else
                  <p>4 {{ trans('message.online_shops') }}</p>
                @endif
              <!-- ================================ SITE PRICES=================================== -->
              <form action="">
                <button class="site-prices">
                  <img src="img/budget-details/noon.svg" alt="" />
                  @if (session('lang') == "ar")
                    <p><span>116000</span> {{ trans('message.egp') }}</p>
                    <i class="fa-solid fa-chevron-left"></i>
                  @else 
                    <p>{{ trans('message.egp') }}<span>116000</span></p>
                    <i class="fa-solid fa-chevron-right"></i>    
                  @endif
                                  </button>
                <button class="site-prices">
                  <img src="img/budget-details/JMIA.svg" alt="" />
                  @if (session('lang') == "ar")
                    <p><span>116000</span> {{ trans('message.egp') }}</p>
                    <i class="fa-solid fa-chevron-left"></i>
                  @else 
                    <p>{{ trans('message.egp') }}<span>116000</span></p>
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
                    <p><span>116000</span> {{ trans('message.egp') }}</p>
                    <i class="fa-solid fa-chevron-left"></i>
                  @else 
                    <p>{{ trans('message.egp') }}<span>116000</span></p>
                    <i class="fa-solid fa-chevron-right"></i>    
                  @endif
                                  </button>
              </form>
            </div>
          </div>
        </div>

        <div class="col-lg-2 col-sm-4 col-5">
          <div class="card">
            <div class="image">
              <a href="/product"><img
                src="img/products/product.svg"
                class="card-img-top"
                alt="..."
              /></a>
              <form action="">
                <button class="heart">
                  <i class="fa-regular fa-heart"></i>
                </button>
                <button class="cart-btn">
                  <i class="cart-style uil uil-shopping-cart"></i>
                </button>
              </form>
            </div>
            <div class="card-body">
              <h5 class="item-title card-title">
                Samsung Refrigerator RS66A8100S9
              </h5>
              <div class="item-body">
                @if (session('lang') == "ar")
                  <p>{{ trans('message.from') }} {{ trans('message.amazon') }}</p>
                  <p class="price"><span>11056</span>{{ trans('message.egp') }}</p>
                @else
                  <p>{{ trans('message.amazon') }} {{ trans('message.from') }}</p>
                  <p class="price">{{ trans('message.egp') }}<span>11056</span></p>
                @endif
              </div>
              @if (session('lang') == "ar")
                  <p>{{ trans('message.online_shops') }} 4</p>
                @else
                  <p>4 {{ trans('message.online_shops') }}</p>
                @endif
              <!-- ================================ SITE PRICES=================================== -->
              <form action="">
                <button class="site-prices">
                  <img src="img/budget-details/noon.svg" alt="" />
                  @if (session('lang') == "ar")
                    <p><span>116000</span> {{ trans('message.egp') }}</p>
                    <i class="fa-solid fa-chevron-left"></i>
                  @else 
                    <p>{{ trans('message.egp') }}<span>116000</span></p>
                    <i class="fa-solid fa-chevron-right"></i>    
                  @endif
                                  </button>
                <button class="site-prices">
                  <img src="img/budget-details/JMIA.svg" alt="" />
                  @if (session('lang') == "ar")
                    <p><span>116000</span> {{ trans('message.egp') }}</p>
                    <i class="fa-solid fa-chevron-left"></i>
                  @else 
                    <p>{{ trans('message.egp') }}<span>116000</span></p>
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
                    <p><span>116000</span> {{ trans('message.egp') }}</p>
                    <i class="fa-solid fa-chevron-left"></i>
                  @else 
                    <p>{{ trans('message.egp') }}<span>116000</span></p>
                    <i class="fa-solid fa-chevron-right"></i>    
                  @endif
                                  </button>
              </form>
            </div>
          </div>
        </div>

        <div class="col-lg-2 col-sm-4 col-5">
          <div class="card">
            <div class="image">
              <a href="/product"><img
                src="img/products/product.svg"
                class="card-img-top"
                alt="..."
              /></a>
              <form action="">
                <button class="heart">
                  <i class="fa-regular fa-heart"></i>
                </button>
                <button class="cart-btn">
                  <i class="cart-style uil uil-shopping-cart"></i>
                </button>
              </form>
            </div>
            <div class="card-body">
              <h5 class="item-title card-title">
                Samsung Refrigerator RS66A8100S9
              </h5>
              <div class="item-body">
                @if (session('lang') == "ar")
                  <p>{{ trans('message.from') }} {{ trans('message.amazon') }}</p>
                  <p class="price"><span>11056</span>{{ trans('message.egp') }}</p>
                @else
                  <p>{{ trans('message.amazon') }} {{ trans('message.from') }}</p>
                  <p class="price">{{ trans('message.egp') }}<span>11056</span></p>
                @endif
              </div>
              @if (session('lang') == "ar")
                  <p>{{ trans('message.online_shops') }} 4</p>
                @else
                  <p>4 {{ trans('message.online_shops') }}</p>
                @endif
              <!-- ================================ SITE PRICES=================================== -->
              <form action="">
                <button class="site-prices">
                  <img src="img/budget-details/noon.svg" alt="" />
                  @if (session('lang') == "ar")
                    <p><span>116000</span> {{ trans('message.egp') }}</p>
                    <i class="fa-solid fa-chevron-left"></i>
                  @else 
                    <p>{{ trans('message.egp') }}<span>116000</span></p>
                    <i class="fa-solid fa-chevron-right"></i>    
                  @endif
                                  </button>
                <button class="site-prices">
                  <img src="img/budget-details/JMIA.svg" alt="" />
                  @if (session('lang') == "ar")
                    <p><span>116000</span> {{ trans('message.egp') }}</p>
                    <i class="fa-solid fa-chevron-left"></i>
                  @else 
                    <p>{{ trans('message.egp') }}<span>116000</span></p>
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
                    <p><span>116000</span> {{ trans('message.egp') }}</p>
                    <i class="fa-solid fa-chevron-left"></i>
                  @else 
                    <p>{{ trans('message.egp') }}<span>116000</span></p>
                    <i class="fa-solid fa-chevron-right"></i>    
                  @endif
                                  </button>
              </form>
            </div>
          </div>
        </div>

        <div class="col-lg-2 col-sm-4 col-5">
          <div class="card">
            <div class="image">
              <a href="/product"><img
                src="img/products/product.svg"
                class="card-img-top"
                alt="..."
              /></a>
              <form action="">
                <button class="heart">
                  <i class="fa-regular fa-heart"></i>
                </button>
                <button class="cart-btn">
                  <i class="cart-style uil uil-shopping-cart"></i>
                </button>
              </form>
            </div>
            <div class="card-body">
              <h5 class="item-title card-title">
                Samsung Refrigerator RS66A8100S9
              </h5>
              <div class="item-body">
                @if (session('lang') == "ar")
                  <p>{{ trans('message.from') }} {{ trans('message.amazon') }}</p>
                  <p class="price"><span>11056</span>{{ trans('message.egp') }}</p>
                @else
                  <p>{{ trans('message.amazon') }} {{ trans('message.from') }}</p>
                  <p class="price">{{ trans('message.egp') }}<span>11056</span></p>
                @endif
              </div>
              @if (session('lang') == "ar")
                  <p>{{ trans('message.online_shops') }} 4</p>
                @else
                  <p>4 {{ trans('message.online_shops') }}</p>
                @endif
              <!-- ================================ SITE PRICES=================================== -->
              <form action="">
                <button class="site-prices">
                  <img src="img/budget-details/noon.svg" alt="" />
                  @if (session('lang') == "ar")
                    <p><span>116000</span> {{ trans('message.egp') }}</p>
                    <i class="fa-solid fa-chevron-left"></i>
                  @else 
                    <p>{{ trans('message.egp') }}<span>116000</span></p>
                    <i class="fa-solid fa-chevron-right"></i>    
                  @endif
                                  </button>
                <button class="site-prices">
                  <img src="img/budget-details/JMIA.svg" alt="" />
                  @if (session('lang') == "ar")
                    <p><span>116000</span> {{ trans('message.egp') }}</p>
                    <i class="fa-solid fa-chevron-left"></i>
                  @else 
                    <p>{{ trans('message.egp') }}<span>116000</span></p>
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
                    <p><span>116000</span> {{ trans('message.egp') }}</p>
                    <i class="fa-solid fa-chevron-left"></i>
                  @else 
                    <p>{{ trans('message.egp') }}<span>116000</span></p>
                    <i class="fa-solid fa-chevron-right"></i>    
                  @endif
                                  </button>
              </form>
            </div>
          </div>
        </div>

        <div class="col-lg-2 col-sm-4 col-5">
          <div class="card">
            <div class="image">
              <a href="/product"><img
                src="img/products/product.svg"
                class="card-img-top"
                alt="..."
              /></a>
              <form action="">
                <button class="heart">
                  <i class="fa-regular fa-heart"></i>
                </button>
                <button class="cart-btn">
                  <i class="cart-style uil uil-shopping-cart"></i>
                </button>
              </form>
            </div>
            <div class="card-body">
              <h5 class="item-title card-title">
                Samsung Refrigerator RS66A8100S9
              </h5>
              <div class="item-body">
                @if (session('lang') == "ar")
                  <p>{{ trans('message.from') }} {{ trans('message.amazon') }}</p>
                  <p class="price"><span>11056</span>{{ trans('message.egp') }}</p>
                @else
                  <p>{{ trans('message.amazon') }} {{ trans('message.from') }}</p>
                  <p class="price">{{ trans('message.egp') }}<span>11056</span></p>
                @endif
              </div>
              @if (session('lang') == "ar")
                  <p>{{ trans('message.online_shops') }} 4</p>
                @else
                  <p>4 {{ trans('message.online_shops') }}</p>
                @endif
              <!-- ================================ SITE PRICES=================================== -->
              <form action="">
                <button class="site-prices">
                  <img src="img/budget-details/noon.svg" alt="" />
                  @if (session('lang') == "ar")
                    <p><span>116000</span> {{ trans('message.egp') }}</p>
                    <i class="fa-solid fa-chevron-left"></i>
                  @else 
                    <p>{{ trans('message.egp') }}<span>116000</span></p>
                    <i class="fa-solid fa-chevron-right"></i>    
                  @endif
                                  </button>
                <button class="site-prices">
                  <img src="img/budget-details/JMIA.svg" alt="" />
                  @if (session('lang') == "ar")
                    <p><span>116000</span> {{ trans('message.egp') }}</p>
                    <i class="fa-solid fa-chevron-left"></i>
                  @else 
                    <p>{{ trans('message.egp') }}<span>116000</span></p>
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
                    <p><span>116000</span> {{ trans('message.egp') }}</p>
                    <i class="fa-solid fa-chevron-left"></i>
                  @else 
                    <p>{{ trans('message.egp') }}<span>116000</span></p>
                    <i class="fa-solid fa-chevron-right"></i>    
                  @endif
                                  </button>
              </form>
            </div>
          </div>
        </div>

        <div class="col-lg-2 col-sm-4 col-5">
          <div class="card">
            <div class="image">
              <a href="/product"><img
                src="img/products/product.svg"
                class="card-img-top"
                alt="..."
              /></a>
              <form action="">
                <button class="heart">
                  <i class="fa-regular fa-heart"></i>
                </button>
                <button class="cart-btn">
                  <i class="cart-style uil uil-shopping-cart"></i>
                </button>
              </form>
            </div>
            <div class="card-body">
              <h5 class="item-title card-title">
                Samsung Refrigerator RS66A8100S9
              </h5>
              <div class="item-body">
                @if (session('lang') == "ar")
                  <p>{{ trans('message.from') }} {{ trans('message.amazon') }}</p>
                  <p class="price"><span>11056</span>{{ trans('message.egp') }}</p>
                @else
                  <p>{{ trans('message.amazon') }} {{ trans('message.from') }}</p>
                  <p class="price">{{ trans('message.egp') }}<span>11056</span></p>
                @endif
              </div>
              @if (session('lang') == "ar")
                  <p>{{ trans('message.online_shops') }} 4</p>
                @else
                  <p>4 {{ trans('message.online_shops') }}</p>
                @endif
              <!-- ================================ SITE PRICES=================================== -->
              <form action="">
                <button class="site-prices">
                  <img src="img/budget-details/noon.svg" alt="" />
                  @if (session('lang') == "ar")
                    <p><span>116000</span> {{ trans('message.egp') }}</p>
                    <i class="fa-solid fa-chevron-left"></i>
                  @else 
                    <p>{{ trans('message.egp') }}<span>116000</span></p>
                    <i class="fa-solid fa-chevron-right"></i>    
                  @endif
                                  </button>
                <button class="site-prices">
                  <img src="img/budget-details/JMIA.svg" alt="" />
                  @if (session('lang') == "ar")
                    <p><span>116000</span> {{ trans('message.egp') }}</p>
                    <i class="fa-solid fa-chevron-left"></i>
                  @else 
                    <p>{{ trans('message.egp') }}<span>116000</span></p>
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
                    <p><span>116000</span> {{ trans('message.egp') }}</p>
                    <i class="fa-solid fa-chevron-left"></i>
                  @else 
                    <p>{{ trans('message.egp') }}<span>116000</span></p>
                    <i class="fa-solid fa-chevron-right"></i>    
                  @endif
                                  </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ============================= Most fav end =============================== -->

  <!-- ============================= Top Offers start =============================== -->

  <section class="top-offers">
    <div class="container">
      <h2>{{ trans('message.top_offers') }}</h2>
      <div class="row justify-content-center">
        <div class="col-lg-2 col-sm-4 col-5">
          <div class="card">
            <div class="image">
              <a href="/product"><img
                src="img/products/product.svg"
                class="card-img-top"
                alt="..."
              /></a>
              <form action="">
                <button class="heart">
                  <i class="fa-regular fa-heart"></i>
                </button>
                <button class="cart-btn">
                  <i class="cart-style uil uil-shopping-cart"></i>
                </button>
              </form>
            </div>
            <div class="card-body">
              <h5 class="item-title card-title">
                Samsung Refrigerator RS66A8100S9
              </h5>
              <div class="item-body">
                @if (session('lang') == "ar")
                  <p>{{ trans('message.from') }} {{ trans('message.amazon') }}</p>
                  <p class="price"><span>11056</span>{{ trans('message.egp') }}</p>
                @else
                  <p>{{ trans('message.amazon') }} {{ trans('message.from') }}</p>
                  <p class="price">{{ trans('message.egp') }}<span>11056</span></p>
                @endif
              </div>
              @if (session('lang') == "ar")
                  <p>{{ trans('message.online_shops') }} 4</p>
                @else
                  <p>4 {{ trans('message.online_shops') }}</p>
                @endif
              <!-- ================================ SITE PRICES=================================== -->
              <form action="">
                <button class="site-prices">
                  <img src="img/budget-details/noon.svg" alt="" />
                  @if (session('lang') == "ar")
                    <p><span>116000</span> {{ trans('message.egp') }}</p>
                    <i class="fa-solid fa-chevron-left"></i>
                  @else 
                    <p>{{ trans('message.egp') }}<span>116000</span></p>
                    <i class="fa-solid fa-chevron-right"></i>    
                  @endif
                                  </button>
                <button class="site-prices">
                  <img src="img/budget-details/JMIA.svg" alt="" />
                  @if (session('lang') == "ar")
                    <p><span>116000</span> {{ trans('message.egp') }}</p>
                    <i class="fa-solid fa-chevron-left"></i>
                  @else 
                    <p>{{ trans('message.egp') }}<span>116000</span></p>
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
                    <p><span>116000</span> {{ trans('message.egp') }}</p>
                    <i class="fa-solid fa-chevron-left"></i>
                  @else 
                    <p>{{ trans('message.egp') }}<span>116000</span></p>
                    <i class="fa-solid fa-chevron-right"></i>    
                  @endif
                                  </button>
              </form>
            </div>
          </div>
        </div>

        <div class="col-lg-2 col-sm-4 col-5">
          <div class="card">
            <div class="image">
              <a href="/product"><img
                src="img/products/product.svg"
                class="card-img-top"
                alt="..."
              /></a>
              <form action="">
                <button class="heart">
                  <i class="fa-regular fa-heart"></i>
                </button>
                <button class="cart-btn">
                  <i class="cart-style uil uil-shopping-cart"></i>
                </button>
              </form>
            </div>
            <div class="card-body">
              <h5 class="item-title card-title">
                Samsung Refrigerator RS66A8100S9
              </h5>
              <div class="item-body">
                @if (session('lang') == "ar")
                  <p>{{ trans('message.from') }} {{ trans('message.amazon') }}</p>
                  <p class="price"><span>11056</span>{{ trans('message.egp') }}</p>
                @else
                  <p>{{ trans('message.amazon') }} {{ trans('message.from') }}</p>
                  <p class="price">{{ trans('message.egp') }}<span>11056</span></p>
                @endif
              </div>
              @if (session('lang') == "ar")
                  <p>{{ trans('message.online_shops') }} 4</p>
                @else
                  <p>4 {{ trans('message.online_shops') }}</p>
                @endif
              <!-- ================================ SITE PRICES=================================== -->
              <form action="">
                <button class="site-prices">
                  <img src="img/budget-details/noon.svg" alt="" />
                  @if (session('lang') == "ar")
                    <p><span>116000</span> {{ trans('message.egp') }}</p>
                    <i class="fa-solid fa-chevron-left"></i>
                  @else 
                    <p>{{ trans('message.egp') }}<span>116000</span></p>
                    <i class="fa-solid fa-chevron-right"></i>    
                  @endif
                                  </button>
                <button class="site-prices">
                  <img src="img/budget-details/JMIA.svg" alt="" />
                  @if (session('lang') == "ar")
                    <p><span>116000</span> {{ trans('message.egp') }}</p>
                    <i class="fa-solid fa-chevron-left"></i>
                  @else 
                    <p>{{ trans('message.egp') }}<span>116000</span></p>
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
                    <p><span>116000</span> {{ trans('message.egp') }}</p>
                    <i class="fa-solid fa-chevron-left"></i>
                  @else 
                    <p>{{ trans('message.egp') }}<span>116000</span></p>
                    <i class="fa-solid fa-chevron-right"></i>    
                  @endif
                                  </button>
              </form>
            </div>
          </div>
        </div>

        <div class="col-lg-2 col-sm-4 col-5">
          <div class="card">
            <div class="image">
              <a href="/product"><img
                src="img/products/product.svg"
                class="card-img-top"
                alt="..."
              /></a>
              <form action="">
                <button class="heart">
                  <i class="fa-regular fa-heart"></i>
                </button>
                <button class="cart-btn">
                  <i class="cart-style uil uil-shopping-cart"></i>
                </button>
              </form>
            </div>
            <div class="card-body">
              <h5 class="item-title card-title">
                Samsung Refrigerator RS66A8100S9
              </h5>
              <div class="item-body">
                @if (session('lang') == "ar")
                  <p>{{ trans('message.from') }} {{ trans('message.amazon') }}</p>
                  <p class="price"><span>11056</span>{{ trans('message.egp') }}</p>
                @else
                  <p>{{ trans('message.amazon') }} {{ trans('message.from') }}</p>
                  <p class="price">{{ trans('message.egp') }}<span>11056</span></p>
                @endif
              </div>
              @if (session('lang') == "ar")
                  <p>{{ trans('message.online_shops') }} 4</p>
                @else
                  <p>4 {{ trans('message.online_shops') }}</p>
                @endif
              <!-- ================================ SITE PRICES=================================== -->
              <form action="">
                <button class="site-prices">
                  <img src="img/budget-details/noon.svg" alt="" />
                  @if (session('lang') == "ar")
                    <p><span>116000</span> {{ trans('message.egp') }}</p>
                    <i class="fa-solid fa-chevron-left"></i>
                  @else 
                    <p>{{ trans('message.egp') }}<span>116000</span></p>
                    <i class="fa-solid fa-chevron-right"></i>    
                  @endif
                                  </button>
                <button class="site-prices">
                  <img src="img/budget-details/JMIA.svg" alt="" />
                  @if (session('lang') == "ar")
                    <p><span>116000</span> {{ trans('message.egp') }}</p>
                    <i class="fa-solid fa-chevron-left"></i>
                  @else 
                    <p>{{ trans('message.egp') }}<span>116000</span></p>
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
                    <p><span>116000</span> {{ trans('message.egp') }}</p>
                    <i class="fa-solid fa-chevron-left"></i>
                  @else 
                    <p>{{ trans('message.egp') }}<span>116000</span></p>
                    <i class="fa-solid fa-chevron-right"></i>    
                  @endif
                                  </button>
              </form>
            </div>
          </div>
        </div>

        <div class="col-lg-2 col-sm-4 col-5">
          <div class="card">
            <div class="image">
              <a href="/product"><img
                src="img/products/product.svg"
                class="card-img-top"
                alt="..."
              /></a>
              <form action="">
                <button class="heart">
                  <i class="fa-regular fa-heart"></i>
                </button>
                <button class="cart-btn">
                  <i class="cart-style uil uil-shopping-cart"></i>
                </button>
              </form>
            </div>
            <div class="card-body">
              <h5 class="item-title card-title">
                Samsung Refrigerator RS66A8100S9
              </h5>
              <div class="item-body">
                @if (session('lang') == "ar")
                  <p>{{ trans('message.from') }} {{ trans('message.amazon') }}</p>
                  <p class="price"><span>11056</span>{{ trans('message.egp') }}</p>
                @else
                  <p>{{ trans('message.amazon') }} {{ trans('message.from') }}</p>
                  <p class="price">{{ trans('message.egp') }}<span>11056</span></p>
                @endif
              </div>
              @if (session('lang') == "ar")
                  <p>{{ trans('message.online_shops') }} 4</p>
                @else
                  <p>4 {{ trans('message.online_shops') }}</p>
                @endif
              <!-- ================================ SITE PRICES=================================== -->
              <form action="">
                <button class="site-prices">
                  <img src="img/budget-details/noon.svg" alt="" />
                  @if (session('lang') == "ar")
                    <p><span>116000</span> {{ trans('message.egp') }}</p>
                    <i class="fa-solid fa-chevron-left"></i>
                  @else 
                    <p>{{ trans('message.egp') }}<span>116000</span></p>
                    <i class="fa-solid fa-chevron-right"></i>    
                  @endif
                                  </button>
                <button class="site-prices">
                  <img src="img/budget-details/JMIA.svg" alt="" />
                  @if (session('lang') == "ar")
                    <p><span>116000</span> {{ trans('message.egp') }}</p>
                    <i class="fa-solid fa-chevron-left"></i>
                  @else 
                    <p>{{ trans('message.egp') }}<span>116000</span></p>
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
                    <p><span>116000</span> {{ trans('message.egp') }}</p>
                    <i class="fa-solid fa-chevron-left"></i>
                  @else 
                    <p>{{ trans('message.egp') }}<span>116000</span></p>
                    <i class="fa-solid fa-chevron-right"></i>    
                  @endif
                                  </button>
              </form>
            </div>
          </div>
        </div>

        <div class="col-lg-2 col-sm-4 col-5">
          <div class="card">
            <div class="image">
              <a href="/product"><img
                src="img/products/product.svg"
                class="card-img-top"
                alt="..."
              /></a>
              <form action="">
                <button class="heart">
                  <i class="fa-regular fa-heart"></i>
                </button>
                <button class="cart-btn">
                  <i class="cart-style uil uil-shopping-cart"></i>
                </button>
              </form>
            </div>
            <div class="card-body">
              <h5 class="item-title card-title">
                Samsung Refrigerator RS66A8100S9
              </h5>
              <div class="item-body">
                @if (session('lang') == "ar")
                  <p>{{ trans('message.from') }} {{ trans('message.amazon') }}</p>
                  <p class="price"><span>11056</span>{{ trans('message.egp') }}</p>
                @else
                  <p>{{ trans('message.amazon') }} {{ trans('message.from') }}</p>
                  <p class="price">{{ trans('message.egp') }}<span>11056</span></p>
                @endif
              </div>
              @if (session('lang') == "ar")
                  <p>{{ trans('message.online_shops') }} 4</p>
                @else
                  <p>4 {{ trans('message.online_shops') }}</p>
                @endif
              <!-- ================================ SITE PRICES=================================== -->
              <form action="">
                <button class="site-prices">
                  <img src="img/budget-details/noon.svg" alt="" />
                  @if (session('lang') == "ar")
                    <p><span>116000</span> {{ trans('message.egp') }}</p>
                    <i class="fa-solid fa-chevron-left"></i>
                  @else 
                    <p>{{ trans('message.egp') }}<span>116000</span></p>
                    <i class="fa-solid fa-chevron-right"></i>    
                  @endif
                                  </button>
                <button class="site-prices">
                  <img src="img/budget-details/JMIA.svg" alt="" />
                  @if (session('lang') == "ar")
                    <p><span>116000</span> {{ trans('message.egp') }}</p>
                    <i class="fa-solid fa-chevron-left"></i>
                  @else 
                    <p>{{ trans('message.egp') }}<span>116000</span></p>
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
                    <p><span>116000</span> {{ trans('message.egp') }}</p>
                    <i class="fa-solid fa-chevron-left"></i>
                  @else 
                    <p>{{ trans('message.egp') }}<span>116000</span></p>
                    <i class="fa-solid fa-chevron-right"></i>    
                  @endif
                                  </button>
              </form>
            </div>
          </div>
        </div>

        <div class="col-lg-2 col-sm-4 col-5">
          <div class="card">
            <div class="image">
              <a href="/product"><img
                src="img/products/product.svg"
                class="card-img-top"
                alt="..."
              /></a>
              <form action="">
                <button class="heart">
                  <i class="fa-regular fa-heart"></i>
                </button>
                <button class="cart-btn">
                  <i class="cart-style uil uil-shopping-cart"></i>
                </button>
              </form>
            </div>
            <div class="card-body">
              <h5 class="item-title card-title">
                Samsung Refrigerator RS66A8100S9
              </h5>
              <div class="item-body">
                @if (session('lang') == "ar")
                  <p>{{ trans('message.from') }} {{ trans('message.amazon') }}</p>
                  <p class="price"><span>11056</span>{{ trans('message.egp') }}</p>
                @else
                  <p>{{ trans('message.amazon') }} {{ trans('message.from') }}</p>
                  <p class="price">{{ trans('message.egp') }}<span>11056</span></p>
                @endif
              </div>
              @if (session('lang') == "ar")
                  <p>{{ trans('message.online_shops') }} 4</p>
                @else
                  <p>4 {{ trans('message.online_shops') }}</p>
                @endif
              <!-- ================================ SITE PRICES=================================== -->
              <form action="">
                <button class="site-prices">
                  <img src="img/budget-details/noon.svg" alt="" />
                  @if (session('lang') == "ar")
                    <p><span>116000</span> {{ trans('message.egp') }}</p>
                    <i class="fa-solid fa-chevron-left"></i>
                  @else 
                    <p>{{ trans('message.egp') }}<span>116000</span></p>
                    <i class="fa-solid fa-chevron-right"></i>    
                  @endif
                                  </button>
                <button class="site-prices">
                  <img src="img/budget-details/JMIA.svg" alt="" />
                  @if (session('lang') == "ar")
                    <p><span>116000</span> {{ trans('message.egp') }}</p>
                    <i class="fa-solid fa-chevron-left"></i>
                  @else 
                    <p>{{ trans('message.egp') }}<span>116000</span></p>
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
                    <p><span>116000</span> {{ trans('message.egp') }}</p>
                    <i class="fa-solid fa-chevron-left"></i>
                  @else 
                    <p>{{ trans('message.egp') }}<span>116000</span></p>
                    <i class="fa-solid fa-chevron-right"></i>    
                  @endif
                                  </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ============================= Top Offers end =============================== -->

@endsection
{{-- End Body --}}


{{-- Footer --}}
@section('jsLinks')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
@endsection
{{-- End Footer --}}