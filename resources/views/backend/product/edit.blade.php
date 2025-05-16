@extends('backend.layout.master')
@section('title', 'Update Product')
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
                    <h1 class="page-title"> Update Product </h1>
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
                        <form action="{{ route('admin.update.product', $product->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-sm-8">
                                    {{-- Product Name --}}
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <h4>Product Name</h4>
                                            <input type="text" name="name" class="form-control"
                                                placeholder="Enter Product Name" value="{{ old('name', $product->name) }}">
                                            @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Description --}}
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <h4>Description</h4>
                                            <div id="summernote-description" data-toggle="summernote"
                                                data-placeholder="Enter Product Description" data-height="150">
                                                {{ old('description', $product->description) }}</div>
                                            <input type="hidden" name="description" id="description">
                                            @error('description')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Image --}}
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <h4>Image</h4>
                                            <input type="file" name="image" class="form-control dropify"
                                                data-default-file="{{ asset('front/assets/images/products/' . $product->image) }}">
                                            @error('image')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Packing Image --}}
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <h4>Packing Image</h4>
                                            <input type="file" name="packing_image" class="form-control dropify"
                                                data-default-file="{{ asset('front/assets/images/products/' . $product->packing_image) }}">
                                            @error('packing_image')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <div class="col-sm-4">
                                    {{-- Category --}}
                                    <div class="form-group">
                                        <h4>Category</h4>
                                        <select name="category_id" class="form-control">
                                            <option value="">Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Price --}}
                                    <div class="form-group">
                                        <h4>Price</h4>
                                        <input type="number" step="0.01" name="price" class="form-control"
                                            value="{{ old('price', $product->price) }}">
                                        @error('price')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Stock --}}
                                    <div class="form-group">
                                        <h4>Stock</h4>
                                        <input type="number" name="stock" class="form-control"
                                            value="{{ old('stock', $product->stock) }}">
                                        @error('stock')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Discount Percentage --}}
                                    <div class="form-group">
                                        <h4>Discount in Percentage (%)</h4>
                                        <input type="number" name="discount_percentage" class="form-control"
                                            value="{{ old('discount_percentage', $product->discount_percentage) }}">
                                        @error('discount_percentage')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <select id="bss2" class="form-control" name="location[]" data-toggle="selectpicker"
                                        data-width="100%" title="Choose one or more" multiple>
                                        @foreach ($locations as $location)
                                            <option value="{{ $location->id }}"
                                                {{ in_array($location->id, $product->locations->pluck('id')->toArray()) ? 'selected' : '' }}>
                                                {{ $location->location }}
                                            </option>
                                        @endforeach
                                    </select>
                                    {{-- Fruit Image --}}
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <h4>Fruit Image</h4>
                                            <input type="file" name="fruit_image" class="form-control dropify"
                                                data-default-file="{{ asset('front/assets/images/products/' . $product->fruit_image) }}">
                                            @error('fruit_image')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Slug --}}
                                    {{-- <div class="form-group">
                                        <h4>Slug</h4>
                                        <input type="text" name="slug" class="form-control" placeholder="Enter Slug"
                                            value="{{ old('slug', $product->slug) }}">
                                        @error('slug')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div> --}}

                                    {{-- Status
                                    <div class="form-group">
                                        <h4>Status</h4>
                                        <select name="status" class="form-control">
                                            <option value="1"
                                                {{ old('status', $product->status) == 1 ? 'selected' : '' }}>Active
                                            </option>
                                            <option value="0"
                                                {{ old('status', $product->status) == 0 ? 'selected' : '' }}>Inactive
                                            </option>
                                        </select>
                                        @error('status')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div> --}}
                                </div>

                            </div>

                            <button type="submit" class="btn btn-primary">Update Product</button>
                        </form>
                    </div><!-- /.card-body -->

                </div><!-- /.card -->
            </div><!-- /.page-section -->
        </div><!-- /.page-inner -->
    </div><!-- /.page -->


@endsection

@push('custom_js')
    <script>
        $(document).ready(function() {
            // Initialize Summernote
            $('#summernote-description').summernote({
                placeholder: 'Enter Product Description',
                height: 150
            });

            // // Set initial content
            // let initialContent = @json(old('description', $product->description));
            // $('#summernote-description').summernote('code', initialContent);

            // Sync to hidden input on submit
            $('form').on('submit', function() {
                $('#description').val($('#summernote-description').summernote('code'));
            });
        });
    </script>
@endpush
