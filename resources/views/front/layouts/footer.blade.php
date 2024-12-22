<footer class="myfooter">
    <div class="container">
        <div class="all_footer_parts">
            <div class="footer_acco_box">
                <div class="acco_click"><a href="#;">
                        <p>Quick links</p><img src="{{asset('front/images/upArrow.svg')}}" alt="" />
                    </a></div>
                <div class="acco_text">
                    <div class="footer_links">
                        <div class="links_text">
                            <ul>
                                <li><a href="{{route('customer.about.us')}}">About</a></li>
                                <li><a href="{{route('blogs')}}">Privacy Policy</a></li>
                                <li><a href="{{route('terms.and.conditions')}}">Terms and Condtions</a></li>
                            </ul>
                        </div>
                        <div class="links_text">
                            <ul>
                                <li><a href="{{route('blogs')}}">Blogs</a></li>
                                <li><a href="{{route('faqs')}}">Frequently Asked Questions</a></li>
                                <li><a href="{{route('front.contact')}}">Contact us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer_acco_box">
                <div class="acco_click"><a href="#;">
                        <p>Popular Products</p><img src="{{asset('front/images/upArrow.svg')}}" alt="" />
                    </a></div>
                <div class="acco_text">
                    <div class="Products_tag">
                        @if(isset($popularProducts))
                        <ul>
                            @foreach ($popularProducts as $product)
                            <li>
                                <a href="{{ route('products.detail', ['slug' => $product->slug]) }}">
                                    <p>{{ $product->name }}</p>
                                    <!-- <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"> -->
                                </a>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
            </div>
            <div class="footer_acco_box">
                <div class="acco_click"><a href="#;">
                        <p>Social connects</p><img src="{{asset('front/images/upArrow.svg')}}" alt="" />
                    </a></div>
                <div class="acco_text">
                    <div class="social_connects">
                        <ul>
                            <li><a href="{{env('FACEBOOK_PAGE_URI')}}"><img src="{{asset('front/images/facebook.svg') }}" alt="" /></a></li>
                            <li><a href="{{env('INSTA_PAGE_URI')}}"><img src="{{asset('front/images/insta.svg') }}" alt="" /></a></li>
                            <li><a href="{{env('X_PAGE_URI')}}"><img src="{{asset('front/images/Xtwit.svg') }}" alt="" /></a></li>
                            <!-- <li><a href="{{env('YOUTUBE_PAGE_URI')}}"><img src="{{asset('front/images/youtube.png') }}" alt="" /></a></li> -->
                            <li><a href="{{env('WHATSAPP_PAGE_URI')}}"><img src="{{asset('front/images/whatsapp.svg') }}" alt="" /></a></li>
                        </ul>
                    </div>
                    <div class="emergency_help">
                        <h2>Need an emergency help</h2>
                        <ul>
                            <li><a href="tel:{{ env('HELP_LINE_NO') }}"><img src="{{asset('front/images/phone_call.svg') }}" alt="" />
                                    <p>{{env('HELP_LINE_NO')}}</p><span>Call Now</span>
                                </a></li>
                            <li><a href="mailto:{{ env('HELP_LINE_EMAIL') }}"><img src="{{asset('front/images/mail.svg') }}" alt="" />
                                    <p>{{env('HELP_LINE_EMAIL')}}</p>
                                </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="copyrights">
    <p>Copyrights © 2020 Aarogyaa Bharat | <a href="https://webxds.com" target="_blank" class="designer-link">Designed by WebXDS</a></p>
</div>


<div class="bottomBar">
    <ul>
        <li>
            <a href="{{ route('home') }}">
            <img src="{{ Route::currentRouteName() == 'home' ? asset('front/images/home_active.svg') : asset('front/images/home-inactive.svg') }}" alt="Home" />
                Home
            </a>
        </li>
        <li>
        <a href="{{ route('products') }}">
            <img src="{{ Request::is('products') ? asset('front/images/productbar-active.svg') : asset('front/images/productbar.svg') }}" alt="Product" />
                Product
        </a>
        </li>
        <li>
        <a href="{{ route('home') }}#offer_Part">   
        <img src="{{ Route::currentRouteName() == 'home#offer_Part' ? asset('front/images/offerbar-active.svg') : asset('front/images/offerbar.svg') }}" alt="Offers" />
                Offers
            </a>
        </li>
        <li>   
        @if(Auth::check() && Auth::user()->hasRole('Customer'))
                
                <a href="{{route('customers.profile')}}">
                <img src="{{ Request::is('profile') ? asset('front/images/profilebar-active.svg') : asset('front/images/profilebar.svg') }}" alt="Profile" />
                Profile</a>
                @endif
            <!-- <a href="profile.html">
                <img src="images/profilebar.svg" alt="" />
                Profile
            </a> -->
        </li>
    </ul>
