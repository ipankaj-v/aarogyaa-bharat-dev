
@extends('front.layouts.layout')
@section('content')
<!-- <div class="searchPop winScrollStop">
    <div class="searchPopBlock">
        <strong>Recent Search</strong>
        <p>Our highest rented or buying products.</p>
        <ul>
            <li>
                <a href="#;">
                    <img src="images/search_fil.svg" alt="" />
                    <p>Long product name</p>
                    <img src="images/curly_arrow.svg" alt="" /> 
                </a>
            </li>
            <li>
                <a href="#;">
                    <img src="images/search_fil.svg" alt="" />
                    <p>Product name</p>
                    <img src="images/curly_arrow.svg" alt="" /> 
                </a>
            </li>
            <li>
                <a href="#;">
                    <img src="images/search_fil.svg" alt="" />
                    <p>Product</p>
                    <img src="images/curly_arrow.svg" alt="" /> 
                </a>
            </li>
            <li>
                <a href="#;">
                    <img src="images/search_fil.svg" alt="" />
                    <p>Small product name</p>
                    <img src="images/curly_arrow.svg" alt="" /> 
                </a>
            </li>
        </ul>
        
        <div class="popPro">
        <strong>Popular Products</strong>
        <a href="#;">Long product name <img src="images/curly_arrow.svg" alt="" /></a>
        <a href="#;">product name <img src="images/curly_arrow.svg" alt="" /></a>
        <a href="#;">product <img src="images/curly_arrow.svg" alt="" /></a>
        <a href="#;">Small product name <img src="images/curly_arrow.svg" alt="" /></a>
        <a href="#;">Name of product <img src="images/curly_arrow.svg" alt="" /></a>
        <a href="#;">Popular product name  <img src="images/curly_arrow.svg" alt="" /></a>
        </div>
    </div>
</div> -->
@include('front.common.welcome-message')
<section class="bannerPArt">
    <div class="container">
        <div class="bannerSlider getprogressWidth arrowOnProgress">
            @if(isset($bannerImages))
            @foreach($bannerImages as $banner)
                    <div class="bannerBlock">
                        <img src="{{ asset('storage/' . $banner->image) }}" alt="Banner Image">
                    </div>
            @endforeach
            @endif

            <!-- <div class="bannerBlock">
                <img src="images/banner.jpg" alt="">
            </div>
            <div class="bannerBlock">
                <img src="images/banner.jpg" alt="">
            </div>
            <div class="bannerBlock">
                <img src="images/banner.jpg" alt="">
            </div> -->
        </div> 
        <div class="progressBar"></div>
    </div>
</section>
<!-- <section class="category_part">
    <div class="container">
       <div class="titlePart">
            <h4>Category</h4>
            <a href="#;">View All <img src="images/orange_arrow.svg" alt=""> </a>
        </div>
        <div class="category_all_box">
        <div class="category_box">
            <div class="category_icon"><img src="images/medical_equipment.svg" alt="" /></div>
            <p>Medical Equipment</p>
        </div>
        <div class="category_box">
            <div class="category_icon"><img src="images/medical_sowft.svg" alt="" /></div>
            <p>Medical Software</p>
        </div>
        <div class="category_box">
            <div class="category_icon"><img src="images/imaging_machine.svg" alt="" /></div>
            <p>Imaging Machine</p>
        </div>
        <div class="category_box">
            <div class="category_icon"><img src="images/single_use_device.svg" alt="" /></div>
            <p>Single Use Device</p>
        </div>
        </div>
    </div>
