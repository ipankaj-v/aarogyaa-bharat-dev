
<div class="addressFormPop winScrollStop">
<div class="addressFormPopMiddle">
        <div class="addressFormPopInner">
            <a href="#;" onClick="hideAddressPop()"><img src="{{asset('front/images/cross.svg')}}" alt="" /> </a>
            <h4> Add Address</h4>
            <p>Please enter pin code to get current location.</p>
            <form id="addressForm"> 
            <input type="hidden" name="uuid" id="uuid" value="">

            <!-- House Number -->
            <div class="inputMainBlock fullwidth">
                <span>House Number</span>
                <input type="text" class="AnyValueVD" placeholder="004" name="house_number" value="">
                <div class="errormsg house_numberError">Please enter House Number</div>
            </div>

            <!-- Society Name -->
            <div class="inputMainBlock fullwidth">
                <span>Society Name</span>
                <input type="text" class="AnyValueVD" placeholder="XYZ" name="society_name" value="">
                <div class="errormsg societyError">Please enter Society Name</div>
            </div>

            <!-- Locality -->
            <div class="inputMainBlock fullwidth">
                <span>Locality</span>
                <input type="text" class="AnyValueVD" placeholder="XYZ" name="locality" value="">
                <div class="errormsg localityError">Please enter Locality</div>
            </div>

            <!-- Landmark -->
            <div class="inputMainBlock fullwidth">
                <span>Landmark</span>
                <input type="text" class="AnyValueVD" placeholder="XYZ" name="landmark" value="">
                <div class="errormsg landmarkError">Please enter Landmark</div>
            </div>

            <!-- Pincode -->
            <div class="inputMainBlock fullwidth">
                <span>Pincode</span>
                <input type="text" class="AnyValueVD" placeholder="000000" name="pincode" value="">
                <div class="errormsg pincodeError">Please enter Pincode</div>
            </div>

            <!-- City -->
            <div class="inputMainBlock fullwidth">
                <span>City</span>
                <input type="text" class="AnyValueVD" placeholder="XYZ" name="city" value="">
                <div class="errormsg cityError">Please enter City</div>
            </div>

            <!-- State -->
            <div class="inputMainBlock fullwidth">
                <span>State</span>
                <input type="text" name="state" class="AnyValueVD" placeholder="XYZ" value="">
                <div class="errormsg">Please enter State</div>
            </div>

            <!-- Set as Delivery -->
            <div class="inputMainBlock fullwidth">
                <span>Set as delivery</span>
                <input type="checkbox" name="delivery" class="AnyValueVD" id="DA">
                <div class="errormsg">Please select delivery option</div>
            </div>
                <div class="checkboxPart fullwidth"> 
                    <button class="submitBTN" type="submit" onClick="updateAddress(event)">Save Address</button>
                </div>
            </form>
        </div>
    </div>
</div>
 


