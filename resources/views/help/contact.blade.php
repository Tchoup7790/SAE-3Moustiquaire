@extends('base')

@section('title', 'Contact')

@section('body')
    <form class="contact" action="" method="post">
        <p class="body">Our advisors are here to listen to you and will be happy to answer all your questions.</p>
        <br>
        <br>
        @csrf
        <div class="form__div">
            <label class="form__div__label" for="name">Name</label>
            <br>
            <input id="name" type="text" class="form__inputText" name="name" placeholder="Jhon Doe">
            @error('name')
            <p class="text-small text--error">{{ $message }}</p>
            @enderror
        </div>
        <br>
        <div class="form__div">
            <label class="form__div__label" for="email">Email</label>
            <br>
            <input id="email" type="email" name="email" class="form__inputText" placeholder="Jhon@Doe.com">
            @error('email')
            <p class="text-small text--error">{{ $message }}</p>
            @enderror
        </div>
        <br>
        <div class="form__div">
            <label class="form__div__label" for="message">Message</label>
            <br>
            <textarea id="message" class="contact__div__textarea form__inputText" name="message" placeholder="Why are you contacting us?"></textarea>
            @error('message')
            <p class="text-small text--error">{{ $message }}</p>
            @enderror
        </div>
        <br>
        <div class="form__div">
            <label class="form__inputCheckbox">
                <h3>Terms of Use</h3>
                <svg class="form__inputCheckbox__svg" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <input class="contact__inputCheckbox__input" type="checkbox" name="terms" id="terms">
            </label>
            <br>
            <a href="{{route("help.index")}}" class="text--link">Need Help ?</a>
        </div>
        <br>
        <button class="button" type="submit">Send</button>
    </form>
    <script src="{{asset("src/js/main/contact.js")}}"></script>
@endsection
