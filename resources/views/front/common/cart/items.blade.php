@foreach($cartProducts[0]->cartProducts as $cartItem)
                    <div class="cartProductblock1">
                        <div class="iconPart">
                            <label>
                            <input type="checkbox" class="product-checkbox" id="checkbox-{{ $cartItem->id }}" onChange="cartItemChange(event, '{{ $cartItem->id }}', {{$cartProducts[0]}})"   {{ $cartItem->is_visible ? "checked" : " " }}  />

                                <!-- <input type="checkbox" class="product-checkbox" id="checkbox-{{ $cartItem->id }}" onChange="cartItemChange(event, '{{ $cartItem->product->id }}', '{{ $cartItem->product->price * $cartItem->quantity }}')" checked /> -->
                                <i></i>
                            </label>
                            <a href="javascript:void(0);" onclick="deleteCartItem('{{ $cartItem->id }}')">
                                        <img src="{{ asset('front/images/delete_icon.svg') }}" alt="Delete" />
                            </a>
                            <!-- <a href="{{ route('cart.delete-item', [$cartItem->id]) }}"><img src="{{ asset('front/images/delete_icon.svg') }}" alt="Delete" /></a> -->
                            <a href="#;"><img src="{{ asset('front/images/Share.svg') }}" alt="Share" /></a>
                        </div>
                        <div class="prodImg">
                            <img src="{{ asset('storage/' . $cartItem->product->image) }}" alt="{{ $cartItem->product->name }}" />
                        </div>
                        <div class="content">
                            <p>{{ $cartItem->product->name }}</p>
                            <strong>₹ {{ $cartItem->price }}</strong>
                            <div class="countProduct">
                                <a href="javascript:void(0);" class="countMinus" data-id="{{ $cartItem->id }}" data-sign="minus" onclick="updateQuantity({{ $cartItem->id }}, {{$cartProducts[0]->id}} ,'minus')">
                                    <img src="{{ asset('front/images/jam_minus.svg') }}" alt="Minus" />
                                </a>
                                <span id="quantity-{{ $cartItem->id }}">{{ $cartItem->quantity }}</span>
                                <a href="javascript:void(0);" class="countPlus" data-id="{{ $cartItem->id }}" data-sign="plus" onclick="updateQuantity({{ $cartItem->id }}, {{$cartProducts[0]->id}} ,'plus')">
                                    <img src="{{ asset('front/images/jam_plus.svg') }}" alt="Plus" />
                                </a>

                            </div>
                        </div>
                         @if(isset($cartItem->product->is_rentable) && $cartItem->product->is_rentable == 1)<small> This product only available for rent.</small>@endif
                    </div>
                    @endforeach