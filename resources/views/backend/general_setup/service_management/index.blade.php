@extends(BACKEND.'layouts.master')
@section('title', $page_title)
@section('css')
    <link rel="stylesheet" href="{{asset('assets/backend/vendor/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/vendor/css/custom/datatable_style.css')}}">
    <link href="{{asset('assets/backend/vendor/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')

    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        @include($module.'includes.breadcrumb')
        <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row g-4">
                                <div class="col-sm-auto">
                                    <h4 class="card-title mb-0">{{ $page_title }}</h4>
                                </div>
                                <div class="col-sm">
                                    <div class="d-flex justify-content-sm-end gap-2 btn-group-sm">
                                        <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><span>
                                                <i class="icon-base icon-16px bx bx-plus me-md-2"></i>
                                                <span class="d-md-inline-block d-none">Create {{ $page }}</span></span>
                                        </button>

                                        <a class="btn btn-danger waves-effect waves-light" href="{{ route($route_name.'trash') }}">
                                            <i class="icon-base icon-16px bx bx-trash me-md-2"></i>  Trash </a>
                                    </div>
                                    @include($resource_path.'create')
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive  mt-3 mb-1">
                                <table id="dataTable" class="table border-top dataTable dtr-column">
                                    <thead class="table-light">
                                    <tr>
                                        <th>S.N</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('assets/backend/vendor/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/backend/vendor/libs/sweetalert2/sweetalert2.min.js')}}"></script>
    <script src="{{asset('assets/base/base.js')}}"></script>
    @include($module.'includes.toast_message')
    @include($module.'includes.status_alert')
    @include($resource_path.'includes.script')
    <script type="text/javascript">
        let dataTables = $('#dataTable').DataTable({
            processing:true,
            serverSide: true,
            searching: true,
            stateSave: true,
            order:[[1,'asc']], // sort by title
            aaSorting: [],
            ajax: {
                "url": '{{ route($route_name.'data') }}',
                "type": 'POST',
                'data': function (d) {
                    d._token = '{{csrf_token()}}';
                }
            },
            columns :[
                {data:'DT_RowIndex', name: 'DT_RowIndex', searchable:false, orderable:false},
                {data:'name', name: 'name', orderable:true},
                {data:'description', name: 'description', orderable:true},
                {data:'status', name: 'status', searchable:false, orderable:false},
                {data:'action', name: 'action', searchable:false, orderable:false},
            ]
        })
    </script>

@endsection
