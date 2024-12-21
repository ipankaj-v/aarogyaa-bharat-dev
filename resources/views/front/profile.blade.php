@extends('front.layouts.layout')
@section('content')

<div class="searchPop winScrollStop">
    <div class="searchPopBlock">
        <strong>Recent Search</strong>
        <p>Our highest rented or buying products.</p>
        <ul>
            <li>
                <a href="#;">
                    <img src="{{ asset('front/images/search_fil.svg')}}" alt="" />
                    <p>Long product name</p>
                    <img src="{{ asset('front/images/curly_arrow.svg')}}" alt="" /> 
                </a>
            </li>
            <li>
                <a href="#;">
                    <img src="{{ asset('front/images/search_fil.svg')}}" alt="" />
                    <p>Product name</p>
                    <img src="{{ asset('front/images/curly_arrow.svg')}}" alt="" /> 
                </a>
            </li>
            <li>
                <a href="#;">
                    <img src="{{ asset('front/images/search_fil.svg')}}" alt="" />
                    <p>Product</p>
                    <img src="{{ asset('front/images/curly_arrow.svg')}}" alt="" /> 
                </a>
            </li>
            <li>
                <a href="#;">
                    <img src="{{ asset('front/images/search_fil.svg')}}" alt="" />
                    <p>Small product name</p>
                    <img src="{{ asset('front/images/curly_arrow.svg')}}" alt="" /> 
                </a>
            </li>
        </ul>
        
        <div class="popPro">
        <strong>Popular Products</strong>
        <a href="#;">Long product name <img src="{{ asset('front/images/curly_arrow.svg')}}" alt="" /></a>
        <a href="#;">product name <img src="{{ asset('front/images/curly_arrow.svg')}}" alt="" /></a>
        <a href="#;">product <img src="{{ asset('front/images/curly_arrow.svg')}}" alt="" /></a>
        <a href="#;">Small product name <img src="{{ asset('front/images/curly_arrow.svg')}}" alt="" /></a>
        <a href="#;">Name of product <img src="{{ asset('front/images/curly_arrow.svg')}}" alt="" /></a>
        <a href="#;">Popular product name  <img src="{{ asset('front/images/curly_arrow.svg')}}" alt="" /></a>
        </div>
    </div>
</div>

<div class="breadcrumbs">
    <div class="container">
        <ul>
            <li><a href="#;">Home</a> </li>
            <li><a href="#;">Profile</a> </li>
        </ul>
    </div>    
</div>
    
