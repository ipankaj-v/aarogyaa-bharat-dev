@extends('front.layouts.layout')
@section('content')

<div class="breadcrumbs">
    <div class="container">
        <ul>
            <li><a href="{{ route('home') }}">Home</a> </li>
            <li><a href="{{ route('products.category') }}">Product Cateogry</a> </li>
        </ul>
    </div>    
</div>


<section class="productSlidePart">
    <div class="container">
        @foreach ($categoriesAndProducts as $category)
            <div class="titlePart2">
                <img src="{{ asset('storage/' . $category->image) }}" alt="" />
                <h4>{{ $category->name }}</h4>
                <a href="{{route('products')}}">View All <img src="{{asset('front/images/orange_arrow.svg')}}" alt=""> </a>
            </div>
            <div class="rowMob">
                <div class="product_slider2 getprogressWidth arrowOnProgress"> 
                    @foreach ($category->products as $product)
                        <div class="product_slider2padd">
                            <div class="product_slider2block">
                                <div class="product_inner">
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" />
                                </div>
                                <p>{{ $product->name }}</p>
                                <strong>₹ {{ number_format($product->price, 2) }}</strong>
                            </div> 
                        </div>
                    @endforeach
                </div>
                <div class="progressBar"></div>
            </div>
        @endforeach
    </div>
</section>

<!-- <section class="productSlidePart">
    <div class="container">
        <div class="titlePart2">
            <img src="images/medical_equipment.svg" alt="" />
            <h4>Medical Equipment</h4>
            <a href="#;">View All <img src="images/orange_arrow.svg" alt=""> </a>
        </div>
        <div class="rowMob">
            <div class="product_slider2 getprogressWidth arrowOnProgress"> 
                <div class="product_slider2padd">
                    <div class="product_slider2block">
                        <div class="product_inner">
                            <img src="images/wheelchair_1.png" alt="" />
                        </div>
                        <p>Wheelchair</p>
                        <strong>₹ 1200</strong>
                    </div> 
                </div>
                <div class="product_slider2padd">
                    <div class="product_slider2block">
                        <div class="product_inner">
                            <img src="images/wheelchair_1.png" alt="" />
                        </div>
                        <p>Wheelchair</p>
                        <strong>₹ 1200</strong>
                    </div> 
                </div>
                <div class="product_slider2padd">
                    <div class="product_slider2block">
                        <div class="product_inner">
                            <img src="images/wheelchair_1.png" alt="" />
                        </div>
                        <p>Wheelchair</p>
                        <strong>₹ 1200</strong>
                    </div> 
                </div>
                <div class="product_slider2padd">
                    <div class="product_slider2block">
                        <div class="product_inner">
                            <img src="images/wheelchair_1.png" alt="" />
                        </div>
                        <p>Wheelchair</p>
                        <strong>₹ 1200</strong>
                    </div> 
                </div>
                <div class="product_slider2padd">
                    <div class="product_slider2block">
                        <div class="product_inner">
                            <img src="images/wheelchair_1.png" alt="" />
                        </div>
                        <p>Wheelchair</p>
                        <strong>₹ 1200</strong>
                    </div> 
                </div>
                <div class="product_slider2padd">
                    <div class="product_slider2block">
                        <div class="product_inner">
                            <img src="images/wheelchair_1.png" alt="" />
                        </div>
                        <p>Wheelchair</p>
                        <strong>₹ 1200</strong>
                    </div> 
                </div>
            </div>
            <div class="progressBar"></div>
        </div>
    </div>
</section> -->


<section class="why_arogya_bharat">
    <div class="container">
       <div class="titlePart">
            <h4>Why Aarogya Bharat ..?</h4>
            <p>We prioritize our clients, understanding their unique needs and preferences.</p>
        </div>
        <div class="why_arogya_bharat_all_box">
            <div class="why_arogya_bharat_box">
                <div class="arogya_icon"><img src="{{asset('front/images/Client_Centric_Approach.svg')}}" alt="" /></div>
                <div class="why_arogya_bharat_text">
                    <h1>Client-Centric Approach</h1>
                    <p>We prioritize our clients, understanding their unique needs and preferences.</p>
                </div>
            </div>
            <div class="why_arogya_bharat_box">
                <div class="arogya_icon"><img src="{{asset('front/images/well_equipped.svg')}}" alt="" /></div>
                <div class="why_arogya_bharat_text">
                    <h1>Well-Equipped Infrastructural Setup</h1>
                    <p>We prioritize our clients, understanding their unique needs and preferences.</p>
                </div>
            </div>
            <div class="why_arogya_bharat_box">
                <div class="arogya_icon"><img src="{{asset('front/images/skilled_team.svg')}}" alt="" /></div>
                <div class="why_arogya_bharat_text">
                    <h1>Skilled Team of Professionals</h1>
                    <p>Our success is attributed to a team of skilled and dedicated professionals </p>
                </div>
            </div>
            <div class="why_arogya_bharat_box">
                <div class="arogya_icon"><img src="{{asset('front/images/wide_distribution_network.svg')}}" alt="" /></div>
                <div class="why_arogya_bharat_text">
                    <h1>Wide Distribution Network</h1>
                    <p>With a wide-reaching distribution network, we are capable of delivering our products </p>
                </div>
            </div>
            <div class="why_arogya_bharat_box">
                <div class="arogya_icon"><img src="{{asset('front/images/Work-Ethics.svg')}}" alt="" /></div>
                <div class="why_arogya_bharat_text">
                    <h1>Ethical Business Practices</h1>
                    <p>Integrity and ethics are at the core of our business operations. </p>
                </div>
            </div>
            <div class="why_arogya_bharat_box">
                <div class="arogya_icon"><img src="{{asset('front/images/delivery-van.svg')}}" alt="" /></div>
                <div class="why_arogya_bharat_text">
                    <h1>Timely Delivery</h1>
                    <p>We understand the importance of timely deliveries in the healthcare industry.</p>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="customer_part">
