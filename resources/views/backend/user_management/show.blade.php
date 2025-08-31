@extends('backend.layouts.master')
@section('title', $page_title)
@section('css')
    <link rel="stylesheet" href="{{asset('assets/backend/vendor/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/vendor/css/custom/datatable_style.css')}}">
    <link href="{{asset('assets/backend/vendor/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')

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
                                <div class="flex-shrink-0">

                                    <div class="d-flex justify-content-sm-end">
                                        <a class="btn btn-sm btn-primary waves-effect waves-light" href="{{route($route_name.'index')}}">
                                            <i class="ri-menu-2-line align-bottom me-1"></i> {{ $page . ' List'}} </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive  mt-3 mb-1">
                            <table id="dataTable" class="table border-top dataTable dtr-column">
                                <thead class="table-light">
                                <tr>
                                    <th>S.N</th>
                                    <th>Updated By</th>
                                    <th>Logged Event</th>
                                    <th>Description</th>
                                    <th>Record Updated</th>
                                    <th>Old Values</th>
                                    <th>New Values</th>
                                    <th>Date</th>
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
    <script src="{{asset('assets/base/trash.js')}}"></script>
    @include($module.'includes.toast_message')

    <script>
        let dataTables = $('#dataTable').DataTable({
            processing:true,
            serverSide: true,
            searching: true,
            stateSave: true,
            order:[[1,'asc']],
            aaSorting: [],
            ajax: {
                "url": '{{ route($route_name.'log_data') }}',
                "type": 'POST',
                'data': function (d) {
                    d._token = '{{csrf_token()}}';
                    d.user_id = '{{ $bundle['row']->id }}';
                }
            },
            columns :[
                {data:'DT_RowIndex', name: 'DT_RowIndex', searchable:false, orderable: false},
                {data:'causer_id', name: 'causer_id', orderable: true},
                {data:'event', name: 'event', orderable: false},
                {data:'description', name: 'description', orderable: true, searchable: false},
                {data:'subject_id', name: 'subject_id', orderable: true, searchable: false},
                {data:'old_values', name: 'old_values', searchable:false, orderable: false},
                {data:'new_values', name: 'new_values', searchable:false, orderable: false},
                {data:'created_at', name: 'created_at', searchable:false, orderable: false},
            ]
        })

    </script>
@endsection
