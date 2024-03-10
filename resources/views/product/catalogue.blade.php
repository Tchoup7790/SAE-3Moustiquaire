@extends('base')

@section('title', 'Les 3 moustiquaires Catalogue')

@section('body')
    @include('overlay.filterMenu')

    <main class="catalogue">
        <div class="catalogue__top">
            <section class="catalogue__top__section">
                <h2 class="catalogue__top__section__text">{{$nameTab}}</h2>
                <div class="catalogue__top__section__filter">
                    <p class="text--body filterMenu__button">filter</p>
                    <svg class="svg--1 filterButton" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M22 6.5H16" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M6 6.5H2" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M10 10C11.933 10 13.5 8.433 13.5 6.5C13.5 4.567 11.933 3 10 3C8.067 3 6.5 4.567 6.5 6.5C6.5 8.433 8.067 10 10 10Z" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M22 17.5H18" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M8 17.5H2" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M14 21C15.933 21 17.5 19.433 17.5 17.5C17.5 15.567 15.933 14 14 14C12.067 14 10.5 15.567 10.5 17.5C10.5 19.433 12.067 21 14 21Z" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
            </section>
            <div class="line--horizontal"></div>
        </div>
        <div class="catalogue__products">
            @foreach($products as $product)
                <a href="{{route("product.show", ['id' => $product->id])}}" @if($product->category_id == 1) style="color: #EFEFEFFF;" @else style="color: #02081AFF;"  @endif class="productCard">
                    <img src="/storage/images/products/{{$product->thumbnail}}" alt="img Product">
                    <section>
                        <p class="body">{{$product->name}}</p>
                        <p class="small">{{$product->price}}€</p>
                    </section>
                </a>
            @endforeach
        </div>
        <div class="catalogue__pagination">
            @if($products->lastPage() > 1)
                @for($i = 1; $i <= $products->lastPage(); $i++)
                    @if($i == $products->currentPage())
                        <p class="catalogue__pagination__a" style="text-decoration: underline; cursor:default; transform: scale(1.1)">{{$i}}</p>
                        @else
                        @if($i == $products->currentPage())
                            <p class="catalogue__pagination__a" style="text-decoration: underline; cursor:default; transform: scale(1.1)">{{$i}}</p>
                        @else
                            @if($i == $products->currentPage())
                                <p class="catalogue__pagination__a" style="text-decoration: underline; cursor:default; transform: scale(1.1)">{{$i}}</p>
                            @else
                                <a class="catalogue__pagination__a"  href="{{route("product.cat", ['page' => $i] + $_GET)}}">{{ $i }}</a>
                            @endif
                        @endif
                    @endif
                @endfor
            @endif
        </div>
    </main>
    <script src="{{asset("src/js/main/catalogue.js")}}"></script>
@endsection
