<div class="burgerMenu">
    <div class="burgerMenu__top">
        <section class="burgerMenu__top__section">
            <svg class="svg--2 burgerMenu__button" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30">
                <path d="M7 22.776L22.9099 6.95905" stroke-width="2" stroke-linecap="round"/>
                <path d="M7 6.95911L22.9099 22.7761" stroke-width="2" stroke-linecap="round"/>
            </svg>
            <p class="text--body burgerMenu__button">Close</p>
        </section>
        <div class="line--horizontal"></div>
    </div>
    <ul class="burgerMenu__list">
        <li class="burgerMenu__list__line"><a href="{{route("product.cat")}}"><h2 class="burgerMenu__list__line__text">All Our Products</h2></a></li>
        <li class="burgerMenu__list__line"><a href="{{route("product.cat", ['category[]' => 1])}}"><h2 class="burgerMenu__list__line__text">Mosquito Net</h2></a></li>
        <li class="burgerMenu__list__line"><a href="{{route("product.cat", ['category[]' => 3])}}"><h2 class="burgerMenu__list__line__text">Anti-Mostic Product</h2></a></li>
        <li class="burgerMenu__list__line"><a href="{{route("product.cat", ['category[]' => 2])}}"><h2 class="burgerMenu__list__line__text">Merch</h2></a></li>
    </ul>
    <section class="burgerMenu__bottom">
        <a href="{{route("help.index")}}" class="text--link">Need Help ?</a>
        <a href="{{route("help.contact")}}" class="text--link">Contact</a>
    </section>
    <script src="{{asset("src/js/layout/burger.js")}}"></script>
</div>
