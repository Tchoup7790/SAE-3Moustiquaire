@extends('base')

@section('title', 'Log In')

@section('body')
    <form action="{{ route('auth.login') }}" method="post" class="login">
        @csrf
        <p class="body">Welcome back Home,</p>
        <br>
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
            <h3>Password</h3>
            <br>
            <label class="form__inputTextSvg">
                <input type="password" name="password" id="password" placeholder="Password" class="form__inputTextSvg__text login__div__input">
                <svg class="svg--2 form__inputTextSvg__svg login__div__svg" xmlns="http://www.w3.org/2000/svg" width="30" height="31" viewBox="0 0 30 31">
                    <path d="M18.1609 11.8374L11.8359 18.1624C11.0234 17.3499 10.5234 16.2374 10.5234 14.9999C10.5234 12.5249 12.5234 10.5249 14.9984 10.5249C16.2359 10.5249 17.3484 11.0249 18.1609 11.8374Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>  <path d="M22.2758 7.2126C20.0883 5.5626 17.5883 4.6626 15.0008 4.6626C10.5883 4.6626 6.47578 7.2626 3.61328 11.7626C2.48828 13.5251 2.48828 16.4876 3.61328 18.2501C4.60078 19.8001 5.75078 21.1376 7.00078 22.2126" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>  <path d="M10.5234 24.4126C11.9484 25.0126 13.4609 25.3376 14.9984 25.3376C19.4109 25.3376 23.5234 22.7376 26.3859 18.2376C27.5109 16.4751 27.5109 13.5126 26.3859 11.7501C25.9734 11.1001 25.5234 10.4876 25.0609 9.9126" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>  <path d="M19.3883 15.875C19.0633 17.6375 17.6258 19.075 15.8633 19.4"  stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>  <path d="M11.8375 18.1626L2.5 27.5001" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>  <path d="M27.5016 2.5L18.1641 11.8375" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </label>
            @error('password')
            <p class="text-small text--error">{{ $message }}</p>
            @enderror
        </div>
        <br>
        <div class="form__div">
            <a href="{{route("auth.register")}}" class="text--link">Don't Have an Account ?</a>
            <br>
            <a href="{{route("help.index")}}" class="text--link">Need Help ?</a>
        </div>
        <br>
        <button class="button" type="submit">Log In</button>
    </form>
    <script src="{{asset("src/js/main/login.js")}}"></script>
@endsection
