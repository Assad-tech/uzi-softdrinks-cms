@extends('backend.layout.master')
@section('title', 'Add new About ')
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
                    <h1 class="page-title"> Add new Banner </h1>
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
                        <form action="{{ route('admin.about-us.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    {{-- Greeting --}}
                                    <div class="form-group">
                                        <h4>Heading</h4>
                                        <input type="text" name="about_us_heading" class="form-control" placeholder="Enter About Us Heading"
                                            value="{{ old('about_us_heading', $content->about_us_heading ?? '') }}">
                                        @error('about_us_heading')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    {{--  Description --}}
                                    <div class="form-group">
                                        <h4>Description</h4>
                                        <div id="summernote-banner" data-toggle="summernote"
                                            data-placeholder="Enter Description" data-height="150">
                                        </div>
                                        <input type="hidden" name="about_us_description" id="about_us_description">
                                        @error('about_us_description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    {{-- Image --}}
                                    <div class="form-group">
                                        <h4>Image</h4>
                                        <input type="file" name="image" class="form-control dropify">
                                        @error('image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
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

            // Initialize the correct summernote ID
            $('#summernote-banner').summernote({
                placeholder: 'Enter Banner Description',
                height: 150
            });

            // Sync summernote content to hidden input before form submit
            $('form').on('submit', function () {
                $('#about_us_description').val($('#summernote-banner').summernote('code'));
            });
        });
    </script>

@endpush