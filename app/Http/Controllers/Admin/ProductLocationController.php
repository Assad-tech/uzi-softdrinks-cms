<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\location;
use App\Models\LocationCoordinate;
use App\Models\Product;
use App\Models\Product_location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

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
        $productPlaces = Product::with(['productLocations' => function ($query) use ($location_id) {
            $query->where('location_id', $location_id)
                ->with('locationCoordinates');
        }])
            ->where('id', $id)
            ->whereHas('productLocations', function (Builder $query) use ($location_id) {
                $query->where('location_id', $location_id);
            })
            ->first();
        // Fetch all products and locations for dropdowns
        $products = Product::all();
        $locations = Location::all();
        return view('backend.productLocation.edit', compact('productPlaces', 'products', 'locations'));
    }

    public function update(Request $request, string $id, string $location_id)
    {
        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
            'location_id' => 'required|exists:locations,id',
            'locations.*.id' => 'nullable|integer|exists:location_coordinates,id',
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

            // Find the Product_location
            $productLocation = Product_location::where('product_id', $validatedData['product_id'])
                ->where('location_id', $validatedData['location_id'])
                ->firstOrFail();


            // Collect existing coordinate IDs from request
            $submittedIds = collect($validatedData['locations'])->pluck('id')->filter()->toArray();

            // dd($submittedIds);
            // 4. Delete removed coordinates (those not in submitted IDs)
            LocationCoordinate::where('coordinate_id', $productLocation->id)
                ->whereNotIn('id', $submittedIds)
                ->delete();

            // 5. Update existing & add new coordinates
            foreach ($validatedData['locations'] as $location) {
                if (isset($location['id'])) {
                    // Update existing
                    $coordinate = LocationCoordinate::where('id', $location['id'])
                        ->where('coordinate_id', $productLocation->id)
                        ->first();
                    if ($coordinate) {
                        $coordinate->update([
                            'place' => $location['place'],
                            'latitude' => $location['latitude'],
                            'longitude' => $location['longitude'],
                        ]);
                    }
                } else {
                    // New coordinate
                    $productLocation->locationCoordinates()->create([
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
            toastr()->error('An error occurred while updating the Product Location.');
            return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(string $id, string $location_id)
    {
        // Find the Product_location record matching product and location
        $productLocation = Product_location::where('product_id', $id)
            ->where('location_id', $location_id)
            ->firstOrFail();

        // Delete all related locationCoordinates
        $productLocation->locationCoordinates()->delete();

        // Delete the productLocation itself
        $productLocation->delete();

        toastr()->success('Product Location and its coordinates deleted successfully.');
        return redirect()->route('admin.manage.product-locations');
    }
}
