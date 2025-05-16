@extends('backend.layout.master')
@section('title', 'Update Ingredient')
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
                    <h1 class="page-title"> Update Ingredient </h1>
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
                        <form action="{{ route('admin.update.ingredient', $ingredient->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                {{-- Title --}}
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <h4>Title</h4>
                                        <input type="text" name="title" class="form-control"
                                            placeholder="Enter Title"
                                            value="{{ old('title', $ingredient->title ?? '') }}">
                                        @error('title')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                {{-- Description --}}
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <h4>Description</h4>
                                        <div id="summernote-banner" data-toggle="summernote"
                                            data-placeholder="Enter Description" data-height="150">
                                            {!! old('banner_description', $ingredient->description ?? '') !!}
                                        </div>
                                        <input type="hidden" name="description" id="description">
                                        @error('description')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                {{-- Image --}}
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <h4>Image</h4>
                                        <input type="file" name="image" class="form-control dropify"
                                            data-default-file="{{ asset('front/assets/images/ingredients/' . $ingredient->image) }}">
                                        @error('image')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>

                    </div><!-- /.card-body -->

                </div><!-- /.card -->
            </div><!-- /.page-section -->
        </div><!-- /.page-inner -->
    </div><!-- /.page -->


@endsection

@push('custom_js')
    <script>
        $(document).ready(function () {
            $(document).on('theme:init', function () {
                new SummernoteDemo();
            });

            // Update the hidden input when the form is submitted
            $('form').on('submit', function () {
                $('#description').val($('#summernote-banner').summernote('code'));
            });
        });
    </script>

@endpush