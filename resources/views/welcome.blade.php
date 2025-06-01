@extends('user.layout')

{{-- Head --}}

@section('title')
  Budgetko
@endsection

@section('cssLinks')
    <link rel="stylesheet" href="{{ asset('asset/css/normalize.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset/css/home.css') }}" />
@endsection

{{-- End head --}}

{{-- Body --}}
@section('body')
<br>
<div class="container">@include('success')</div>
<div class="container">@include('errors')</div>

<!-- ============================= CAROUSEL START=============================== -->
<div id="carouselExampleDark" class="carousel carousel-dark slide">
    <div class="cars">
    <div id="carouselExampleAutoplaying" class="carousel slide carslide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="2500">
        @if (session('lang') == "ar")
          <a href="/budget_search"><img src="{{ asset('img/home/blue_ar.svg') }}" class="d-block w-100"></a>
        @else
          <a href="/budget_search"><img src="{{ asset('img/home/blue_en.svg') }}" class="d-block w-100"></a>
        @endif
      </div>
      <div class="carousel-item" data-bs-interval="2500">
        @if (session('lang') == "ar")
          <a href="/budget_search"><img src="{{ asset('img/home/green_ar.svg') }}" class="d-block w-100"></a>
        @else
          <a href="/budget_search"><img src="{{ asset('img/home/green_en.svg') }}" class="d-block w-100"></a>
        @endif
      </div>
      <div class="carousel-item" data-bs-interval="2500">
        @if (session('lang') == "ar")
          <a href="/budget_search"><img src="{{ asset('img/home/orange_ar.svg') }}" class="d-block w-100"></a>
        @else
          <a href="/budget_search"><img src="{{ asset('img/home/orange_en.svg') }}" class="d-block w-100"></a>
        @endif
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" style="left: -4%; z-index: 0;" data-bs-slide="prev">
      <div class="arrow"><span class="carousel-control-prev-icon" aria-hidden="true"></span></div>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"  style="right: -4%; z-index: 0;" data-bs-slide="next">
      <div class="arrow"><span class="carousel-control-next-icon" aria-hidden="true"></span></div>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  </div>
</div>
<br>
<!-- ============================= CAROUSEL END=============================== -->

<!-- ============================= Top Offers start =============================== -->

<section class="top-offers">
  <div class="container">
    <h2>{{ trans('message.top_offers') }}</h2>
    <div class="row justify-content-center">
        <div class="slider-content" id="content">
                    <?php $y=0;?>
            @foreach ($data3['products'] as $product3)
                <div class="col-lg-2 col-sm-4 col-5 marg">
                <div class="card">
                    <div class="image">
                    <a href="{{route('sales',$y)}}"><img src="<?php echo $product3['image']; ?>" class="card-img-top"
                        alt="..." /></a>
                        <form action="{{route('addToFavorite')}}" method="POST">
                            @csrf
                            <input type="hidden" name="pro_name" value="{{$product3['name']}}">
                            <input type="hidden" name="pro_image"value="{{$product3['image']}}">
                            <input type="hidden" name="pro_from"value="raneen">
                            <input type="hidden" name="pro_price"value="{{$product3['price']}}">
                            <button class="heart">
                                <i class="fa-regular heart-style fa-heart"></i>
                            </button>
                        </form>
                        <form action="{{route('addToCart')}}" method="POST">
                            @csrf
                            <input type="hidden" name="pro_name" value="{{$product3['name']}}">
                            <input type="hidden" name="pro_image"value="{{$product3['image']}}">
                            <input type="hidden" name="pro_from"value="raneen">
                            <input type="hidden" name="pro_price"value="{{$product3['price']}}">
                            <button class="cart-btn">
                                <i class="cart-style uil uil-shopping-cart"></i>
                            </button>
                        </form>
                    </div>
                    <div class="card-body">
                    @if (session('lang') == "ar")
                    <a href="{{route('sales',$y)}}"><h5 class="item-title card-title" style="direction: ltr"> <?php echo $product3['name']; ?> </h5></a>
                    @else
                    <a href="{{route('sales',$y)}}"><h5 class="item-title card-title"> <?php echo $product3['name']; ?></h5></a>
                    @endif
                    <div class="item-body">
                        <p>{{ trans('message.from') }} Raneen</p>
                        @if (session('lang') == "ar")
                        <p class="price"><span><?php echo $product3['price']; $y++; ?></span>{{ trans('message.egp') }}</p>
                        @else
                        <p class="price">{{ trans('message.egp') }}<span><?php echo $product3['price']; $y++; ?></span></p>
                        @endif
                    </div>

                    <!-- ================================ SITE PRICES=================================== -->

                    </div>
                </div>
                </div>
            @endforeach
            <button type="button" id="right-button" class="c-right _prev"><i class="fa-solid fa-chevron-right"></i></button>
            <button type="button" id="left-button" class="c-left _prev"><i class="fa-solid fa-chevron-left"></i></button>
        </div>

    </div>
  </div>
</section>

