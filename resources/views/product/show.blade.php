@extends('base')

@section('title', 'Les 3 moustiquaires Catalogue')

@section('body')
    <main class="show">
        <img class="show__img" src="/storage/images/products/{{$product->image}}" alt="product image">
        <div class="show__description">
            <article class="show__description__section">
                <section class="show__description__section--top__section">
                    <h1 class="show__description__section--top__section__text">{{$product->name}}</h1>
                </section>
                <h3>{{$product->price}}€</h3>
            </article>
            <form action="{{route('user.cart.update')}}" method="post" class="show__description__buy">
                @if($product->quantity == 0)
                    <button class="show__description__buy__button button--disable text--body" disabled>Out of Stock</button>
                @else
                    @csrf
                    @method('patch')
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <input type="hidden" name="quantity" value="1">
                    <button class="button show__description__buy__button text--body">Place in cart</button>

                @endif
                <p class="text-small">free delivery to Dinjon only</p>
            </form>
            <div class="show__description__section show__description__section--bottom">
                <article class="divDrawer">
                    <section class="show__description__section--bottom__button divDrawer__section">
                        <h3>Description</h3>
                        <svg class="show__description__section--bottom__svg svg--1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M19.9181 8.9502L13.3981 15.4702C12.6281 16.2402 11.3681 16.2402 10.5981 15.4702L4.07812 8.9502" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </section>
                    <div class="divDrawer__content show__description__section--bottom__content">
                        <p class="show__description__section--bottom__content__text text--small">{{$product->description}}</p>
                    </div>
                </article>
                <a href="{{route("help.index")}}" class="text--link">Need Help ?</a>
            </div>
        </div>
    </main>
    <script src="{{asset("src/js/main/show.js")}}"></script>
@endsection
