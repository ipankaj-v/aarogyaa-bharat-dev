@extends('front.layouts.layout')
@section('content')

@include('front.common.welcome-message')
<div class="breadcrumbs">
    <div class="container">
        <ul>
            <li><a href="#;">Home</a> </li>
            <li><a href="#;">Cart</a> </li>
        </ul>
    </div>
</div>

<section class="cartSec">
    <div class="container">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif

        <div class="cartTitle">
            <img src="{{ asset('front/images/cart.svg') }}" alt="" />
            <div>
                <h4>{{$cartProductCount ?? 0}} Item in your cart</h4>
            </div>
        </div>
        @if(isset($cartProducts[0]) && !empty($cartProducts[0]))
        <div class="row18">
            <div class="cart50">
                <div class="cartProductpart1" id="cart-items">
                    @include('front.common.cart.items')
                </div>
            </div>
            <div class="cart50">
                <div class="flatOffer">
                    <img src="{{ asset('front/images/flat_offer.svg/') }}" alt="" />
                    <div class="flatCon">
                        <strong>{{ $offerOrDiscount->title }}</strong>
                        <p>{{ $offerOrDiscount->description }}</p>
                    </div>
                    <div class="linkPart">
                        <span>*T&C apply</span>
                        <a id="applyCoupon" data-cart-id="{{ $cartProducts[0]->id }}" data-coupon-code="{{ $offerOrDiscount->code }}" 
                                        onclick="applyOffer(this)">Apply Now</a>

                    </div>
                    @if(isset($cartProducts[0]->discount_offer_id) && $cartProducts[0]->offer)
                    <div class="text-center" id="removeDiscount-{{$cartProducts[0]->offer->code}}" style="color: red;">
                        <a id="removeCoupon" data-cart-id="{{ $cartProducts[0]->id }}" data-coupon-code="{{ $cartProducts[0]->offer->code }}" onclick="removeOffer(this)" style="color: red;">
                            Remove
                        </a>
                    </div>
                    @else
                    <div class="removeDiscount" id="removeDiscount-{{$offerOrDiscount->code}}">
                        <a id="removeCoupon" data-cart-id="{{ $cartProducts[0]->id }}" data-coupon-code="{{ $offerOrDiscount->code }}" onclick="removeOffer(this)">Remove</a>
                    </div>
                    @endif
                </div>
                <div class="offerLink1">
                    <a id="getMoreOffers" onclick="getMoreOffers()">View More Offers</a>
                </div>
                <div class="radioBtns1">

                    @if(isset($cartProducts[0]->products->is_rentable) && $cartProducts[0]->products->is_rentable == 1)
                    <label class="radioLable">
                        <input type="radio" name="rentOrBuy" value="Rent_Now" />
                        <div class="radioLableBlock">
                            <span></span>
                            <div>
                                <strong>Rent Now</strong>
                                <i>Rent on tenure selection</i>
                            </div>
                        </div>
                    </label>
                    @endif
                    <label class="radioLable">
                        <input type="radio" name="rentOrBuy" value="Buy_Now" checked />
                        <div class="radioLableBlock">
                            <span></span>
                            <div>
                                <strong>Buy Now </strong>
                                <i>Basis on product price</i>
                            </div>
                        </div>
                    </label>
                </div>
                <div class="tenurePart">
                    <h4>Select Tenure:</h4>
                    <div class="tanureLine">
                        <label>
                            <input type="radio" name="tenure" checked value="week_1" />
                            <span>
                                <strong>1</strong>
                                <i>Week</i>
                            </span>
                        </label>
                        <label>
                            <input type="radio" name="tenure" value="week_2" />
                            <span>
                                <strong>2</strong>
                                <i>Week</i>
                            </span>
                        </label>
                        <label>
                            <input type="radio" name="tenure" value="week_3" />
                            <span>
                                <strong>3</strong>
                                <i>Week</i>
                            </span>
                        </label>
                        <label>
                            <input type="radio" name="tenure" value="month_1" />
                            <span>
                                <strong>1</strong>
                                <i>Months</i>
                            </span>
                        </label>
                        <label>
                            <input type="radio" name="tenure" value="month_3" />
                            <span>
                                <strong>3</strong>
                                <i>Months</i>
                            </span>
                        </label>
                        <label>
                            <input type="radio" name="tenure" value="month_6" />
                            <span>
                                <strong>6</strong>
                                <i>Months</i>
                            </span>
                        </label>
                        <label>
                            <input type="radio" name="tenure" value="month_9" />
                            <span>
                                <strong>9</strong>
                                <i>Months</i>
                            </span>
                        </label>
                        <label>
                            <input type="radio" name="tenure" value="month_12" />
                            <span>
                                <strong>12</strong>
                                <i>Months</i>
                            </span>
                        </label>
                    </div>
                </div>
                @php
                    $total = 0;
                    $totalONRent = 0;
                    $subTotal = 0;
                    $gst = 0;
                    $cartId = 0;
                    $couponId = 0;
                    if(isset($cartProducts) && isset($cartProducts[0])) {
                    $cartId = $cartProducts[0]->id;
                    }
                    if(isset($offerOrDiscount)) {
                    $couponId = $offerOrDiscount->id;
                    }
                    @endphp
                    <div id="orderSummery">
                        @include('front.common.cart.order-summary')
                    </div>
                    @if($customerAndAddresses && $customerAndAddresses->isNotEmpty())
                        <div class="deliveryAddress123">
                            <div class="title1">
                                <strong>Delivery Address</strong>
                                <a href="#;"><img src="{{asset('front/images/edit_pen.svg')}}" alt="" /></a>
                            </div>
                            @foreach($customerAndAddresses as $address)
                                <div class="deliveryAddressInner">
                                    <label class="deliveryAddress1">
                                        <input type="radio" name="addressRadio" {{ $address->is_delivery_address ? 'checked' : '' }} />
                                        <span></span>
                                        <div>
                                            <strong>{{ $address->full_name }}</strong>
                                            <p>{{ $address->house_number }}, {{ $address->society }}, {{ $address->locality }}, {{ $address->landmark }}, {{ $address->pincode }}, {{ $address->city }}</p>
                                        </div>
                                    </label>
                                </div>
                            @endforeach
                            <div class="addDelAddress1">
                                <a href="#;">Add New Address <img src="{{asset('front/images/jam_plus.svg')}}" alt="" /></a>
                            </div>
                        </div>
                    @else
                        <div class="addAddress">
                            <div class="addressNote">
                                <img src="{{asset('front/images/info-circle.svg')}}" alt="" />
                                <p>Please add your delivery address</p>
                            </div>
                            <div class="addressNoteError">
                                <img src="{{asset('front/images/alert_svgrepo.svg')}}" alt="" />
                                <p>Please add your delivery address</p>
                            </div>
                            <button>Add Delivery Address <img src="{{asset('front/images/jam_plus.svg')}}" alt="" /></button>
                        </div>
                    @endif

                <div class="proceedBtn">
                <button id="proceedButton" data-cartid="{{$cartProducts[0]->id}}">Proceed to Pay</button>

                    <!-- <form id="razorpay-form" action="{{ route('order.create') }}" method="POST">
                        <input type="hidden" id="total-hidden" value="{{ $total }}" name="total" />
                        <input type="hidden" value="{{ $subTotal }}" name="subTotal" />
                        <input type="hidden" value="{{ $cartId }}" name="cartId" />
                        @csrf
                        <script id="razorpay-script" src="https://checkout.razorpay.com/v1/checkout.js"
                            data-key="{{ env('RAZORPAY_KEY') }}"
                            data-amount="{{ $total * 100 }}"
                            data-buttontext="Proceed to Pay"
                            data-name="Arogyabharat"
                            data-description="Arogya bharat"
                            data-image="{{ asset('/front/images/arogya_bharat.svg') }}"
                            data-prefill.name="test"
                            data-prefill.email="test@test.com"
                            data-theme.color="#ff7529">
                        </script>
                    </form> -->
                </div>
            </div>
        </div>
        @endif
    </div>

    <div class="addressFormPop winScrollStop">
        <div class="addressFormPopMiddle">
            <div class="addressFormPopInner">
                <a href="#;"><img src="{{asset('front/images/cross.svg')}}" alt="" /> </a>
                <h4>Add New Address</h4>
                <p>Please enter pin code to get current location.</p>
                <form id="addressForm">
                    <div class="inputMainBlock fullwidth">
                        <span>Flat,House no, Building, Company, Apertment  </span>
                        <input type="text" name="house_number" class="AnyValueVD" placeholder="004">
                        <div class="errormsg">Please enter Flat,House no, Building, Company, Apertment</div>
                    </div>
                    <div class="inputMainBlock fullwidth">
                        <span>Area, Street, Sector, Village</span>
                        <input type="text" name="society_name" class="AnyValueVD" placeholder="XYZ">
                        <div class="errormsg">Please enter Area, Street, Sector, Village</div>
                    </div>
                    <div class="inputMainBlock fullwidth">
                        <span>Landmark</span>
                        <input type="text" name="landmark" class="AnyValueVD" placeholder="XYZ">
                        <div class="errormsg">Please enter Landmark</div>
                    </div>
                    <!-- <div class="inputMainBlock fullwidth">
                        <span>Locality</span>
                        <input type="text" name="locality" class="AnyValueVD" placeholder="XYZ">
                        <div class="errormsg">Please enter Locality</div>
                    </div> -->
                    <div class="inputMainBlock fullwidth">
                        <span>Pincode</span>
                        <input type="text" name="pincode" class="AnyValueVD" placeholder="000000">
                        <div class="errormsg">Please enter Pincode</div>
                    </div>
                    <div class="inputMainBlock fullwidth">
                        <span>Town/City</span>
                        <input type="text" name="city" class="AnyValueVD" placeholder="XYZ">
                        <div class="errormsg">Please enter Town/City</div>
                    </div>
                    <div class="inputMainBlock fullwidth">
                        <span>State</span>
                        <input type="text" name="state" class="AnyValueVD" placeholder="XYZ">
                        <div class="errormsg">Please enter State</div>
                    </div>
                    <div class="checkboxPart fullwidth">
                        <button class="submitBTN">Save Address</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="offer-apply-success" style="display:none;">
        <div id="offer-html">
            @include('front.common.offer-success')
        </div>
    </div>
    <div class="offerPop winScrollStop" id="offerModal" style="display:none;">
        <div class="offerPopMiddle">
            <div class="offerPopInner">
                <a href="#;"><img src="{{ asset('front/images/cross.svg')}}" alt="" /> </a>
                <h4>Offer & Benefits</h4>
                <div class="couponInput">
                    <input type="text" id="couponCode" placeholder="Enter coupon code" />
                    <button id="applyCouponButton" >Apply</button>
                </div>
                <div class="orLine">
                    <span>OR</span>
                </div>
                <div id="offers-container">
                    @include('front.common.more-offer')
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('front/js/jquery.min.js') }}"></script>
    <script src="{{ asset('front/js/slick.js') }}"></script>
    <script src="{{ asset('front/js/script.js') }}"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        $(document).ready(function() {

            $("#addressForm .submitBTN").click(function(e) {
                e.preventDefault(); // Prevent the form from submitting normally

                // Collect form data
                var formData = {
                    house_number: $("#addressForm input[name='house_number']").val(),
                    society_name: $("#addressForm input[name='society_name']").val(),
                    locality: $("#addressForm input[name='locality']").val(),
                    landmark: $("#addressForm input[name='landmark']").val(),
                    pincode: $("#addressForm input[name='pincode']").val(),
                    city: $("#addressForm input[name='city']").val(),
                };

                // Clear previous error messages
                $(".errormsg").hide();

                // AJAX call
                $.ajax({
                    url: '/customer/save-address', // Your endpoint to handle the request
                    type: 'GET',
                    data: formData,
                    success: function(response) {
                        if (response.success) {
                            // Address saved successfully, handle the UI changes
                            $('.addressFormPop').hide();
                            $('.addAddress').hide();
                            $('.deliveryAddress').show();
                            $('body').css('overflow-y', 'auto');
                        } else {
                            // Show error messages
                            if (response.status == 401) {
                                alert(response.message);
                            } else {

                                $.each(response.errors, function(key, value) {
                                    $("#addressForm input[name='" + key + "']").next('.errormsg').text(value).show();
                                });
                            }
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle any unexpected errors
                        alert('Something went wrong. Please try again later.');
                    }
                });
            });

            $("#proceedButton").click(function(e) {
                e.preventDefault(); // Prevent the form from submitting normally

                // Get cart ID from the button data attribute
                var cartId = $(this).data('cartid');

                // Prepare data for the AJAX request
                var paymentData = {
                    cart_id: cartId,
                    _token: '{{ csrf_token() }}' // CSRF token for Laravel
                };

                // Clear previous error messages
                $(".errormsg").hide();

                // AJAX call for Razorpay payment
                $.ajax({
                    url: '{{ route('order.create') }}',
                    type: 'POST',
                    data: paymentData,
                    success: function(response) {
                        console.log(response);
                        if (response.success) {
                            // Payment successful, handle UI changes or redirection
                            alert('Payment successful!'); // Example success message
                            // Redirect or update UI as needed
                            payAmount(response.amount,response.order_id,response.customer);
                        } else {
                            // Show error messages
                            alert(response.message || 'Payment failed. Please try again.');
                        }
                    },
                    error: function(xhr, status, error) {
                        if (xhr.status == 401) {
                            var response = JSON.parse(xhr.responseText);
                            toastr.error(response.message);
                        } else if(xhr.status == 404) {
                            var response = JSON.parse(xhr.responseText);
                            toastr.error(response.message);
                        }
                         else {
                            toastr.error('Something went wrong with the payment. Please try again later.');
                        }
                    }
                });
            });

            //based on tenure
            // Add event listener to tenure radio buttons
            $("input[name='tenure']").change(function() {
                var selectedTenure = $("input[name='tenure']:checked").val();

                // Alert the selected tenure value
                alert("Selected tenure: " + selectedTenure);

                // Hide all list items initially within the `.cart-items` container
                $(".cart-items li").hide();

                // Based on tenure, show the respective list items
                if (selectedTenure === "week_1") {
                    // Show the first list item for 1 week
                    $(".cart-items li").eq(3).show();
                    $(".cart-items #week").show();
                } else if (selectedTenure === "week_2") {
                    // Show the first two list items for 2 weeks
                    $(".cart-items li").eq(0).show();
                    $(".cart-items li").eq(3).show();
                } else if (selectedTenure === "week_3") {
                    // Show the first three list items for 3 weeks
                    $(".cart-items li").eq(0).show();
                    $(".cart-items li").eq(1).show();
                    $(".cart-items li").eq(2).show();
                } else if (selectedTenure === "month_1") {
                    // Show the first list item for 1 month
                    $(".cart-items #month").show();
                } else if (selectedTenure === "month_3") {
                    // Show the first three list items for 3 months
                    $(".cart-items li").eq(0).show();
                    $(".cart-items li").eq(1).show();
                    $(".cart-items li").eq(2).show();
                } else if (selectedTenure === "month_6") {
                    // Show the first three list items for 6 months (if you have more than 3)
                    $(".cart-items li").eq(0).show();
                    $(".cart-items li").eq(1).show();
                    $(".cart-items li").eq(2).show();
                } else if (selectedTenure === "month_9") {
                    // Show the first three list items for 9 months (if available)
                    $(".cart-items li").eq(0).show();
                    $(".cart-items li").eq(1).show();
                    $(".cart-items li").eq(2).show();
                } else if (selectedTenure === "month_12") {
                    // Show all list items for 12 months
                    $(".cart-items li").show();
                }
            });


            $('#applyCouponButton').click(function(e) {
                e.preventDefault();

                // Get the coupon code entered by the user
                var couponCode = $('#couponCode').val();

                if (couponCode === "") {
                    alert("Please enter a coupon code.");
                    return;
                }

                // Perform the AJAX POST request to apply the coupon code
                $.ajax({
                    url: "{{ route('applycouponcode') }}", // The route for applying the coupon
                    type: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}", // CSRF token for security
                        couponCode: couponCode // Coupon code entered by the user
                    },
                    success: function(response) {
                        if (response.success) {
                            alert(response.message);
                            // Perform additional actions, such as updating the cart or showing a modal
                            // $('#offerModal').hide();
                            $('.flatDicountPop').css('display', 'flex');
                        } else {
                            alert(response.message); // Display error message if any
                        }
                    },
                    error: function(xhr, status, error) {
                        alert('Something went wrong. Please try again later.');
                    }
                });
            });
        });

        $('#searchInput').on('keyup', function() {
            var query = $(this).val(); // Get the input value

            if (query.length >= 2) { // Trigger search when at least 2 characters are entered
                $.ajax({
                    url: "{{ route('search.products') }}", // Your route to search products
                    type: 'GET',
                    data: {
                        query: query // Send the input as a query parameter
                    },
                    success: function(response) {
                        if (response.success === false) {
                            $('#searchResultList').html('<li>No products found.</li>');
                        } else {
                            $('#searchResultList').html(response); // Render the results
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        $('#searchResultList').html('<li>Something went wrong.</li>');
                    }
                });
            } else {
                $('#searchResultList').empty(); // Clear results if query length is less than 2
            }
        });

        function updateQuantity(cartItemId, cartId ,action) {
            $.ajax({
                url: "{{ route('cart.update-quantity') }}",
                type: 'POST',
                data: {
                    cartId: cartId,
                    cartItemId: cartItemId,
                    action: action,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        $('#quantity-' + cartItemId).text(response.newQuantity);
                        $('#orderSummery').html(response.orderSummaryResponse); 
                    } else {
                        alert(response.message);
                    }
                },
                error: function(xhr, status, error) {
                    alert('Something went wrong. Please try again later.');
                }
            });
        }

        function deleteCartItem(cartItemId) {
            if (confirm('Are you sure you want to delete this item from the cart?')) {
                $.ajax({
                    url: "{{ route('cart.delete-item', '') }}/" + cartItemId, // Adjust the route as needed
                    type: 'DELETE', // Use DELETE method
                    data: {
                        _token: '{{ csrf_token() }}' // Include CSRF token for Laravel
                    },
                    success: function(response) {
                        if (response.success) {
                            alert('Item deleted successfully.');
                            $('#cart-items').html(response.cartItmes);
                            $('#orderSummery').html(response.orderSummaryResponse);
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        alert('Something went wrong. Please try again later.');
                    }
                });
            }
        }


        function applyOffer(element) {
                var cartId = $(element).data('cart-id');
                var couponCode = $(element).data('coupon-code');

                $.ajax({
                    url: "{{ route('applycoupon') }}",
                    type: 'POST',
                    data: {
                        cartId: cartId,
                        couponCode: couponCode,
                        _token: '{{ csrf_token() }}' 
                    },
                    success: function(response) {
                        if (response.success) {
                            alert(response.message);
                            $('#orderSummery').html(response.orderSummaryResponse);
                            $('#apply-' + couponCode).hide();
                            $('#removeDiscount-' + couponCode).show();
                            $('.offer-apply-success').show();
                            $('#offer-html').html(response.couponHtml);
                            $('.flatDicountPop').css('display', 'flex');
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        alert('Something went wrong. Please try again later.');
                    }
                });
            }




        function removeOffer(element) {
            var cartId = $(element).data('cart-id');
            var couponCode = $(element).data('coupon-code');
            $.ajax({
                url: "{{ route('removecoupon', '') }}",
                type: 'POST',
                data: {
                    cartId: cartId,
                    couponCode: couponCode,
                    _token: '{{ csrf_token() }}' // Include CSRF token for Laravel
                },
                success: function(response) {
                    if (response.success) {
                        $('#orderSummery').html(response.orderSummaryResponse);
                        $('#apply-' + couponCode).show();
                        $('#removeDiscount-' + couponCode).hide();
                        alert(response.message);
                    } else {
                        alert(response.message);
                    }
                },
                error: function(xhr, status, error) {
                    alert('Something went wrong. Please try again later.');
                }
            });
        }

        // Initialize with the total amount from server
        let selectedProductsTotal = parseFloat(document.getElementById('total-hidden').value.replace('₹', '').trim());

        function cartItemChange(event, cartItemId, cartId) {
            const isVisible = event.target.checked ? 1 : 0; // 1 for checked, 0 for unchecked

            $.ajax({
                url: "{{ route('cart.update-visibility') }}",
                type: 'POST',
                data: {
                    cartId: cartId,
                    cartItemId: cartItemId,
                    is_visible: isVisible,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        console.log('Visibility updated successfully.');
                        $('#orderSummery').html(response.orderSummaryResponse);
                    } else {
                        alert(response.message);
                    }
                },
                error: function(xhr, status, error) {
                    alert('Something went wrong. Please try again later.');
                }
            });
        }


        function updateRazorpayAmount(amount) {
            // Update Razorpay or payment gateway amount logic here
            console.log(`Updated Razorpay amount: ₹ ${amount.toFixed(2)}`);
        }


        function updateRazorpayAmount(amount) {
            const razorpayScript = document.getElementById('razorpay-script');
            console.log('razorpayScript', razorpayScript);
            razorpayScript.setAttribute('data-amount', amount * 100);
            console.log('razorpayScript--------------------------', razorpayScript);
            console.log("Updated Razorpay amount to: ₹", amount);
        }

        function getMoreOffers() {
            $.ajax({
                url: "{{ route('getcoupons') }}",
                type: 'GET',
                success: function(response) {
                    console.log(response);
                    $("#offers-container").html(response);
                    $("#offerModal").show();
                },
                error: function(xhr, status, error) {
                    alert('Something went wrong. Please try again later.');
                }
            });
        }

        function payAmount(amount,order_id,customer) {
        var options = {
            "key": "{{env('RAZORPAY_KEY')}}", 
            "amount": amount,
            "currency": "INR",
            "name": "Arogya Bharat",
            "description": "Test Transaction",
            "image": "https://example.com/your_logo",
            "order_id": order_id,
            "callback_url": "https://eneqd3r9zrjok.x.pipedream.net/",
            "prefill": {
                "name": customer.name,
                "email": customer.email,
                "contact": customer.mobile
            },
            "theme": {
                "color": "#FFCC5C"
            }
        };
            var rzp1 = new Razorpay(options);
            rzp1.open();
        }

    </script>
</section>
@endsection('content')