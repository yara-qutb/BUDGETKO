<!-- your_view.blade.php -->

@foreach ($products['products'] as $product)
    <div class="product">
        <div class="image">
            <a href="{{ $product['link'] }}"><img src="{{ $product['image'] }}" class="card-img-top" alt="..."></a>
            <form action="">
                <button class="heart"><i class="fa-regular fa-heart"></i></button>
                <button class="cart-btn"><i class="cart-style uil uil-shopping-cart"></i></button>
            </form>
        </div>
        <div class="card-body">
            <h5 class="item-title card-title">{{ $product['name'] }}</h5>
            <div class="item-body">
                <p>{{ trans('message.from') }} {{ trans('message.amazon') }}</p>
                <p class="price"><span>{{ $product['price'] }}</span>{{ trans('message.egp') }}</p>
            </div>
        </div>
    </div>
@endforeach
