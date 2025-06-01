@extends('user.layout')

{{-- Head --}}

@section('title')
  Cart
@endsection

@section('cssLinks')
  <link rel="stylesheet" href="{{ asset('asset/css/cart.css') }}" />
@endsection

{{-- End head --}}

{{-- Body --}}
@section('body')
<div class="container main-cart">
  <div>
    <br />
    <br />
    <br />
    <!-- <br /> -->
  </div>
  @include('success')
  <div class="cont row">
    <div class="cart-part col-8">
      <div class="delete">
        <div class="delete-btn">
          <form  method="POST" action="{{route('deleteCartAll')}}">
            @csrf
            @method('delete')
            <button type="submit">
              {{ trans('message.delete_all') }} <img src="img/nav/Vector.svg" alt="" />
            </button>
          </form>
        </div>
      </div>

      <div class="products">
        <div class="container product">
          <?php $acount = 0; ?>
          <?php $total = 0; ?>
          @foreach ($carts as $cart )
            <div class="row">
              @if (session('lang') == "ar")
              <div class="col pro-img" style="border-left: 1px solid #c6c6c6;">
              @else
              <div class="col pro-img" style="border-right: 1px solid #c6c6c6;">
              @endif
                <a href="/product/{id}"><img src="{{$cart->pro_image}}" alt="" /></a>
              </div>
              <div class="col-5 pro-info">
                <div class="pro-text">
                  <div class="pro-name">{{$cart->pro_name}}</div>
                  <div class="pro-price">
                    @if (session('lang') == "ar")
                      <span class="price" >{{$cart->pro_price}} <span class="egp">{{ trans('message.egp') }}</span></span>
                      @else
                      <span class="price" ><span class="egp">{{ trans('message.egp') }} </span>{{$cart->pro_price}}</span>
                      @endif
                  </div>
                  <div class="from">{{ trans('message.from') }} {{$cart->pro_from}}</div>
                </div>
                <div class="fav-btn">
                  <form method="POST" action="{{route('addToFavorite')}}">
                    @csrf
                    <input type="hidden" name="pro_name" value="{{$cart->pro_name}}">
                    <input type="hidden" name="pro_image" value="{{$cart->pro_image}}">
                    <input type="hidden" name="pro_from" value="{{$cart->pro_from}}">
                    <input type="hidden" name="pro_price" value="{{$cart->pro_price}}">
                    <button type="submit">
                      {{ trans('message.add_to_favorite') }}
                      <i class="fa-regular fa-heart"></i>
                    </button>
                  </form>
                </div>
                <div class="btns">
                  <div class="frst-btn">
                    <div class="from-img">
                      <img src="img/fav-cart/noun.svg" alt="" />
                    </div>
                    <div class="x">
                      <form method="POST" action="{{route('deleteCart',$cart->id)}}">
                        @csrf
                        @method('delete')
                        <button type="submit">X</button>
                      </form>
                    </div>
                  </div>

                </div>
              </div>
            </div>
            <?php $acount++; ?>
            <?php $total = $total + $cart->pro_price; ?>
          @endforeach
        </div>
      </div>
    </div>
    <div class="cart-sum col">
      <div class="cart-text">{{ trans('message.Cart_Summary') }}</div>
      @if (session('lang') == "ar")
        <div class="items" style="margin: 17px 20px 0px 0px;">
            <div class="total">{{ trans('message.total') }} : <?php echo $total; ?></div>
          <div class="item-num">{{ trans('message.items') }} : <?php echo $acount; ?></div>
          <div class="item">
            <img src="img/fav-cart/amazon.svg" alt="" />
            <span>{{ trans('message.item') }} {{ trans('message.amazon') }} : 3</span>
          </div>
          <div class="item">
            <img src="img/fav-cart/noun.svg" alt="" />
            <span>{{ trans('message.item') }} {{ trans('message.noon') }} : 0</span>
          </div>

          <div class="item">
            <img src="img/fav-cart/raneen.svg" alt="" />
            <span>{{ trans('message.item') }} {{ trans('message.raneen') }} : 4</span>
          </div>
          </div>
        @else
          <div class="items" style="margin: 17px 0px 0px 20px;">
            <div class="total">{{ trans('message.total') }} : <?php echo $total; ?></div>
          <div class="item-num">{{ trans('message.items') }} : <?php echo $acount; ?></div>

          <div class="item">
            <img src="img/fav-cart/amazon.svg" alt="" />
            <span>{{ trans('message.amazon') }} {{ trans('message.items') }} : 3</span>
          </div>

          <div class="item">
            <img src="img/fav-cart/noun.svg" alt="" />
            <span>{{ trans('message.noon') }} {{ trans('message.items') }} : 0</span>
          </div>

          <div class="item">
            <img src="img/fav-cart/raneen.svg" alt="" />
            <span>{{ trans('message.raneen') }} {{ trans('message.items') }} : 4</span>
          </div>
          </div>
        @endif
    </div>
  </div>
</div>
@endsection
{{-- End Body --}}


{{-- Footer --}}
@section('jsLinks')
  <script src="{{ asset('asset/js/btns.js') }}"></script>
@endsection
{{-- End Footer --}}
