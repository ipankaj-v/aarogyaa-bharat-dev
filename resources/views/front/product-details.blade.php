
@extends('front.layouts.layout')
@section('content')

<div class="breadcrumbs">
    <div class="container">
        <ul>
            <li><a href="#;">Home</a> </li>
            <li><a href="#;">Product Cateogry</a> </li>
            <li><a href="#;">Product Details</a> </li>
        </ul>
    </div>    
</div>

<section class="product_details">
    <div class="container">
        <div class="product_details_box">
            <div class="product_details_slide slide_product">
            @if($productDetails->images->isNotEmpty())
                @foreach($productDetails->images as $image)
                    @if(!empty($image->path))
                        <div class="prod_slide">
                            <img src="{{ asset('storage/' . $image->path) }}" alt="Product Image" />
                        </div>
                    @endif
                @endforeach
            @else
                <p>No images available for this product.</p>
            @endif
                <!-- <div class="prod_slide"><img src="{{ asset('storage/' . $productDetails->image) }}" alt="" /></div>
                <div class="prod_slide"><img src="{{asset('front/images/wheelchair_2.png')}}" alt="" /></div>
                <div class="prod_slide"><img src="{{asset('front/images/wheelchair_2.png')}}" alt="" /></div> -->
            </div>
            <div class="product_details_data">
                <div class="rentorpurchase"><img src="images/info-circle_svg.svg" alt="" /><p>Rent or Purchase this product now.!</p></div>
                <div class="product_name_details">
                    <div class="nameshare"><h2>{{$productDetails->title}}</h2><a href="#;"><img src="images/ri_share-line.svg" alt="" /></a></div>
                    <div class="product_description">
                    <p>{{$productDetails->description}}</p>
                    </div>
                    <div class="productprice"><h2>₹ {{$productDetails->price}}</h2></div>
                    <div class="features_specification">
                        <h2>Features & Specification</h2>
                        <ul>
                        {!! html_entity_decode($productDetails->features_specification) !!}
                            <!-- <li><p>Frame style :-</p><p>Foldable</p></li>
                            <li><p>Frame material :-</p><p>M.S</p></li>
                            <li><p>Footrest :-</p><p>Retractable</p></li>
                            <li><p>Dimension :-</p><p>4'2.2”/184 cm</p></li> -->
                        </ul>
                    </div>
					<div class="features_specification moredetail_product">
                        <h2>About this item</h2>
                        <ul>
                        {!! html_entity_decode($productDetails->about_item) !!}
                            <!-- <li><p>A wheelchair is a chair fitted with wheels. The device comes in variations allowing either manual </p></li>
                           <li><p>A wheelchair is a chair fitted with wheels. The device comes in variations allowing either manual </p></li>
						   <li><p>A wheelchair is a chair fitted with wheels. The device comes in variations allowing either manual </p></li>
						   <li><p>A wheelchair is a chair fitted with wheels. The device comes in variations allowing either manual </p></li>
						   <li><p>A wheelchair is a chair fitted with wheels. The device comes in variations allowing either manual </p></li> -->
                        </ul>
                    </div>
                    <div class="more_details">
                        <a href="#;"><p>More Details</p><img src="images/downArrow.svg" alt="" /></a>
                    </div>
                    <div class="cart_buy">
                    <form action="{{ route('cart.add', ['productId' => $productDetails->id]) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="addtocart">Add to Cart</button>
                    </form>
                    <a href="#;" class="btn_buynow">Buy Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="get_service_benefits">
    <div class="container">
       <div class="titlePart">
            <h4>Get Service Benefits</h4>
            <p>We prioritize our clients, understanding their unique needs and preferences.</p>
        </div>
        <div class="get_service_benefits_allbox">
            <div class="benefits_box">
                <img src="{{asset('front/images/Quick_delivery.svg')}}" alt="" />
                <p>Quick Delivery</p>
            </div>
            <div class="benefits_box">
                <img src="{{asset('front/images/getitwith.svg')}}" alt="" />
                <p>Get it Within 5 hrs</p>
            </div>
            <div class="benefits_box">
                <img src="{{asset('front/images/freeinstolation.svg')}}" alt="" />
                <p>Free  Installation</p>
            </div>
            <div class="benefits_box">
                <img src="{{asset('front/images/24hours.svg')}}" alt="" />
                <p>24hrs Emergency Help</p>
            </div>
        </div>
    </div>
</section>

