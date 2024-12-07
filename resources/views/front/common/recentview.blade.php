<section class="productSlidePart">
    <div class="container">
        <div class="titlePart2"> 
            <h4>Recent Viewed</h4> 
        </div>
        <div class="rowMob">
            <div class="product_slider2 getprogressWidth arrowOnProgress">
                @if(isset($recentViewedProducts))
                @foreach ($recentViewedProducts as $product)
                    <div class="product_slider2padd">
                        <div class="product_slider2block">
                            <div class="product_inner">
                            <a href="{{ route('products.detail', ['slug' => $product->slug]) }}">
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" />
                            </a>    
                            </div>
                            <a href="{{ route('products.detail', ['slug' => $product->slug]) }}"><p>{{ $product->name }}</p></a>
                            <strong>₹ {{ $product->price }}</strong>
                        </div> 
                    </div>
                @endforeach
                @endif
            </div>
            <div class="progressBar"></div>
        </div>
    </div>
</section>