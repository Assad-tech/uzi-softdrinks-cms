@extends('backend.layout.master')
@section('title', 'Add new Ingredient')
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
                    <h1 class="page-title"> Add new Ingredient </h1>
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
                        <form action="{{ route('admin.store.ingredient') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    {{-- Heading --}}
                                    <div class="form-group">
                                        <h4>Title</h4>
                                        <input type="text" name="title" class="form-control"
                                            placeholder="Enter Title"
                                            value="{{ old('title', $content->title ?? '') }}">
                                        @error('title')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    {{-- Description --}}
                                    <div class="form-group">
                                        <h4>Description</h4>
                                        <div id="summernote-banner" data-toggle="summernote"
                                            data-placeholder="Enter Description" data-height="150">
                                        </div>
                                        <input type="hidden" name="description" id="description">
                                        @error('description')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <!-- image -->
                                    <div class="form-group">
                                        <h4>image</h4>
                                        <input type="file" name="image" class="form-control dropify">
                                        @error('image')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="row">
                                <div class="col-sm-6">
                                    <!-- Banner Link -->
                                    <div class="form-group">
                                        <h4>Banner Link</h4>
                                        <input type="url" name="link_on_banner" class="form-control"
                                            placeholder="Enter Banner Link"
                                            value="{{ old('link_on_banner', $content->banner_link ?? '') }}">
                                        @error('link_on_banner')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <!-- Link Text -->
                                    <div class="form-group">
                                        <h4>Link Text</h4>
                                        <input type="text" name="link_text" class="form-control"
                                            placeholder="Enter Link Text"
                                            value="{{ old('link_text', $content->link_text ?? '') }}">
                                        @error('link_text')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div> --}}

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
        $(document).ready(function() {
            $(document).on('theme:init', function() {
                new SummernoteDemo();
            });

            // Update the hidden input when the form is submitted
            $('form').on('submit', function() {
                $('#description').val($('#summernote-banner').summernote('code'));
            });
        });
    </script>
@endpush
