@extends('base')

@section('title', 'DashBoard Admin')



@section('body')
    <main class="dashboard adminDash">
        <div class="dashboard__main">
            <h2>Hello master, what do you want to do today ?</h2>
            <h3>{{$page}}</h3>
            <ul class="dashboard__main__ul">
                <div class="line--horizontal"></div>
                @if($page == "Products")
                <li class="adminDash__main__list__line">
                    <section class="adminDash__main__list__line__content">
                        <h3 class="adminDash__main__list__line__content__text">Id</h3>
                        <h3 class="adminDash__main__list__line__content__text">Name</h3>
                        <h3 class="adminDash__main__list__line__content__text">Quantity</h3>
                        <h3 class="adminDash__main__list__line__content__text">edit</h3>
                        <h3 class="adminDash__main__list__line__content__text">delete</h3>
                    </section>
                </li>
                <div class="line--horizontal"></div>
                    @foreach($products as $product)
                        <li class="adminDash__main__list__line">
                            <section class="adminDash__main__list__line__content">
                                <p class="adminDash__main__list__line__content__text text--body">{{$product->id}}</p>
                                <p class="adminDash__main__list__line__content__text text--body">{{$product->name}}</p>
                                <p class="adminDash__main__list__line__content__text text--body">{{$product->quantity}}</p>
                                <a class="adminDash__main__list__line__content__text" href="{{route("product.modify", ['id'=> $product->id])}}">
                                    <svg class="svg--2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path
                                                d="M3.49994 20.4999C4.32994 21.3299 5.66994 21.3299 6.49994 20.4999L19.4999 7.49994C20.3299 6.66994 20.3299 5.32994 19.4999 4.49994C18.6699 3.66994 17.3299 3.66994 16.4999 4.49994L3.49994 17.4999C2.66994 18.3299 2.66994 19.6699 3.49994 20.4999Z"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M18.01 8.98999L15.01 5.98999" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </a>
                                <button class="adminDash__main__list__line__content__text">
                                    <svg class="svg--2" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30">
                                        <path d="M7 22.776L22.9099 6.95905" stroke-width="2" stroke-linecap="round"/>
                                        <path d="M7 6.95911L22.9099 22.7761" stroke-width="2" stroke-linecap="round"/>
                                    </svg>
                                </button>
                            </section>
                        </li>
                        <div class="line--horizontal"></div>
                    @endforeach
                @endif
                @if($page == "Users")
                    <li class="adminDash__main__list__line">
                        <section class="adminDash__main__list__line__content">
                            <h3 class="adminDash__main__list__line__content__text">Id</h3>
                            <h3 class="adminDash__main__list__line__content__text">Name</h3>
                            <h3 class="adminDash__main__list__line__content__text">Email</h3>
                            <h3 class="adminDash__main__list__line__content__text">Tel</h3>
                            <h3 class="adminDash__main__list__line__content__text">edit</h3>
                        </section>
                    </li>
                    <div class="line--horizontal"></div>
                    @foreach($users as $user)
                        <li class="adminDash__main__list__line">
                            <section class="adminDash__main__list__line__content">
                                <p class="adminDash__main__list__line__content__text text--body">{{$user->id}}</p>
                                <p class="adminDash__main__list__line__content__text text--body">{{$user->lastname}}</p>
                                <p class="adminDash__main__list__line__content__text text--body">{{$user->email}}</p>
                                <p class="adminDash__main__list__line__content__text text--body">{{$user->tel}}</p>
                                <a class="adminDash__main__list__line__content__text" href="{{route("auth.edit", ['id'=> $user->id])}}">
                                    <svg class="svg--2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path
                                                d="M3.49994 20.4999C4.32994 21.3299 5.66994 21.3299 6.49994 20.4999L19.4999 7.49994C20.3299 6.66994 20.3299 5.32994 19.4999 4.49994C18.6699 3.66994 17.3299 3.66994 16.4999 4.49994L3.49994 17.4999C2.66994 18.3299 2.66994 19.6699 3.49994 20.4999Z"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M18.01 8.98999L15.01 5.98999" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </a>
                            </section>
                        </li>
                        <div class="line--horizontal"></div>
                    @endforeach
                @endif
                @if($page == "Orders")
                    <li class="adminDash__main__list__line">
                        <section class="adminDash__main__list__line__content">
                            <h3 class="adminDash__main__list__line__content__text">Id</h3>
                            <h3 class="adminDash__main__list__line__content__text">User Id</h3>
                            <h3 class="adminDash__main__list__line__content__text">Status</h3>
                            <h3 class="adminDash__main__list__line__content__text">Address Id</h3>
                            <h3 class="adminDash__main__list__line__content__text">Payement Id</h3>
                        </section>
                    </li>
                    <div class="line--horizontal"></div>
                    @foreach($orders as $order)
                        <li class="adminDash__main__list__line">
                            <section class="adminDash__main__list__line__content">
                                <p class="adminDash__main__list__line__content__text text--body">{{$order->id}}</p>
                                <p class="adminDash__main__list__line__content__text text--body">{{$order->user_id}}</p>
                                <p class="adminDash__main__list__line__content__text text--body">{{$order->order_status}}</p>
                                <p class="adminDash__main__list__line__content__text text--body">{{$order->address_id}}</p>
                                <p class="adminDash__main__list__line__content__text text--body">{{$order->payement_id}}</p>
                            </section>
                        </li>
                        <div class="line--horizontal"></div>
                    @endforeach
                @endif
                @if($page == "Categories")
                    <li class="adminDash__main__list__line">
                        <section class="adminDash__main__list__line__content">
                            <h3 class="adminDash__main__list__line__content__text">Id</h3>
                            <h3 class="adminDash__main__list__line__content__text">Name</h3>
                        </section>
                    </li>
                    <div class="line--horizontal"></div>
                    @foreach($categories as $category)
                        <li class="adminDash__main__list__line">
                            <section class="adminDash__main__list__line__content">
                                <p class="adminDash__main__list__line__content__text text--body">{{$category->id}}</p>
                                <p class="adminDash__main__list__line__content__text text--body">{{$category->name}}</p>
                            </section>
                        </li>
                        <div class="line--horizontal"></div>
                    @endforeach
                @endif
                @if($page == "Address")
                    <li class="adminDash__main__list__line">
                        <section class="adminDash__main__list__line__content">
                            <h3 class="adminDash__main__list__line__content__text">Id</h3>
                            <h3 class="adminDash__main__list__line__content__text">User Id</h3>
                            <h3 class="adminDash__main__list__line__content__text">City</h3>
                            <h3 class="adminDash__main__list__line__content__text">Country</h3>
                        </section>
                    </li>
                    <div class="line--horizontal"></div>
                    @foreach($addresses as $address)
                        <li class="adminDash__main__list__line">
                            <section class="adminDash__main__list__line__content">
                                <p class="adminDash__main__list__line__content__text text--body">{{$address->id}}</p>
                                <p class="adminDash__main__list__line__content__text text--body">{{$address->user_id}}</p>
                                <p class="adminDash__main__list__line__content__text text--body">{{$address->city}}</p>
                                <p class="adminDash__main__list__line__content__text text--body">{{$address->country}}</p>
                            </section>
                        </li>
                        <div class="line--horizontal"></div>
                    @endforeach
                @endif
                @if($page == "Payement")
                    <li class="adminDash__main__list__line">
                        <section class="adminDash__main__list__line__content">
                            <h3 class="adminDash__main__list__line__content__text">Id</h3>
                            <h3 class="adminDash__main__list__line__content__text">User Id</h3>
                            <h3 class="adminDash__main__list__line__content__text">Numbers</h3>
                            <h3 class="adminDash__main__list__line__content__text">Expiration</h3>
                        </section>
                    </li>
                    <div class="line--horizontal"></div>
                    @foreach($payments as $payment)
                        <li class="adminDash__main__list__line">
                            <section class="adminDash__main__list__line__content">
                                <p class="adminDash__main__list__line__content__text text--body">{{$payment->id}}</p>
                                <p class="adminDash__main__list__line__content__text text--body">{{$payment->user_id}}</p>
                                <p class="adminDash__main__list__line__content__text text--body">{{$payment->numbers}}</p>
                                <p class="adminDash__main__list__line__content__text text--body">{{$payment->expiration}}</p>
                            </section>
                        </li>
                        <div class="line--horizontal"></div>
                    @endforeach
                @endif
            </ul>
        </div>
        <aside class="dashboard__aside">
            <a href="/product/create" class="button">Create Product</a>
            <ul class="dashboard__aside__list">
                @if($page == 'Products')
                    <li class="dashboard__aside__list__line"><p class="dashboard__aside__list__line__a--current">Products</p></li>
                @else
                    <li class="dashboard__aside__list__line"><a class="dashboard__aside__list__line__a" href="{{route('admin.index', ['page' => 'Products'])}}">Products</a></li>
                @endif
                    @if($page == 'Users')
                        <li class="dashboard__aside__list__line"><p class="dashboard__aside__list__line__a--current">Users</p></li>
                    @else
                        <li class="dashboard__aside__list__line"><a class="dashboard__aside__list__line__a" href="{{route('admin.index', ['page' => 'Users'])}}">Users</a></li>
                    @endif
                    @if($page == 'Orders')
                        <li class="dashboard__aside__list__line"><p class="dashboard__aside__list__line__a--current">Orders</p></li>
                    @else
                        <li class="dashboard__aside__list__line"><a class="dashboard__aside__list__line__a" href="{{route('admin.index', ['page' => 'Orders'])}}">Orders</a></li>
                    @endif
                    @if($page == 'Categories')
                        <li class="dashboard__aside__list__line"><p class="dashboard__aside__list__line__a--current">Categories</p></li>
                    @else
                        <li class="dashboard__aside__list__line"><a class="dashboard__aside__list__line__a" href="{{route('admin.index', ['page' => 'Categories'])}}">Categories</a></li>
                    @endif
                    @if($page == 'Address')
                        <li class="dashboard__aside__list__line"><p class="dashboard__aside__list__line__a--current">Address</p></li>
                    @else
                        <li class="dashboard__aside__list__line"><a class="dashboard__aside__list__line__a" href="{{route('admin.index', ['page' => 'Address'])}}">Address</a></li>
                    @endif
                    @if($page == 'Payement')
                        <li class="dashboard__aside__list__line"><p class="dashboard__aside__list__line__a--current">Payement</p></li>
                    @else
                        <li class="dashboard__aside__list__line"><a class="dashboard__aside__list__line__a" href="{{route('admin.index', ['page' => 'Payement'])}}">Payement</a></li>
                    @endif
            </ul>
            <form action="{{route('auth.logout')}}" method="post">
                @method('delete')
                @csrf
                <button class="button" type="submit">Logout</button>
            </form>
        </aside>
    </main>
@endsection

