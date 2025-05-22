<?php

use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CompanyLogoController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FAQsController;
use App\Http\Controllers\Admin\FeaturedController;
use App\Http\Controllers\Admin\IngredientController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductLocationController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\SiteContentController;
use App\Http\Controllers\Admin\TermsConditionController;
use App\Http\Controllers\Front\AuthController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\UserDashboardController;
use Illuminate\Support\Facades\Route;

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

// Guest routes
Route::middleware('guest:web')->group(function () {
    // User Auth
    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', 'index')->name('user.login');
        Route::post('/login-post', 'login')->name('user.login.submit');
        Route::get('/register', 'register')->name('user.register');
        Route::post('/register-post', 'store')->name('user.register.submit');
    });
});

Route::middleware('guest:admin')->prefix('admin')->group(function () {
    // Admin Auth
    Route::controller(AdminAuthController::class)->group(function () {
        Route::get('/login', 'index')->name('admin.login');
        Route::post('/login', 'login')->name('admin.login.submit');
    });
});

// Authenticated user routes
Route::middleware('auth:web')->group(function () {
    Route::controller(UserDashboardController::class)->group(function () {
        Route::get('/home', 'index')->name('user.home');
        Route::get('/profile', 'profile')->name('user.profile');
        Route::get('/checkout', 'checkout')->name('checkout');
        Route::post('/shipping-details/update', 'updateShipping')->name('user.update.shipping-details');
        Route::get('proceed-to-pay/{id}', 'proceedToPay')->name('user.proceed.to.pay');
        Route::get('/orders', 'orders')->name('user.orders');
    });
    Route::controller(AuthController::class)->group(function () {
        Route::get('/logout', 'logout')->name('user.logout');
    });
});

