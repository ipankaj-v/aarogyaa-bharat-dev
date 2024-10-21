<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use App\Models\Admin\Blog;
class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::take(12)->get();
        $products = Product::with('category')->take(12)->get(); 
        $blogs = Blog::with('images')->take(12)->get();
         
        return view('front.home', compact('categories', 'products', 'blogs'));
    }

    public function productPage()
    {
        $categoriesAndProducts = Category::with('products')->get();
        $products = Product::with('category')->take(12)->get(); 
        // $recentViewedProducts = Product::all(); 
        return view('front.products', compact('categoriesAndProducts','products'));
    }

}