<section class="profilePart">
    <div class="container">
        <div class="row18">
            <div class="profilePaddL">
                <div class="profileBlock">
                    <div class="profileTag_name">
                    @php
                        $nameParts = explode(' ', $customerDetail->name);
                        $initials = array_map(function($part) {
                            return strtoupper($part[0]); 
                        }, $nameParts);
                        $formattedName = implode('', $initials);
                    @endphp

                        <div class="profileTag">{{ $formattedName }}</div>
                        <div id="profileDetails">
                            @include('front.common.profile-detail')
                        </div>
                    </div>
                    <div class="helpBlock">
                        <p>Need an emergency help</p>
                        <a href="https://wa.me/{{ env('HELP_LINE_NO') }}"><img src="{{asset('front/images/help_whata-app.svg')}}" alt="" /> </a>
                        <a href="tel:{{ env('HELP_LINE_NO') }}"><img src="{{asset('front/images/help_call.svg')}}" alt="" /> </a>
                        <a href="mailto:{{ env('HELP_LINE_EMAIL') }}"><img src="{{asset('front/images/help_mail.svg')}}" alt="" /> </a>
                    </div>
                </div>
            </div>
            <div class="profilePaddR">
                <div class="profileBlock">
                    <div class="profileAccor">
                        <div>
                            <div class="profileAccorClick">
                                <img src="{{asset('front/images/my_addresses.svg')}}" alt="" class="icon1" />
                                <p>My Addresses</p>
                                <img src="{{asset('front/images/rightArrow.svg')}}" alt="" class="arrow1" />
                            </div>
                            <div class="profileAccorAns" id="customerAdress">
                                <div class="profileAccorAnsTtl">
                                    <strong>My Addresses</strong>
                                    <a href="#;" class="js-addadresspopup">Add New Address <img src="{{asset('front/images/jam_plus.svg')}}" alt="" /> </a>
                                </div>
                                <div id="addressList">
                                    @include('front.common.customer-address')
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="profileAccorClick">
                                <img src="{{asset('front/images/order_info.svg')}}" alt="" class="icon1" />
                                <p>Order Info</p>
                                <img src="{{asset('front/images/rightArrow.svg')}}" alt="" class="arrow1" />
                            </div>
                            <div class="profileAccorAns">
                                <div class="orderinfo_title">
                                    <h2>Order Info</h2>
                                </div>
                                <div class="filter">
                                    <div class="filtertitle"><p>Filter</p><img src="{{asset('front/images/Filter.svg')}}" alt="" /></div>
                                    <ul>
                                        @foreach($statuses as $status)
                                            <li>
                                                <a  onClick="changeStatusTab('{{ $status->id }}')">
                                                    <span>{{ $status->name }}</span>
                                                    <img src="{{ asset('front/images/Vector_plus.svg') }}" alt="" />
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div id="orders">
                                    @include('front.common.customer-orders')
                                </div>
                            </div>
                        </div>
                        <div>
                            <a href="{{route('terms.and.conditions')}}" class="profileAccorClick">
                                <img src="{{asset('front/images/terms_condition.svg')}}" alt="" class="icon1" />
                                <p>Terms & Condition</p> 
                            </a>
                        </div>
                        <div>
                        <a  class="profileAccorClick" onclick="confirmLogout();">
                                <img src="{{ asset('front/images/logout.svg') }}" alt="" class="icon1" />
                                <p>Logout</p>
                            </a>
                            <form id="logout-form" action="{{ route('customer.logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                        <div>
                            <div class="needaneme">
                                <h2>Need an emergency help</h2>
                                <a href="tel:{{ env('HELP_LINE_NO') }}" class="phone_eme"><img src="{{asset('front/images/phone_call.svg')}}"><p>{{ env('HELP_LINE_NO') }}</p><span>Call Now</span></a>
                                <a href="mailto:{{ env('HELP_LINE_EMAIL') }}" class="mail_eme"><img src="{{asset('front/images/mail.svg')}}"><p>{{ env('HELP_LINE_EMAIL') }}</p></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </div>
</section>
<div class="locationPop winScrollStop">
    <div class="locationBlock">
        <a href="#;"><img src="{{asset('front/images/cross.svg')}}" alt="" /></a>
        <h4>Select Delivery Location</h4>
        <p>Please enter pin code to get current location.</p>
        <div class="inputPart">
            <input type="text" placeholder="Enter pin code" />
            <a href="#;">Check</a>
        </div>
        <div class="currLoc">
            <img src="{{asset('front/images/pin.svg')}}" alt="" />
            <a href="#;">Select Current Location</a>
        </div>
        <button>Get Location</button>
    </div>
</div>
 
<div class="areyousurePop winScrollStop">
    <div class="areyousureBlock">
        <a href="#;"><img src="{{asset('front/images/cross.svg')}}" alt="" /></a>
        <strong>Are you sure want to cancel order?</strong>
        <div class="btnpop">
            <a href="#;">Yes</a>
            <a href="#;">No</a>
        </div>
    </div>
</div>

