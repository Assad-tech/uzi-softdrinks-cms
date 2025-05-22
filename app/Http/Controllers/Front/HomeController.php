<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\ContactMessageReceived;
use App\Models\AboutOurClient;
use App\Models\AboutUs;
use App\Models\AboutUsStats;
use App\Models\Banner;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\ContactUs;
use App\Models\FAQ;
use App\Models\Home;
use App\Models\HomeFeatured;
use App\Models\Ingredient;
use App\Models\location;
use App\Models\NewsLatterEmail;
use App\Models\Product;
use App\Models\Service;
use App\Models\TermAndCondition;
use App\Models\Testimonial;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    // homepage
    public function index()
    {
        $banner = Banner::where('page', 'home')->first();
        $products = Product::with('locations')->where('status', 1)->get();
        $sliders = Home::where('type', 'malibu')->get();
        $ingredients = Ingredient::all();
        // dd($sliders);
        return view('frontend.index', compact('banner', 'products', 'sliders', 'ingredients'));
    }

    // about us
    public function about()
    {
        $aboutBanners = AboutUs::get();
        $about = Banner::where('page', 'about')->first();
        // dd($aboutBanners);
        return view('frontend.aboutUs', compact('aboutBanners', 'about'));
    }

    // ingredients
    public function ingredients()
    {
        $banner = Banner::where('page', 'ingredients')->first();
        $ingredients = Ingredient::all();
        return view('frontend.ingredients', compact('banner', 'ingredients'));
    }

    // Find Uzi
    public function findUzi()
    {
        $products = Product::with('locations')->where('status', 1)->get();
        $locations = location::all();
        $banner = Banner::where('page', 'find uzi')->first();
        $logos = AboutOurClient::all();

        // dd($products);
        return view('frontend.findUzi', compact('products', 'locations', 'banner', 'logos'));
    }

    // get Lcations by Ajax
    public function getLocations($id, $location_id)
    {
        // dd('product_id = ' . $id . ' :: location_id = ' . $location_id);
        // $locations = Location::whereHas('products', function ($q) use ($id) {
        //     $q->where('product_id', $id);
        // })->get();

        $locations = Product::with(['productLocations' => function ($query) use ($location_id) {
            $query->where('location_id', $location_id)
                ->with('locationCoordinates');
        }])
            ->where('id', $id)
            ->whereHas('productLocations', function (Builder $query) use ($location_id) {
                $query->where('location_id', $location_id);
            })
            ->first();

            // dd($locations);
        return response()->json($locations);
    }

    // products
    public function shop()
    {
        return view('frontend.products');
    }

    // view Product
    public function viewProduct()
    {
        return view('frontend.viewProduct');
    }

    // Terms and Conditions
    public function termsAndConditions()
    {
        $terms = TermAndCondition::first();
        return view('frontend.termsAndConditions', compact('terms'));
    }

    // _______________ Product Carts Methods _________________

    public function viewCart()
    {
        return view('frontend.viewCart');
    }

    public function addToCart(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::find($request->product_id);

        if (!$product) {
            toastr()->error('Product not found!');
            return redirect()->back();
        }

        if (!Auth::check()) {
            toastr()->error('You must be logged in to add to cart.');
            return redirect()->back();
        }

        $quantity = $request->quantity;

        // Check if sufficient stock is available
        if ($product->stock < $quantity) {
            toastr()->error('Not enough stock available.');
            return redirect()->back();
        }

        DB::beginTransaction();

        try {
            $user = Auth::user();

            // Find or create the user's cart
            $cart = Cart::firstOrCreate([
                'user_id' => $user->id,
            ]);

            // Find if item already in cart
            $cartItem = CartItem::where('cart_id', $cart->id)
                ->where('product_id', $product->id)
                ->first();

            if ($cartItem) {
                // Update quantity
                $cartItem->increment('quantity', $quantity);
            } else {
                // Create new cart item
                CartItem::create([
                    'cart_id' => $cart->id,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                ]);
            }

            // Decrease stock accordingly
            $product->decrement('stock', $quantity);

            DB::commit();

            toastr()->success('Product added to cart!');
        } catch (\Exception $e) {
            DB::rollBack();
            toastr()->error('Failed to add product to cart.');
        }

        if ($request->action == 'add_to_cart') {
            return redirect()->back();
        } elseif ($request->action == 'buy_now') {
            return redirect()->route('checkout');
        }
    }

    public function updateCart(Request $request, $id)
    {
        $cartItem = CartItem::find($id);
        if (!$cartItem) {
            return response()->json(['error' => true, 'message' => 'Cart item not found.']);
        }

        $cartItem->update(['quantity' => $request->quantity]);
        return response()->json(['success' => true, 'message' => 'Quantity updated successfully.']);
    }

    public function removeCart($id)
    {
        $cartItem = CartItem::find($id);
        if (!$cartItem) {
            return response()->json(['error' => true, 'message' => 'Cart item not found.']);
        }

        $cartItem->delete();
        return response()->json(['success' => true, 'message' => 'Cart item removed successfully.']);
    }
}
