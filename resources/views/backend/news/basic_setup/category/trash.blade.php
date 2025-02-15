@extends('backend.layouts.master')
@section('title', $page_title)
@section('css')
    <link rel="stylesheet" href="{{asset('assets/backend/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/custom_css/datatable_style.css')}}">
    <link href="{{asset('assets/backend/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">
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
                                    <div class="d-flex justify-content-sm-end">
                                        <a class="btn btn-outline-success waves-effect waves-light" href="{{route($base_route.'index')}}">
                                            <i class="ri-menu-2-line align-bottom me-1"></i> {{ $page . ' List'}} </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive  mt-3 mb-1">
                                <table id="trashDataTable" class="table align-middle table-nowrap table-striped">
                                    <thead class="table-light">
                                    <tr>
                                        <th>S.N</th>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data['users'] as $row)
                                       <tr>
                                           <td>{{ $loop->iteration }}</td>
                                           <td>{{ $row->title ?? ''}} </td>
                                           <td>
                                               @include($module.'includes.status_display',['status'=>$row->status])
                                           </td>
                                           <td>
                                               @include($module.'includes.trash_action')
                                           </td>
                                       </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- container-fluid -->
    </div>
@endsection

@section('js')
    <script src="{{asset('assets/backend/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/backend/libs/sweetalert2/sweetalert2.min.js')}}"></script>
    <script src="{{asset('assets/common/trash.js')}}"></script>
    @include($module.'includes.toast_message')
@endsection