<div class="addressFormPop winScrollStop">
    <div class="addressFormPopMiddle">
        <div class="addressFormPopInner">
            <a href="#;"><img src="{{asset('front/images/cross.svg')}}" alt="" /> </a>
            <h4>Add New Address</h4>
            <p>Please enter pin code to get current location.</p>
            <form id="addressForm"> 
                <div class="inputMainBlock fullwidth">
                    <span>House Number</span>
                    <input type="text" class="AnyValueVD" placeholder="004" name="house_number"> 
                    <div class="errormsg house_numberError">Please enter House Number</div>
                </div> 
                <div class="inputMainBlock fullwidth">
                    <span>Society Name</span>
                    <input type="text" class="AnyValueVD" placeholder="XYZ" name="society"> 
                    <div class="errormsg societyError">Please enter Society Name</div>
                </div> 
                <div class="inputMainBlock fullwidth">
                    <span>Locality</span>
                    <input type="text" class="AnyValueVD" placeholder="XYZ" name="locality"> 
                    <div class="errormsg localityError">Please enter Locality</div>
                </div> 
                <div class="inputMainBlock fullwidth">
                    <span>Landmark</span>
                    <input type="text" class="AnyValueVD" placeholder="XYZ" name="landmark"> 
                    <div class="errormsg landmarkError">Please enter Landmark</div>
                </div> 
                <div class="inputMainBlock fullwidth">
                    <span>Pincode</span>
                    <input type="text" class="AnyValueVD" placeholder="000000" name="pincode"> 
                    <div class="errormsg pincodeError">Please enter Pincode</div>
                </div>
                <div class="inputMainBlock fullwidth">
                    <span>City</span>
                    <input type="text" class="AnyValueVD" placeholder="XYZ" name="city"> 
                    <div class="errormsg cityError">Please enter City</div>
                </div>
                <div class="checkboxPart fullwidth"> 
                    <button class="submitBTN" type="submit" onClick="addAddress(event)">Save Address</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="updateprofilePop winScrollStop">
    <div class="updateprofilePopMiddle">
        <div class="updateprofilePopInner">
            <a href="#;"><img src="{{asset('front/images/cross.svg')}}" alt=""> </a>
            <h4>Update Profile</h4>
            <p>You can update you profile details here</p>
            <form id="updatepro">
                <div class="inputMainBlock fullwidth">
                    <span>Full Name<i>*</i></span>
                    <input type="text" class="FullNameVD" name="full_name"  value="{{$customerDetail->name}}" placeholder="Full Name"> 
                    <div class="errormsg full_nameError"></div> <!-- Error message container -->
                </div>
                <div class="inputMainBlock fullwidth">
                    <span>E-mail ID<i>*</i></span>
                    <input type="text" class="emailVD" name="email" placeholder="example@gmail.com" value="{{$customerDetail->email}}"> 
                    <div class="errormsg emailError"></div> <!-- Error message container -->
                </div>
                <div class="inputMainBlock fullwidth">
                    <span>Mobile Number<i>*</i></span>
                    <input type="text" class="mobileVD" name="mobile" placeholder="00000 00000" value="{{$customerDetail->mobile}}"> 
                    <div class="errormsg mobileError"></div> <!-- Error message container -->
                </div>
                <div class="inputMainBlock fullwidth">
                    <span>City<i>*</i></span>
                    <input type="text" class="AnyValueVD" name="city" placeholder="City" value="{{$customerDetail->city}}"> 
                    <div class="errormsg cityError"></div> <!-- Error message container -->
                </div>
                <div class="checkboxPart fullwidth"> 
                    <button type="submit" class="submitBTN" onClick="updateProfile()">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="{{ asset('front/js/jquery.min.js') }}"></script>
