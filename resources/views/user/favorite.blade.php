@extends('user.layout')

{{-- Head --}}

@section('title')
  Favorite
@endsection

@section('cssLinks')
  <link rel="stylesheet" href="{{ asset('asset/css/fav.css') }}" />
@endsection

{{-- End head --}}

{{-- Body --}}
@section('body')

<div class="container main-fav">
    <div>
      <br />
      <br />
      <br />
    </div>
    @include('success')
    <div class="cont row">
      <div class="fav-part col-8">
        <div class="delete">
            <div class="delete-btn">
              <form method="POST" action="{{route('deleteFavoriteAll')}}">
                @csrf
                @method('delete')
                <button type="submit">
                  {{ trans('message.delete_all') }} <img src="img/nav/Vector.svg" alt="" />
                </button>
            </form>
          </div>
        </div>

        <div class="product">
          <div class="container text-center">
            <div class="row">
              <?php $acount = 0; ?>
              <?php $total = 0; ?>
              <?php $elaraby_prods = 0;
                    $jumia_prods = 0;
                    $raneen_prods = 0;
                ?>
                @foreach ($favorites as $favorite)
                        <?php
                            if($favorite->pro_from =="jumia"){
                                $jumia_prods++;
                            }else if($favorite->pro_from =="raneen"){
                                $raneen_prods++;
                            }elseif($favorite->pro_from =="elaraby"){
                                $elaraby_prods++;
                            }
                        ?>
                <div class="card" style="width: 10rem; height: 12rem; margin: 1%">
                  <div class="pro-img">
                    <a href="{{route('fav',$favorite->id)}}"><img src="{{$favorite->pro_image}}" class="card-img-top" alt="..." /></a>
                    <div class="x">
                      <form method="POST" action="{{route('deleteOne',$favorite->id)}}">
                        @csrf
                        @method('delete')
                        <button type="submit">X</button>
                      </form>
                    </div>
                  </div>

                  <div class="text-cart">
                    <small>{{$favorite->pro_name}}</small>
                  </div>
                  <div class="prices">
                    @if (session('lang') == "ar")
                    <small class="price">{{$favorite->pro_price}}</small>
                    <small class="egp">{{ trans('message.egp') }}</small>
                    @else
                    <small class="egp">{{ trans('message.egp') }}</small>
                    <small class="price">{{$favorite->pro_price}}</small>
                    @endif
                  </div>
                  <form action="{{route('addToCart')}}" method="POST">
                    @csrf
                    <input type="hidden" name="pro_name" value="{{$favorite->pro_name}}">
                    <input type="hidden" name="pro_image" value="{{$favorite->pro_image}}">
                    <input type="hidden" name="pro_from" value="raneen">
                    <input type="hidden" name="pro_price" value="{{$favorite->pro_price}}">
                    <input type="hidden" name="quantity" value="{{$favorite->quantity}}">
                    <button type="submit" class="btn">{{ trans('message.add_to_cart') }} <i class="uil uil-shopping-cart"></i></button>

                  </form>

                </div>
                <?php $acount++;  ?>
                @endforeach
              </div>
          </div>
        </div>
      </div>
      <div class="fav-sum col">
        <div class="fav-text">{{ trans('message.Favorite_Summary') }}</div>
        @if (session('lang') == "ar")
          <div class="items" style="margin: 17px 20px 0px 0px;">
          <div class="item-num">{{ trans('message.items') }} : <?php echo $acount; ?></div>
          <div class="item">
            <img src="img/fav-cart/jumia.svg" alt="" />
            <span>{{ trans('message.item') }} {{ trans('message.jumia') }} : {{$jumia_prods}} </span>
          </div>
          <div class="item">
            <img src="img/fav-cart/raneen.svg" alt="" />
            <span>{{ trans('message.item') }} {{ trans('message.raneen') }} : {{$raneen_prods}} </span>
          </div>
          <div class="item">
            <img src="img/fav-cart/elaraby.svg" alt="" />
            <span>{{ trans('message.item') }} {{ trans('message.elaraby') }} : {{$elaraby_prods}} </span>
          </div>

          </div>
        @else
          <div class="items"  style="margin: 17px 0px 0px 20px;">
          <div class="item-num">{{ trans('message.items') }} : <?php echo $acount; ?></div>
          <div class="item">
            <img src="img/fav-cart/jumia.svg" alt="" />
            <span>{{ trans('message.items') }} {{trans('message.from')}} {{ trans('message.jumia') }} : {{$jumia_prods}} </span>
          </div>
          <div class="item">
            <img src="img/fav-cart/raneen.svg" alt="" />
            <span>{{ trans('message.item') }} {{trans('message.from')}} {{ trans('message.raneen') }} : {{$raneen_prods}} </span>
          </div>
          <div class="item">
            <img src="img/fav-cart/elaraby.svg" alt="" />
            <span>{{ trans('message.items') }} {{trans('message.from')}} {{ trans('message.elaraby') }} : {{$elaraby_prods}} </span>
          </div>

          </div>
        @endif

      </div>
    </div>
</div>

@endsection
{{-- End Body --}}
