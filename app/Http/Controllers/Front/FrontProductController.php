<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use App\Models\Admin\Page;
use Illuminate\Support\Facades\Config;

class FrontProductController extends Controller
{
    public function index()
    {
        $categoriesAndProducts = Category::with('products')->get();
        $products = Product::with('category')->take(12)->get();
        $seoMeta = Page::where('slug', 'products')->first(); 
        $seoMetaTag = $seoMeta->seo_meta_tag; 
        $seoMetaTagTitle = $seoMeta->seo_meta_tag_title; 
        return view('front.products', compact('categoriesAndProducts', 'products', 'seoMetaTag', 'seoMetaTagTitle'));
    }

    public function productDetail($slug)
    {
        $faqFilters = Config::get('custom.faq_filter');
        $productDetails = Product::where('slug', $slug)->first();
        $products = Product::with('category', 'images')->take(12)->get();
        // dd($productDetails);
        return view('front.product-details', compact('productDetails', 'products', 'faqFilters'));
    }

    public function searchProducts(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('name', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->get();

        if ($products->isNotEmpty()) {
            return view('front.common.search-product-result', compact('products', 'query'))->render();
        }

        // Optionally return an empty response or a message indicating no products found
        return response()->json(['success' => false, 'message' => 'No products found.']);
    }
    public function searchProductsResult(Request $request, $query)
    {

        $products = Product::with('images')->where('name', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->get();
        return view('front.search-result', compact('products'));
    }

    public function productCatogory(Request $request)
    {
        $categoriesAndProducts = Category::with('products')->get();
        return view('front.product-category', compact('categoriesAndProducts'));
    }
}
