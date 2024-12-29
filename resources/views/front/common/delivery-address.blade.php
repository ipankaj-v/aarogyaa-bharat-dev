

@if($customerAndAddresses && $customerAndAddresses->isNotEmpty())
                        <div class="deliveryAddress123">
                            <div class="title1">
                                <strong>Delivery Address</strong>
                                <a href="javascript:void(0)" onclick="editDeliveryAddress({{$customerAndAddresses[0]->id}})"><img src="{{asset('front/images/edit_pen.svg')}}" alt="" /></a>
                            </div>
                            @foreach($customerAndAddresses as $address)
                                <div class="deliveryAddressInner">
                                    <label class="deliveryAddress1">
                                        <input type="radio" name="addressRadio" {{ $address->is_delivery_address ? 'checked' : '' }} />
                                        <span></span>
                                        <div>
                                            <strong>{{ $address->full_name }}</strong>
                                            <p>{{ $address->house_number ? $address->house_number . ',' : '' }}
                                                {{ $address->society_name ? $address->society_name . ',' : '' }}
                                                {{ $address->locality ? $address->locality . ',' : '' }}
                                                {{ $address->landmark ? $address->landmark . ',' : '' }}
                                                {{ $address->pincode ? $address->pincode . ',' : '' }}
                                                {{ $address->city ? $address->city : '' }}
                                                {{ $address->state ? $address->state : '' }}
                                            </p>
                                        </div>
                                    </label>
                                </div>
                            @endforeach
                            <div class="addDelAddress1">
                                <a href="javascript:void(0)" onclick="addNewDeliveryAddress()">Add New Address <img src="{{asset('front/images/jam_plus.svg')}}" alt="" /></a>
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