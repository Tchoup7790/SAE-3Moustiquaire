@extends('base')

@section('title', 'Your cart')

@section('body')
    @if(count($elements)==0)
        <main class="cart--empty">
            <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" viewBox="0 0 70 70">
                <path d="M25.6951 5.8335L15.1367 16.421" stroke-width="6" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M44.3047 5.8335L54.863 16.421" stroke-width="6" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M5.83203 22.8958C5.83203 17.5 8.71953 17.0625 12.307 17.0625H57.6904C61.2779 17.0625 64.1654 17.5 64.1654 22.8958C64.1654 29.1667 61.2779 28.7292 57.6904 28.7292H12.307C8.71953 28.7292 5.83203 29.1667 5.83203 22.8958Z" stroke-width="6"/>
                <path d="M10.207 29.1665L14.3195 54.3665C15.2529 60.0248 17.4987 64.1665 25.8404 64.1665H43.4279C52.4987 64.1665 53.8404 60.1998 54.8904 54.7165L59.7904 29.1665" stroke-width="6" stroke-linecap="round"/>
            </svg>
            <h3>Sorry but you don't have products in your cart</h3>
            <a href="{{route("user.index")}}" class="button">Account center</a>
    @else
        <main class="cart">
            <ul class="cart__list">
            @foreach($elements as $element)
                @php($product = $products->find($element->product_id))
                <li class="productLine">
                    <img src="/storage/images/products/{{$product->thumbnail}}" alt="img Product" class="productLine__img">
                    <h3>{{$product->name}}</h3>
                    <p>{{$product->price}}€</p>
                    <form>
                        <input class="productLine__input" type="number" name="quantity" id="quantity" value="{{$element->quantity}}">
                    </form>
                    <form action="{{route('user.cart.delete')}}" method="post">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <button type="submit">
                            <svg class="svg--2" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30">
                                <path d="M7 22.776L22.9099 6.95905" stroke-width="2" stroke-linecap="round"/>
                                <path d="M7 6.95911L22.9099 22.7761" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </button>
                    </form>
                </li>
            @endforeach
            </ul>
            <asside class="cart__aside">
                <section class="cart__aside__section">
                    <h1 class="cart__aside__section__title">Total</h1>
                    <h1 class="cart__aside__section__price"><span class="cart__aside__section__price--total"></span>€</h1>
                </section>
                <div class="line--horizontal"></div>
                <section class="cart__aside__section">
                    <h2 class="cart__aside__section__title">Subtotal</h2>
                    <h2 class="cart__aside__section__price">Price</h2>
                </section>
                @foreach($elements as $element)
                    @php($product = $products->find($element->product_id))
                <section class="cart__aside__section">
                    <h2 class="cart__aside__section__title">{{$product->name}}</h2>
                    <h2 class="cart__aside__section__price"><span class="cart__aside__section__price--number">{{$product->price * $element->quantity}}</span>€</h2>
                </section>
                @endforeach
{{--                <form>--}}
                    <a class="button" href="{{route('order.index')}}">Proceed to checkout</a>
{{--                </form>--}}
            </asside>
    @endif
    </main><script src="{{asset("src/js/main/cart.js")}}"></script>
@endsection