<!-- ============================= Top Offers end =============================== -->





<!-- ============================= Most fav start =============================== -->

  <section class="most-fav">
    <div class="container">
      <h2>{{ trans('message.most_favorite_by_users') }}</h2>

      <div class="row justify-content-center">
          <div class="slider-content" id="content2">
                    <?php $x=0; ?>
                    @foreach ($data2['products'] as $product2)
                    <div class="col-lg-2 col-sm-4 col-5 marg">
                        <div class="card">
                        <div class="image">
                            <a href="{{route('topoffers',$x)}}"><img src="<?php echo $product2['image']; ?>" class="card-img-top"
                            alt="..." /></a>
                            <form action="{{route('addToFavorite')}}" method="POST">
                                @csrf
                                <input type="hidden" name="pro_name" value="{{$product2['name']}}">
                                <input type="hidden" name="pro_image"value="{{$product2['image']}}">
                                <input type="hidden" name="pro_from"value="raneen">
                                <input type="hidden" name="pro_price"value="{{$product2['price']}}">
                                <button class="heart">
                                    <i class="fa-regular heart-style fa-heart"></i>
                                </button>
                            </form>
                            <form action="{{route('addToCart')}}" method="POST">
                                @csrf
                                <input type="hidden" name="pro_name" value="{{$product2['name']}}">
                                <input type="hidden" name="pro_image"value="{{$product2['image']}}">
                                <input type="hidden" name="pro_from"value="raneen">
                                <input type="hidden" name="pro_price"value="{{$product2['price']}}">
                                <button class="cart-btn">
                                    <i class="cart-style uil uil-shopping-cart"></i>
                                </button>
                            </form>
                        </div>
                        <div class="card-body">
                            @if (session('lang') == "ar")
                            <a href="{{route('topoffers',$x)}}"><h5 class="item-title card-title" style="direction: ltr"> <?php echo $product2['name']; $x++;  ?> </h5></a>
                            @else
                            <a href="{{route('topoffers',$x)}}"><h5 class="item-title card-title"> <?php echo $product2['name']; $x++; ?> </h5></a>
                            @endif
                            <div class="item-body">
                                <p>{{ trans('message.from') }} Raneen</p>
                            @if (session('lang') == "ar")
                                <p class="price"><span><?php echo $product2['price']; ?></span>{{ trans('message.egp') }}</p>
                            @else
                                <p class="price">{{ trans('message.egp') }}<span><?php echo $product2['price']; ?></span></p>
                            @endif
                            </div>

                            <!-- ================================ SITE PRICES=================================== -->

                        </div>
                        </div>
                    </div>
                    @endforeach
                    <button type="button" id="right-button2" class="c-right _prev"><i class="fa-solid fa-chevron-right"></i></button>
                    <button type="button" id="left-button2" class="c-left _prev"><i class="fa-solid fa-chevron-left"></i></button>
            </div>

        </div>
    </div>
  </section>

<!-- ============================= Most fav end =============================== -->






<!-- ============================= Recommended Start =============================== -->


<section class="recommend">
  <div class="container">
    <div class="row justify-content-center">
      <h2 >{{ trans('message.recommended') }}</h2>

      <div class="slider-content" id="content3">

            <?php $i = 0; ?>
            @foreach ($data['products'] as $product)
                <div class="col-lg-2 col-sm-4 col-5 marg">
                    <div class="card">
                        <div class="image">
                        <a href="{{route('product',$i)}}"><img src="<?php echo $product['image']; ?>" class="card-img-top" alt="..." /></a>
                        <form action="{{route('addToFavorite')}}" method="POST">
                            @csrf
                            <input type="hidden" name="pro_name" value="{{$product['name']}}">
                            <input type="hidden" name="pro_image"value="{{$product['image']}}">
                            <input type="hidden" name="pro_from"value="raneen">
                            <input type="hidden" name="pro_price"value="{{$product['price']}}">
                            <button class="heart">
                            <i class="fa-regular heart-style fa-heart"></i>
                            </button>
                        </form>
                        <form action="{{route('addToCart')}}" method="POST">
                            @csrf
                            <input type="hidden" name="pro_name" value="{{$product['name']}}">
                            <input type="hidden" name="pro_image"value="{{$product['image']}}">
                            <input type="hidden" name="pro_from"value="raneen">
                            <input type="hidden" name="pro_price"value="{{$product['price']}}">
                            <button class="cart-btn">
                            <i class="cart-style uil uil-shopping-cart"></i>
                            </button>
                        </form>
                        </div>
                        <div class="card-body">
                        @if (session('lang') == "ar")
                            <a href="{{route('product',$i)}}"><h5 class="item-title card-title" style="direction: ltr"><?php echo $product['name'];$i++;?></h5></a>
                        @else
                        <a href="{{route('product',$i)}}"><h5 class="item-title card-title"><?php echo $product['name'];$i++; ?></h5></a>
                        @endif
                        <div class="item-body">
                            <p>{{ trans('message.from') }} Raneen</p>
                            @if (session('lang') == "ar")
                            <p class="price"><span><?php echo $product['price']; ?></span>{{ trans('message.egp') }}</p>
                            @else
                            <p class="price">{{ trans('message.egp') }}<span><?php echo $product['price']; ?></span></p>
                            @endif
                        </div>

                            <!-- ================================ SITE PRICES=================================== -->

                        </div>
                    </div>
                </div>

            @endforeach

            <button type="button" id="right-button3" class="c-right c-right-h _prev"><i class="fa-solid fa-chevron-right"></i></button>
            <button type="button" id="left-button3" class="c-left c-left-h _prev"><i class="fa-solid fa-chevron-left"></i></button>
      </div>
    </div>
  </div>
