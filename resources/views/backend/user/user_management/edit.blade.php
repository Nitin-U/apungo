@extends('backend.layouts.master')
@section('title', $page_title)
@section('css')
    <link rel="stylesheet" href="{{asset('assets/backend/libs/glightbox/css/glightbox.min.css')}}" />
    <link href="{{asset('assets/backend/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid" style="position:relative;">
            @include($module.'includes.breadcrumb')

            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">{{ $page_title }}</h4>
                    <div class="flex-shrink-0">

                        <div class="d-flex justify-content-sm-end">
                            <a class="btn btn-outline-success waves-effect waves-light" href="{{route($base_route.'index')}}">
                                <i class="ri-menu-2-line align-bottom me-1"></i> {{ $page . ' List'}} </a>
                        </div>

                    </div>
                </div>
                <div class="card-body">
                    @include($view_path.'includes.form',['button' => 'Update'])
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('assets/backend/js/pages/form-validation.init.js')}}"></script>
    <script src="{{asset('assets/backend/js/pages/password-addon.init.js')}}"></script>
    <script src="{{asset('assets/common/general.js')}}"></script>
    @include($module.'includes/gallery')
@endsection
