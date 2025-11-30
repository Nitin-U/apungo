@extends('backend.layouts.master')
@section('title', $page_title)
@section('css')
    <link rel="stylesheet" href="{{asset('assets/backend/vendor/libs/glightbox/css/glightbox.min.css')}}" />
    <link href="{{asset('assets/backend/vendor/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')

    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        @include($module.'includes.breadcrumb')
        <div class="card">
            <div class="card-header align-items-center d-flex border-bottom mb-3">
                <h4 class="card-title mb-0 flex-grow-1">{{ $page_title }}</h4>
                <div class="flex-shrink-0">

                    <div class="d-flex justify-content-sm-end">
                        <a class="btn btn-sm btn-primary waves-effect waves-light" href="{{route($route_name.'index')}}">
                            <i class="ri-menu-2-line align-bottom me-1"></i> {{ $page . ' List'}} </a>
                    </div>

                </div>
            </div>
            <div class="card-body">
                @include($resource_path.'includes.form',['button' => 'Update'])

                <!-- Images Section -->
                <div class="mt-4">
                    <h5>Images</h5>
                    <div class="row">
                        {{-- Vendor Image --}}
                        @if(!empty($bundle['row']->image))
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <img src="{{ asset('storage/images/'.$bundle['row']->image) }}" class="card-img-top" alt="Vendor Image">
                                    <div class="card-body">
                                        <p class="card-text text-center">Vendor Image</p>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="col-12 mb-3">
                                <p class="text-muted">No vendor image available.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('assets/base/base.js')}}"></script>
    @include($module.'includes/gallery')
    @include($resource_path.'includes.script')
    <script>
        $(document).on('change', '#user_type', function(){
            let value = $(this).val();
            let html = document.createElement('span');
            html.className = ' text-warning font-13 user-type';
            html.innerText = 'Warning ! Changing user role from admin to general will revoke certain privileges';
            if(value !== 'admin'){
               $('#user_type').after(html)
            }else{
                $('span.user-type').remove();
            }
        });
    </script>
@endsection