</div>


<div class="locationPop winScrollStop">
    <div class="locationBlock">
        <a href="#;"><img src="{{asset('front/images/cross.svg')}}" alt="" /></a>
        <h4>Select Delivery Location</h4>
        <p>Please enter pin code to get current location.</p>
        <div class="inputPart">
        <input type="number" placeholder="Enter pin code" name="pin" id="pinCode"  />
        <a href="javascript:void(0)" id="checkPin">Check</a>
        <div id="success" style="color: green;">
            
        </div>
        <div id="fail" style="color: red;">
            
        </div>

        </div>
        <div class="currLoc">
            <img src="{{ asset('front/images/pin.svg') }}" alt="" />
            <a href="#;">Select Current Location</a>
        </div>
        <button id="getLocationBtn">Get Location</button>
    </div>
</div>



<div class="paymentFailedPop winScrollStop">
    <div class="paymentFailedInner">
        <a href="#;"><img src="images/cross.svg" alt="" /> </a>
        <div>
            <strong>Payment Failed</strong>
            <p>Don’t worry your money in safe!  If money was debited form your account . It will be refunded automatically in 4-5 working days.</p>
            <a href="#;">Retry Payment</a>
        </div>
    </div>
</div>





<div class="LoginPop winScrollStop">
    <div class="LoginPopMiddle">
        <div class="LoginPopInner">
            <a href="#;"><img src="{{ asset('front/images/cross.svg') }}" alt="" /> </a>
            <div class="mobForm">
                <div class="title1">
                    <strong>Lets’ Login</strong>
                    <p>Please fill below details to get account access.</p>
                </div>
                <div class="socialLogos">
                    <div>
                    <a href="{{ route('google.login') }}"><img src="{{ asset('front/images/logos_google.svg') }}" alt="" /></a>
                    </div>
                    <div>
                    <a href="{{ route('facebook.login') }}"><img src="{{ asset('front/images/facebook_logo.svg') }}" alt="" /></a>
                    </div>
                </div>
                <div class="orLine">
                    <span>OR</span>
                </div>
                <form id="loginMo" method="post" action="{{ route('customer.login') }}">
                    @csrf
                    <div class="inputMainBlock fullwidth">
                        <span>Mobile number</span>
                        <input type="tel" name="mobile" class="mobileVD" placeholder="9876543210">
                        <div class="errormsg"></div>
                        <div class="addressNote2">
                            <img src="{{ asset('front/images/info-circle.svg') }}" alt="">
                            <p>Enter your 10-digit mobile number</p>
                        </div>
                    </div>
                    <div class="checkboxPart fullwidth">
                        <button type="button" class="submitBTN">Login with OTP</button>
                    </div>
                </form>
                <!-- <form id="loginMo">
                    <div class="inputMainBlock fullwidth">
                        <span>Mobile number</span>
                        <input type="tel" class="mobileVD" placeholder="9876543210"> 
                        <div class="errormsg">Please enter Mobile number</div>
                        <div class="addressNote2">
                           <img src="{{ asset('front/images/info-circle.svg') }}" alt="">
                           <p>Enter your 10 - digit mobile number</p>
                        </div>

                    </div> 
                    <div class="checkboxPart fullwidth"> 
                        <button class="submitBTN">Login with OTP</button>
                    </div>
                </form> -->
                <p>Don’t have an account ? <a href="#;">Register Now</a> </p>
            </div>
            <div class="optForm">
                <div class="title1">
                    <strong>Verify with OTP</strong>
                    <p>Enter the OTP sent to <span id="number-section"><strong>XXXXXX9898</strong></span> <br> <a href="#;">Change Number</a> </p>
                </div>
                <form id="otp_form">
                    <div class="a_otpPart">
                        <div class="inputMainBlock fullwidth">
                            <div class="form-group">
                                <div class="otp-wrap" id="otp-inputs">
                                    <input type="number" id="codeBox1" maxlength="1" title="OTP" onfocus="onFocusEvent(1)" autocomplete="one-time-code" />
                                    <input type="number" id="codeBox2" maxlength="1" title="OTP" onfocus="onFocusEvent(2)" autocomplete="one-time-code" />
                                    <input type="number" id="codeBox3" maxlength="1" title="OTP" onfocus="onFocusEvent(3)" autocomplete="one-time-code" />
                                    <input type="number" id="codeBox4" maxlength="1" title="OTP" onfocus="onFocusEvent(4)" autocomplete="one-time-code" />
                                    <input type="number" id="codeBox5" maxlength="1" title="OTP" onfocus="onFocusEvent(5)" autocomplete="one-time-code" />
                                    <input type="number" id="codeBox6" maxlength="1" title="OTP" onfocus="onFocusEvent(6)" autocomplete="one-time-code" />
                                    <div class="errormsg">You have entered incorrect OTP</div>
                                </div>
                            </div>
                        </div>
                        <div class="a_resendOtp">
                            <p><a href="javascript:void(0)">Resend OTP</a></p>
                        </div>
                        <div class="a_countText">
                            <p> <i>00:60</i> secs</p>
                        </div>
                        <div class="checkboxPart fullwidth">
                            <div class="">
                                <label>
                                    <input type="checkbox" checked />
                                    <i></i>
                                </label>
                                I read and understand <a href="{{route('terms.and.conditions')}}">Terms and Conditions</a>.
                            </div>
                            <button class="submitBTN">Submit</button>
                        </div>
                        <a href="#;">Need Help!</a>
                    </div>
                </form>
            </div>
            <div class="registerFormPart">
                <div class="title1">
                    <strong>Register</strong>
                    <p>Please below details to get regsiter</p>
                </div>
                <form id="register_form" method="post" action="{{ route('customers.store') }}">
                    @csrf
                    <div class="inputMainBlock fullwidth">
                        <span>Full Name<i>*</i></span>
                        <input type="text" name="full_name" class="FullNameVD" placeholder="Full Name">
                        <div class="errormsg"></div>
                    </div>
                    <div class="inputMainBlock fullwidth">
                        <span>E-mail ID<i>*</i></span>
                        <input type="email" name="email" class="emailVD" placeholder="E-mail ID">
                        <div class="errormsg"></div>
                    </div>
                    <div class="inputMainBlock fullwidth">
                        <span>Mobile Number<i>*</i></span>
                        <input type="text" name="mobile" class="mobileVD" placeholder="Mobile Number">
                        <div class="errormsg"></div>
                    </div>
                    <div class="inputMainBlock fullwidth">
                        <span>City - Area<i>*</i></span>
                        <input type="text" name="city" class="AnyValueVD" placeholder="City - Area">
                        <div class="errormsg"></div>
                    </div>
                    <div class="checkboxPart fullwidth">
                        <button type="button" class="submitBTN">Submit</button>
                    </div>
                </form>

                <!-- <form id="register_form">
                    <div class="inputMainBlock fullwidth">
                        <span>Full Name<i>*</i></span>
                        <input type="tel" class="FullNameVD" placeholder="Full Name"> 
                        <div class="errormsg">Please enter Full Name</div>
                    </div> 
                    <div class="inputMainBlock fullwidth">
                        <span>E-mail ID<i>*</i></span>
                        <input type="tel" class="emailVD" placeholder="E-mail ID"> 
                        <div class="errormsg">Please enter E-mail ID</div>
                    </div> 
                    <div class="inputMainBlock fullwidth">
                        <span>Mobile Number<i>*</i></span>
                        <input type="tel" class="mobileVD" placeholder="Mobile Number"> 
                        <div class="errormsg">Please enter Mobile Number</div>
                    </div> 
                    <div class="inputMainBlock fullwidth">
                        <span>City - Area<i>*</i></span>
                        <input type="tel" class="AnyValueVD" placeholder="City - Area"> 
                        <div class="errormsg">Please enter City - Area</div>
                    </div>
                    <div class="checkboxPart fullwidth"> 
                        <button class="submitBTN">Submit</button>
                    </div>
                </form> -->
                <p>Have an account on Aarogya Bharat? <a href="#;">Login Now</a> </p>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('front/js/jquery.min.js') }}"></script>
