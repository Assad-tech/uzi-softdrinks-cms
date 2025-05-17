@extends('backend.layout.master')
@section('title', 'Add location to Product')
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
                    <h1 class="page-title"> Add new location to Product </h1>
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
                        <form action="{{ route('admin.store.product-location') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            {{-- Products and Locations dropdown --}}
                            <div class="row mb-4">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <h4>Product</h4>
                                        <select name="product_id" class="form-control">
                                            <option value="">Select Product</option>
                                            @foreach ($products as $product)
                                                <option value="{{ $product->id }}"
                                                    {{ old('product_id', $content->product_id ?? '') == $product->id ? 'selected' : '' }}>
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
                                                    {{ old('location_id', $content->location_id ?? '') == $location->id ? 'selected' : '' }}>
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
                            <h3>Add Coordinates</h3>
                            <hr>
                            {{-- Dynamic coordinates fields container --}}
                            <div id="coordinates-container">
                                <div class="row coordinates-row">
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label>Place Name</label>
                                            <input type="text" name="locations[0][place]" class="form-control"
                                                placeholder="Enter Place" value="{{ old('locations.0.place') }}">
                                            @error('locations.0.place')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Latitude</label>
                                            <input type="text" name="locations[0][latitude]" class="form-control"
                                                placeholder="Enter Latitude" value="{{ old('locations.0.latitude') }}">
                                            @error('locations.0.latitude')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Longitude</label>
                                            <input type="text" name="locations[0][longitude]" class="form-control"
                                                placeholder="Enter Longitude" value="{{ old('locations.0.longitude') }}">
                                            @error('locations.0.longitude')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-1 d-flex align-items-center">
                                        <button type="button" class="btn btn-danger btn-sm"
                                            style="display: none;">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12 text-right">
                                    <button type="button" id="add-coordinate" class="btn btn-success">Add More
                                        Coordinates</button>
                                </div>
                                <div class="col-sm-12 mt-3">
                                    <button type="submit" class="btn btn-primary">Save</button>
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
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script>
        $(document).ready(function() {
            let coordinateIndex = 1; // To track the dynamic index for field names

            // Function to update visibility of remove buttons
            function updateRemoveButtons() {
                const rows = $(".coordinates-row");
                rows.find(".remove-coordinate").show(); // Show all remove buttons
                if (rows.length === 1) {
                    rows.find(".remove-coordinate").hide(); // Hide remove button if only one row
                }
            }

            // Add a new coordinate row
            $("#add-coordinate").on("click", function() {
                const newRow = $(`
        <div class="row coordinates-row">
            <div class="col-sm-5">
                <div class="form-group">
                    <label>Place Name</label>
                    <input type="text" name="locations[${coordinateIndex}][place]" class="form-control" placeholder="Enter Place">
                    <div class="text-danger"></div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Latitude</label>
                    <input type="text" name="locations[${coordinateIndex}][latitude]" class="form-control" placeholder="Enter Latitude">
                    <div class="text-danger"></div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Longitude</label>
                    <input type="text" name="locations[${coordinateIndex}][longitude]" class="form-control" placeholder="Enter Longitude">
                    <div class="text-danger"></div>
                </div>
            </div>
            <div class="col-sm-1 d-flex align-items-center" style="margin-top: 0.70rem;">
                <button type="button" class="btn btn-danger btn-sm remove-coordinate">
                    <i class="fa fa-trash"></i>
                </button>
            </div>
        </div>
    `);
                $("#coordinates-container").append(newRow);
                coordinateIndex++;
                updateRemoveButtons();
            });

            // Remove a coordinate row
            $("#coordinates-container").on("click", ".remove-coordinate", function() {
                $(this).closest(".coordinates-row").remove();
                updateRemoveButtons();
            });

            // Initial setup for remove buttons
            updateRemoveButtons();
        });
    </script>
@endpush