@include('front.common.happy-customer') 
</section>

<!-- <section class="customer_part">
    <div class="container">
        <div class="titlePart">
            <h4>Happy Customers..!</h4>
            <a href="#;">View All <img src="{{asset('front/images/orange_arrow.svg')}}" alt=""> </a>
        </div>
        <div class="rowMob">
            <div class="customerSlider getprogressWidth arrowOnProgress">
                <div class="customerSlider_padd">
                    <div class="customerSlider_block">
                        <p>Kros samuktig och neturen, heteropaskade. Mikok höraniv eller mus i fuvåfar. Faliga mälig astronde. Bens </p>
                        <strong>Piyush Gohil</strong>
                        <ul>
                            <li><a href="#;"><img src="images/fill_star.svg" alt="" /> </a> </li>
                            <li><a href="#;"><img src="images/fill_star.svg" alt="" /> </a> </li>
                            <li><a href="#;"><img src="images/fill_star.svg" alt="" /> </a> </li>
                            <li><a href="#;"><img src="images/fill_star.svg" alt="" /> </a> </li>
                            <li><a href="#;"><img src="images/empty_star.svg" alt="" /> </a> </li>
                        </ul>
                        <i>4.5</i>
                    </div>
                </div>
                <div class="customerSlider_padd">
                    <div class="customerSlider_block">
                        <p>Kros samuktig och neturen, heteropaskade. Mikok höraniv eller mus i fuvåfar. Faliga mälig astronde. Bens </p>
                        <strong>Piyush Gohil</strong>
                        <ul>
                            <li><a href="#;"><img src="images/fill_star.svg" alt="" /> </a> </li>
                            <li><a href="#;"><img src="images/fill_star.svg" alt="" /> </a> </li>
                            <li><a href="#;"><img src="images/fill_star.svg" alt="" /> </a> </li>
                            <li><a href="#;"><img src="images/fill_star.svg" alt="" /> </a> </li>
                            <li><a href="#;"><img src="images/empty_star.svg" alt="" /> </a> </li>
                        </ul>
                        <i>4.5</i>
                    </div>
                </div>
                <div class="customerSlider_padd">
                    <div class="customerSlider_block">
                        <p>Kros samuktig och neturen, heteropaskade. Mikok höraniv eller mus i fuvåfar. Faliga mälig astronde. Bens </p>
                        <strong>Piyush Gohil</strong>
                        <ul>
                            <li><a href="#;"><img src="images/fill_star.svg" alt="" /> </a> </li>
                            <li><a href="#;"><img src="images/fill_star.svg" alt="" /> </a> </li>
                            <li><a href="#;"><img src="images/fill_star.svg" alt="" /> </a> </li>
                            <li><a href="#;"><img src="images/fill_star.svg" alt="" /> </a> </li>
                            <li><a href="#;"><img src="images/empty_star.svg" alt="" /> </a> </li>
                        </ul>
                        <i>4.5</i>
                    </div>
                </div>
                <div class="customerSlider_padd">
                    <div class="customerSlider_block">
                        <p>Kros samuktig och neturen, heteropaskade. Mikok höraniv eller mus i fuvåfar. Faliga mälig astronde. Bens </p>
                        <strong>Piyush Gohil</strong>
                        <ul>
                            <li><a href="#;"><img src="images/fill_star.svg" alt="" /> </a> </li>
                            <li><a href="#;"><img src="images/fill_star.svg" alt="" /> </a> </li>
                            <li><a href="#;"><img src="images/fill_star.svg" alt="" /> </a> </li>
                            <li><a href="#;"><img src="images/fill_star.svg" alt="" /> </a> </li>
                            <li><a href="#;"><img src="images/empty_star.svg" alt="" /> </a> </li>
                        </ul>
                        <i>4.5</i>
                    </div>
                </div>
                <div class="customerSlider_padd">
                    <div class="customerSlider_block">
                        <p>Kros samuktig och neturen, heteropaskade. Mikok höraniv eller mus i fuvåfar. Faliga mälig astronde. Bens </p>
                        <strong>Piyush Gohil</strong>
                        <ul>
                            <li><a href="#;"><img src="images/fill_star.svg" alt="" /> </a> </li>
                            <li><a href="#;"><img src="images/fill_star.svg" alt="" /> </a> </li>
                            <li><a href="#;"><img src="images/fill_star.svg" alt="" /> </a> </li>
                            <li><a href="#;"><img src="images/fill_star.svg" alt="" /> </a> </li>
                            <li><a href="#;"><img src="images/empty_star.svg" alt="" /> </a> </li>
                        </ul>
                        <i>4.5</i>
                    </div>
                </div>
                <div class="customerSlider_padd">
                    <div class="customerSlider_block">
                        <p>Kros samuktig och neturen, heteropaskade. Mikok höraniv eller mus i fuvåfar. Faliga mälig astronde. Bens </p>
                        <strong>Piyush Gohil</strong>
                        <ul>
                            <li><a href="#;"><img src="images/fill_star.svg" alt="" /> </a> </li>
                            <li><a href="#;"><img src="images/fill_star.svg" alt="" /> </a> </li>
                            <li><a href="#;"><img src="images/fill_star.svg" alt="" /> </a> </li>
                            <li><a href="#;"><img src="images/fill_star.svg" alt="" /> </a> </li>
                            <li><a href="#;"><img src="images/empty_star.svg" alt="" /> </a> </li>
                        </ul>
                        <i>4.5</i>
                    </div>
                </div>
            </div>
            <div class="progressBar"></div>
        </div>
    </div>
</section> -->
@endsection