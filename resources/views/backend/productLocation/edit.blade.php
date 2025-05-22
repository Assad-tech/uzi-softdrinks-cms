@extends('backend.layout.master')
@section('title', 'Update location to Product')
@push('custom_css')
@endpush
@section('content')

    <!-- .page -->
    <div class="page bg-white">
        <!-- .page-inner -->
        <div class="page-inner">
            <!-- .page-title-bar -->
            <header class="page-title-bar">
                <div class="d-flex justify-content-between">
                    <h1 class="page-title"> Update new location to Product </h1>
                    <div class="btn-toolbar">
                        {{-- <button type="button" class="btn btn-primary">Add team</button> --}}
                    </div>
                </div>
            </header><!-- /.page-title-bar -->
            <!-- .page-section -->
            <div class="page-section">
                <!-- .card -->
                <div class="card card-fluid bg-light">
                    <!-- .card-body -->
                    <div class="card-body">
                        <form
                            action="{{ route('admin.update.product-location', [$productPlaces->id, $productPlaces->productLocations[0]->location_id]) }}"
                            method="POST">
                            @csrf
                            <div class="row mb-4">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <h4>Product</h4>
                                        <select name="product_id" class="form-control">
                                            <option value="">Select Product</option>
                                            @foreach ($products as $product)
                                                <option value="{{ $product->id }}"
                                                    {{ old('product_id', $productPlaces->id) == $product->id ? 'selected' : '' }}>
                                                    {{ $product->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('product_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <h4>Location</h4>
                                        <select name="location_id" class="form-control">
                                            <option value="">Select Location</option>
                                            @foreach ($locations as $location)
                                                <option value="{{ $location->id }}"
                                                    {{ old('location_id', $productPlaces->productLocations[0]->location_id) == $location->id ? 'selected' : '' }}>
                                                    {{ $location->location }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('location_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <h3>Edit Coordinates</h3>
                            <hr>

                            <div id="coordinates-container">
                                @foreach ($productPlaces->productLocations[0]->locationCoordinates as $index => $coordinate)
                                    <div class="row coordinates-row">
                                        <input type="hidden" name="locations[{{ $index }}][id]"
                                            value="{{ $coordinate->id }}">
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label>Place Name</label>
                                                <input type="text" name="locations[{{ $index }}][place]"
                                                    class="form-control"
                                                    value="{{ old("locations.$index.place", $coordinate->place) }}">
                                                @error("locations.$index.place")
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Latitude</label>
                                                <input type="text" name="locations[{{ $index }}][latitude]"
                                                    class="form-control"
                                                    value="{{ old("locations.$index.latitude", $coordinate->latitude) }}">
                                                @error("locations.$index.latitude")
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Longitude</label>
                                                <input type="text" name="locations[{{ $index }}][longitude]"
                                                    class="form-control"
                                                    value="{{ old("locations.$index.longitude", $coordinate->longitude) }}">
                                                @error("locations.$index.longitude")
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-1 d-flex align-items-center">
                                            <button type="button" class="btn btn-danger btn-sm remove-row">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="row">
                                <div class="col-sm-12 text-right">
                                    <button type="button" id="add-coordinate" class="btn btn-success">Add More
                                        Coordinates</button>
                                </div>
                                <div class="col-sm-12 mt-3">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>


                    </div><!-- /.card-body -->

                </div><!-- /.card -->
            </div><!-- /.page-section -->
        </div><!-- /.page-inner -->
    </div><!-- /.page -->


@endsection

@push('custom_js')
    <script>
        document.getElementById('add-coordinate').addEventListener('click', function() {
            let container = document.getElementById('coordinates-container');
            let index = container.querySelectorAll('.coordinates-row').length;

            let row = `
            <div class="row coordinates-row">
                <div class="col-sm-5">
                    <div class="form-group">
                        <label>Place Name</label>
                        <input type="text" name="locations[${index}][place]" class="form-control" placeholder="Enter Place">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Latitude</label>
                        <input type="text" name="locations[${index}][latitude]" class="form-control" placeholder="Enter Latitude">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Longitude</label>
                        <input type="text" name="locations[${index}][longitude]" class="form-control" placeholder="Enter Longitude">
                    </div>
                </div>
                <div class="col-sm-1 d-flex align-items-center">
                    <button type="button" class="btn btn-danger btn-sm remove-row"><i class="fa fa-trash"></i></button>
                </div>
            </div>
        `;

            container.insertAdjacentHTML('beforeend', row);
        });

        document.addEventListener('click', function(e) {
            if (e.target.closest('.remove-row')) {
                e.target.closest('.coordinates-row').remove();
            }
        });
    </script>
@endpush
