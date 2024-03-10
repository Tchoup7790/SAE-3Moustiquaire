<form class="userForm" action="{{$user->id ? route('auth.update') : route('auth.register')}}" method="post">
    @csrf
    @method($user->id ? "PATCH" : "POST")
    @if($user->id)
        <input type="hidden" name="user_id" value="{{$user->id}}">
    @endif
    <p class="text--body">Welcome, I hope you are well, let's get to know each other.</p>
    <div class="form__div">
        <label class="form__div__label" for="firstname">First Name</label>
        <br>
        <input id="firstname" type="text" class="form__inputText" name="firstname" @if($user->firstname) value="{{$user->firstname}}" @else placeholder="Jhon" @endif>
        @error('firstname')
        <p class="text-small text--error">{{ $message }}</p>
        @enderror
    </div>
    <div class="form__div">
        <label class="form__div__label" for="lastname">Last Name</label>
        <br>
        <input id="lastname" type="text" class="form__inputText" name="lastname" @if($user->lastname) value="{{$user->lastname}}" @else placeholder="Doe" @endif>
        @error('lastname')
        <p class="text-small text--error">{{ $message }}</p>
        @enderror
    </div>
    <div class="form__div">
        <label class="form__div__label" for="email">Email</label>
        <br>
        <input id="email" type="email" name="email" class="form__inputText" @if($user->email) value="{{$user->email}}" @else placeholder="Jhon@Doe.com" @endif>
        @error('email')
        <p class="text-small text--error">{{ $message }}</p>
        @enderror
    </div>
    <div class="form__div">
        <label class="form__div__label" for="confirmEmail">Confirm Email</label>
        <br>
        <input id="confirmEmail" type="email" name="confirmEmail" class="form__inputText" @if($user->email) placeholder="{{$user->email}}" @else placeholder="Jhon@Doe.com" @endif>
        @error('email')
        <p class="text-small text--error">{{ $message }}</p>
        @enderror
    </div>
    <div class="form__div">
        <label class="form__div__label" for="tel">Phone Number</label>
        <br>
        <input id="tel" type="tel" name="tel" class="form__inputText" @if($user->tel) placeholder="{{$user->tel}}" @else placeholder="01 02 03 04 05" @endif>
        @error('tel')
        <p class="text-small text--error">{{ $message }}</p>
        @enderror
    </div>
    <div class="form__div">
        <h3>Password</h3>
        <br>
        <label class="form__inputTextSvg">
            <input type="password" name="password" id="password" placeholder="Password" class="form__inputTextSvg__text create__div__input">
            <svg class="svg--2 form__inputTextSvg__svg create__div__svg" xmlns="http://www.w3.org/2000/svg" width="30" height="31" viewBox="0 0 30 31">
                <path d="M18.1609 11.8374L11.8359 18.1624C11.0234 17.3499 10.5234 16.2374 10.5234 14.9999C10.5234 12.5249 12.5234 10.5249 14.9984 10.5249C16.2359 10.5249 17.3484 11.0249 18.1609 11.8374Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>  <path d="M22.2758 7.2126C20.0883 5.5626 17.5883 4.6626 15.0008 4.6626C10.5883 4.6626 6.47578 7.2626 3.61328 11.7626C2.48828 13.5251 2.48828 16.4876 3.61328 18.2501C4.60078 19.8001 5.75078 21.1376 7.00078 22.2126" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>  <path d="M10.5234 24.4126C11.9484 25.0126 13.4609 25.3376 14.9984 25.3376C19.4109 25.3376 23.5234 22.7376 26.3859 18.2376C27.5109 16.4751 27.5109 13.5126 26.3859 11.7501C25.9734 11.1001 25.5234 10.4876 25.0609 9.9126" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>  <path d="M19.3883 15.875C19.0633 17.6375 17.6258 19.075 15.8633 19.4"  stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>  <path d="M11.8375 18.1626L2.5 27.5001" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>  <path d="M27.5016 2.5L18.1641 11.8375" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </label>
        @error('password')
        <p class="text-small text--error">{{ $message }}</p>
        @enderror
    </div>
    <div class="form__div">
        <label class="form__inputCheckbox">
            <h3>Terms of Use</h3>
            <svg class="form__inputCheckbox__svg" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <input class="create__inputCheckbox__input" type="checkbox" name="terms" id="terms">
        </label>
        <label class="form__inputCheckbox">
            <h3>NewsLetter</h3>
            <svg class="form__inputCheckbox__svg" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <input class="create__inputCheckbox__input" type="checkbox" name="newsLetter" id="newsLetter">
        </label>
        @if($adminPage)
            <label class="form__inputCheckbox">
                <h3>Admin</h3>
                <svg class="form__inputCheckbox__svg" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <input class="create__inputCheckbox__input" type="checkbox" name="isAdmin" id="isAdmin">
            </label>
        @else
            <br>
            <a href="{{route("help.index")}}" class="text--link">Need Help ?</a>
        @endif
    </div>
    <button class="button" type="submit">
        @if($user->id)
            Modify
        @else
            Sign In
        @endif
    </button>
</form>
<script src="{{asset("src/js/layout/userForm.js")}}"></script>
