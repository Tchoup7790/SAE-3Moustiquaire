@extends('base')

@section('title', 'Help DashBoard')

@section('body')
    <main class="dashboard helpDash">
        <div class="dashboard__main">
            <h2>Ho, are you lost ?</h2>
            <h3 class="helpDash__title">Products</h3>
            <ul class="dashboard__main__ul">
                <li class="line--horizontal"></li>
                <!-- Block 1 -->
                <li class="divDrawer">
                    <section class="helpDash--question1--button divDrawer__section">
                        <h2>Are the mosquito nets easy to maintain ?</h2>
                        <svg class="svg--2 helpDash--question1--svg" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M19.9181 8.9502L13.3981 15.4702C12.6281 16.2402 11.3681 16.2402 10.5981 15.4702L4.07812 8.9502" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </section>
                    <div class="helpDash--question1--content divDrawer__content">
                        <h3>Yes, our mosquito nets are designed to be easy to maintain. We provide detailed instructions to ensure simple and effective care.</h3>
                    </div>
                </li>

                <!-- Block 2 -->
                <li class="divDrawer">
                    <section class="helpDash--question2--button divDrawer__section">
                        <h2>Where are your mosquito nets manufactured ?</h2>
                        <svg class="svg--2 helpDash--question2--svg" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M19.9181 8.9502L13.3981 15.4702C12.6281 16.2402 11.3681 16.2402 10.5981 15.4702L4.07812 8.9502" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </section>
                    <div class="helpDash--question2--content divDrawer__content">
                        <h3 >Nestled in the heart of Dijon, the birthplace of elegance and tradition, our mosquito nets come to life. Each piece is meticulously crafted by hand by our dedicated artisans, inheritors of a craftsmanship passed down through generations. In the charming atmosphere of our workshop, located in the heart of this iconic city, each luxury mosquito net takes shape with artisanal precision, resulting in a unique piece infused with the refinement that defines our family brand.</h3>
                    </div>
                </li>

                <!-- Block 3 -->
                <li class="divDrawer">
                    <section class="helpDash--question3--button divDrawer__section">
                        <h2>What is the durability of the mosquito nets ?</h2>
                        <svg class="svg--2 helpDash--question3--svg" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M19.9181 8.9502L13.3981 15.4702C12.6281 16.2402 11.3681 16.2402 10.5981 15.4702L4.07812 8.9502" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </section>
                    <div class="helpDash--question3--content divDrawer__content">
                        <h3>Our mosquito nets are crafted from high-quality materials to ensure exceptional durability. They are designed to withstand various weather conditions while retaining their elegance.</h3>
                    </div>
                </li>

                <!-- Block 4 -->
                <li class="divDrawer">
                    <section class="helpDash--question4--button divDrawer__section">
                        <h2>Where can I purchase your mosquito nets ?</h2>
                        <svg class="svg--2 helpDash--question4--svg" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M19.9181 8.9502L13.3981 15.4702C12.6281 16.2402 11.3681 16.2402 10.5981 15.4702L4.07812 8.9502" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </section>
                    <div class="helpDash--question4--content divDrawer__content">
                        <h3>Currently, we, unfortunately, do not have physical retail locations. All transactions take place through our website.</h3>
                    </div>
                </li>

                <!-- Block 5 -->
                <li class="divDrawer">
                    <section class="helpDash--question5--button divDrawer__section">
                        <h2>Do you offer customization options for the mosquito nets ?</h2>
                        <svg class="svg--2 helpDash--question5--svg" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M19.9181 8.9502L13.3981 15.4702C12.6281 16.2402 11.3681 16.2402 10.5981 15.4702L4.07812 8.9502" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </section>
                    <div class="helpDash--question5--content divDrawer__content">
                        <h3>Yes, we offer customization options for our mosquito nets. To explore these options, please contact our customer service via the contact button.</h3>
                    </div>
                </li>
            </ul>
        </div>
        <aside class="dashboard__aside">
            <ul class="dashboard__aside__list">
                <li class="dashboard__aside__list__line"><p class="dashboard__aside__list__line__a">Products</p></li>
                <li class="dashboard__aside__list__line"><p class="dashboard__aside__list__line__a">Account</p></li>
                <li class="dashboard__aside__list__line"><p class="dashboard__aside__list__line__a">Delivery</p></li>
                <li class="dashboard__aside__list__line"><p class="dashboard__aside__list__line__a">Orders</p></li>
                <li class="dashboard__aside__list__line"><p class="dashboard__aside__list__line__a">Exchange and refund</p></li>
                <li class="dashboard__aside__list__line"><a class="dashboard__aside__list__line__a" href="{{route('help.about')}}">About Us</a></li>
            </ul>
            <a href="#" class="button--disable">Reset Password</a>
            <a href="{{route('help.contact')}}" class="button">Contact</a>
        </aside>
    </main>
    <script src="{{asset("src/js/main/help.js")}}"></script>
@endsection

