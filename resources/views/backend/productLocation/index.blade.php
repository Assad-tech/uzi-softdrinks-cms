@extends('backend.layout.master')
@section('title', 'Product Locations')
@push('custom_css')
@endpush
@section('content')

    <!-- .page -->
    <div class="page bg-white">

        {{-- Locations --}}
        <!-- .page-inner -->
        <div class="page-inner">
            <!-- .page-title-bar -->
            <header class="page-title-bar">
                <h1 class="page-title"> Manage Product Locations</h1>
                {{-- <p class="text-muted"> Resize your browser window to see it in action. </p><!-- /title --> --}}
            </header><!-- /.page-title-bar -->
            <!-- .page-section -->
            <div class="page-section">
                <!-- .card -->
                <div class="card card-fluid bg-light">
                    <!-- .card-header -->
                    <div class="card-header">
                        <a href="{{ route('admin.add.product-location') }}" class="btn btn-primary ">Add New Location</a>
                    </div>
                    <!-- .card-body -->
                    <div class="card-body">
                        <!-- .table -->
                        <table id="dt-responsive" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product</th>
                                    <th>Locations</th>
                                    <th>Coordinates</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @foreach ($products as $product)
                                    @foreach ($product->productLocations as $productLocation)
                                        <tr>
                                            {{-- Row Number --}}
                                            <td>{{ $i++ }}</td>

                                            {{-- Product Name --}}
                                            <td>{{ $product->name ?? 'N/A' }}</td>

                                            {{-- Location Name --}}
                                            <td>{{ $productLocation->location->location ?? 'N/A' }}</td>

                                            {{-- Coordinates --}}
                                            <td>
                                                @if ($productLocation->locationCoordinates->isNotEmpty())
                                                    <ul class="list-group">
                                                        @foreach ($productLocation->locationCoordinates as $coordinate)
                                                            <li class="list-group-item p-1">
                                                                {{ $coordinate->place ?? 'N/A' }}
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @else
                                                    No coordinates available
                                                @endif
                                            </td>

                                            {{-- Action Column --}}
                                            <td>
                                                {{-- Uncomment and customize actions if needed --}}
                                                <a href="{{ route('admin.edit.product-location', ['id'=>$product->id, 'location_id'=>$productLocation->id]) }}" class="btn btn-info btn-sm">Edit</a>
                        <a href="{{ route('admin.delete.product-location', $product->id) }}" 
                           class="btn btn-danger btn-sm" 
                           onclick="return confirm('Are you sure you want to delete this product?');">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Product</th>
                                    <th>Locations</th>
                                    <th>Coordinates</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>

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
                responsive: false,
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
