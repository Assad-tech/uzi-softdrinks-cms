<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\location;
use App\Models\LocationCoordinate;
use App\Models\Product;
use App\Models\Product_location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductLocationController extends Controller
{

    public function index()
    {
        // Retrieve products with their locations and coordinates
        $products = Product::with('productLocations.location', 'productLocations.locationCoordinates')->get();
        // dd($product_locations);

        return view('backend.productLocation.index', compact('products'));
    }

    public function create()
    {
        $products = Product::where('status', 1)->get();
        $locations = location::all();

        return view('backend.productLocation.create', compact('products', 'locations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate request data
        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
            'location_id' => 'required|exists:locations,id',
            'locations.*.place' => 'required|string|max:255',
            'locations.*.latitude' => 'required|numeric|between:-90,90',
            'locations.*.longitude' => 'required|numeric|between:-180,180',
        ], [
            'product_id.required' => 'Please select a product.',
            'location_id.required' => 'Please select a location.',
            'locations.*.place.required' => 'The place name is required.',
            'locations.*.latitude.required' => 'Latitude is required.',
            'locations.*.latitude.numeric' => 'Invalid latitude value.',
            'locations.*.longitude.required' => 'Longitude is required.',
            'locations.*.longitude.numeric' => 'Invalid longitude value.',
        ]);

        try {
            DB::beginTransaction();

            // Check if the product is already assigned to the location
            $existingProLoc = Product_location::where('product_id', $validatedData['product_id'])
                ->where('location_id', $validatedData['location_id'])
                ->first();

            if ($existingProLoc) {
                // Product already assigned to the location, add new coordinates
                foreach ($validatedData['locations'] as $location) {
                    $existingProLoc->locationCoordinates()->create([
                        'place' => $location['place'],
                        'latitude' => $location['latitude'],
                        'longitude' => $location['longitude'],
                    ]);
                }
            } else {
                // Create new ProductLocation
                $newProLoc = new Product_location();
                $newProLoc->product_id = $validatedData['product_id'];
                $newProLoc->location_id = $validatedData['location_id'];
                $newProLoc->save();

                // Save Location Coordinates
                foreach ($validatedData['locations'] as $location) {
                    $newProLoc->locationCoordinates()->create([
                        'place' => $location['place'],
                        'latitude' => $location['latitude'],
                        'longitude' => $location['longitude'],
                    ]);
                }
            }

            DB::commit();

            toastr()->success('Product Location updated successfully.');
            return redirect()->route('admin.manage.product-locations');
        } catch (\Exception $e) {
            DB::rollBack();
            toastr()->error('An error occurred while saving the Product Location.');
            return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function edit($id, $location_id)
    {
        // Fetch the product with the specific location and coordinates
        $productPlaces = Product::with(
            ['locations' => function ($query) use ($location_id) {
                $query->where('location_id', $location_id)->with('location', 'locationCoordinates');
            }]
        )->where('id', $id)->first();

        // Fetch all products and locations for dropdowns
        $products = Product::all();
        $locations = Location::all();
        dd($productPlaces);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
