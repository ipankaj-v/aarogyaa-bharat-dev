<div class="orderSummery">
                    <h4>Order Summery</h4>                    
                    <ul>
                        @foreach($cartProducts[0]->cartProducts as $cartItem)
                        @if(isset($cartItem->is_visible) && $cartItem->is_visible == 1)
                        <li id="product-detail-{{ $cartItem->product->id }}">
                            <p>{{ $cartItem->product->name }}</p>
                            <strong>₹ {{ $cartItem->product->price  * $cartItem->quantity }}</strong>
                            @php
                            $total += $cartItem->product->price * $cartItem->quantity;
                            $gst += ($cartItem->product->price * $cartItem->quantity * $cartItem->product->gst / 100);
                            @endphp
                        </li>
                        @endif
                        @endforeach
                        <li>
                            <p>Total GST</p>
                            <strong>₹ {{ $gst}}</strong>
                        </li>
                        <li class="discount_1">
                             @php
                                $offer = ($cartProducts[0]->discount_offer_amount ? $cartProducts[0]->discount_offer_amount : 0);
                            @endphp
                            <p>Offer Discount</p>
                            <strong>- ₹ {{$cartProducts[0]->discount_offer_amount }}</strong>
                        </li>
                        <li class="freeDel">
                            <p>Delivery & Installation (Free)</p>
                            <strong>₹ 00</strong>
                        </li>
                        <li class="payable">
                            <p>Total Payable</p>
                            <strong> <span id="total-display">₹ {{$total - $offer + $gst }}</span></strong>
                            <input type="hidden" id="total-hidden" value="{{$total}}">
                        </li>
                    </ul>
                </div>