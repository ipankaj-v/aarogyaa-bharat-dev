@extends('front.layouts.layout')
@section('content')

<section class="search_result">
    <div class="container">
        <div class="searchFill_title">
            <img src="{{ asset('front/images/Search-Fil.svg')}}" alt="" />
            <div class="searchFill_text">
                <h4>Search Result</h4>
                <p>We found {{ $products->count() }} top products based on your search</p>
            </div>
        </div>
    </div>
</section>

<section class="product_name_list">
    <div class="container">
        <div class="product_list_text">
            @if($products->count() > 0)
                @foreach($products as $product)
                    <div class="product_box">
                        <div class="product_img">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" />
                        </div>
                        <div class="productbox_text">
                            <h2>{{ $product->name }}</h2>
                            <div class="priceshare">
                                <h3>₹ {{ $product->price }}</h3>
                                <a href="#;">
                                    <img src="{{ asset('front/images/ri_share-line.svg')}}" alt="" />
                                </a>
                            </div>
                            <p>{{ $product->description }}</p>
                        </div>
                    </div>
                @endforeach
            @else
                <p>No products found.</p>
            @endif
            <div class="read_more_blogs"><a href="#;"><p>Load More</p><img src="{{ asset('front/images/radix-icons_reload.svg')}}" alt=""></a></div>
        </div>
    </div>
</section>


<section class="raise_query">
    <div class="container">
        <div class="raise_query_box">
            <div class="rise_text_box">
                <img src="{{ asset('front/images/raise.svg')}}" alt="">
                <div class="rise_text_line">
                    <h4>Raise Query</h4>
                    <p>You can request anything by single click.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- <section class="customer_part">
    <div class="container">
        <div class="titlePart">
            <h4>Happy Customers..!</h4>
            <a href="#;">View All <img src="images/orange_arrow.svg" alt=""> </a>
        </div>
        <div class="rowMob">
            <div class="customerSlider getprogressWidth arrowOnProgress">
                <div class="customerSlider_padd">
                    <div class="customerSlider_block">
                        <p>Kros samuktig och neturen, heteropaskade. Mikok höraniv eller mus i fuvåfar. Faliga mälig astronde. Bens </p>
                        <strong>Piyush Gohil</strong>
                        <ul>
                            <li><a href="#;"><img src="images/fill_star.svg" alt="" /> </a> </li>
                            <li><a href="#;"><img src="images/fill_star.svg" alt="" /> </a> </li>
                            <li><a href="#;"><img src="images/fill_star.svg" alt="" /> </a> </li>
                            <li><a href="#;"><img src="images/fill_star.svg" alt="" /> </a> </li>
                            <li><a href="#;"><img src="images/empty_star.svg" alt="" /> </a> </li>
                        </ul>
                        <i>4.5</i>
                    </div>
                </div>
                <div class="customerSlider_padd">
                    <div class="customerSlider_block">
                        <p>Kros samuktig och neturen, heteropaskade. Mikok höraniv eller mus i fuvåfar. Faliga mälig astronde. Bens </p>
                        <strong>Piyush Gohil</strong>
                        <ul>
                            <li><a href="#;"><img src="images/fill_star.svg" alt="" /> </a> </li>
                            <li><a href="#;"><img src="images/fill_star.svg" alt="" /> </a> </li>
                            <li><a href="#;"><img src="images/fill_star.svg" alt="" /> </a> </li>
                            <li><a href="#;"><img src="images/fill_star.svg" alt="" /> </a> </li>
                            <li><a href="#;"><img src="images/empty_star.svg" alt="" /> </a> </li>
                        </ul>
                        <i>4.5</i>
                    </div>
                </div>
                <div class="customerSlider_padd">
                    <div class="customerSlider_block">
                        <p>Kros samuktig och neturen, heteropaskade. Mikok höraniv eller mus i fuvåfar. Faliga mälig astronde. Bens </p>
                        <strong>Piyush Gohil</strong>
                        <ul>
                            <li><a href="#;"><img src="images/fill_star.svg" alt="" /> </a> </li>
                            <li><a href="#;"><img src="images/fill_star.svg" alt="" /> </a> </li>
                            <li><a href="#;"><img src="images/fill_star.svg" alt="" /> </a> </li>
                            <li><a href="#;"><img src="images/fill_star.svg" alt="" /> </a> </li>
                            <li><a href="#;"><img src="images/empty_star.svg" alt="" /> </a> </li>
                        </ul>
                        <i>4.5</i>
                    </div>
                </div>
                <div class="customerSlider_padd">
                    <div class="customerSlider_block">
                        <p>Kros samuktig och neturen, heteropaskade. Mikok höraniv eller mus i fuvåfar. Faliga mälig astronde. Bens </p>
                        <strong>Piyush Gohil</strong>
                        <ul>
                            <li><a href="#;"><img src="images/fill_star.svg" alt="" /> </a> </li>
                            <li><a href="#;"><img src="images/fill_star.svg" alt="" /> </a> </li>
                            <li><a href="#;"><img src="images/fill_star.svg" alt="" /> </a> </li>
                            <li><a href="#;"><img src="images/fill_star.svg" alt="" /> </a> </li>
                            <li><a href="#;"><img src="images/empty_star.svg" alt="" /> </a> </li>
                        </ul>
                        <i>4.5</i>
                    </div>
                </div>
                <div class="customerSlider_padd">
                    <div class="customerSlider_block">
                        <p>Kros samuktig och neturen, heteropaskade. Mikok höraniv eller mus i fuvåfar. Faliga mälig astronde. Bens </p>
                        <strong>Piyush Gohil</strong>
                        <ul>
                            <li><a href="#;"><img src="images/fill_star.svg" alt="" /> </a> </li>
                            <li><a href="#;"><img src="images/fill_star.svg" alt="" /> </a> </li>
                            <li><a href="#;"><img src="images/fill_star.svg" alt="" /> </a> </li>
                            <li><a href="#;"><img src="images/fill_star.svg" alt="" /> </a> </li>
                            <li><a href="#;"><img src="images/empty_star.svg" alt="" /> </a> </li>
                        </ul>
                        <i>4.5</i>
                    </div>
                </div>
                <div class="customerSlider_padd">
                    <div class="customerSlider_block">
                        <p>Kros samuktig och neturen, heteropaskade. Mikok höraniv eller mus i fuvåfar. Faliga mälig astronde. Bens </p>
                        <strong>Piyush Gohil</strong>
                        <ul>
                            <li><a href="#;"><img src="images/fill_star.svg" alt="" /> </a> </li>
                            <li><a href="#;"><img src="images/fill_star.svg" alt="" /> </a> </li>
                            <li><a href="#;"><img src="images/fill_star.svg" alt="" /> </a> </li>
                            <li><a href="#;"><img src="images/fill_star.svg" alt="" /> </a> </li>
                            <li><a href="#;"><img src="images/empty_star.svg" alt="" /> </a> </li>
                        </ul>
                        <i>4.5</i>
                    </div>
                </div>
            </div>
            <div class="progressBar"></div>
        </div>
    </div>
</section> -->

@endsection('content')