// Authenticated admin routes
Route::middleware('auth:admin')->prefix('admin')->group(function () {

    Route::controller(AdminAuthController::class)->group(function () {
        Route::get('/profile', 'profile')->name('admin.profile');
        Route::post('/update-profile', 'updateProfile')->name('admin.profile.update');
        Route::get('/logout', 'logout')->name('admin.logout');
    });
    // Admin Dashboard Routes
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('admin.dashboard');
        // Manage Home Sliders
        Route::get('/home-sliders', 'viewHome')->name('admin.manage.home');
        Route::get('/add/home', 'create')->name('admin.add.home');
        Route::post('/store/home', 'store')->name('admin.store.home');
        Route::get('/edit/home/{id}', 'edit')->name('admin.edit.home');
        Route::post('/update/home/{id}', 'update')->name('admin.update.home');
        Route::get('/delete/home/{id}', 'delete')->name('admin.delete.home');
    });
    //Site Content Routes
    Route::controller(SiteContentController::class)->group(function () {
        Route::get('/site-content', 'index')->name('admin.site-content');
        Route::post('/update/site-content', 'updateContent')->name('admin.site-content.update');

        Route::get('/social-links', 'socialLinks')->name('admin.social-links');
        Route::post('/update/social-links', 'updateSocialLinks')->name('admin.social-links.update');

        // Banners Routes
        Route::get('/banners', 'banners')->name('admin.banners');
        Route::get('/add/banner', 'create')->name('admin.add.banner');
        Route::post('/store/banner', 'store')->name('admin.store.banner');
        Route::get('/edit/banner/{id}', 'edit')->name('admin.edit.banner');
        Route::post('/update/banner/{id}', 'update')->name('admin.update.banner');
        Route::get('/delete/banner/{id}', 'delete')->name('admin.delete.banner');
    });
    // Company Logos
    Route::controller(CompanyLogoController::class)->group(function () {
        Route::get('/company-logos', 'index')->name('admin.manage.company-logos');
        Route::get('/add/company-logo', 'create')->name('admin.add.company-logo');
        Route::post('/store/company-logo', 'store')->name('admin.store.company-logo');
        Route::get('/edit/company-logo/{id}', 'edit')->name('admin.edit.company-logo');
        Route::post('/update/company-logo/{id}', 'update')->name('admin.update.company-logo');
        Route::get('/delete/company-logo/{id}', 'delete')->name('admin.delete.company-logo');
    });
    // About Us Routes
    Route::controller(AboutUsController::class)->group(function () {

        // Route::get('/about-us/banner/delete/{id}', 'deleteBanner')->name('admin.about-us.delete.banner');
        // About Us
        Route::get('/about-us', 'index')->name('admin.manage.about-us');
        Route::get('about-us/add/', 'create')->name('admin.about-us.create');
        Route::post('/about-us/store', 'store')->name('admin.about-us.store');
        Route::get('/about-us/edit/{id}', 'edit')->name('admin.about-us.edit');
        Route::post('/about-us/update/{id}', 'updateAboutUs')->name('admin.update.about-us');

        // Stats
        // Route::get('/about-us/stats/create', 'createStats')->name('admin.about-us.create.stats');
        // Route::post('/about-us/stats/store', 'storeStats')->name('admin.about-us.store.stats');
        // Route::get('/about-us/stats/edit/{id}', 'editStats')->name('admin.about-us.edit.stats');
        // Route::post('/about-us/stats/update/{id}', 'updateStats')->name('admin.about-us.update.stats');
        // Route::get('/about-us/stats/delete/{id}', 'deleteStats')->name('admin.about-us.delete.stats');
        // Company Logos and links 
        // Route::get('/about-us/client/create', 'createClient')->name('admin.about-us.create.client');
        // Route::post('/about-us/client/store', 'storeClient')->name('admin.about-us.store.client');
        // Route::get('/about-us/client/edit/{id}', 'editClient')->name('admin.about-us.edit.client');
        // Route::post('/about-us/client/update/{id}', 'updateClient')->name('admin.about-us.update.client');
        // Route::get('/about-us/client/delete/{id}', 'deleteClient')->name('admin.about-us.delete.client');
    });
    // Categories Routes
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/categories', 'index')->name('admin.manage.categories');
        Route::get('/add/category', 'create')->name('admin.add.category');
        Route::post('/store/category', 'store')->name('admin.store.category');
        Route::get('/edit/category/{id}', 'edit')->name('admin.edit.category');
        Route::post('/update/category/{id}', 'update')->name('admin.update.category');
        Route::get('/delete/category/{id}', 'destroy')->name('admin.delete.category');
    });

    // Location Routes
    Route::controller(LocationController::class)->group(function () {
        Route::get('/locations', 'index')->name('admin.manage.locations');
        Route::get('/add/location', 'create')->name('admin.add.location');
        Route::post('/store/location', 'store')->name('admin.store.location');
        Route::get('/edit/location/{id}', 'edit')->name('admin.edit.location');
        Route::post('/update/location/{id}', 'update')->name('admin.update.location');
        Route::get('/delete/location/{id}', 'destroy')->name('admin.delete.location');
    });
    // Products Routes
    Route::controller(ProductController::class)->group(function () {
        // Banner
        // Route::get('product/add-banner/', 'createBanner')->name('admin.product.create.banner');
        // Route::post('/product/banner/store', 'storeBanner')->name('admin.product.store.banner');
        // Route::get('/product/banner/edit/{id}', 'editBanner')->name('admin.product.edit.banner');
        // Route::post('/product/banner/update/{id}', 'updateBanner')->name('admin.product.update.banner');
        // Route::get('/product/banner/delete/{id}', 'deleteBanner')->name('admin.product.delete.banner');
        // Products
        Route::get('/products', 'index')->name('admin.manage.products');
        Route::get('/add/product', 'create')->name('admin.add.product');
        Route::post('/store/product', 'store')->name('admin.store.product');
        Route::get('/edit/product/{id}', 'edit')->name('admin.edit.product');
        Route::post('/update/product/{id}', 'update')->name('admin.update.product');
        Route::get('/delete/product/{id}', 'destroy')->name('admin.delete.product');
    });

    // Product Locations Routes
    Route::controller(ProductLocationController::class)->group(function () {
        Route::get('/product-locations', 'index')->name('admin.manage.product-locations');
        Route::get('/add/product-location', 'create')->name('admin.add.product-location');
        Route::post('/store/product-location', 'store')->name('admin.store.product-location');
        Route::get('/edit/product-location/{id}/{location_id}', 'edit')->name('admin.edit.product-location');
        Route::post('/update/product-location/{id}/{location_id}', 'update')->name('admin.update.product-location');
        Route::get('/delete/product-location/{id}/{location_id}', 'destroy')->name('admin.delete.product-location');
    });

    // Ingredients Routes
    Route::controller(IngredientController::class)->group(function () {
        Route::get('/ingredients', 'index')->name('admin.manage.ingredients');
        Route::get('/add/ingredient', 'create')->name('admin.add.ingredient');
        Route::post('/store/ingredient', 'store')->name('admin.store.ingredient');
        Route::get('/edit/ingredient/{id}', 'edit')->name('admin.edit.ingredient');
        Route::post('/update/ingredient/{id}', 'update')->name('admin.update.ingredient');
        Route::get('/delete/ingredient/{id}', 'destroy')->name('admin.delete.ingredient');
    });

    // Terms & Conditions Routes
    Route::controller(TermsConditionController::class)->group(function () {
        Route::get('/terms-conditions', 'index')->name('admin.manage.terms-conditions');
        Route::post('/update/terms-conditions', 'update')->name('admin.terms-conditions.update');
    });
    // Orders Routes
    Route::controller(OrderController::class)->group(function () {
        Route::get('/orders', 'index')->name('admin.manage.orders');
        Route::get('/orders/view/{id}', 'show')->name('admin.view.order');
    });
});




// Frontend Routes
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get('/ingredients', 'ingredients')->name('ingredients');
    Route::get('/find-uzi', 'findUzi')->name('find.uzi');
    Route::get('/api/product-locations/{id}/{location_id}', 'getLocations');
    Route::get('/shop', 'shop')->name('shop');
    Route::get('/shop/product-details', 'viewProduct')->name('product.details');
    Route::get('/cart', 'viewCart')->name('view.cart');
    Route::get('/terms-and-conditions', 'termsAndConditions')->name('terms-and-conditions');
});


// Route::get('/test-map', function () {
//     return view('frontend.testingMaps');
// });
