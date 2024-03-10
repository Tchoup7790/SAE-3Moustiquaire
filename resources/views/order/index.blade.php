@extends('base')

@section('title', 'Order')



@section('body')
    <main class="order">
        <div class="order__left">
            <form class="order__left__article" action="{{route('order.address')}}" method="post">
                @csrf
                @method('patch')
                <h2>Delivery</h2>
                <div class="line--horizontal"></div>
                <section class="order__left__section">
                    <h3>{{$user->lastname}}</h3>
                    <h3>{{$user->tel}}</h3>
                </section>
                <section class="order__left__section">
                    <h3>{{$user->email}}</h3>
                </section>
                <div class="line--horizontal"></div>
                <section class="order__left__section">
                    <div class="form__div">
                        <label class="form__div__label" for="street">Street</label>
                        <br>
                        <input id="street" type="text" class="form__inputText" name="street" @if($address) value="{{$address->street}}" @else placeholder="Street Name" @endif>
                        @error('street')
                        <p class="text-small text--error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form__div">
                        <label class="form__div__label" for="city">City</label>
                        <br>
                        <input id="city" type="text" class="form__inputText" name="city" @if($address) value="{{$address->city}}" @else placeholder="City Name" @endif>
                        @error('city')
                        <p class="text-small text--error">{{ $message }}</p>
                        @enderror
                    </div>
                </section>
                <section class="order__left__section">
                    <div class="form__div">
                        <label class="form__div__label" for="state">State</label>
                        <br>
                        <input id="state" type="text" class="form__inputText" name="state" @if($address) value="{{$address->state}}" @else placeholder="State Name" @endif>
                        @error('state')
                        <p class="text-small text--error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form__div">
                        <label class="form__div__label" for="postal_code">Postal Code</label>
                        <br>
                        <input id="postal_code" type="number" class="form__inputText" name="postal_code" min="0" step="1" @if($address) value="{{$address->postal}}" @else placeholder="Postal Code" @endif>
                        @error('postal')
                        <p class="text-small text--error">{{ $message }}</p>
                        @enderror
                    </div>
                </section>
                <section class="order__left__section">
                    <div class="form__div">
                        <label class="form__div__label" for="country">Country</label>
                        <br>
                        <input id="country" type="text" class="form__inputText" name="country" @if($address) value="{{$address->country}}" @else placeholder="Country Name" @endif>
                        @error('country')
                        <p class="text-small text--error">{{ $message }}</p>
                        @enderror
                    </div>
                </section>
                @if($address)
                    <button type="submit" class="button">Change</button>
                @else
                    <button type="submit" class="button">Apply</button>
                @endif
            </form>
            <form class="order__left__article" action="{{route('order.payment')}}" method="post">
                @csrf
                @method('patch')
                <h2>Card Number</h2>
                <div class="line--horizontal"></div>
                <section class="order__left__section">
                    <div class="form__div">
                        <label class="form__div__label" for="fullname">Full Name</label>
                        <br>
                        <input id="fullname" type="text" class="form__inputText" name="fullname" @if($payment) value="{{$payment->fullname}}" @else placeholder="Jhon Doe" @endif>
                        @error('fullname')
                        <p class="text-small text--error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form__div">
                        <label class="form__div__label" for="numbers">Card Number</label>
                        <br>
                        <input id="numbers" class="form__inputText" name="numbers" type="tel" pattern="\d*" maxlength="16" @if($payment) value="{{intval($payment->numbers)}}" @else placeholder="0000000000000000" @endif>
                        @error('numbers')
                        <p class="text-small text--error">{{ $message }}</p>
                        @enderror
                    </div>
                </section>
                <section class="order__left__section">
                    <div class="form__div">
                        <label class="form__div__label" for="expiration">Expiration Date</label>
                        <br>
                        <input id="expiration" class="form__inputText" name="expiration" type="date" pattern="\d*" maxlength="7" @if($payment) value="{{$payment->expiration}}" @else placeholder="2024-02-01" @endif>
                        @error('expiration')
                        <p class="text-small text--error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form__div">
                        <label class="form__div__label" for="cvc">CVC</label>
                        <br>
                        <input id="cvc" class="form__inputText" name="cvc" type="tel" pattern="\d*" minlength="3" maxlength="3" placeholder="000" required>
                    </div>
                </section>
                <button type="submit" class="button">Apply</button>
            </form>
        </div>
        <aside class="order__aside">
            <section class="order__aside__section">
                <h1 class="order__aside__section__price"><span class="order__aside__section__price--qty"></span> Items</h1>
            </section>
            <div class="line--horizontal"></div>
            <ul class="order__aside__list">
                @foreach($elements as $element)
                    @php($product = $products->find($element->product_id))
                    <li class="productLine">
                        <img src="/storage/images/products/{{$product->thumbnail}}" alt="img Product" class="productLine__img">
                        <h3>{{$product->name}}</h3>
                        <p>{{$product->price}}€</p>
                        <p>Qty <span class="order__aside__section--qty">{{$element->quantity}}</span></p>
                    </li>
                @endforeach
            </ul>
            <div class="line--horizontal"></div>
            <section class="order__aside__section">
                <h2 class="order__aside__section__title">Subtotal</h2>
                <h2 class="order__aside__section__price">Price</h2>
            </section>
            @foreach($elements as $element)
                @php($product = $products->find($element->product_id))
                <section class="order__aside__section">
                    <h3 class="order__aside__section__title">{{$product->name}}</h3>
                    <h3 class="order__aside__section__price"><span class="order__aside__section__price--number">{{$product->price * $element->quantity}}</span>€</h3>
                </section>
            @endforeach
            <div class="line--horizontal"></div>
            <section class="order__aside__section">
                <h1 class="order__aside__section__title">Total</h1>
                <h1 class="order__aside__section__price"><span class="order__aside__section__price--total"></span>€</h1>
            </section>
            <form action="{{route('order.proceed')}}" method="post">
                 @csrf
                @if($address !== null && $payment !== null)
                    <input type="hidden" value="{{$payment->id}}" name="payment_id" id="payment_id">
                    <input type="hidden" value="{{$address->id}}" name="address_id" id="address_id">
                    <button class="button" type="submit">Payement</button>
                @else
                    <button class="button--disable" type="submit" disabled>Payement</button>
                @endif
            </form>
        </aside>
    </main>
    <script src="{{asset("src/js/main/order.js")}}"></script>
@endsection