</section>

<!-- ============================= Recommended end =============================== -->

<!-- ============================= Shop by Start =============================== -->


<section class="recommend">
    <div class="container">
      <div class="row justify-content-center">
        <h2 >{{ trans('message.shop_by') }}</h2>
        <div class="footer-imgs">
          <a target="_blank" href="https://www.raneen.com/"><img src="{{ asset('img/footer/raneen.svg') }}" alt=""></a>
          <a target="_blank" href="https://www.rayashop.com/ar"><img src="{{ asset('img/footer/raya.svg') }}" alt=""></a>
          <a target="_blank" href="https://www.jumia.com.eg/"><img src="{{ asset('img/footer/jumia.svg') }}" alt=""></a>
        </div>
        <div class="footer-imgs">
          <a target="_blank" href="https://2b.com.eg/"><img src="{{ asset('img/footer/2b.svg') }}" alt=""></a>
          <a target="_blank" href="https://www.amazon.eg/"><img src="{{ asset('img/footer/amazon.svg') }}" alt=""></a>
          <a target="_blank" href="https://btech.com/ar"><img src="{{ asset('img/footer/b.tech.svg') }}" alt=""></a>
        </div>
        <div class="footer-imgs">
          <a target="_blank" href="https://www.carrefouregypt.com/mafegy/en/"><img src="{{ asset('img/footer/carrefour.svg') }}" alt=""></a>
          <a target="_blank" href="https://homzmart.com/en/"><img src="{{ asset('img/footer/homzmart.svg') }}" alt=""></a>
          <a target="_blank" href="https://hubfurniture.com.eg/"><img src="{{ asset('img/footer/hub.svg') }}" alt=""></a>
        </div>
        <div class="footer-imgs">
          <a target="_blank" href="https://www.hyperone.com.eg/"><img src="{{ asset('img/footer/hypermarket.svg') }}" alt=""></a>
          <a target="_blank" href="https://www.ikea.com/eg/ar/"><img src="{{ asset('img/footer/ikea.svg') }}" alt=""></a>
          <a target="_blank" href="https://www.noon.com/egypt-en/"><img src="{{ asset('img/footer/noon.svg') }}" alt=""></a>
        </div>
      </div>
    </div>
</section>

  <!-- ============================= Shop by end =============================== -->




  <!-- ============================= About us Start =============================== -->


<section class="theabout">
    <div class="container">
      <div class="row justify-content-center">
        <div class="about">
          <h2 style="font-weight: bold">{{ trans('message.about_us') }}</h2>
          <p>{{ trans('message.about') }}</p>
        </div>
        <div class="footer-imgs2">
          <div class="infooter">
            <div class="infooter-img"><img src="{{ asset('img/home/1.svg') }}" alt=""></div>
            <div class="infooter-text"><p>{{ trans('message.about1') }}</p></div>
          </div>
          <div class="infooter">
            <div class="infooter-img"><img src="{{ asset('img/home/2.svg') }}" alt=""></div>
          <div class="infooter-text"><p>{{ trans('message.about2') }}</p></div>
          </div>
          <div class="infooter">
            <div class="infooter-img"><img src="{{ asset('img/home/3.svg') }}" alt=""></div>
          <div class="infooter-text"><p>{{ trans('message.about3') }}</p></div>
          </div>
        </div>
        <div class="footer-imgs2">
          <div class="infooter">
            <div class="infooter-img"><img src="{{ asset('img/home/4.svg') }}" alt=""></div>
            <div class="infooter-text"><p>{{ trans('message.about4') }}</p></div>
          </div>
          <div class="infooter">
            <div class="infooter-img"><img src="{{ asset('img/home/5.svg') }}" alt=""></div>
            <div class="infooter-text"><p>{{ trans('message.about5') }}</p></div>
          </div>
          <div class="infooter">
            <div class="infooter-img"><img src="{{ asset('img/home/6.svg') }}" alt=""></div>
            <div class="infooter-text"><p>{{ trans('message.about6') }}</p></div>
          </div>
        </div>
      </div>
    </div>
</section>

  <!-- ============================= About us end =============================== -->
@endsection
{{-- End Body --}}


{{-- Footer --}}
@section('jsLinks')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="asset/js/home.js"></script>
  @endsection
{{-- End Footer --}}
