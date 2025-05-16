@extends('backend.layout.master')
@section('title', 'Terms And Conditions')
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
                    <h1 class="page-title"> Manage Terms And Conditions </h1>
                    <div class="btn-toolbar">
                        {{-- <button type="button" class="btn btn-primary">Add team</button> --}}
                    </div>
                </div>
            </header><!-- /.page-title-bar -->
            <!-- .page-section -->
            <div class="page-section">
                <!-- .card -->
                <div class="card card-fluid bg-light">
                    <!-- .card-header -->
                    {{-- <div class="card-header nav-scroller">
                        <!-- .nav-tabs -->
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a class="nav-link active show" data-toggle="tab" href="#project-myteams">My teams</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#project-explore-teams">Explore public teams</a>
                            </li>
                        </ul><!-- /.nav-tabs -->

                    </div><!-- /.card-header --> --}}
                    <!-- .card-body -->
                    <div class="card-body">
                        <form action="{{ route('admin.terms-conditions.update') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row pb-3">
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <h4>Heading</h4>
                                        <input type="text" class="form-control @error('heading') is-invalid @enderror"
                                            name="heading" placeholder="Enter Heading" value="{{ $content->heading ?? '' }}">
                                        @error('heading')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row pb-3">
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <h4>Description</h4>
                                        <textarea id="summernote-description" name="description" class="form-control @error('description') is-invalid @enderror"
                                            placeholder="Enter Description">{!! old('description', $content->description ?? '') !!}</textarea>

                                        @error('description')
                                            <div class="invalid-feedback">{{ $message }}</div>
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
            // Initialize Summernote
            $('#summernote-description').summernote({
                height: 100, // Set the height of the editor
                placeholder: "Enter Description",
            });

            // Update the textarea with Summernote content before form submission
            $('form').on('submit', function() {
                // Assign Summernote content to the textarea
                $('#summernote-description').val($('#summernote-description').summernote('code'));
            });
        });
    </script>
@endpush
