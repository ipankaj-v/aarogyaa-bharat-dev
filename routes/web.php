<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategory;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\HappyCustomerController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\FAQController;
use App\Http\Controllers\Admin\OfferAndDiscountOcntroller;
use App\Http\Controllers\Admin\StatusController;
use App\Http\Controllers\Admin\ProductAttributeController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\CMSController;
use App\Http\Controllers\BannerController;
//front  controller
use App\Http\Controllers\Front\FrontCmsController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\FrontProductController;
use App\Http\Controllers\Front\RaiseQueryController;
// use App\Http\Controllers\Admin\FrontOfferController;
use App\Http\Controllers\Front\CustomerController as FrontCustomerController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\PaymentController;
use App\Http\Controllers\Admin\ContactUsController as FrontContactUsController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\SocialLoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//front routes
Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::get('/products', [HomeController::class, 'productPage'])->name('products');

//Social login 
Route::get('auth/google', [SocialLoginController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [SocialLoginController::class, 'handleGoogleCallback']);
Route::get('auth/facebook', [SocialLoginController::class, 'redirectToFacebook'])->name('facebook.login');
Route::get('auth/facebook/callback', [SocialLoginController::class, 'handleFacebookCallback']);

Route::controller(FrontProductController::class)->group(function () {
    Route::get('/products', 'index')->name('products');
    Route::get('/products/details/{slug}', 'productDetail')->name('products.detail');
    Route::get('/search/products','searchProducts')->name('search.products');
    Route::get('/search/products/results/{query}', 'searchProductsResult')->name('search.products.result');
    Route::get('products/categories', 'productCatogory')->name('products.category');
});

Route::controller(BannerController::class)->group(function () {
    // Display a list of banners
    Route::get('/banners', 'index')->name('banners.index');
    Route::get('/banners/create', 'create')->name('banners.create');
    Route::post('/banners', 'store')->name('banners.store');
    Route::get('/banners/{id}/edit', 'edit')->name('banners.edit');
    Route::post('/banners/{id}', 'update')->name('banners.update');
    Route::get('/banners/{id}', 'destroy')->name('banners.destroy');
    Route::get('pincheck', 'pinCheck')->name('checkpin');
});

Route::controller(RaiseQueryController::class)->group(function () {
    Route::get('/raise-query', 'index')->name('raise.query');
    Route::post('/submit-query', 'store')->name('query.submit');
});

Route::controller(FAQController::class)->group(function () {
    Route::get('/faqs', 'fontIndex')->name('faqs');  
});

Route::controller(BlogController::class)->group(function () {
    Route::get('/blogs', 'fontIndex')->name('blogs');  
    Route::get('/blogs/details/{slug}', 'blogDetials')->name('blog.details');  
});


Route::middleware(['auth.customer'])->group(function () {
    Route::get('/profile', [FrontCustomerController::class, 'profile'])->name('customers.profile');
    Route::get('/profile/update', [FrontCustomerController::class, 'profileUpdate'])->name('customers.profile.update');
    Route::get('/profile/address', [FrontCustomerController::class, 'addAddress'])->name('customers.address.add');
    Route::post('/profile/logout', [FrontCustomerController::class, 'customerLogout'])->name('customer.logout');
    Route::get('/customer/notification', [FrontCustomerController::class, 'Notification'])->name('customer.notification');
    Route::get('/customer/order/{id}', [FrontCustomerController::class, 'OrderStatusWise'])->name('customer.orderStatusWise');

});

Route::controller(FrontCustomerController::class)->group(function () {
    // Route::get('/customers/profile', 'profile')->name('customers.profile');
    Route::post('/customers/store', 'store')->name('customers.store');
    Route::post('/customers/login', 'login')->name('customer.login');
    Route::get('/customer/save-address', 'saveAddress')->name('save.address');
    Route::get('/customer/verify-otp/{number}', 'verifyOtp')->name('verify.otp');
});

Route::controller(FrontContactUsController::class)->group(function () {
    Route::get('/contact-us', 'frontIndex')->name('front.contact');
});

Route::controller(CartController::class)->group(function () {
    Route::get('/cart', 'index')->name('cart');
    Route::post('/cart/add/{productId}', 'addToCart')->name('cart.add');
    Route::delete('/cart/delete-item/{cartItemId}', [CartController::class, 'deleteItem'])->name('cart.delete-item');
    Route::post('/cart/update-quantity', [CartController::class, 'updateCartItemQuantity'])->name('cart.update-quantity');
    Route::post('/cart/update-visibility', [CartController::class, 'updateCartItemVisibility'])->name('cart.update-visibility');
    Route::post('/cart/applycoupon', [CartController::class, 'applyCoupon'])->name('applycoupon');
    Route::post('/cart/removecoupon}', [CartController::class, 'removeCoupon'])->name('removecoupon');
    Route::get('/cart/getcoupon', 'getCoupons')->name('getcoupons');
    Route::post('/cart/applycouponcode', 'applyCouponCode')->name('applycouponcode');

});

//Front CMS Pages
Route::controller(FrontCmsController::class)->group(function () {
    Route::get('/about-us', 'AboutUs')->name('customer.about.us');
    Route::get('/terms-and-conditions', 'TermsAndConditions')->name('terms.and.conditions');
});

// Route::get('razorpay-payment', [PaymentController::class, 'index']);
Route::post('razorpay-payment', [PaymentController::class, 'store'])->name('order.create');


//admin routes
Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'loginAction'])->name('admin.login.submit');
Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        // Authentication and Dashboard Routes
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        // Category Routes
        Route::controller(CategoryController::class)->group(function () {
            Route::get('/categories', 'index')->name('admin.categories');
            Route::get('/categories/create', 'create')->name('admin.categories.create');
            Route::post('/categories/store', 'store')->name('admin.categories.store');
            Route::get('/categories/edit/{id}', 'edit')->name('admin.categories.edit');
            Route::post('/categories/update/{id}', 'update')->name('admin.categories.update');
            Route::get('/categories/{id}', 'destroy')->name('admin.categories.destroy');
        });
        // Order Routes admin
        Route::controller(OrderController::class)->group(function () {
            Route::get('/orders', 'index')->name('admin.order.index');
            Route::get('/orders/edit/{id}', 'edit')->name('admin.order.edit');
            Route::get('/orders/{id}', 'show')->name('admin.order.show');
            Route::post('/orders/{id}/status', [OrderController::class, 'updateStatus'])->name('admin.order.updateStatus');
        });
       
        // Sub Category Routes
        Route::controller(SubCategory::class)->group(function () {
            Route::get('/sub-categories', 'index')->name('admin.sub.categories');
            Route::get('/sub-categories/create', 'create')->name('admin.sub.categories.create');
            Route::post('/sub-categories/store', 'store')->name('admin.sub.categories.store');
            Route::get('/sub-categories/edit/{id}', 'edit')->name('admin.sub.categories.edit');
            Route::post('/sub-categories/update/{id}', 'update')->name('admin.sub.categories.update');
            Route::get('/sub-categories/{id}', 'destroy')->name('admin.sub.categories.destroy');
            Route::get('/pincodes', 'pinIndex')->name('admin.pins');
            Route::get('/pincodes/import', 'import')->name('admin.pinOffices.importForm');
            Route::post('/admin/pin-offices/import','importStore')->name('admin.pinOffices.importstore');
        });

        // Product Routes
        Route::controller(ProductController::class)->group(function () {
            Route::get('/products', 'index')->name('admin.products');
            Route::get('/products/create', 'create')->name('admin.products.create');
            Route::post('/products/store', 'store')->name('admin.products.store');
            Route::get('/products/edit/{id}', 'edit')->name('admin.products.edit');
            Route::post('/products/update/{id}', 'update')->name('admin.products.update');
            Route::get('/products/{id}', 'destroy')->name('admin.products.destroy');   
            Route::get('import-product', 'importProduct')->name('products.import');  
            Route::post('/products/import', 'import')->name('admin.products.importstore');
        });
        // Product Attributes Routes
        Route::controller(ProductAttributeController::class)->group(function () {
            Route::get('/products-attribute', 'index')->name('admin.products.attribute');
            Route::get('/products-attribute/create', 'create')->name('admin.products.attribute.create');
            Route::post('/products-attribute/store', 'store')->name('admin.products.attribute.store');
            Route::get('/products-attribute/edit/{id}', 'edit')->name('admin.products.attribute.edit');
            Route::post('/products-attribute/update/{id}', 'update')->name('admin.products.attribute.update');
            Route::get('/products-attribute/{id}', 'destroy')->name('admin.products.attribute.destroy');  
        });

        // Pages Routes
        Route::controller(PageController::class)->group(function () {
            Route::get('/page', 'index')->name('admin.pages');
            Route::get('/page/create', 'create')->name('admin.page.create');
            Route::post('/page/store', 'store')->name('admin.page.store');
            Route::get('/page/edit/{id}', 'edit')->name('admin.page.edit');
            Route::post('/page/update/{id}', 'update')->name('admin.page.update');
            Route::get('/page/{id}', 'destroy')->name('admin.page.destroy');  
        });
        // Cms Routes
        Route::controller(CMSController::class)->group(function () {
            Route::get('/cms', 'index')->name('admin.cms');
            Route::get('/cms/create', 'create')->name('admin.cms.create');
            Route::post('/cms/store', 'store')->name('admin.cms.store');
            Route::get('/cms/edit/{id}', 'edit')->name('admin.cms.edit');
            Route::post('/cms/update/{id}', 'update')->name('admin.cms.update');
            Route::get('/cms/{id}', 'destroy')->name('admin.cms.destroy');  
            Route::delete('admin/cms/image/{id}', [CmsController::class, 'destroyImage'])->name('admin.cms.image.destroy');
        });

        // Blogs Routes
        Route::controller(BlogController::class)->group(function () {
            Route::get('/blogs', 'index')->name('admin.blogs');
            Route::get('/blogs/create', 'create')->name('admin.blogs.create');
            Route::post('/blogs/store', 'store')->name('admin.blogs.store');
            Route::get('/blogs/edit/{id}', 'edit')->name('admin.blogs.edit');
            Route::post('/blogs/update/{id}', 'update')->name('admin.blogs.update');
            Route::get('/blogs/{id}', 'destroy')->name('admin.blogs.destroy');  
        });
        
        // Customer Routes
        Route::controller(CustomerController::class)->group(function () {
            Route::get('/customers', 'index')->name('admin.customers');
            Route::get('/customers/create', 'create')->name('admin.customers.create');
            Route::post('/customers/store', 'store')->name('admin.customers.store');
            Route::get('/customers/edit/{id}', 'edit')->name('admin.customers.edit');
            Route::post('/customers/update/{id}', 'update')->name('admin.customers.update');
            Route::get('/customers/{id}', 'destroy')->name('admin.customers.destroy');
            Route::get('/customers/view/{id}', 'Show')->name('admin.customers.view');
        });

        // Happy Customer Routes
        Route::controller(HappyCustomerController::class)->group(function () {
            Route::get('/happy-customers', 'index')->name('admin.happy.customers');
            Route::get('/happy-customers/create', 'create')->name('admin.happy.customers.create');
            Route::post('/happy-customers/store', 'store')->name('admin.happy.customers.store');
            Route::get('/happy-customers/edit/{id}', 'edit')->name('admin.happy.customers.edit');
            Route::post('/happy-customers/update/{id}', 'update')->name('admin.happy.customers.update');
            Route::get('/happy-customers/{id}', 'destroy')->name('admin.happy.customers.destroy');
        });
        

        // User Routes
        Route::controller(UserController::class)->group(function () {
            Route::get('/users', 'index')->name('admin.users');
            Route::get('/users/create', 'create')->name('admin.users.create');
            Route::post('/users/store', 'store')->name('admin.users.store');
            Route::get('/users/edit/{id}', 'edit')->name('admin.users.edit');
            Route::post('/users/update/{id}', 'update')->name('admin.users.update');
            Route::get('/users/{id}', 'destroy')->name('admin.users.destroy');
        });

        // Other Routes
        // Route::controller(BlogController::class)->group(function () {
        //     Route::get('/blogs', 'index')->name('admin.blogs');
        // });
        
        Route::controller(ContactUsController::class)->group(function () {
            Route::get('/contactus', 'index')->name('admin.contactus');
        });

        Route::controller(AboutUsController::class)->group(function () {
            Route::get('/aboutus', 'index')->name('admin.aboutus');
        });
        //FAQ Routes
        Route::controller(OfferAndDiscountOcntroller::class)->group(function () {
            Route::get('/offer', 'index')->name('admin.offer');
            Route::get('/offer/create', 'create')->name('admin.offer.create');
            Route::post('/offer/store', 'store')->name('admin.offer.store');
            Route::get('/offer/edit/{id}', 'edit')->name('admin.offer.edit');
            Route::post('/offer/update/{id}', 'update')->name('admin.offer.update');
            Route::get('/offer/{id}', 'destroy')->name('admin.offer.destroy');  
        });
        //Offer Routes
        Route::controller(FAQController::class)->group(function () {
            Route::get('/faqs', 'index')->name('admin.faqs');
            Route::get('/faqs/create', 'create')->name('admin.faqs.create');
            Route::post('/faqs/store', 'store')->name('admin.faqs.store');
            Route::get('/faqs/edit/{id}', 'edit')->name('admin.faqs.edit');
            Route::post('/faqs/update/{id}', 'update')->name('admin.faqs.update');
            Route::get('/faqs/{id}', 'destroy')->name('admin.faqs.destroy');  
        });

        Route::controller(StatusController::class)->group(function () {
            Route::get('/status', 'index')->name('admin.status');
            Route::get('/status/create', 'create')->name('admin.status.create');
        });

        // Logout Route
        Route::post('/logout', function () {
            Auth::logout();
            return redirect('/login');
        })->name('admin.logout');
    });
});