<script src="{{ asset('front/js/slick.js') }}"></script>
<script src="{{ asset('front/js/script.js') }}"></script>
<script>
$(document).ready(function() {
    $('#updatepro').on('submit', function(event) {
        alert();
        event.preventDefault(); // Prevent the default form submission

        // Clear previous error messages
        $('.errormsg').text('');

        // Gather form data using the FormData object
        var formData = $(this).serialize(); // Serialize form data
        var _token = '{{@csrf_token()}}'; // Serialize form data

        // Perform the AJAX request
        $.ajax({
            type: 'POST',
            url: '{{ route("customers.profile.update") }}', // Use Laravel route helper
            data: formData,
            success: function(response) {
                // Handle success
                alert('Profile updated successfully!');
                $('#updatepro')[0].reset(); // Optionally reset the form
            },
            error: function(xhr) {
                // Clear previous error messages
                $('.errormsg').text('');
                
                // Handle error - display validation errors
                var errors = xhr.responseJSON.errors;
                
                // Loop through the errors and show them under the respective fields
                for (var field in errors) {
                    $('.' + field + 'Error').text(errors[field][0]);
                }
            }
        });
    });
});

    function updateProfile(event) {
        // event.preventDefault(); // Prevent the default form submission

        // Gather form data
        var formData = {
            full_name: $('input[name="full_name"]').val(),
            email: $('input[name="email"]').val(),
            mobile: $('input[name="mobile"]').val(),
            city: $('input[name="city"]').val(),
        };
        $('.errormsg').text('');
        $.ajax({
            url: "{{route('customers.profile.update')}}", // Update with your endpoint
            type: 'GET',
            data: formData,
            success: function(response) {
                // Handle success response
                $('.errormsg').text('');
                $('#profileDetails').html(response.html);
                $('.updateprofilePop').hide(); 
                alert('Profile updated successfully!');
                // Optionally, you can update the UI or redirect
            },
            error: function(xhr) {
                if (xhr.status === 422) { // Unprocessable Entity
                var errors = xhr.responseJSON.errors;
                // Clear previous error messages
                $('.errormsg').text(''); 
                $.each(errors, function(key, value) {
                    console.log('key: ' + key);
                    console.log('value: ', value);
                    
                    // Check if value is an array or a single string
                    var errorMessage = Array.isArray(value) ? value[0] : value;
                    $('.' + key + 'Error').text(errorMessage); // Display the error message
                });
            } else {
                $('.errormsg').text('');
                alert('An error occurred. Please try again.');
            }
            }
        });
    }
    function addAddress(event) {
    // event.preventDefault(); // Prevent the default form submission

    // Gather form data
    var formData = {
        house_number: $('input[name="house_number"]').val(),
        society: $('input[name="society"]').val(),
        locality: $('input[name="locality"]').val(),
        landmark: $('input[name="landmark"]').val(),
        pincode: $('input[name="pincode"]').val(),
        city: $('input[name="city"]').val(),
    };

    // Clear previous error messages
    $('.errormsg').text('');

    $.ajax({
        url: "{{ route('customers.address.add') }}", // Update with your endpoint
        type: 'GET', 
        data: formData,
        success: function(response) {
            $('.errormsg').text('');
            $('#addressList').html(response.html); // Assuming you have an element to update with the new address list
            alert('Address added successfully!');
        },
        error: function(xhr) {
            if (xhr.status === 422) { // Unprocessable Entity
                var errors = xhr.responseJSON.errors;
                // Clear previous error messages
                $('.errormsg').text(''); 
                $.each(errors, function(key, value) {
                    console.log('key: ' + key);
                    console.log('value: ', value);
                    
                    // Check if value is an array or a single string
                    var errorMessage = Array.isArray(value) ? value[0] : value;
                    $('.' + key + 'Error').text(errorMessage); // Display the error message
                });
            } else {
                $('.errormsg').text('');
                alert('An error occurred. Please try again.');
            }
        }
    });
}

function confirmLogout() {
    Swal.fire({
        title: 'Are you sure?',
        text: "You will be logged out!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, logout!',
        cancelButtonText: 'No, cancel!'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('logout-form').submit();
        }
    });
}

function changeStatusTab(statusId) {
        $.ajax({
            url: '{{ route('customer.orderStatusWise', ':id') }}'.replace(':id', statusId),
            method: 'GET',
            success: function(response) {
                $('#orders').html(response.customerDetailHtml);
            },
            error: function(xhr) {
                console.error(xhr.responseText);
                alert('An error occurred while fetching orders.');
            }
        });
    }
</script>
@endsection('content')