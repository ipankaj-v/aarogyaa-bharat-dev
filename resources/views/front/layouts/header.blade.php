<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui">
    <meta name="description" content="page description">
    @if(isset($seoMetaTagTitle))
    <meta name="title" content="{{$seoMetaTagTitle}}">
    @endif
    @if(isset($seoMetaTag))
    <meta name="description" content="{{$seoMetaTag}}">
    @endif
    <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->

    <title>Arogya bharat
    @if(isset($seoMetaTagTitle))
       {{$seoMetaTagTitle}}
    @endif
    @if(isset($seoMetaTag))
      {{$seoMetaTag}}
    @endif

    </title>

    <link rel="stylesheet" href="{{ asset('front/css/slick.css') }}" type="text/css" media="screen" />
    <link rel="stylesheet" href="{{ asset('front/css/slick-theme.css') }}" type="text/css" media="screen" />
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}" type="text/css" media="screen" />
    <link rel="stylesheet" href="{{ asset('front/css/sweetalert.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/toaster.css') }}">
    <link rel="icon" href="{{ asset('front/images/Favicon.svg') }}" type="image/x-icon">
</head>

<body class="bodyback">

    <header>
        <div class="container">
            <div class="headerBlock">
                <a href="{{ route('home') }}" class="logoPart">
                    <img src="{{ asset('front/images/arogya_bharat.svg') }}" alt="">
                </a>
                <ul class="menuList">
                    <li class="{{ Route::currentRouteName() == 'home' ? 'active' : '' }}"><a href="{{ route('home') }}">Home</a></li>
                    <li class="{{ Route::currentRouteName() == 'products' ? 'active' : '' }}"><a href="{{ route('products') }}">Products</a></li>
                    <li><a href="{{ route('home') }}#offer_Part" class="{{ Route::currentRouteName() == 'home#offer_Part' ? 'active' : '' }}">Offers</a></li>
                    <li><a href="{{route('customer.about.us')}}">About</a></li>
                </ul>
                @if(Auth::check() && Auth::user()->hasRole('Customer'))
                <div class="loginBtn">
                @php    
                $fullName = Auth::user()->name;
                $nameParts = explode(' ', $fullName);
                $firstName = ucfirst(strtolower($nameParts[0]));
                @endphp
                <a href="{{route('customers.profile')}}">Hi {{ $firstName }}</a>
                </div>
                @else
                <div class="loginBtn">
                    <button>Login</button>
                </div>
                @endif
                <ul class="cartsUl">
                    <li>
                        <a class="notificationpopupjs"> <img src="{{ asset('front/images/notification.svg') }}" alt="notification"></a>
                    </li>
                    <li>
                    @if(Auth::check() && Auth::user()->hasRole('Customer'))
                        <!-- Display Cart Link -->
                        <a href="{{route('cart')}}"><img src="{{ asset('front/images/cart.svg') }}" alt=""><span>{{$cartProductCount ?? 0}}</span></a>
                    @else
                        <!-- Trigger Login Popup -->
                        <a href="javascript:void(0)" class="trigger-login-popup"><img src="{{ asset('front/images/cart.svg') }}" alt=""><span>{{$cartProductCount ?? 0}}</span></a>
                    @endif
                    </li>
                </ul>
                <div id="customerlocationPin">
                    @include('front.common.customer-pin')
                </div>
                <div class="SearchBlock">
                    <div>
                        <button><img src="{{ asset('front/images/search.svg') }}" alt=""></button>
                        <input type="text" id="searchInput" placeholder="Search">
                        <a href="#"><img src="{{ asset('front/images/search_arrow.svg') }}" alt=""> </a>
                    </div>
                    <a href="#;"><img src="{{ asset('front/images/cross.svg') }}" alt="" /> </a>
                </div>

            </div>
        </div>
    </header>
    <div class="searchPop winScrollStop">
        <div class="searchPopBlock">
            <strong>Recent Search</strong>
            <p>Our highest rented or buying products.</p>
            <ul id="searchResultList">
                @include('front.common.search-product-result')
            </ul>
        </div>
    </div>
    <div id="notification-pop">
        
    </div>

    <!-- use re-captcha route  -->
    <form id="demo-form">

    @csrf
    <button class="g-recaptcha" 
            data-sitekey="{{ env('GOOGLE_RECATCHA_SITE_KEY') }}" 
            data-callback="onSubmit">Submit
    </button>
</form>
    <script src="{{ asset('front/js/jquery.min.js') }}"></script>
    <script src="{{ asset('front/js/script.js') }}"></script>
    <script src="{{ asset('front/js/sweetalert.js') }}"></script>
    <script src="{{ asset('front/js/toaster.js') }}"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
    <script>
        $(document).ready(function() {
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
        });
        //notifications get
        $('.notificationpopupjs').click(function() {
            $.ajax({
            url: '{{ route('customer.notification') }}',
            method: 'GET',
            success: function(data) {
                if (data.notificationHtml) {
                    $('#notification-pop').html(data.notificationHtml);
                    $('.notificationPop').css('display', 'flex');
                } else {
                    alert('No notifications found.');
                }
            },
            error: function(xhr) {
                if (xhr.status === 401) {
                    alert('Please log in as a customer to see your notifications.');
                } else {
                    alert('An error occurred while fetching notifications.');
                }
            }
        });
        });
        $('.notificationBlock > a').click(function(){
            $('.notificationPop').hide();
        });
        
        function closeonotificationPopUp() {
            $('.notificationPop').hide();
        }
        $('.trigger-login-popup').click(function(e) {
            e.preventDefault();
            $('.LoginPop').show();
        });

    </script>