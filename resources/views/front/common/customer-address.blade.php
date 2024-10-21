@if($customerDetail->addresses && $customerDetail->addresses->isNotEmpty())
    @foreach($customerDetail->addresses as $address)
        <div class="deliveryAddressInner">
            <label class="deliveryAddress1">
            <input type="radio" name="addressRadio" value="{{ $address->id }}" {{ $address->is_delivery_address ? 'checked' : '' }}>
                <span></span>
                <div>
                    <strong>{{ $customerDetail->name }}</strong>
                    <p>{{ $address->house_number }}, {{ $address->house_number }}, {{ $address->society_name }}, {{ $address->locality }}, {{ $address->landmark }}, {{ $address->pincode }},
                    {{ $address->city }}
                    </p> <!-- Adjust the field name as necessary -->
                </div>
            </label>
            <div class="edit_remove">
                <a href="#;" class="edit_box">Edit</a>
                <a href="#;" class="remove_box">Remove</a>
            </div>
        </div>
    @endforeach
@else
    <p>No delivery addresses available.</p>
@endif