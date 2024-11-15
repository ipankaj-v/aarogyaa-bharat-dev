@extends('front.layouts.layout')
@section('content')


<!-- <div class="searchPop winScrollStop">
    <div class="searchPopBlock">
        <strong>Recent Search</strong>
        <p>Our highest rented or buying products.</p>
        <ul>
            <li>
                <a href="#;">
                    <img src="images/search_fil.svg" alt="" />
                    <p>Long product name</p>
                    <img src="images/curly_arrow.svg" alt="" /> 
                </a>
            </li>
            <li>
                <a href="#;">
                    <img src="images/search_fil.svg" alt="" />
                    <p>Product name</p>
                    <img src="images/curly_arrow.svg" alt="" /> 
                </a>
            </li>
            <li>
                <a href="#;">
                    <img src="images/search_fil.svg" alt="" />
                    <p>Product</p>
                    <img src="images/curly_arrow.svg" alt="" /> 
                </a>
            </li>
            <li>
                <a href="#;">
                    <img src="images/search_fil.svg" alt="" />
                    <p>Small product name</p>
                    <img src="images/curly_arrow.svg" alt="" /> 
                </a>
            </li>
        </ul>
        
        <div class="popPro">
        <strong>Popular Products</strong>
        <a href="#;">Long product name <img src="images/curly_arrow.svg" alt="" /></a>
        <a href="#;">product name <img src="images/curly_arrow.svg" alt="" /></a>
        <a href="#;">product <img src="images/curly_arrow.svg" alt="" /></a>
        <a href="#;">Small product name <img src="images/curly_arrow.svg" alt="" /></a>
        <a href="#;">Name of product <img src="images/curly_arrow.svg" alt="" /></a>
        <a href="#;">Popular product name  <img src="images/curly_arrow.svg" alt="" /></a>
        </div>
    </div>
</div> -->

<div class="breadcrumbs">
    <div class="container">
        <ul>
            <li><a href="#;">Home</a> </li>
            <li><a href="#;">Product Cateogry</a> </li>
            <li><a href="#;">Product Listing</a> </li>
        </ul>
    </div>    
</div>


<div class="tabSec">
    <div class="container">
        <div class="row18">
        @foreach ($categoriesAndProducts as $category)
                <div class="tabPadd">
                    <a href="#" data-category-id="{{ $category->id }}" class="{{ $loop->first ? 'active' : '' }}">
                        <div>
                            <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" />
                        </div>
                        <p>{{ $category->name }}</p>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="progressBar2">
            <div></div>
        </div>
    </div>
</div>
<section class="product_Part">
        <div class="container">
            <div class="row18">
                <div id="productList" class="productList1">
                @foreach ($categoriesAndProducts as $category)
                    <div class="category-{{ $category->id }}" style="display: none;">
                        @foreach ($category->products as $product)
                            <div class="product_slider_padd">
                                <div class="product_slider_block">
                                    <div class="imagePart">
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" >
                                    </div>
                                    <h5>{{ $product->name }} <a href="#"> <img src="{{ asset('front/images/Share.svg')}}" alt=""> </a></h5>
                                    <p>{{ $product->description }}</p>
                                    <strong>₹ {{ $product->price }}</strong>
                                    <a href="{{ route('products.detail', ['slug' => $product->slug]) }}">View Details <img src="{{ asset('front/images/orange_arrow.svg') }}" alt=""> </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </section>

<section class="customer_part">
    <div class="container">
        <div class="titlePart">
            <h4>Happy Customers..!</h4>
            <a href="#;">View All <img src="{{asset('front/images/orange_arrow.svg')}}" alt=""> </a>
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
</section>

@include('front.common.recentview')
<!-- <section class="productSlidePart">
    <div class="container">
        <div class="titlePart2"> 
            <h4>Recent Viewed</h4> 
        </div>
        <div class="rowMob">
            <div class="product_slider2 getprogressWidth arrowOnProgress"> 
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
</section> -->

<script>
 document.addEventListener('DOMContentLoaded', function () {
            const tabs = document.querySelectorAll('.tabPadd a');
            const productLists = document.querySelectorAll('#productList > div');

            tabs.forEach(tab => {
                tab.addEventListener('click', function (e) {
                    e.preventDefault();

                    tabs.forEach(t => t.classList.remove('active'));
                    productLists.forEach(pl => pl.style.display = 'none');

                    this.classList.add('active');
                    const categoryId = this.getAttribute('data-category-id');
                    document.querySelector(`.category-${categoryId}`).style.display = 'block';
                });
            });

            // Show the first category's products by default
            document.querySelector('.tabPadd a.active').click();
        });
</script>
@endsection('content')
