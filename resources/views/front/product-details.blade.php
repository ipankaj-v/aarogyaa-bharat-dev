
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
    @if (session('success'))
            <script>
                toastr.success('{{ session('success') }}');
            </script>
        @endif

        @if (session('error'))
            <script>
                toastr.error('{{ session('error') }}');
            </script>
        @endif
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
                 <div class="prod_slide"><img src="{{ asset('storage/' . $productDetails->image) }}" alt="" /></div>
            @endif
                <!--<div class="prod_slide"><img src="{{asset('front/images/wheelchair_2.png')}}" alt="" /></div>
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

<section class="customer_part">
@include('front.common.happy-customer') 
</section>



@include('front.common.faq-section')
@endsection('content')