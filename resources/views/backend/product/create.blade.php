@extends('backend.layout.master')
@section('title', 'Add new Product')
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
                    <h1 class="page-title"> Add new Product </h1>
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
                        <form action="{{ route('admin.store.product') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                {{-- Left Column --}}
                                <div class="col-sm-8">
                                    <div class="row">
                                        {{-- Product Name --}}
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <h4>Product Name</h4>
                                                <input type="text" name="name" class="form-control"
                                                    placeholder="Enter Product Name"
                                                    value="{{ old('name', $content->name ?? '') }}">
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
                                                </div>
                                                <input type="hidden" name="description" id="description"
                                                    value="{{ old('description', $content->description ?? '') }}">
                                                @error('description')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- Main Image --}}
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <h4>Main Image</h4>
                                                <input type="file" name="image" class="form-control dropify"
                                                    data-default-file="{{ isset($content->image) ? asset('uploads/' . $content->image) : '' }}">
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
                                                    data-default-file="{{ isset($content->packing_image) ? asset('uploads/' . $content->packing_image) : '' }}">
                                                @error('packing_image')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Right Column --}}
                                <div class="col-sm-4">
                                    <div class="row">
                                        {{-- Category --}}
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <h4>Category</h4>
                                                <select name="category_id" class="form-control">
                                                    <option value="">Select Category</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}"
                                                            {{ old('category_id', $content->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                                            {{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('category_id')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- Price --}}
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <h4>Price</h4>
                                                <input type="number" step="0.01" name="price" class="form-control"
                                                    placeholder="Enter Price"
                                                    value="{{ old('price', $content->price ?? '') }}">
                                                @error('price')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- Stock --}}
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <h4>Stock</h4>
                                                <input type="number" name="stock" class="form-control"
                                                    placeholder="Enter Stock Quantity"
                                                    value="{{ old('stock', $content->stock ?? '') }}">
                                                @error('stock')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- Discount Percentage --}}
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <h4>Discount (%)</h4>
                                                <input type="number" name="discount_percentage" class="form-control"
                                                    placeholder="Enter Discount Percentage"
                                                    value="{{ old('discount_percentage', $content->discount_percentage ?? '') }}">
                                                @error('discount_percentage')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- <div class="col-sm-12">
                                            <div class="form-group">
                                                <h4 class="control-label" for="bss2">Select Locations</h4>
                                                <select id="bss2" class="form-control" name="location[]" data-toggle="selectpicker"
                                                    data-width="100%" title="Choose one or more" multiple>
                                                    @foreach ($locations as $location)
                                                        <option value="{{ $location->id }}">{{ $location->location }}</option>
                                                    @endforeach
                                                </select>
                                            </div><!-- /.form-group -->
                                        </div> --}}
                                        {{-- Fruit Image --}}
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <h4>Fruit Image</h4>
                                                <input type="file" name="fruit_image" class="form-control dropify"
                                                    data-default-file="{{ isset($content->fruit_image) ? asset('uploads/' . $content->fruit_image) : '' }}">
                                                @error('fruit_image')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Submit --}}
                                <div class="col-sm-12 text-right mt-3">
                                    <button type="submit" class="btn btn-lg btn-primary">Save</button>
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
        $(document).ready(function() {
            $('#summernote-description').summernote({
                placeholder: 'Enter Product Description',
                height: 150
            });

            // Set initial content from backend


            // On form submit, copy content to hidden input
            $('form').on('submit', function() {
                $('#description').val($('#summernote-description').summernote('code'));
            });
        });
    </script>
@endpush
