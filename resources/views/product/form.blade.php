<form class="productForm" action="" method="post" enctype="multipart/form-data">
    @csrf
    @method($product->id ? "PATCH" : "POST")
    <div class="form__div">
        <h3 class="form__inputFile__text">Thumbnail</h3>
        <br>
        @if($product->id)
            <img class="form__inputFile__thumb" src="/storage/images/products/{{$product->thumbnail}}" alt="img Product" width="100%" height="100" style="object-fit: cover; object-position: center; border-radius: 5px;")>
        @else
            <img class="form__inputFile__thumb" src="" alt="" width="100%" height="100" style="object-fit: cover; object-position: center; border-radius: 5px;")>
        @endif
        <br>
        <input type="file" name="thumbnail" id="thumbnail">
        <label class="form__div__label form__inputFile form__inputFile__thumb__lab" for="thumbnail">Choose a file...</label>
        @error('thumbnail')
        <p class="text-small text--error">{{ $message }}</p>
        @enderror
    </div>
    <br>
    <div class="form__div">
        <h3 class="form__inputFile__text">Image</h3>
        <br>
        @if($product->id)
            <img class="form__inputFile__img" src="/storage/images/products/{{$product->image}}" alt="img Product" width="100%" height="150" style="object-fit: cover; object-position: center; border-radius: 5px;")>
        @else
            <img class="form__inputFile__img" src="" alt="" width="100%" height="150" style="object-fit: cover; object-position: center; border-radius: 5px;")>
        @endif
        <br>
        <input type="file" name="image" id="image">
        <label class="form__div__label form__inputFile form__inputFile__image__lab" for="image">Choose a file...</label>
        @error('image')
        <p class="text-small text--error">{{ $message }}</p>
        @enderror
    </div>
    <br>
    <div class="form__div">
        <label class="form__div__label" for="name">Name</label>
        <br>
        @if($product->id)
            <input id="name" type="text" class="form__inputText" name="name" value="{{old('name', $product->name)}}">
        @else
            <input id="name" type="text" class="form__inputText" name="name" placeholder="Name">
        @endif
        @error('name')
        <p class="text-small text--error">{{ $message }}</p>
        @enderror
    </div>
    <br>
    <div class="form__div">
        <label class="form__div__label" for="description">Description</label>
        <br>
        @if($product->id)
            <textarea id="description" class="productForm__div__textarea form__inputText" name="description">{{old('description', $product->description)}}</textarea>
        @else
            <textarea id="description" class="productForm__div__textarea form__inputText" name="description" placeholder="Description..."></textarea>
        @endif
        @error('description')
        <p class="text-small text--error">{{ $message }}</p>
        @enderror
    </div>
    <br>
    <div class="form__div">
        <label class="form__div__label" for="category">Category</label>
        <br>
        <select id="category" class="form__inputSelect" name="category_id">
            <option value="">Select category</option>
            @foreach($categories as $category)
                <option @selected(old('category_id', $product->category_id) == $category->id) value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
        @error('category_id')
        <p class="text-small text--error">{{ $message }}</p>
        @enderror
    </div>
    <br>
    <div class="form__div">
        <label class="form__div__label" for="price">Price</label>
        <br>
        @if($product->id)
            <input id="price" type="number" class="form__inputNumber" name="price" value="{{old(0.0, $product->price)}}" step="0.01" min="0.0">
        @else
            <input id="price" type="number" class="form__inputNumber" name="price" placeholder=0.0 step="0.01" min="0.0">
        @endif
        @error('price')
        <p class="text-small text--error">{{ $message }}</p>
        @enderror
    </div>
    <br>
    <div class="form__div">
        <label class="form__div__label" for="quantity">Quantity</label>
        <br>
        @if($product->id)
            <input id="quantity" type="number" class="form__inputNumber" name="quantity" value="{{old(0, $product->quantity)}}" step="1" min="0">
        @else
            <input id="quantity" type="number" class="form__inputNumber" name="quantity" placeholder=0 step="1" min="0">
        @endif
        @error('quantity')
        <p class="text-small text--error">{{ $message }}</p>
        @enderror
    </div>
    <br>
    <button class="button" type="submit">
        @if($product->id)
            Modify
        @else
            Create
        @endif
    </button>
</form>
<script src="{{asset("src/js/main/productForm.js")}}"></script>
