<div class="container">
        <div class="titlePart">
            <h4>Happy Customers..!</h4>
            <!-- <a href="#;">View All <img src="{{asset('front/images/orange_arrow.svg')}}" alt=""> </a> -->
        </div>
        <div class="rowMob">
            <div class="customerSlider getprogressWidth">
            @if($happyCustomers->isNotEmpty())
                @foreach($happyCustomers as $customer)
                    <div class="customerSlider_padd">
                            <div class="customerSlider_block">
                            <p>{{ \Illuminate\Support\Str::limit($customer->comment, 400) }}</p>
                                <strong>{{ $customer->name }}</strong>
                                <ul>
                                    @php
                                        $rating = round($customer->rate); 
                                    @endphp

                                    @for($i = 1; $i <= 5; $i++)  <!-- Loop to show 5 stars -->
                                        <li>
                                            <a href="#">
                                                <img src="{{ $i <= $rating ? asset('front/images/fill_star.svg') : asset('front/images/empty_star.svg') }}" alt="" />
                                            </a>
                                        </li>
                                    @endfor
                                </ul>
                                <i>{{ $rating }}</i> <!-- Show the rounded rating -->
                            </div>
                        </div>
                @endforeach
            @endif
            </div>
            <div class="progressBar"></div>
        </div>
    </div>