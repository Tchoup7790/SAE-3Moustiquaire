@extends('base')

@section('title', 'About Us')

@section('body')
    <main class="about">
        <div class="about__img"></div>

        <div class="about__div">
            <p class="text--body">Les 3 Moustiquaires was founded in 1983 in Dijon by the visionary Mrs. Eugénie Gligenduck. Driven by a passion for elegance and tradition, she embarked on creating a company dedicated to the production of luxury mosquito nets. Guided by a heritage of craftsmanship passed down through generations, Mrs. Gligenduck established Les 3 Moustiquaires as an iconic brand at the heart of the city of Dijon.<br><br>Over the decades, Les 3 Moustiquaires has successfully blended traditional craftsmanship with innovative techniques, creating mosquito nets of exceptional quality. Each piece is meticulously handcrafted in the charming workshop of the company, located in the heart of Dijon, the cradle of elegance and sophistication.<br><br>The philosophy of the company is rooted in the pursuit of excellence and attention to detail. The dedicated artisans of Les 3 Moustiquaires strive to create unique pieces infused with the refinement that defines the family brand. Each mosquito net thus becomes a work of art, combining functionality and aesthetics.<br><br>As a pioneer in the field of luxury mosquito nets, Les 3 Moustiquaires has distinguished itself through its commitment to quality, innovation, and customer service. The brand has set high standards, becoming a reference in the industry.</p>

            <img class="about__gligenduck" src="{{asset('/images/others/Mme.Gligenduck.jpg')}}" alt="Mrs.Gligenduck">
        </div>

        <p class="text--body">Today, Les 3 Moustiquaires continues to thrive as a renowned brand, offering high-end mosquito nets to a clientele attentive to quality and aesthetics. The company remains true to its original mission: to create unique pieces that add a touch of elegance to every home, while ensuring effective protection against unwanted insects.</p>

        <p class="text--body">Les 3 Moustiquaires is more than just a company; it is a story of craftsmanship, passion, and a commitment to excellence, written with care and dedication by each member of the Les 3 Moustiquaires family.</p>
    </main>
@endsection