<section class="offer_Part">
    <div class="container">
        <div class="titlePart">
            <h4>Offer & Discount</h4>
            <a href="#;">View All <img src="{{asset('front/images/orange_arrow.svg') }}" alt=""> </a>
        </div>
        <div class="rowMob">
        <div class="offer_slider getprogressWidth arrowOnProgress">
            @include('front.common.offer-discounts')
        </div>
        <div class="progressBar"></div>
        </div>
    </div>
</section>
@include('front.common.recentview')
<!-- <section class="productSlidePart">
    <div class="container">
        <div class="titlePart2"> 
            <h4>Recent Viewed</h4> 
        </div>
        <div class="rowMob">
            <div class="product_slider2 getprogressWidth arrowOnProgress"> 
                <div class="product_slider2padd">
                    <div class="product_slider2block">
                        <div class="product_inner">
                            <img src="images/wheelchair_1.png" alt="" />
                        </div>
                        <p>Wheelchair</p>
                        <strong>₹ 1200 <span>/ Per week</span></strong>
                    </div> 
                </div>
                <div class="product_slider2padd">
                    <div class="product_slider2block">
                        <div class="product_inner">
                            <img src="images/wheelchair_1.png" alt="" />
                        </div>
                        <p>Wheelchair</p>
                        <strong>₹ 1200 <span>/ Per week</span></strong>
                    </div> 
                </div>
                <div class="product_slider2padd">
                    <div class="product_slider2block">
                        <div class="product_inner">
                            <img src="images/wheelchair_1.png" alt="" />
                        </div>
                        <p>Wheelchair</p>
                        <strong>₹ 1200 <span>/ Per week</span></strong>
                    </div> 
                </div>
                <div class="product_slider2padd">
                    <div class="product_slider2block">
                        <div class="product_inner">
                            <img src="images/wheelchair_1.png" alt="" />
                        </div>
                        <p>Wheelchair</p>
                        <strong>₹ 1200 <span>/ Per week</span></strong>
                    </div> 
                </div>
                <div class="product_slider2padd">
                    <div class="product_slider2block">
                        <div class="product_inner">
                            <img src="images/wheelchair_1.png" alt="" />
                        </div>
                        <p>Wheelchair</p>
                        <strong>₹ 1200 <span>/ Per week</span></strong>
                    </div> 
                </div>
                <div class="product_slider2padd">
                    <div class="product_slider2block">
                        <div class="product_inner">
                            <img src="images/wheelchair_1.png" alt="" />
                        </div>
                        <p>Wheelchair</p>
                        <strong>₹ 1200 <span>/ Per week</span></strong>
                    </div> 
                </div>
            </div>
            <div class="progressBar"></div>
        </div>
    </div>
</section> -->

<section class="customer_part">
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
</section>
@include('front.common.faq-section')
<!-- <section class="faq_section">
    <div class="container">
       <div class="titlePart2">
            <h4>Frequently asked questions</h4> 
        </div>
        <div class="faq_box">
            <a href="#;"><p>Is questions text will goes here..?</p><img src="images/jam_plus.svg" alt="" /></a>
            <div class="faq_box_text">
                <p>Kros samuktig och neturen, heteropaskade. Mikok höraniv eller mus i fuvåfar. Faliga mälig astronde. Bens konvertering hemissade Fredrik Åkesson.</p>
            </div>
        </div>
        <div class="faq_box">
            <a href="#;"><p>Is questions text will goes here..?</p><img src="images/jam_plus.svg" alt="" /></a>
            <div class="faq_box_text">
                <p>Kros samuktig och neturen, heteropaskade. Mikok höraniv eller mus i fuvåfar. Faliga mälig astronde. Bens konvertering hemissade Fredrik Åkesson.</p>
            </div>
        </div>
        <div class="faq_box">
            <a href="#;"><p>Is questions text will goes here..?</p><img src="images/jam_plus.svg" alt="" /></a>
            <div class="faq_box_text">
                <p>Kros samuktig och neturen, heteropaskade. Mikok höraniv eller mus i fuvåfar. Faliga mälig astronde. Bens konvertering hemissade Fredrik Åkesson.</p>
            </div>
        </div>
        <div class="faq_box">
            <a href="#;"><p>Is questions text will goes here..?</p><img src="images/jam_plus.svg" alt="" /></a>
            <div class="faq_box_text">
                <p>Kros samuktig och neturen, heteropaskade. Mikok höraniv eller mus i fuvåfar. Faliga mälig astronde. Bens konvertering hemissade Fredrik Åkesson.</p>
            </div>
        </div>
    </div>
</section> -->
@endsection('content')