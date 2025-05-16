@extends('backend.layout.master')
@section('title', 'Update Location')
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
                    <h1 class="page-title"> Update Location</h1>
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
                        <form action="{{ route('admin.update.location', $location->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    {{-- Location --}}
                                    <div class="form-group">
                                        <h4>Location</h4>
                                        <input type="text" name="location" class="form-control"
                                            placeholder="Enter Location"
                                            value="{{ old('location', $location->location ?? '') }}">
                                        @error('location')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    {{-- Latitude --}}
                                    <div class="form-group">
                                        <h4>Latitude</h4>
                                        <input type="text" name="latitude" class="form-control"
                                            placeholder="Enter Latitude"
                                            value="{{ old('latitude', $location->latitude ?? '') }}">
                                        @error('latitude')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    {{-- Longitude --}}
                                    <div class="form-group">
                                        <h4>Longitude</h4>
                                        <input type="text" name="longitude" class="form-control"
                                            placeholder="Enter Longitude"
                                            value="{{ old('longitude', $location->longitude ?? '') }}">
                                        @error('longitude')
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
        $(document).ready(function() {
            $(document).on('theme:init', function() {
                new SummernoteDemo();
            });
            $('#summernote-description').summernote({
                placeholder: 'Enter Description',
                height: 150
            });

            // Fix here: sync summernote-description to description input
            $('form').on('submit', function() {
                $('#description').val($('#summernote-description').summernote('code'));
            });
        });
    </script>
@endpush
