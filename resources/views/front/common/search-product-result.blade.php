@if (isset($products) && isset($query) && $products->count() > 0)
    @foreach ($products as $product)
        <li>
            <a href="{{ route('search.products.result', ['query' => $query]) }}">
                <img src="{{ asset('front/images/search_fil.svg')}}" alt="" />
                <p>{{ $product->name }}</p>
                <img src="{{ asset('front/images/curly_arrow.svg')}}" alt="" />
            </a>
        </li>
    @endforeach
@else
    <li>No products found.</li>
@endif