</section> -->
<!-- caterory part  -->
<section class="category_part">
    <div class="container">
       <div class="titlePart">
            <h4>Category</h4>
            <a href="{{route('products.category')}}">View All <img src="{{ asset('front/images/orange_arrow.svg')}}" alt=""> </a>
        </div>
        <div class="category_all_box">
            @foreach ($categories as $category)
                <div class="category_box">
                    <div class="category_icon">
                    <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" />

                    </div>
                    <p>{{ $category->name }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

 <section class="offer_Part" id="offer_Part">
    <div class="container">
        <div class="titlePart">
            <h4>Offer & Discount</h4>
            <a href="#;">View All <img src="{{ asset('front/images/orange_arrow.svg')}}" alt=""> </a>
        </div>
        <div class="rowMob">
        <div class="offer_slider getprogressWidth arrowOnProgress">
        @include('front.common.offer-discounts')    
        <!-- <div class="offer_slider_padd">
                <div class="offer_slider_block">
                    <img src="images/offer_card_image.png" alt="" >
                    <div class="offer_con">
                        <h5>Offer & Discount</h5>
                        <p>Lorem Ipsum placeholder text in any number of characters, words sentences.</p>
                    </div>
                    <div class="offer_det">
                        <i>*T&C apply</i>
                        <a href="#;">Offer Details </a>
                    </div>
                </div>
            </div>
            <div class="offer_slider_padd">
                <div class="offer_slider_block">
                    <img src="images/offer_card_image.png" alt="" >
                    <div class="offer_con">
                        <h5>Offer & Discount</h5>
                        <p>Lorem Ipsum placeholder text in any number of characters, words sentences.</p>
                    </div>
                    <div class="offer_det">
                        <i>*T&C apply</i>
                        <a href="#;">Offer Details </a>
                    </div>
                </div>
            </div>
            <div class="offer_slider_padd">
                <div class="offer_slider_block">
                    <img src="images/offer_card_image.png" alt="" >
                    <div class="offer_con">
                        <h5>Offer & Discount</h5>
                        <p>Lorem Ipsum placeholder text in any number of characters, words sentences.</p>
                    </div>
                    <div class="offer_det">
                        <i>*T&C apply</i>
                        <a href="#;">Offer Details </a>
                    </div>
                </div>
            </div>
            <div class="offer_slider_padd">
                <div class="offer_slider_block">
                    <img src="images/offer_card_image.png" alt="" >
                    <div class="offer_con">
                        <h5>Offer & Discount</h5>
                        <p>Lorem Ipsum placeholder text in any number of characters, words sentences.</p>
                    </div>
                    <div class="offer_det">
                        <i>*T&C apply</i>
                        <a href="#;">Offer Details </a>
                    </div>
                </div>
            </div>
            <div class="offer_slider_padd">
                <div class="offer_slider_block">
                    <img src="images/offer_card_image.png" alt="" >
                    <div class="offer_con">
                        <h5>Offer & Discount</h5>
                        <p>Lorem Ipsum placeholder text in any number of characters, words sentences.</p>
                    </div>
                    <div class="offer_det">
                        <i>*T&C apply</i>
                        <a href="#;">Offer Details </a>
                    </div>
                </div>
            </div>
            <div class="offer_slider_padd">
                <div class="offer_slider_block">
                    <img src="images/offer_card_image.png" alt="" >
                    <div class="offer_con">
                        <h5>Offer & Discount</h5>
                        <p>Lorem Ipsum placeholder text in any number of characters, words sentences.</p>
                    </div>
                    <div class="offer_det">
                        <i>*T&C apply</i>
                        <a href="#;">Offer Details </a>
                    </div>
                </div>
            </div>
            <div class="offer_slider_padd">
                <div class="offer_slider_block">
                    <img src="images/offer_card_image.png" alt="" >
                    <div class="offer_con">
                        <h5>Offer & Discount</h5>
                        <p>Lorem Ipsum placeholder text in any number of characters, words sentences.</p>
                    </div>
                    <div class="offer_det">
                        <i>*T&C apply</i>
                        <a href="#;">Offer Details </a>
                    </div>
                </div>
            </div> -->
        </div>
        <div class="progressBar"></div>
        </div>
    </div>
</section> 

<!-- product part  -->
<section class="product_Part">
    <div class="container">
        <div class="titlePart">
            <h4>Newly Product</h4>
            <a href="{{ route('products')}}">View All <img src="{{ asset('front/images/orange_arrow.svg') }}" alt="View All"> </a>
        </div>
        <div class="rowMob">
            <div class="product_slider getprogressWidth">
                @foreach ($products as $product)
                    <div class="product_slider_padd">
                        <div class="product_slider_block">
                            <div class="imagePart">
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                            </div>
                            <h5>{{ $product->name }}</h5>
                            <p>{{ $product->description }}</p>
                            <strong>₹ {{ number_format($product->price, 2) }}</strong><i>/ Per week</i>
                            
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="progressBar"></div>
        </div>
    </div>
</section>


<!-- <section class="product_Part">
    <div class="container">
        <div class="titlePart">
            <h4>Newly Product</h4>
            <a href="#;">View All <img src="images/orange_arrow.svg" alt=""> </a>
        </div>
        <div class="rowMob">
            <div class="product_slider getprogressWidth">
                <div class="product_slider_padd">
                    <div class="product_slider_block">
                        <div class="imagePart">
                            <img src="images/wheelchair_1.png" alt="" >
                        </div>
                        <h5>Wheelchair</h5>
                        <p>Dummy text for offer of product goes here just for placeholder..</p>
                        <strong>₹ 1200</strong><i>/ Per week</i>
                        <a href="#;">View Details <img src="images/orange_arrow.svg" alt=""> </a>
                    </div>
                </div>
                <div class="product_slider_padd">
                    <div class="product_slider_block">
                        <div class="imagePart">
                            <img src="images/wheelchair_1.png" alt="" >
                        </div>
                        <h5>Wheelchair</h5>
                        <p>Dummy text for offer of product goes here just for placeholder..</p>
                        <strong>₹ 1200</strong><i>/ Per week</i>
                        <a href="#;">View Details <img src="images/orange_arrow.svg" alt=""> </a>
                    </div>
                </div>
                <div class="product_slider_padd">
                    <div class="product_slider_block">
                        <div class="imagePart">
                            <img src="images/wheelchair_1.png" alt="" >
                        </div>
                        <h5>Wheelchair</h5>
                        <p>Dummy text for offer of product goes here just for placeholder..</p>
                        <strong>₹ 1200</strong><i>/ Per week</i>
                        <a href="#;">View Details <img src="images/orange_arrow.svg" alt=""> </a>
                    </div>
                </div>
                <div class="product_slider_padd">
                    <div class="product_slider_block">
                        <div class="imagePart">
                            <img src="images/wheelchair_1.png" alt="" >
                        </div>
                        <h5>Wheelchair</h5>
                        <p>Dummy text for offer of product goes here just for placeholder..</p>
                        <strong>₹ 1200</strong><i>/ Per week</i>
                        <a href="#;">View Details <img src="images/orange_arrow.svg" alt=""> </a>
                    </div>
                </div>
                <div class="product_slider_padd">
                    <div class="product_slider_block">
                        <div class="imagePart">
                            <img src="images/wheelchair_1.png" alt="" >
                        </div>
                        <h5>Wheelchair</h5>
                        <p>Dummy text for offer of product goes here just for placeholder..</p>
                        <strong>₹ 1200</strong><i>/ Per week</i>
                        <a href="#;">View Details <img src="images/orange_arrow.svg" alt=""> </a>
                    </div>
                </div>
                <div class="product_slider_padd">
                    <div class="product_slider_block">
                        <div class="imagePart">
                            <img src="images/wheelchair_1.png" alt="" >
                        </div>
                        <h5>Wheelchair</h5>
                        <p>Dummy text for offer of product goes here just for placeholder..</p>
                        <strong>₹ 1200</strong><i>/ Per week</i>
                        <a href="#;">View Details <img src="images/orange_arrow.svg" alt=""> </a>
                    </div>
                </div>
            </div>
            <div class="progressBar"></div>
        </div>
    </div>
</section> -->


<section class="raise_query">
    <div class="container">
        <div class="raise_query_box">
            <div class="rise_text_box">
                <a href="{{ route('raise.query')}}"> <img src="{{ asset('front/images/raise.png')}}" alt="" /></a>
                <div class="rise_text_line">
                    <h4>Raise Query</h4>
                    <p>You can request anything by single click.</p>
                </div>
            </div>
        </div>
    </div>
</section>

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
                    <p>We prioritize our clients, understanding their unique needs and preferences. </p>
                </div>
            </div>
            <div class="why_arogya_bharat_box">
                <div class="arogya_icon"><img src="{{asset('front/images/well_equipped.svg')}}" alt="" /></div>
                <div class="why_arogya_bharat_text">
                    <h1>Well-Equipped Infrastructural Setup</h1>
                    <p>We prioritize our clients, understanding their unique needs and preferences. </p>
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
    <div class="container">
        <div class="titlePart">
            <h4>Happy Customers..!</h4>
            <a href="#;">View All <img src="{{asset('front/images/orange_arrow.svg')}}" alt=""> </a>
        </div>
        <div class="rowMob">
            <div class="customerSlider getprogressWidth">
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
</section>


<!-- blog part  -->

<section class="our_blog">
    <div class="container">
       <div class="titlePart2">
            <h4>Our Blogs</h4> 
        </div>
        <div class="our_blog_all_box">
            <div class="row18">
                @foreach ($blogs as $blog)
                    <div class="our_blog_box">
                        <div class="blog_image">
                            <img src="{{ asset('storage/' . $blog->images->first()->path) }}" alt="{{ $blog->title }}" />
                        </div>
                        <div class="blog_text">
                            <div class="text_one">
                                <h2>{{ $blog->title }}</h2>
                                <p>{{ Str::limit($blog->content, 150) }}</p>
                            </div>
                            <div class="blog_tag_name">
                                <ul>
                                    <!-- <li class="tagBox"><p>{{ $blog->tags }}</p></li> -->
                                    <li class="tagBox"><p>Tagename</p></li>
                                    <li class="blogdate">
                                        <img src="{{ asset('fornt/images/calendar.svg') }}" alt="" />
                                        <p>{{ $blog->created_at->format('d/m/Y') }}</p>
                                    </li>
                                    <li class="blogview">
                                        <img src="{{ asset('front/images/carbon_view.svg') }}" alt="" />
                                        <p>11</p>
                                        <!-- <p>{{ $blog->views }}</p> -->
                                    </li>
                                    <li>
                                        <a href="#"><img src="{{ asset('front/images/ri_share-line.svg') }}" alt="" /></a>
                                    </li>
                                </ul>
                                <a href="" class="blogreadnow">Read Now</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="read_more_blogs">
            <a href="">
                <p>Read More Blogs</p>
                <img src="{{ asset('front/images/downArrow.svg') }}" alt="" />
            </a>
        </div>
    </div>
</section>

<!-- <section class="our_blog">
    <div class="container">
       <div class="titlePart2">
            <h4>Our Blogs</h4> 
        </div>
        <div class="our_blog_all_box">
            <div class="row18">
                <div class="our_blog_box">
                    <div class="blog_image"><img src="images/bed.png" alt="" /></div>
                    <div class="blog_text">
                        <div class="text_one"><h2>Medical Bed</h2><p>Kros samuktig neturen, herer of it isherer ann uppaskae. Mikok coko invertering hemissade Fredrik Åkesson...</p></div>
                        <div class="blog_tag_name">
                            <ul>
                                <li class="tagBox"><p>Tagename</p></li>
                                <li class="blogdate"><img src="images/calendar.svg" alt="" /><p>04/02/24</p></li>
                                <li class="blogview"><img src="images/carbon_view.svg" alt="" /><p>424</p></li>
                                <li><a href="#;"><img src="images/ri_share-line.svg" alt="" /></a></li>
                            </ul>
                            <a href="#;" class="blogreadnow">Read Now</a>
                        </div>
                    </div>
                </div>
                <div class="our_blog_box">
                    <div class="blog_image"><img src="images/bed.png" alt="" /></div>
                    <div class="blog_text">
                        <div class="text_one"><h2>Medical Bed</h2><p>Kros samuktig neturen, herer of it isherer ann uppaskae. Mikok coko invertering hemissade Fredrik Åkesson...</p></div>
                        <div class="blog_tag_name">
                            <ul>
                                <li class="tagBox"><p>Tagename</p></li>
                                <li class="blogdate"><img src="images/calendar.svg" alt="" /><p>04/02/24</p></li>
                                <li class="blogview"><img src="images/carbon_view.svg" alt="" /><p>424</p></li>
                                <li><a href="#;"><img src="images/ri_share-line.svg" alt="" /></a></li>
                            </ul>
                            <a href="#;" class="blogreadnow">Read Now</a>
                        </div>
                    </div>
                </div>
                <div class="our_blog_box">
                    <div class="blog_image"><img src="images/bed.png" alt="" /></div>
                    <div class="blog_text">
                        <div class="text_one"><h2>Medical Bed</h2><p>Kros samuktig neturen, herer of it isherer ann uppaskae. Mikok coko invertering hemissade Fredrik Åkesson...</p></div>
                        <div class="blog_tag_name">
                            <ul>
                                <li class="tagBox"><p>Tagename</p></li>
                                <li class="blogdate"><img src="images/calendar.svg" alt="" /><p>04/02/24</p></li>
                                <li class="blogview"><img src="images/carbon_view.svg" alt="" /><p>424</p></li>
                                <li><a href="#;"><img src="images/ri_share-line.svg" alt="" /></a></li>
                            </ul>
                            <a href="#;" class="blogreadnow">Read Now</a>
                        </div>
                    </div>
                </div>
                <div class="our_blog_box">
                    <div class="blog_image"><img src="images/bed.png" alt="" /></div>
                    <div class="blog_text">
                        <div class="text_one"><h2>Medical Bed</h2><p>Kros samuktig neturen, herer of it isherer ann uppaskae. Mikok coko invertering hemissade Fredrik Åkesson...</p></div>
                        <div class="blog_tag_name">
                            <ul>
                                <li class="tagBox"><p>Tagename</p></li>
                                <li class="blogdate"><img src="images/calendar.svg" alt="" /><p>04/02/24</p></li>
                                <li class="blogview"><img src="images/carbon_view.svg" alt="" /><p>424</p></li>
                                <li><a href="#;"><img src="images/ri_share-line.svg" alt="" /></a></li>
                            </ul>
                            <a href="#;" class="blogreadnow">Read Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="read_more_blogs"><a href="#;"><p>Read More Blogs</p><img src="images/downArrow.svg" alt="" /></a></div>
    </div>
</section> -->


<section class="partners_we_work_with">
    <div class="container">
       <div class="titlePart">
            <h4>Partners - we work with</h4>
            <p>A wheelchair is a chair fitted with wheels. The device comes in variations allowing either manual propulsion by the seated occupant turning the rear wheels by hand or electric propulsion by motors electric propulsion by motors.</p>
        </div>
        <div class="partners_we_work_logo">
            <img src="{{asset('front/images/Frame_1.png')}}" alt="" />
            <img src="{{asset('front/images/Frame_2.png')}}" alt="" />
            <img src="{{asset('front/images/Frame_3.png')}}" alt="" />
            <img src="{{asset('front/images/Frame_4.png')}}" alt="" />
            <img src="{{asset('front/images/Frame_5.png')}}" alt="" />
            <img src="{{asset('front/images/Frame_6.png')}}" alt="" />
        </div>
    </div>
</section>

<section class="about_aarogya_bharat">
    <div class="container">
        <div class="about_aarogya_title"><h2>About Aarogya Bharat</h2></div>
        <div class="about_aarogya_bharat_text">
            <p>A wheelchair is a chair fitted with wheels. The device comes in variations allowing either manual propulsion by the seated occupant turning the rear wheels by hand or electric propulsion by motors.A wheelchair is a chair fitted with wheels. The device comes in variations allowing either manual propulsion by the seated occupant turning the rear wheels by hand or electric propulsion by motors.</p>
            <p>A wheelchair is a chair fitted with wheels. The device comes in variations allowing either manual propulsion by the seated occupant turning the rear wheels by hand or electric propulsion by motors. A wheelchair is a chair fitted with wheels. The device comes in variations allowing either manual propulsion by the seated occupant turning the rear wheels by hand or electric propulsion by motors <a href="#;">Read More..</a></p>
        </div>
    </div>
</section>
@endsection('content')

