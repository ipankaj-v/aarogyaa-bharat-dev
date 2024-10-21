<section class="productSlidePart">
    <div class="container">
        <div class="titlePart2"> 
            <h4>Recent Viewed</h4> 
        </div>
        <div class="rowMob">
            <div class="product_slider2 getprogressWidth arrowOnProgress"> 
                <!-- <div class="product_slider2padd">
                    <div class="product_slider2block">
                        <div class="product_inner">
                            <img src="images/wheelchair_1.png" alt="" />
                        </div>
                        <p>Wheelchair</p>
                        <strong>₹ 1200</strong>
                    </div> 
                </div> -->
                @foreach ($recentViewedProducts as $product)
                    <div class="product_slider2padd">
                        <div class="product_slider2block">
                            <div class="product_inner">
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" />
                            </div>
                            <p>{{ $product->name }}</p>
                            <strong>₹ {{ $product->price }}</strong>
                        </div> 
                    </div>
                @endforeach
            </div>
            <div class="progressBar"></div>
        </div>
    </div>
</section>