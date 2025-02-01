
@extends('front.layouts.layout')
@section('content')

<div class="breadcrumbs">
    <div class="container">
        <ul>
        <li><a href="{{ route('home') }}">Home</a> </li>
        <li><a href="{{ route('products.category') }}">Cateogry</a> </li>
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
                <!-- <div class="rentorpurchase"><img src="images/info-circle_svg.svg" alt="" /><p>Rent or Purchase this product now.!</p></div> -->
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
                        @if(!isset($productDetails->productAttributes) || $productDetails->productAttributes->stock == 0)
                            <span style="color: red; font-weight: bold;">Out of Stock</span>
                            <form action="{{ route('cart.add', ['productId' => $productDetails->id]) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="addtocart" disabled>Add to Cart</button>
                            </form>
                            <a href="#;" class="btn_buynow disabled" id="buy-now-button" data-productid="{{$productDetails->id}}">Buy Now</a>
                        @else
                            <form action="{{ route('cart.add', ['productId' => $productDetails->id]) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="addtocart">Add to Cart</button>
                            </form>
                            <a href="#;" class="btn_buynow" id="buy-now-button" data-productid="{{$productDetails->id}}">Buy Now</a>
                        @endif
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
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
document.getElementById('buy-now-button').onclick = function(e) {
    e.preventDefault();
    var productId = this.getAttribute('data-productid');

    // Make the POST request to create the order
    fetch(`/create-order/${productId}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'  // CSRF Token
        },
        body: JSON.stringify({
            amount: 50000  // Example amount, modify as per your needs
        })
    })
    .then(response => {
        if (!response.ok) {
            console.log('Response error', response.status);
            
            // Handle non-200 status codes (e.g., 401, 404)
            if (response.status == 401) {
                toastr.error('Please login to proceed with payment.');
                return;
            } else if (response.status == 404) {
                toastr.error('Product not found.');
                return;
            } else if (response.status == 400) {
                return response.json().then(data => {
                    toastr.error(data.message || 'Product is out of stock.');
                });
            } else {
                return response.json().then(data => {
                    toastr.error(data.error || 'Something went wrong!');
                });
            }
        }
        return response.json();  // Proceed if response is OK (status 200)
    })
    .then(data => {
        // console.log('Order Data', data);
        
        if (data && data.error) {
            // Show the error from the backend if the error key exists
            toastr.error(data.error || 'An error occurred.');
            return;  // Stop further execution if there's an error
        }

        // Handle other errors when data is undefined or not in expected format
        if (!data) {
            toastr.error('Unexpected error occurred. Please try again.');
            return;
        }

        // If the data contains order details, proceed with Razorpay integration
        if (data.id) {
            var options = {
                "key": "{{ env('RAZORPAY_KEY') }}", // Your Razorpay key
                "amount": data.amount, // Amount in paise
                "currency": "INR",
                "name": "My Shop",
                "description": "Purchase Description",
                "order_id": data.id, // The order ID created in the backend
                "handler": function(response) {
                    // Send the payment details to the backend for verification
                    fetch('/verify-payment', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            razorpay_payment_id: response.razorpay_payment_id,
                            razorpay_order_id: response.razorpay_order_id,
                            razorpay_signature: response.razorpay_signature
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.message === 'Payment Verified') {
                            toastr.success('Payment successful!');
                        } else {
                            toastr.error('Payment verification failed!');
                        }
                    });
                },
                "prefill": {
                    "name": data.customer.name,
                    "email": data.customer.email,
                    "contact": data.customer.mobile
                },
                "theme": {
                    "color": "#F37254"
                }
            };

            var rzp1 = new Razorpay(options);
            rzp1.open();
        }
    })
    .catch(error => {
        console.log('Fetch Error', error);
        toastr.error(error.message || 'An error occurred while processing your request.');
    });
}

</script>
@endsection('content')