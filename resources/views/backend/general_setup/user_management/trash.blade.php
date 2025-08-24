@extends('backend.layouts.master')
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
                                    <div class="d-flex justify-content-sm-end">
                                        <a class="btn btn-sm btn-primary waves-effect waves-light" href="{{route($route_name.'index')}}">
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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($bundle['users'] as $row)
                                       <tr>
                                           <td>{{ $loop->iteration }}</td>
                                           <td>{{ $row->name ?? ''}} </td>
                                           <td>{{ $row->email ?? ''}}</td>
                                           <td>{{ $row->contact ?? ''}}</td>
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
@endsection

@section('js')
    <script src="{{asset('assets/backend/vendor/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/backend/vendor/libs/sweetalert2/sweetalert2.min.js')}}"></script>
    <script src="{{asset('assets/base/trash.js')}}"></script>
    @include($module.'includes.toast_message')
@endsection
