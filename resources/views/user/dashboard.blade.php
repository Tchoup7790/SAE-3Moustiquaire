@extends('base')

@section('title', 'DashBoard User')



@section('body')
    <main class="dashboard userDash">
        <div class="dashboard__main">
            <h2>Hi {{$user->firstname}},</h2>
            <div class="line--horizontal"></div>
            <h3>Here is your information</h3>
            <div class="line--horizontal"></div>
            <ul class="dashboard__main__ul userDash__main__list">
                <li class="userDash__main__list__item"><h2>First name :</h2><h2>{{$user->firstname}}</h2></li>
                <li class="userDash__main__list__item"><h2>Last name :</h2><h2>{{$user->lastname}}</h2></li>
                <li class="userDash__main__list__item"><h2>Email :</h2><h2>{{$user->email}}</h2></li>
                <li class="userDash__main__list__item"><h2>Tel :</h2><h2>{{$user->tel}}</h2></li>
            </ul>
            <div class="line--horizontal"></div>
            <h3>Here is your orders</h3>
            <div class="line--horizontal"></div>
            @foreach($orders as $order)
                <ul class="dashboard__main__ul userDash__main__list">
                    <li class="userDash__main__list__item"><h2>Order number :</h2><h2>{{$order->id}}</h2></li>
                    <li class="userDash__main__list__item"><h2>Status :</h2><h2>{{$order->order_status}}</h2></li>
                    <li class="userDash__main__list__item"><h2>Price :</h2><h2>{{$order->price}}</h2></li>
                </ul>
                <div class="line--horizontal"></div>
            @endforeach
        </div>
        <aside class="dashboard__aside">
            @if($user->isAdmin)
                <a class="userDash__aside__link" href="{{route('admin.index', ['page' => "Products"])}}"><h2>Admin Page</h2></a>
            @endif
            <a class="userDash__aside__link" href="{{route('auth.edit', ['id' => $user->id])}}"><h2>Change yours Information</h2></a>
            <a style="text-decoration: line-through; cursor:default;" href="#"><h2>Change Password</h2></a>
                <form action="{{route('auth.logout')}}" method="post">
                    @method('delete')
                    @csrf
                    <button class="button" type="submit">Logout</button>
                </form>
        </aside>
    </main>
    <script src="{{ asset("src/js/main/user.js") }}"></script>
@endsection

