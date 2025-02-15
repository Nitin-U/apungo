@extends('backend.layouts.master')
@section('title', "Menu")
@section('css')
    <link href="{{asset('assets/backend/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
    <style>
        .disabled{pointer-events: none; opacity: 0.7;}
        .hidden{
            display: none;
        }
        .pull-right{
            float: right;
        }
        .menu-item-bar{cursor: move;display: block;}
        #serialize_output{display: none;}
        body.dragging, body.dragging * {cursor: move !important;}
       .list-group-item{
           position: unset;
           padding: 0.9rem 0.7rem 0.7rem 0.7rem;
       }

    </style>
@endsection
@section('content')
    @include($view_path.'includes.menu')

    <div class="page-content">
        <?php
        $slug_to_disable = [];
        if($data['desiredMenu'] !== null){
            $slug_to_disable = get_slugs_to_disable($data['desiredMenu']->slug);
        }
        ?>
        <div class="container-fluid">

        @include($module.'includes.breadcrumb')

            <div class="card">
                <div class="card-header border-0 rounded">
                    {!! Form::open(['route' => $base_route.'index','method'=>'GET','class'=>'needs-validation','id'=>'basic-form','novalidate'=>'']) !!}

                        <div class="row g-2">
                            <div class="col-xl-3">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#createMenu" class="btn btn-outline-success waves-effect waves-light">
                                    <i class="ri-add-fill align-bottom me-1"></i> Create Menu</button>
                            </div><!--end col-->
                            <div class="col-xl-3 ms-auto">
                                <div>
                                    <select class="form-control w-md" name="slug" data-choices="" data-choices-search-false="">
                                        <option value disabled selected>Select Menu</option>
                                        @foreach($data['menus'] as $menu)
                                            @if($data['desiredMenu'] !== '')
                                                <option value="{{$menu->slug}}" @if($menu->id == $data['desiredMenu']->id) selected @endif>{{ucwords(@$menu->name)}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-auto">
                                <div class="hstack gap-2">
                                    <button type="submit" class="btn btn-outline-success waves-effect waves-light"><i class=" ri-check-double-fill me-1 align-bottom"></i> Select</button>
                                </div>
                            </div>
                        </div><!--end row-->
                    {!! Form::close() !!}
                </div>
            </div>
        <!-- end page title -->

            <div class="row mt-4">
                <div class="col-xl-4 col-lg-4">
                    <div class="sticky-side-div">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <h5 class="fs-16">Menu Items</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion accordion-flush">

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingBrands">
                                        <button class="accordion-button bg-transparent shadow-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseBrands" aria-expanded="false" aria-controls="flush-collapseBrands">
                                            <span class="text-muted text-uppercase fs-12 fw-medium">Pages </span> <span class="badge bg-success rounded-pill align-middle ms-1">{{count($data['pages'])}}</span>
                                        </button>
                                    </h2>

                                    <div id="flush-collapseBrands" class="accordion-collapse collapse show" aria-labelledby="flush-headingBrands" style="">
                                        <div class="accordion-body {{(count($data['menus'] ) == 0) ? 'disabled':''}} text-body pt-0" id="page-list">
                                            <div class="d-flex flex-column gap-2 mt-3">
                                                @if(count($data['pages']) !== 0)
                                                    @foreach($data['pages'] as $page)
                                                        <div class="form-check form-check-outline form-check-success {{(in_array($page->slug, $slug_to_disable)) ? 'disabled':''}}">
                                                            <input class="form-check-input" type="checkbox" id="pages-{{$page->id}}" value="{{$page->id}}" name="select-page[]" {{(count($data['menus']) == 0 || in_array($page->slug, $slug_to_disable)) ? 'disabled':''}}>
                                                            <label class="form-check-label {{(in_array($page->slug, $slug_to_disable)) ? 'disabled':''}}" for="pages-{{$page->id}}"> {{ucfirst($page->title)}}</label>
                                                        </div>
                                                    @endforeach
                                                    @else
                                                        <div class="pb-2">
                                                            <span class="h6">Please <a href="{{route($module.'pages.index')}}">create a page</a> to add in menu.</span>
                                                        </div>
                                                    @endif


                                                <div class="{{(count($data['pages']) == 0) ? 'disabled':''}}">
                                                    <label class="btn btn-light btn-sm bg-gradient waves-effect waves-light text-decoration-none"><input type="checkbox" id="select-all-pages" class="hidden"> Select All</label>
                                                    <button type="button" class="pull-right btn btn-light bg-gradient waves-effect waves-light btn-sm text-decoration-none pull-right" id="add-pages">Add to Menu</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingBrands">
                                        <button class="accordion-button bg-transparent shadow-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseBrands" aria-expanded="false" aria-controls="flush-collapseBrands">
                                            <span class="text-muted text-uppercase fs-12 fw-medium">Blogs </span> <span class="badge bg-success rounded-pill align-middle ms-1">{{count($data['blogs'])}}</span>
                                        </button>
                                    </h2>

                                    <div id="flush-collapseBrands" class="accordion-collapse collapse show" aria-labelledby="flush-headingBrands" style="">
                                        <div class="accordion-body {{(count($data['menus']) == 0) ? 'disabled':''}} text-body pt-0" id="blogs-list">
                                            <div class="d-flex flex-column gap-2 mt-3">
                                                @if(count($data['blogs']) !== 0)
                                                    @foreach($data['blogs'] as $blog)
                                                        <div class="form-check form-check-outline form-check-success {{(in_array($blog->key, $slug_to_disable)) ? 'disabled':''}}">
                                                            <input class="form-check-input" type="checkbox" id="blogs-{{$blog->id}}" value="{{$blog->id}}" name="select-blogs[]" {{(count($data['menus']) == 0 || in_array($blog->slug, $slug_to_disable)) ? 'disabled':''}}>
                                                            <label class="form-check-label {{(in_array($blog->key, $slug_to_disable)) ? 'disabled':''}}" for="blogs-{{$blog->id}}"> {{ucfirst($blog->title)}}</label>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="pb-2">
                                                        <span class="h6">Please <a href="{{route($module.'news.blog.index')}}">create a blog</a> to add in menu.</span>
                                                    </div>
                                                @endif

                                                <div class="{{(count($data['blogs']) == 0) ? 'disabled':''}}">
                                                    <label class="btn btn-light btn-sm bg-gradient waves-effect waves-light text-decoration-none"><input type="checkbox" id="select-all-blogs" class="hidden"> Select All</label>
                                                    <button type="button" class="pull-right btn btn-light bg-gradient waves-effect waves-light btn-sm text-decoration-none pull-right" id="add-blogs">Add to Menu</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingBrands">
                                        <button class="accordion-button bg-transparent shadow-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseBrands" aria-expanded="false" aria-controls="flush-collapseBrands">
                                            <span class="text-muted text-uppercase fs-12 fw-medium">Services </span> <span class="badge bg-success rounded-pill align-middle ms-1">{{count($data['services'])}}</span>
                                        </button>
                                    </h2>

                                    <div id="flush-collapseBrands" class="accordion-collapse collapse" aria-labelledby="flush-headingBrands" style="">
                                        <div class="accordion-body {{(count($data['menus']) == 0) ? 'disabled':''}} text-body pt-0" id="service-list">
                                            <div class="d-flex flex-column gap-2 mt-3">
                                                @if(count($data['services']) !== 0)
                                                    @foreach($data['services'] as $service)
                                                        <div class="form-check form-check-outline form-check-success {{(in_array($service->key, $slug_to_disable)) ? 'disabled':''}}">
                                                            <input class="form-check-input" type="checkbox" id="service-{{$service->id}}" value="{{$service->id}}" name="select-service[]" {{(count($data['menus']) == 0 || in_array($service->key, $slug_to_disable)) ? 'disabled':''}}>
                                                            <label class="form-check-label {{(in_array($service->key, $slug_to_disable)) ? 'disabled':''}}" for="service-{{$service->id}}"> {{ucfirst($service->title)}}</label>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="pb-2">
                                                        <span class="h6">Please <a href="{{route($module.'service.index')}}">create a service</a> to add in menu.</span>
                                                    </div>
                                                @endif


                                                <div class="{{(count($data['services']) == 0) ? 'disabled':''}}">
                                                    <label class="btn btn-light btn-sm bg-gradient waves-effect waves-light text-decoration-none"><input type="checkbox" id="select-all-services" class="hidden"> Select All</label>
                                                    <button type="button" class="pull-right btn btn-light bg-gradient waves-effect waves-light btn-sm text-decoration-none pull-right" id="add-service">Add to Menu</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingRating">
                                        <button class="accordion-button bg-transparent shadow-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseRating" aria-expanded="false" aria-controls="flush-collapseRating">
                                            <span class="text-muted text-uppercase fs-12 fw-medium">Custom Links</span>
                                        </button>
                                    </h2>

                                    <div id="flush-collapseRating" class="accordion-collapse collapse" aria-labelledby="flush-headingRating">
                                        <div class="accordion-body text-body {{(count($data['menus']) == 0) ? 'disabled':''}}">
                                            <div class="d-flex flex-column gap-2">
                                                <div>
                                                    <label for="borderInputURL" class="form-label">URL</label>
                                                    <input type="url" name="url" class="form-control border-dashed" id="borderInputURL" placeholder="Enter your URL">
                                                    <div class="invalid-feedback" id="custom-slug">
                                                        Please enter the url.
                                                    </div>
                                                </div>
                                                <div>
                                                    <label for="borderInputURLtext" class="form-label">URL Text</label>
                                                    <input type="url" name="url_text" class="form-control border-dashed" id="borderInputURLtext" placeholder="Enter your URL Text">
                                                    <div class="invalid-feedback" id="custom-name">
                                                        Please enter the url text.
                                                    </div>
                                                </div>
                                                <div class="{{(count($data['menus']) == 0) ? 'disabled':''}}">
                                                    <button type="button" class="pull-right btn btn-light bg-gradient waves-effect waves-light btn-sm text-decoration-none pull-right" id="add-custom-link">Add to Menu</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->
                    </div>
                </div>
                <!-- end col -->

                <div class="col-xl-8 col-lg-8">
                    <div>
                        <div class="card">
                            <div class="card-header border-bottom-dashed">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <h5 class="fs-16">Menu Structure</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if($data['desiredMenu'] == '')
                                    {!! Form::open(['route' => $base_route.'store','method'=>'post','id'=>'menu-form','class'=>'needs-validation','novalidate'=>'']) !!}
                                        <div class="mb-3">
                                            <label for="menuname" class="form-label">Menu Name</label>
                                            <input type="text" name="name" class="form-control border-dashed" id="menuname"
                                                   placeholder="Enter menu name" required>
                                            <div class="invalid-feedback">
                                                Please enter the url text.
                                            </div>
                                        </div>

                                         <div class="mb-3">
                                            <label for="menutitle" class="form-label">Menu Title (for frontend display)</label>
                                            <input type="text" class="form-control border-dashed" id="menutitle" name="title" placeholder="Enter menu title" required>
                                             <div class="invalid-feedback">
                                                 Please enter the menu title.
                                             </div>
                                        </div>

                                        <div class="text-end mt-4 mb-2">
                                            <button type="submit" class="btn btn-outline-success waves-effect waves-light btn-label right ms-auto"><i class="ri-arrow-right-line label-icon align-bottom fs-16 ms-2"></i> Create Menu</button>
                                        </div>
                                    {!! Form::close() !!}
                                @else
                                    <div id="menu-content">
                                        <div style="min-height: 240px;">
                                            <h6 class="mb-2">Select <span class="fw-semibold">Posts, pages or add custom links</span> to menus</h6>
                                            @if($data['desiredMenu'] != '')
                                                <ul class="list-group nested-list ui-sortable" id="menuitems">
                                                    @if(!empty($data['menuitems']))
                                                        @foreach(@$data['menuitems'] as $key=>$item)
                                                            @if(!empty($item))
                                                            <li data-id="{{@$item->id}}" class="list-group-item nested-1">
                                                                <span class="menu-item-bar"><i class="ri-drag-move-fill align-bottom handle"></i>
                                                                    @if(empty(@$item->name)) {{@$item->title}} @else {{@$item->name}} @endif
                                                                    <a class="pull-right d-block collapsed" data-bs-toggle="collapse"
                                                                            aria-controls="collapse{{@$item->id}}"
                                                                            data-bs-target="#collapse{{@$item->id}}" style="cursor: pointer"><i class="ri-menu-fill"></i></a></span>
                                                                    <div class="mt-2 list-group nested-list collapse" aria-labelledby="collapse{{@$item->id}}" id="collapse{{@$item->id}}">
                                                                        <div class="card list-group-item nested-3">
                                                                            <div class="" id="basic3">
                                                                                <a class="d-block text-dark bold">
                                                                                    Edit details
                                                                                </a>
                                                                            </div>
                                                                            <div class="card-body p-2">
                                                                                {!! Form::open(['method'=>'post','url'=>route($base_route.'update_menu_item', @$item->id),'class'=>'needs-validation','novalidate'=>'']) !!}
                                                                                <div class="form-group mb-3">
                                                                                    <label>Link Name </label>
                                                                                    <input type="text" class="form-control border-dashed" name="name" value="@if(empty(@$item->name)) {{@$item->title}} @else {{@$item->name}} @endif">
                                                                                    <div class="invalid-feedback">
                                                                                        Please enter the Link Name.
                                                                                    </div>
                                                                                </div>

                                                                                @if(@$item->type == 'custom')
                                                                                    <div class="form-group mb-3">
                                                                                        <label>URL </label>
                                                                                        <input type="text" class="form-control  border-dashed" name="slug" value="{{$item->slug}}" required>
                                                                                        <div class="invalid-feedback">
                                                                                            Please enter the URL.
                                                                                        </div>
                                                                                    </div>
                                                                                @endif
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox" name="target" value="_blank" id="main-{{@$item->id}}"  @if(@$item->target == '_blank') checked @endif class="custom-control-input">
                                                                                    <label class="custom-control-label" for="main-{{@$item->id}}">
                                                                                        <span class="h6">Open in a new tab</span>
                                                                                    </label>
                                                                                </div>
                                                                                <div>
                                                                                    <a href="{{url('administration/delete-menuitem')}}/{{$item->id}}/{{$key}}" class="btn btn-danger btn-sm btn-label">
                                                                                        <i class=" ri-delete-bin-6-line label-icon align-middle fs-16 me-2"></i>Remove</a>

                                                                                    <button type="submit" class="btn btn-success btn-sm btn-label pull-right ">
                                                                                        <i class="ri-check-double-line label-icon align-middle fs-16 me-2"></i>Save</button>
                                                                                </div>

                                                                                {!! Form::close() !!}

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <ul class="list-group col nested-list children-content">
                                                                    @if(isset($item->children))
                                                                        @foreach(@$item->children as $m)
                                                                            @foreach($m as $in=>$data_child)
                                                                                <li data-id="{{$data_child->id}}" class="list-group-item nested-2 menu-item">
                                                                                    <span class="menu-item-bar">
                                                                                        <i class="ri-drag-move-fill align-bottom handle"></i> @if(empty($data_child->name)) {{$data_child->title}} @else {{$data_child->name}} @endif
                                                                                        <a class="pull-right d-block collapsed" data-bs-toggle="collapse"
                                                                                           aria-controls="collapse{{$data_child->id}}" data-bs-target="#collapse{{$data_child->id}}" style="cursor: pointer"><i class="ri-menu-fill"></i></a></span>
                                                                                    <div class="list-group nested-list collapse" aria-labelledby="collapse{{$data_child->id}}" id="collapse{{$data_child->id}}">
                                                                                        <div class="card list-group-item nested-3">
                                                                                            <div class="" id="basic4">
                                                                                                <a class="d-block text-dark">
                                                                                                    Edit details
                                                                                                </a>
                                                                                            </div>
                                                                                            <div class="card-body p-2">
                                                                                                {!! Form::open(['method'=>'post','url'=>route($base_route.'update_menu_item', @$data_child->id),'class'=>'needs-validation','novalidate'=>'']) !!}
                                                                                                <div class="form-group mb-3">
                                                                                                    <label>Link Name </label>
                                                                                                    <input type="text" class="form-control border-dashed" name="name" value="@if(empty($data_child->name)) {{$data_child->title}} @else {{$data_child->name}} @endif">
                                                                                                    <div class="invalid-feedback">
                                                                                                        Please enter the Link Name.
                                                                                                    </div>
                                                                                                </div>

                                                                                                @if($data_child->type == 'custom')
                                                                                                    <div class="form-group mb-3">
                                                                                                        <label>URL </label>
                                                                                                        <input type="text" class="form-control border-dashed" name="slug" value="{{$data_child->slug}}" required>
                                                                                                        <div class="invalid-feedback">
                                                                                                            Please enter the URL.
                                                                                                        </div>
                                                                                                    </div>
                                                                                                @endif
                                                                                                <div class="custom-control custom-checkbox mb-3">
                                                                                                    <input type="checkbox" name="target" value="_blank" id="main-{{$data_child->id}}"  @if($data_child->target == '_blank') checked @endif class="custom-control-input">
                                                                                                    <label class="custom-control-label" for="main-{{$data_child->id}}">
                                                                                                        <span class="h6">Open in a new tab</span>
                                                                                                    </label>
                                                                                                </div>
                                                                                                <div>
                                                                                                    <a href="{{url('administration/delete-menuitem')}}/{{$data_child->id}}/{{$key}}/{{$in}}" class="btn btn-danger btn-sm btn-label">
                                                                                                        <i class=" ri-delete-bin-6-line label-icon align-middle fs-16 me-2"></i>Remove</a>

                                                                                                    <button type="submit" class="btn btn-success btn-sm btn-label pull-right ">
                                                                                                        <i class="ri-check-double-line label-icon align-middle fs-16 me-2"></i>Save</button>
                                                                                                </div>

                                                                                                {!! Form::close() !!}

                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <ul class="list-group nested-list children-content">
                                                                                        @if(isset($data_child->children))
                                                                                            @foreach($data_child->children as $o)
                                                                                                @foreach($o as $keys=>$data1)
                                                                                                    <li data-id="{{$data1->id}}" class="menu-item mt-2 list-group-item nested-3">
                                                                                                        <span class="menu-item-bar"><i class="ri-drag-move-fill align-bottom handle"></i> @if(empty($data1->name)) {{$data1->title}} @else {{$data1->name}} @endif

                                                                                                            <a class="pull-right d-block collapsed" data-bs-toggle="collapse"
                                                                                                               aria-controls="collapse{{$data1->id}}" data-bs-target="#collapse{{$data1->id}}" style="cursor: pointer"><i class="ri-menu-fill"></i></a>
                                                                                                        </span>
                                                                                                        <div class="list-group nested-list collapse" aria-labelledby="collapse{{$data1->id}}" id="collapse{{$data1->id}}">
                                                                                                            <div class="card list-group-item nested-3">
                                                                                                                <div class="" id="basic4">
                                                                                                                    <a class="d-block text-dark">
                                                                                                                        Edit details
                                                                                                                    </a>
                                                                                                                </div>
                                                                                                                <div class="card-body p-2">
                                                                                                                    {!! Form::open(['method'=>'post','url'=>route($base_route.'update_menu_item', @$data1->id),'class'=>'needs-validation','novalidate'=>'']) !!}
                                                                                                                    <div class="form-group mb-3">
                                                                                                                        <label>Link Name </label>
                                                                                                                        <input type="text" class="form-control border-dashed" name="name" value="@if(empty($data1->name)) {{$data1->title}} @else {{$data1->name}} @endif">
                                                                                                                        <div class="invalid-feedback">
                                                                                                                            Please enter the Link Name.
                                                                                                                        </div>
                                                                                                                    </div>

                                                                                                                    @if($data1->type == 'custom')
                                                                                                                        <div class="form-group mb-3">
                                                                                                                            <label>URL </label>
                                                                                                                            <input type="text" class="form-control border-dashed" name="slug" value="{{$data1->slug}}" required>
                                                                                                                            <div class="invalid-feedback">
                                                                                                                                Please enter the URL.
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    @endif
                                                                                                                    <div class="custom-control custom-checkbox mb-3">
                                                                                                                        <input type="checkbox" name="target" value="_blank" id="main-{{$data1->id}}"  @if($data1->target == '_blank') checked @endif class="custom-control-input">
                                                                                                                        <label class="custom-control-label" for="main-{{$data1->id}}">
                                                                                                                            <span class="h6">Open in a new tab</span>
                                                                                                                        </label>
                                                                                                                    </div>
                                                                                                                    <div>
                                                                                                                        <a href="{{url('administration/delete-menuitem')}}/{{$data1->id}}/{{$key}}/{{$in}}/{{$keys}}" class="btn btn-danger btn-sm btn-label">
                                                                                                                            <i class=" ri-delete-bin-6-line label-icon align-middle fs-16 me-2"></i>Remove</a>

                                                                                                                        <button type="submit" class="btn btn-success btn-sm btn-label pull-right ">
                                                                                                                            <i class="ri-check-double-line label-icon align-middle fs-16 me-2"></i>Save</button>
                                                                                                                    </div>

                                                                                                                    {!! Form::close() !!}

                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                @endforeach
                                                                                            @endforeach
                                                                                        @endif
                                                                                    </ul>
                                                                                </li>
                                                                            @endforeach
                                                                        @endforeach
                                                                    @endif
                                                                </ul>
                                                            </li>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </ul>
                                            @endif
                                        </div>

                                        @if($data['desiredMenu'] !== '')

                                            <div class="mb-3 mt-3">
                                                <label for="edit-title" class="form-label">Edit Title (for frontend display)</label>
                                                <input type="text" name="title" class="form-control border-dashed" id="edit-title" value="{{@$data['menuTitle'] ?? ''}}" placeholder="Enter menu title" required>
                                                <div class="invalid-feedback">
                                                    Please enter the menu title.
                                                </div>
                                            </div>

                                            <div class="row g-3">
                                                <label class="form-label">Select Menu Location: </label>

                                                <div class="col-lg-2">
                                                    <div class="form-check form-radio-outline form-radio-success mb-3 ">
                                                        <input class="form-check-input" type="radio" name="location" id="header-one" value="1" @if(@$data['desiredMenu']->location == 1) checked @endif>
                                                        <label class="form-check-label" for="header-one">
                                                            Header Menu
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-10">
                                                    <div class="form-check form-radio-outline form-radio-success mb-3">
                                                        <input class="form-check-input" type="radio" name="location" id="footer-one" value="2" @if(@$data['desiredMenu']->location == 2) checked @endif>
                                                        <label class="form-check-label" for="footer-one">
                                                            Footer Menu
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div>
                                                <a href="{{route($base_route.'delete',$data['desiredMenu']->id)}}" id="deleteMenu" class="btn btn-outline-danger waves-effect waves-light btn-label">
                                                    <i class=" ri-delete-bin-6-line label-icon align-middle fs-16 me-2"></i>Remove Menu</a>

                                                <button type="button" id="saveMenu" class="btn btn-outline-success waves-effect waves-light pull-right @if(count(@$slug_to_disable) == 0  ) disabled @endif">
                                                    <i class="ri-check-double-line label-icon align-middle fs-16 me-2"></i>Save Menu</button>
                                            </div>
                                        @endif

                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="serialize_output">{{ $data['desiredMenu']->content ?? null }}</div>






@endsection

@section('js')
    <script src="{{asset('assets/backend/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/backend/js/pages/form-validation.init.js')}}"></script>
    <!-- Sweet Alerts js -->
    <script src="{{asset('assets/backend/libs/sweetalert2/sweetalert2.min.js')}}"></script>
    <script src="{{asset('assets/backend/js/jquery-sortable.js')}}"></script>
    @include($module.'includes.toast_message')
    @include($base_route.'includes.script')
@endsection
