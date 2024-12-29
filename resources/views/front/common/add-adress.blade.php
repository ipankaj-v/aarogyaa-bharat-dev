<div class="addressFormPopMiddle">
            <div class="addressFormPopInner">
                <a href="#;"><img src="{{asset('front/images/cross.svg')}}" alt="" /> </a>
                <h4>Add New Address</h4>
                <p>Please enter pin code to get current location.</p>
                <form id="addressForm">
                    <input type="hidden" name="uuid" class="AnyValueVD" placeholder="004">
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
                    <div class="inputMainBlock fullwidth">
                        <span>Set as delivery </span>
                        <input type="checkbox" name="delivery" class="AnyValueVD" id="DA">
                        <div class="errormsg">Please enter State</div>
                    </div>
                    <div class="checkboxPart fullwidth">
                        <button class="submitBTN">Save Address</button>
                    </div>
                </form>
            </div>
        </div>