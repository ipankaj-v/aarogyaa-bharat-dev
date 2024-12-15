<div id="pincodeContainer">
<div class="locationPin">
    <img src="{{ asset('front/images/pin.svg') }}" alt="" class="pin1">
    <div>
        @if(isset($userPincode) && !empty($userPincode))
            <p id="district">{{ $userPincode->district }}</p>
            <i id="state">{{ $userPincode->state }}</i>
        @else
            @if(auth()->user() && auth()->user()->roles[0]->name == 'Customer')
                @if(Auth::user()->pincode)
                    <p id="district">{{ Auth::user()->pincode->district }}</p>
                    <i id="state">{{ Auth::user()->pincode->state }}</i>
                @else
                    <p>Pune</p>
                    <i>Maharashtra</i>
                @endif
            @else
                <p>Pune</p>
                <i>Maharashtra</i>
            @endif
        @endif
    </div>
    <img src="{{ asset('front/images/downArrow.svg') }}" alt="" class="arrow1">
</div>
</div>