@if($page_method == 'edit')
    {!! Form::model($bundle['row'], ['route' => [$route_name.'update',$bundle['row']->id ], 'method' => 'PUT','class'=>'submit_form','enctype'=>'multipart/form-data']) !!}
@else
    {!! Form::open(['route' => $route_name.'store', 'method'=>'POST', 'class'=>'submit_form','enctype'=>'multipart/form-data']) !!}
@endif

<div class="row">
    <div class="col-lg-12">
        <div class="mb-3">
            {!! Form::label('name', 'Name', ['class' => 'form-label required']) !!}
            {!! Form::text('name', null,['class'=>'form-control','id'=>'name','placeholder'=>'Enter name']) !!}
        </div>
    </div>
    <div class="col-lg-12">
        <div class="mb-3">
            {!! Form::label('email', 'Email', ['class' => 'form-label required']) !!}
            {!! Form::text('email', null,['class'=>'form-control','id'=>'email','placeholder'=>'Enter email', 'autocomplete'=>'off']) !!}
        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-password-toggle mb-3">
            {!! Form::label('password', 'Password', ['class' => 'form-label required']) !!}
            <div class="input-group input-group-merge mb-3">
                {!!Form::password('password_input', ['class' => 'form-control pe-5', 'placeholder'=>'Enter password','id'=>'password-input', 'aria-describedby'=>'password','autocomplete'=>'new-password']) !!}
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
            </div>
            @if($page_method == 'edit')
                <span class="font-13">Only enter the password if you need to update it.</span>
            @endif
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-3">
            {!! Form::label('contact', 'Contact', ['class' => 'form-label required']) !!}
            {!! Form::number('contact', null,['class'=>'form-control','id'=>'contact','placeholder'=>'Enter contact']) !!}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-3">
            {!! Form::label('address', 'Address', ['class' => 'form-label']) !!}
            {!! Form::text('address', null,['class'=>'form-control','id'=>'address','placeholder'=>'Enter address']) !!}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-3">
            {!! Form::label('gender', 'Gender', ['class' => 'form-label']) !!}
            {!! Form::select('gender', ['male' => 'Male', 'female' => 'Female','others'=>'Others'], $page_method == 'edit' ? $bundle['row']->user_type:'male',['class'=>'form-select mb-3 select2','id'=>'gender']) !!}
        </div>
    </div>
    <div class="col-lg-6">
        {!! Form::label('status', 'Status', ['class' => 'form-label']) !!}
        <div class="mb-3 mt-2">
            <div class="form-check form-check-inline form-radio-success">
                {!! Form::radio('status', 1, true,['class'=>'form-check-input','id'=>'status1']) !!}
                {!! Form::label('status1', 'Active', ['class' => 'form-check-label']) !!}
            </div>
            <div class="form-check form-check-inline form-radio-danger">
                {!! Form::radio('status', 0, false,['class'=>'form-check-input','id'=>'status2']) !!}
                {!! Form::label('status2', 'Inactive', ['class' => 'form-check-label']) !!}
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-4">
            {!! Form::label('image_input', 'Profile Images', ['class' => 'form-label']) !!}
            {!! Form::file('image_input', ['class'=>'form-control']) !!}
        </div>
        @if($page_method=='edit' && $bundle['row']->image)
            <div class="col-xxl-4 col-xl-4 col-sm-6">
                <div class="gallery-box card">
                    <div class="gallery-container">
                        <a class="image-popup" href="{{ asset(imagePath($bundle['row']->image))}}" title="">
                            <img class="gallery-img img-fluid mx-auto lazy" data-src="{{ asset(imagePath($bundle['row']->image))}}" alt="" />
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <div class="col-lg-6">
        <div class="mb-4">
            {!! Form::label('cover_image', 'Cover Photo', ['class' => 'form-label']) !!}
            {!! Form::file('cover_image', ['class'=>'form-control']) !!}
        </div>
        @if($page_method=='edit' && $bundle['row']->cover)
            <div class="col-xxl-4 col-xl-4 col-sm-6">
                <div class="gallery-box card">
                    <div class="gallery-container">
                        <a class="image-popup" href="{{ asset(imagePath($bundle['row']->cover))}}" title="">
                            <img class="gallery-img img-fluid mx-auto lazy" data-src="{{ asset(imagePath($bundle['row']->cover))}}" alt="" />
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <div class="col-lg-12">
        <div class="mb-4">
            {!! Form::label('user_type', 'User Type', ['class' => 'form-label']) !!}
            {!! Form::select('user_type', ['admin' => 'Admin', 'customer' => 'Customer'], $page_method == 'edit' ? $bundle['row']->user_type:'admin',['class'=>'form-select mb-3 select2','id'=>'user_type']) !!}
        </div>
    </div>
{{--    <div class="col-lg-6 {{ $page_method=='edit' && $bundle['row']->user_type == 'general' ? '':'d-none'}}" id="stage-manage">--}}
{{--        {!! Form::label('can_manage_stage', 'Can Manage Booking Stages', ['class' => 'form-label']) !!}--}}
{{--        <div class="mb-3 mt-2">--}}
{{--            <div class="form-check form-check-inline form-radio-success">--}}
{{--                {!! Form::radio('can_manage_stage', 1, false,['class'=>'form-check-input','id'=>'can_manage_stage1']) !!}--}}
{{--                {!! Form::label('can_manage_stage1', 'Yes', ['class' => 'form-check-label']) !!}--}}
{{--            </div>--}}
{{--            <div class="form-check form-check-inline form-radio-danger">--}}
{{--                {!! Form::radio('can_manage_stage', 0, true,['class'=>'form-check-input','id'=>'can_manage_stage2']) !!}--}}
{{--                {!! Form::label('can_manage_stage2', 'No', ['class' => 'form-check-label']) !!}--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="col-lg-12 border-top mt-3 mb-3">
        <div class="hstack gap-2">
            {!! Form::submit($button,['class'=>'btn btn-primary mt-3','id'=>'user-add-button']) !!}
        </div>
    </div>
</div>

{!! Form::close() !!}