<script src="{{ asset('front/js/slick.js') }}"></script>
<script src="{{ asset('front/js/script.js') }}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

<script>
    var mobileNumber;
    var otpUrl;
    $(document).ready(function() {

        $("#register_form .submitBTN").click(function(e) {
            e.preventDefault();
            var formData = $('#register_form').serialize();
            console.log('formData', formData);
            $.ajax({
                url: "{{ route('customers.store') }}",
                type: 'POST',
                data: formData,
                success: function(response) {
                    $('.errormsg').html('');
                    if (response.errors) {
                        $.each(response.errors, function(key, value) {
                            $('input[name="' + key + '"]').next('.errormsg').html(value[0]).css("display", "block");
                        });
                    } else {
                        alert(response.success);
                        $('#register_form')[0].reset();
                        $('.registerFormPart').hide();
                        $('.LoginPop').show();
                        $('.mobForm').show();
                        $('body').css('overflow-y', 'auto');
                    }
                },
                error: function(xhr) {
                    $('.errormsg').html('');
                    $.each(xhr.responseJSON.errors, function(key, value) {
                        $('input[name="' + key + '"]').next('.errormsg').html(value[0]).css("display", "block");
                    });
                }
            });
        });

        $("#loginMo .submitBTN").click(function(e) {
            e.preventDefault();
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            var formData = $('#loginMo').serialize();
            formData += '&_token=' + "{{ csrf_token() }}";

    $.ajax({
        url: "{{ route('customer.login') }}",
        type: 'POST',
        data: formData,
        success: function(response) {
            $('.errormsg').html('');
            if (response.errors) {
                $.each(response.errors, function(key, value) {
                    $('input[name="' + key + '"]').next('.errormsg').html(value[0]).css("display", "block");
                });
            } else {
                alert(response.success);
                $('.mobForm').hide();
                $('.optForm').show();
                count3minut('otp_form');
                mobileNumber = response.number;
                otpUrl = "{{ route('verify.otp', ['number' => ':number']) }}".replace(':number', mobileNumber);
                let maskedNumber = 'XXXXXX' + mobileNumber.slice(-4);
                $('#number-section').text(maskedNumber);
            }
        },
        error: function(xhr) {
            $('.errormsg').html('');
            $.each(xhr.responseJSON.errors, function(key, value) {
                $('input[name="' + key + '"]').next('.errormsg').html(value[0]).css("display", "block");
            });
        }
    });
    });
    $('#checkPin').on('click', function() {
        var pinCode = $('#pinCode').val();
        // Simple validation for empty input
        if (pinCode === '') {
            $('#fail').text('Please enter a pin code.');
            $('#success').text('');
            return;
        }

            $.ajax({
                url: "{{route('checkpin')}}", // Change this to your actual endpoint
                method: 'GET', // Use POST or GET as needed
                data: {
                    pin: pinCode,
                },
                success: function(response) {
                    if (response.available) {
                        $('#fail').text('');
                        $('#success').text('Delivery is available at this pincode.');
                        $('#pincodeContainer').html(response.userPincodeHtml);
                    } else {
                        $('#success').text('');
                        $('#fail').text('Undelivereable at this pincode.');
                    }
                },
                error: function() {
                    $('#result').text('An error occurred while checking the pin code.');
                }
            });
        });
    });

    //get adress from current location start
    $('#getLocationBtn').click(function() {
            if (navigator.geolocation) {
                // Use geolocation to get the current position
                navigator.geolocation.getCurrentPosition(function(position) {
                    // Get the latitude and longitude
                    var latitude = position.coords.latitude;
                    var longitude = position.coords.longitude;

                    var geocodeUrl = 'https://nominatim.openstreetmap.org/reverse?lat=' + latitude + '&lon=' + longitude + '&format=json';

                        $.get(geocodeUrl, function(data) {
                            if (data) {
                                var address = data.address;
                                $.ajax({
                                url: "{{route('save.location')}}",
                                method: 'GET',
                                data: {
                                    address: address,
                                },
                                success: function(response) {
                                    console.log('response', response);
                                    if(response.success) {
                                        toastr.success(response.message);
                                    } else {
                                        toastr.error(response.message);
                                    }
                                    $('.locationPop').hide();
                                },
                                error: function(xhr, status, error) {
                                    toastr.error(error);
                                }
                            });
                            } 
                        }).fail(function() {
                            toastr.error('Address could not be retrieved');
                        });
                }, function(error) {
                    toastr.error(error.message);
                });
            } else {
                toastr.error('Geolocation is not supported by this browser.');
            }
    });

    //get adress from current location end

        // otp timer
        var interval;
    function count3minut(otpFid) {
        var timer2 = "1:00";
        interval = setInterval(function() {
            var timer = timer2.split(':');
            var minutes = parseInt(timer[0], 10);
            var seconds = parseInt(timer[1], 10);
            --seconds;
            minutes = (seconds < 0) ? --minutes : minutes;
            seconds = (seconds < 0) ? 59 : seconds;
            seconds = (seconds < 10) ? '0' + seconds : seconds;
        
            $('#'+otpFid+' .a_otpPart .a_countText p i').html('0' + minutes + ':' + seconds);
            if (minutes < 0) clearInterval(interval);
            if ((seconds <= 0) && (minutes <= 0)) clearInterval(interval);
            timer2 = minutes + ':' + seconds;

            if ((seconds <= 0) && (minutes <= 0)) {
                $('#'+otpFid+' .a_otpPart .a_countText').hide();
                $('#'+otpFid+' .a_otpPart .a_resendOtp').show();
            }

        }, 1000);
    }
</script>

</body>

</html>