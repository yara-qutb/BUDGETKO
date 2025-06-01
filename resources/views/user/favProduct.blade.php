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
    <div class="container">@include('success')</div>

    <div class="container">
      <div class="row main_products">
        <!-- ============================ Product Image and Prices ============================ -->
        <div class="col-lg-8 col-12">
          <div class="row prod-images">
            <!-- ----product images---- -->
            <div class="col-4">
              <img
                src="{{ $product->pro_image}}"
                id="main-img"
                class="main-img"
                alt="..."
              />
              <div class="images">
                <img
                  src="{{ $product->pro_image }}"
                  id="img"
                  class="img-mini"
                  onclick="changeimg(this)"
                  alt="..."
                />
                <img
                  src="{{ $product->pro_image }}"
                  id="img"
                  class="img-mini"
                  onclick="changeimg(this)"
                  alt="..."
                />
              </div>
            </div>
            <!-- -----Product info ------- -->
            <div class="col-8">
              <h4 class="prod-title">{{ $product->pro_name }}</h4>
              <div class="prices justify-content-between">
                <p>{{ trans('message.Stores_starting_from') }} 4</p>
                @if (session('lang') == "ar")
                  <p class="price"><span>{{ $product->pro_price }}</span> {{ trans('message.egp') }}</p>
                @else
                  <p class="price">{{ trans('message.egp') }}<span>{{ $product->pro_price }}</span></p>
                @endif
              </div>
              <div class="buttons justify-content-between">
                <form action="{{route('addToCart')}}" method="POST">
                  @csrf
                  <input type="hidden" name="pro_name" value="{{ $product->pro_name }}">
                  <input type="hidden" name="pro_image"value="{{ $product->pro_image }}">
                  <input type="hidden" name="pro_from"value="raneen">
                  <input type="hidden" name="pro_price"value="{{ $product->pro_price }}">
                  <button class="cart">{{ trans('message.add_to_cart') }} <i class=" uil uil-shopping-cart"></i></button>
                </form>
                <form action="{{route('addToFavorite')}}" method="POST">
                  @csrf
                  <input type="hidden" name="pro_name" value="{{ $product->pro_name }}">
                  <input type="hidden" name="pro_image"value="{{ $product->pro_image }}">
                  <input type="hidden" name="pro_from"value="raneen">
                  <input type="hidden" name="pro_price"value="{{ $product->pro_price }}">
                  <button class="fav">{{ trans('message.add_to_favorite') }} <i class="fa-regular fa-heart"></i></button>
                </form>
                <form action="{{route('goToCommunity')}}" method="POST">
                    @csrf
                    <input type="hidden" name="pro_name" value="{{$product->pro_name}}">
                    <input type="hidden" name="pro_image"value="{{$product->pro_image}}">
                    <input type="hidden" name="pro_from"value="raneen">
                    <input type="hidden" name="pro_price"value="{{$product->pro_pricec}}">
                    <input type="hidden" name="pro_link"value="{{$product->pro_link}}">
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
                            <img src="{{ asset('img/budget-details/noon.svg') }}" alt="">
                        </a>
                        <a class="order" target="_blank" href="{{$data_elaraby['products'][0]['link']}}">{{ trans('message.order_now') }}</a>

                    </div>
                </div>
              @endif
            </div>
          </div>
        </div>

        <!-- ======================================= Similar Products ============================== -->

          {{-- <div class="col-lg-4 col-12">
              <div class="row similar">
                  <h2 class="text-center">{{ trans('message.Similar_Products') }}</h2>
                  <?php $rand = rand(0,count($data['products'])-6); ?>
                  @for($d=$rand; $d < ($rand+6) ;$d++)
                  <div class="col-6">
                    <div class="card">
                      <div class="image">
                          <form action="{{route('search_product')}}" method="get">
                              <button type="submit">
                                      <img
                                          src="{{ $data['products'][$d]['image'] }}"
                                          class="card-img-top"
                                          alt="..."
                                      />
                              </button>
                              <input type="hidden" name="pro_from" value="{{ $data['site'] }}">
                              <input type="hidden" name="pro_name" value="{{ $data['products'][$d]['name'] }}">
                              <input type="hidden" name="pro_price" value="{{ $data['products'][$d]['price'] }}">
                              <input type="hidden" name="pro_image" value="{{ $data['products'][$d]['image'] }}">
                              <input type="hidden" name="pro_link" value="{{ $data['products'][$d]['link'] }}">
                      </form>
                        <form action="{{route('addToFavorite')}}" method="POST">
                          @csrf
                          <input type="hidden" name="pro_name" value="{{ $data['products'][$d]['name'] }}">
                          <input type="hidden" name="pro_image"value="{{ $data['products'][$d]['image'] }}">
                          <input type="hidden" name="pro_from"value="{{ $data['site'] }}">
                          <input type="hidden" name="pro_price"value="{{ $data['products'][$d]['price'] }}">
                          <button class="heart">
                            <i class="heart-style fa-regular fa-heart"></i>
                          </button>
                        </form>
                        <form action="{{route('addToCart')}}" method="POST">
                          @csrf
                          <input type="hidden" name="pro_name" value="{{ $data['products'][$d]['name'] }}">
                          <input type="hidden" name="pro_image"value="{{ $data['products'][$d]['image'] }}">
                          <input type="hidden" name="pro_from"value="{{ $data['site'] }}">
                          <input type="hidden" name="pro_price"value="{{ $data['products'][$d]['price'] }}">
                          <button class="cart">
                            <i class="cart-style uil uil-shopping-cart"></i>
                          </button>
                        </form>
                      </div>
                      <div class="card-body">
                        <h5 class="item-title card-title">
                          {{ $data['products'][$d]['name'] }}
                        </h5>
                        <a target="_blank" style="text-decoration: none" href="{{ $data['products'][$d]['link'] }}">
                            <div class="item-body">

                            @if (session('lang') == "ar")
                              <p class="price"><span>{{ $data['products'][$d]['price'] }}</span> {{ trans('message.egp') }}</p>
                              <i style="color: #000;" class="fa-solid fa-chevron-left"></i>
                            @else
                              <p class="price">{{ trans('message.egp') }}<span>{{ $data['products'][$d]['price'] }}</span></p>
                              <i style="color: #000;" class="fa-solid fa-chevron-right"></i>
                            @endif
                          </div>
                          <p>{{ trans('message.from') }} {{ $data['site']}}</p></a>


                      </div>
                    </div>
                  </div>

                  @endfor
              </div>
          </div>
      </div> --}}
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
