<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Admin\Product;
use App\Models\Admin\FAQ;
use App\Models\Admin\OfferAndDiscount;
use App\Models\Admin\Blog;
use App\Models\Admin\HappyCustomer;
use App\Models\Front\Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\Banner;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cache;
use App\Models\Admin\Page;

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
        $happyCustomers = HappyCustomer::all();

        $partners = Page::where('slug', 'partners')->with('cms.images')->first();
        $whyAarogyaBharat = Page::where('slug', 'why-aarogya-bharat')->with('cms.images')->first();


        View::share('recentViewedProducts', $recentViewedProducts);
        View::share('popularProducts', $popularProducts);
        View::share('faqs', $faqs);
        View::share('offerAndDiscounts', $offerAndDiscounts);
        View::share('contactusBlog', $contactusBlog);
        View::share('bannerImages', $bannerImages);
        View::share('happyCustomers', $happyCustomers);
        View::share('partners', $partners);
        View::share('whyAarogyaBharat', $whyAarogyaBharat);
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
