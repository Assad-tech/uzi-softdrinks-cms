@extends('backend.layout.master')
@section('title', 'Home')
@push('custom_css')
@endpush
@section('content')
    @php
        use Illuminate\Support\Str;
    @endphp
    <!-- .page -->
    <div class="page bg-white">
        <!-- .page-inner -->
        <div class="page-inner">
            <!-- .page-title-bar -->
            <header class="page-title-bar">
                {{-- <div class="d-flex justify-content-between">
                    <h1 class="page-title"> Manage Home Sliders </h1>
                    <div class="btn-toolbar"></div>
                </div> --}}
            </header><!-- /.page-title-bar -->
            <!-- .page-section -->
            <div class="page-section">
                <!-- .card -->
                <div class="card card-fluid bg-light">
                    <!-- .card-header -->
                    <div class="card-header d-flex justify-content-between">
                        <h1 class="page-title">Manage Home Sliders</h1>
                        <a href="{{ route('admin.add.home') }}" class="btn btn-primary ">Add New</a>
                    </div>

                    {{-- <div class="card-header nav-scroller d-flex justify-content-between align-items-center">
                        <!-- .nav-tabs -->
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a class="nav-link active show" data-toggle="tab" href="#products">Product Sliders</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#malibu">Malibu Sliders</a>
                            </li>
                        </ul><!-- /.nav-tabs -->
                        <a href="{{ route('admin.add.home') }}" class="btn btn-primary ">Add New</a>

                    </div><!-- /.card-header --> --}}
                    <!-- .card-body -->
                    <div class="card-body">
                        @php
                            $i = 1;
                            // $j = 1;
                        @endphp
                        {{-- <div class="tab-content">
                            <div class="tab-pane fade active show" id="products" role="tabpanel"> --}}
                        <!-- .table -->
                        <table id="dt-responsive" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    {{-- <th> Type</th> --}}
                                    <th> Image </th>
                                    <th> Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($malibuSliders as $data)
                                    <tr>
                                        <td> {{ $i++ }} </td>
                                        {{-- <td> {{ $data->type ?? 'N/A' }}</td> --}}
                                        <td>
                                            <img class="img rounded" width="100" height="100"
                                                src="{{ asset('front/assets/images/sliders/' . $data->image) }}"
                                                alt="{{ Str::limit($data->site_name, 20) }}">

                                        </td>
                                        <td class="m-3">
                                            <div>
                                                <a href="{{ route('admin.edit.home', $data->id) }}"
                                                    class="btn btn-info">Edit</a>
                                                <!-- <a href="{{ route('admin.delete.home', $data->id) }}" class="btn btn-danger"
                                                                        onclick="return confirm('Are you sure you want to delete this?')">Delete</a> -->
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    {{-- <th> Type</th> --}}
                                    <th> Image </th>
                                    <th> Action</th>
                                </tr>
                            </tfoot>
                        </table><!-- /.table -->
                        {{-- </div>
                            <div class="tab-pane fade" id="malibu" role="tabpanel">
                                <!-- .table -->
                                <table id="test-responsive" class="table dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th> Type</th>
                                            <th> Image </th>
                                            <th> Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($malibuSliders as $data)
                                            <tr>
                                                <td> {{ $j++ }} </td>
                                                <td> {{ $data->type ?? 'N/A' }}</td>
                                                <td>
                                                    <img class="img rounded" width="80" height="100"
                                                        src="{{ asset('front/assets/images/sliders/' . $data->image) }}"
                                                        alt="{{ Str::limit($data->site_name, 20) }}">

                                                </td>
                                                <td class="m-3">
                                                    <div>
                                                        <a href="{{ route('admin.edit.home', $data->id) }}"
                                                            class="btn btn-info">Edit</a>
                                                        <!-- <a href="{{ route('admin.delete.home', $data->id) }}" class="btn btn-danger"
                                                            onclick="return confirm('Are you sure you want to delete this?')">Delete</a> -->
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th> Type</th>
                                            <th> Image </th>
                                            <th> Action</th>
                                        </tr>
                                    </tfoot>
                                </table><!-- /.table -->
                            </div> --}}
                    </div>
                </div><!-- /.card-body -->
            </div><!-- /.card -->
        </div><!-- /.page-section -->
    </div><!-- /.page-inner -->

    </div><!-- /.page -->

@endsection

@push('custom_js')
    <script src="{{ asset('admin/assets/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/assets/javascript/pages/dataTables.bootstrap.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#dt-responsive').DataTable({
                responsive: true,
                autoWidth: false,
                dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                    "<'table-responsive'tr>" +
                    "<'row align-items-center'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 d-flex justify-content-end'p>>",
                language: {
                    paginate: {
                        previous: '<i class="fa fa-lg fa-angle-left"></i>',
                        next: '<i class="fa fa-lg fa-angle-right"></i>'
                    }
                },
            });
        });
        $(document).ready(function() {
            $('#test-responsive').DataTable({
                responsive: true,
                autoWidth: false,
                dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                    "<'table-responsive'tr>" +
                    "<'row align-items-center'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 d-flex justify-content-end'p>>",
                language: {
                    paginate: {
                        previous: '<i class="fa fa-lg fa-angle-left"></i>',
                        next: '<i class="fa fa-lg fa-angle-right"></i>'
                    }
                },
            });
        });
    </script>

    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
@endpush
