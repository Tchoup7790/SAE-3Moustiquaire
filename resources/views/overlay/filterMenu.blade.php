<div class="filterMenu">
    <div class="filterMenu__top">
        <section class="filterMenu__top__section">
            <svg class="svg--2 filterMenu__button" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30">
                <path d="M7 22.776L22.9099 6.95905" stroke-width="2" stroke-linecap="round"/>
                <path d="M7 6.95911L22.9099 22.7761" stroke-width="2" stroke-linecap="round"/>
            </svg>
            <p class="text--body filterMenu__button">Close</p>
        </section>
        <div class="line--horizontal"></div>
    </div>
    <form class="filterMenu__form" action="{{route('product.cat')}}" method="get">
        <p class="text--body filterMenu__form__text">Choose the constraints to apply.</p>
        <div class="filterMenu__field filterMenu__field--categories divDrawer">
            <section class="filterMenu__field--categories__button divDrawer__section">
                <h2>Category</h2>
                <svg class="filterMenu__field--categories__svg svg--1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M19.9181 8.9502L13.3981 15.4702C12.6281 16.2402 11.3681 16.2402 10.5981 15.4702L4.07812 8.9502" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </section>
            <div class="divDrawer__content filterMenu__field--categories__content">
                <div class="line--horizontal"></div>
                @foreach($categories as $category)
                    <label class="form__inputCheckbox">
                        <h3>{{ $category->name }}</h3>
                        <svg class="form__inputCheckbox__svg" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>  <path d="M7.75 11.9999L10.58 14.8299L16.25 9.16992" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <input class="checkbox__input filter__checkbox__input" type="checkbox" value="{{ $category->id }}" name="category[]" id="category__{{ $category->id }}" checked>
                    </label>
                @endforeach
            </div>
        </div>
        <div class="filterMenu__field filterMenu__field--price divDrawer">
            <section class="filterMenu__field--price__button divDrawer__section">
                <h2>Price</h2>
                <svg class="svg--1 filterMenu__field--price__svg" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M19.9181 8.9502L13.3981 15.4702C12.6281 16.2402 11.3681 16.2402 10.5981 15.4702L4.07812 8.9502" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </section>
            <div class="divDrawer__content filterMenu__field--price__content">
                <div class="line--horizontal"></div>
                <input class="range" type="range" name="price" id="sliderPrice" min="0" max="10000" value="5000">
                <label for="sliderPrice" class="filterMenu__field--price__content__label text--body">Limit <span>&nbsp;</span><output class="range__value"></output></label>
            </div>
        </div>
        <div class="filterMenu__divButton">
            <button class="button" type="submit">Apply</button>
        </div>
    </form>
    <section class="filterMenu__bottom">
        <a href="{{route("help.index")}}" class="text--link">Need Help ?</a>
        <a href="{{route("help.contact")}}" class="text--link">Contact</a>
    </section>
</div>
<script src="{{asset("src/js/layout/filter")}}"></script>
