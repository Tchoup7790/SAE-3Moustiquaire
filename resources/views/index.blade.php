@extends('base')

@section('title', 'Les 3 Moustiquaires')

@section('body')
    <main class="index">
        <div class="index__video">
            <video class="video" src="{{ asset("video/video.mp4") }}" loop muted autoplay></video>
            <svg class="index__video__button svg--4" xmlns="http://www.w3.org/2000/svg" width="49" height="49" viewBox="0 0 49 49">
                <path d="M21.7437 39.0163V9.98375C21.7437 7.2275 20.58 6.125 17.64 6.125H10.2288C7.28875 6.125 6.125 7.2275 6.125 9.98375V39.0163C6.125 41.7725 7.28875 42.875 10.2288 42.875H17.64C20.58 42.875 21.7437 41.7725 21.7437 39.0163Z" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M42.8766 39.0163V9.98375C42.8766 7.2275 41.7128 6.125 38.7728 6.125H31.3616C28.442 6.125 27.2578 7.2275 27.2578 9.98375V39.0163C27.2578 41.7725 28.4216 42.875 31.3616 42.875H38.7728C41.7128 42.875 42.8766 41.7725 42.8766 39.0163Z" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
        <div class="index__categorySection">
            <a href="{{route("product.cat", ['category[]' => 2])}}" class="categoryCard">
                <div>
                    <h2>Merch</h2>
                    <img src="{{asset("images/category/merch.png")}}" alt="Merch">
                </div>
            </a>
            <a href="{{route("product.cat", ['category[]' => 1])}}" class="categoryCard">
                <div>
                    <h2>Mosquito Net</h2>
                    <img src="{{asset("images/category/mosquito.jpg")}}" alt="Mosquito Net">
                </div>
            </a>
            <a href="{{route("product.cat", ['category[]' => 3])}}" class="categoryCard">
                <div>
                    <h2>Anti-Mostic Product</h2>
                    <img src="{{asset("images/category/product.png")}}" alt="Anti-Mostic Product">
                </div>
            </a>
        </div>
    </main>
    <script src="{{asset('src/js/main/index.js')}}"></script>
@endsection
