<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Admin\Product;
use App\Models\Admin\FAQ;
use App\Models\Admin\OfferAndDiscount;
use App\Models\Admin\Blog;
use App\Models\Front\Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\Banner;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cache;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $recentViewedProducts = Product::orderBy('updated_at', 'desc')->take(10)->get();
        $popularProducts = Product::orderBy('updated_at', 'desc')->take(10)->get();
        $offerAndDiscounts = OfferAndDiscount::orderBy('updated_at', 'desc')->take(10)->get();
        $contactusBlog = Blog::with('images')->inRandomOrder()->take(4)->get();
        $faqs = FAQ::with('answers')->get();
        $bannerImages = Banner::select('*')->limit(5)->get();



        View::share('recentViewedProducts', $recentViewedProducts);
        View::share('popularProducts', $popularProducts);
        View::share('faqs', $faqs);
        View::share('offerAndDiscounts', $offerAndDiscounts);
        View::share('contactusBlog', $contactusBlog);
        View::share('bannerImages', $bannerImages);
        //cart count
        $session_id = Cache::get('session_id', Session::getId());
        \Log::info(['$session_id  Appserice provider' => $session_id]);
        $cartProductCount = Cart::where('user_id', Auth::id())
        ->orWhere('session_id', $session_id)
        ->withCount('cartProducts') 
        ->get()
    ->sum('cart_products_count');
        View::share('cartProductCount', $cartProductCount);
    }
}
