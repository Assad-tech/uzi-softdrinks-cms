<?php

// app/Http/Controllers/Admin/ProductController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\location;
use Illuminate\Support\Str;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::with('category')->latest()->get();
        $banners = Banner::where('page', 'product')->get();

        // dd($products);
        return view('backend.product.index', compact('products', 'banners'));
    }

    public function create()
    {
        $categories = Category::all();
        // $locations = location::all();
        return view('backend.product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'discount_percentage' => 'nullable|numeric|min:0|max:100',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp',
            'packing_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp',
            'fruit_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp',
            // 'location' => 'required|array',
            // 'location.*' => 'exists:locations,id',
        ]);
        $imageName = null;
        $packingImageName = null;
        $fruitImageName = null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . '_product.' . $file->getClientOriginalExtension();
            $file->move(public_path('front/assets/images/products'), $imageName);
        }

        if ($request->hasFile('packing_image')) {
            $file = $request->file('packing_image');
            $packingImageName = time() . '_packing.' . $file->getClientOriginalExtension();
            $file->move(public_path('front/assets/images/products'), $packingImageName);
        }

        if ($request->hasFile('fruit_image')) {
            $file = $request->file('fruit_image');
            $fruitImageName = time() . '_fruit.' . $file->getClientOriginalExtension();
            $file->move(public_path('front/assets/images/products'), $fruitImageName);
        }

        // dd($imageName, $packingImageName, $fruitImageName);
        $product = Product::create([
            'name' => $request->name,
            'slug' => $request->slug ?? Str::slug($request->name),
            'category_id' => $request->category_id,
            'description' => $request->description ?? null,
            'price' => $request->price,
            'stock' => $request->stock,
            'discount_percentage' => $request->discount_percentage,
            'image' => $imageName,
            'packing_image' => $packingImageName,
            'fruit_image' => $fruitImageName,
            'status' => 1,
            'featured' => 0,
        ]);

        // Attach selected locations to product
        $product->locations()->sync($request->location);

        toastr()->success('Product created successfully.');
        return redirect()->route('admin.manage.products');
    }

    public function edit($id)
    {

        $categories = Category::all();
        $locations = Location::all();
        $product = Product::with(['category', 'locations'])->findOrFail($id);

        // dd($product);
        return view('backend.product.edit', compact('product', 'categories', 'locations'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'discount_percentage' => 'nullable|numeric|min:0|max:100',
            'location' => 'required|array',
            'location.*' => 'exists:locations,id',

            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
            'packing_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
            'fruit_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',

            // 'slug' => 'nullable|string|unique:products,slug,' . ($product->id ?? 'null'),
        ]);


        $product = Product::findOrFail($id);
        // Start with existing values
        $imageName = $product->image;
        $packingImageName = $product->packing_image;
        $fruitImageName = $product->fruit_image;
        // Handle image uploads
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . '_product.' . $file->getClientOriginalExtension();
            $file->move(public_path('front/assets/images/products'), $imageName);
        }

        if ($request->hasFile('packing_image')) {
            $file = $request->file('packing_image');
            $packingImageName = time() . '_packing.' . $file->getClientOriginalExtension();
            $file->move(public_path('front/assets/images/products'), $packingImageName);
        }

        if ($request->hasFile('fruit_image')) {
            $file = $request->file('fruit_image');
            $fruitImageName = time() . '_fruit.' . $file->getClientOriginalExtension();
            $file->move(public_path('front/assets/images/products'), $fruitImageName);
        }

        $product->update([
            'name' => $request->name,
            'slug' => $request->slug ?? Str::slug($request->name),
            'category_id' => $request->category_id,
            'description' => $request->description ?? null,
            'price' => $request->price,
            'stock' => $request->stock,
            'discount_percentage' => $request->discount_percentage,
            'image' => $imageName,
            'packing_image' => $packingImageName,
            'fruit_image' => $fruitImageName,
            'status' => 1,
            'featured' => 0,
        ]);
        $product->locations()->sync($request->location);

        toastr()->success('Product updated successfully.');
        return redirect()->route('admin.manage.products');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        toastr()->success('Product deleted successfully.');
        return redirect()->route('admin.manage.products');
    }

    // __________ Priduct Banner _________
    // Create new Priduct Banner 
    public function createBanner()
    {
        return view('backend.product.createBanner');
    }
    // Store new Priduct Banner
    public function storeBanner(Request $request)
    {
        // dd($request);
        $request->validate([
            'page' => 'required|in:product',
            'greeting' => 'nullable|string',
            'site_name' => 'nullable|string',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
            'banner_description' => 'nullable|string',
            'link_on_banner' => 'nullable|url',
            'link_text' => 'nullable|string',
        ]);

        // dd($request);
        $banner = new Banner();

        if ($request->hasFile('banner_image')) {
            $file = $request->file('banner_image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('front/assets/images/banners'), $fileName);
            $banner->banner = $fileName;
        }

        $banner->page = $request->page ?? "product";
        $banner->greeting = $request->greeting;
        $banner->site_name = $request->site_name;
        $banner->banner_description = $request->banner_description;
        $banner->banner_link = $request->link_on_banner;
        $banner->link_text = $request->link_text;
        $banner->save();
        toastr()->success('Banner created successfully!');
        return redirect()->route('admin.manage.products');
    }

    // Edit Priduct Banner
    public function editBanner($id)
    {
        $content = Banner::where('page', 'product')->where('id', $id)->first();
        return view('backend.product.editBanner', compact('content'));
    }

    // Update Priduct Banner
    public function updateBanner(Request $request, $id)
    {
        // dd($request);
        $request->validate([
            'page' => 'required|in:product',
            'greeting' => 'nullable|string',
            'site_name' => 'required|string',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
            'banner_description' => 'nullable|string',
            'link_on_banner' => 'nullable|url',
            'link_text' => 'nullable|string',
        ]);

        $updateBanner = Banner::find($id);

        // dd($updateBanner);
        if ($request->hasFile('banner_image')) {
            if ($updateBanner->banner && file_exists(public_path('front/assets/images/banners/' . $updateBanner->banner))) {
                unlink(public_path('front/assets/images/banners/' . $updateBanner->banner));
            }
            $file = $request->file('banner_image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('front/assets/images/banners'), $fileName);
            $updateBanner->banner = $fileName;
        }

        $updateBanner->page = $request->page ?? "product";
        $updateBanner->greeting = $request->greeting;
        $updateBanner->site_name = $request->site_name;
        $updateBanner->banner_description = $request->banner_description;
        $updateBanner->banner_link = $request->link_on_banner;
        $updateBanner->link_text = $request->link_text;
        $updateBanner->save();
        toastr()->success('Banner updated successfully!');
        return redirect()->route('admin.manage.products');
    }

    // Delete Priduct Banner
    public function deleteBanner($id)
    {
        $banner = Banner::findOrFail($id);
        $banner->delete();
        toastr()->success('Banner deleted successfully!');
        return redirect()->route('admin.manage.products');
    }
}