// Route::prefix('admin')->group(function() {
//     Route::get('/login', [AdminController::class, 'login'])->name('admin.login');
//     Route::post('/login', [AdminController::class, 'loginAction'])->name('admin.login.submit');
//     Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('/');
//     //category
//     Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories');
//     Route::get('/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
//     Route::post('/categories/store', [CategoryController::class, 'store'])->name('admin.categories.store');
//     Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('admin.categories.edit');
//     Route::post('/categories/update/{id}', [CategoryController::class, 'update'])->name('admin.categories.update');
//     Route::get('/categories/{id}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
//     //product
//     Route::get('/products', [ProductController::class, 'index'])->name('admin.products');
//     Route::get('/products/create', [ProductController::class, 'create'])->name('admin.products.create');
//     Route::post('/products/store', [ProductController::class, 'store'])->name('admin.products.store');
//     Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('admin.products.edit');
//     Route::post('/products/update/{id}', [ProductController::class, 'update'])->name('admin.products.update');
//     Route::get('/products/{id}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
//     //customers
//     Route::get('/customers', [CustomerController::class, 'index'])->name('admin.customers');
//     Route::get('/customers/create', [CustomerController::class, 'create'])->name('admin.customers.create');
//     Route::post('/customers/store', [CustomerController::class, 'store'])->name('admin.customers.store');
//     Route::get('/customers/edit/{id}', [CustomerController::class, 'edit'])->name('admin.customers.edit');
//     Route::post('/customers/update/{id}', [CustomerController::class, 'update'])->name('admin.customers.update');
//     Route::get('/customers/{id}', [CustomerController::class, 'destroy'])->name('admin.customers.destroy');
//     //users
//     Route::get('/users', [UserController::class, 'index'])->name('admin.users');
//     Route::get('/users/create', [UserController::class, 'create'])->name('admin.users.create');
//     Route::post('/users/store', [UserController::class, 'store'])->name('admin.users.store');
//     Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('admin.users.edit');
//     Route::post('/users/update/{id}', [UserController::class, 'update'])->name('admin.users.update');
//     Route::get('/users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');
    
    
//     Route::get('/blogs', [BlogController::class, 'index'])->name('admin.blogs');
//     Route::get('/contactus', [ContactUsController::class, 'index'])->name('admin.contactus');
//     Route::get('/aboutus', [AboutUsController::class, 'index'])->name('admin.aboutus');
//     Route::get('/faq', [FAQController::class, 'index'])->name('admin.faq');
//     Route::get('/customers', [CustomerController::class, 'index'])->name('admin.customers');
//     Route::get('/status', [StatusController::class, 'index'])->name('admin.status');
//     Route::get('/status/create', [StatusController::class, 'create'])->name('admin.status.create');
// });




