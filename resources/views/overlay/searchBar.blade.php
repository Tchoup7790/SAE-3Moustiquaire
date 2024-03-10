<form class="searchBar search" action="{{route("product.cat")}}" method="GET">
    <input class="search__input" name="search" type="text" placeholder="What are you looking for ?">
    <div class="search__svg">
        <svg class="search__button searchBar__button svg--2" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30">
            <path d="M7 22.776L22.9099 6.95905" stroke-width="2" stroke-linecap="round"/>
            <path d="M7 6.95911L22.9099 22.7761" stroke-width="2" stroke-linecap="round"/>
        </svg>
    </div>
</form>
<script src="{{asset("src/js/layout/searchBar.js")}}"></script>
