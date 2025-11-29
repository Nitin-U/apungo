@if($page_method == 'edit')
    {!! Form::model($bundle['row'], ['route' => [$route_name.'update',$bundle['row']->id ], 'method' => 'PUT','class'=>'submit_form','enctype'=>'multipart/form-data']) !!}
@else
    {!! Form::open(['route' => $route_name.'store', 'method'=>'POST', 'class'=>'submit_form','enctype'=>'multipart/form-data']) !!}
@endif

<div class="row">

    {{-- USER FIELDS --}}
    <h6>1. Vendor Details</h6>
    <div class="col-lg-6">
        <div class="mb-3">
            {!! Form::label('name', 'Full Name', ['class' => 'form-label required']) !!}
            {!! Form::text('name', $page_method == 'edit' && $bundle['row']->user ? $bundle['row']->user->name ?? null:null,['class'=>'form-control','placeholder'=>'Enter full name']) !!}
        </div>
    </div>

    <div class="col-lg-6">
        <div class="mb-3">
            {!! Form::label('email', 'Email', ['class' => 'form-label required']) !!}
            {!! Form::email('email', $page_method == 'edit' && $bundle['row']->user ? $bundle['row']->user->email ?? null:null,['class'=>'form-control','placeholder'=>'Enter email',  'autocomplete'=>'off']) !!}
        </div>
    </div>

    <div class="col-lg-6">
        <div class="form-password-toggle mb-3">
            {!! Form::label('password_input', 'Password', ['class' => 'form-label required']) !!}
            <div class="input-group input-group-merge mb-2">
                <input type="password" class="form-control" name="password_input" id="password_input" placeholder="Enter new password" aria-describedby='password' autocomplete='new-password'/>
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-password-toggle mb-3">
            {!! Form::label('password_input_confirmation', 'Confirm Password', ['class' => 'form-label required']) !!}
            <div class="input-group input-group-merge mb-2">
                <input type="password" class="form-control" id="password_input_confirmation" name="password_input_confirmation" placeholder="Confirm password"/>
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="mb-3">
            {!! Form::label('contact', 'Contact', ['class' => 'form-label']) !!}
            {!! Form::text('contact', $page_method == 'edit' && $bundle['row']->user ? $bundle['row']->user->contact ?? null:null,['class'=>'form-control','placeholder'=>'Enter contact number']) !!}
        </div>
    </div>

    <div class="col-lg-6">
        <div class="mb-3">
            {!! Form::label('address', 'Address', ['class' => 'form-label']) !!}
            {!! Form::text('address', $page_method == 'edit' && $bundle['row']->user ? $bundle['row']->user->address ?? null:null,['class'=>'form-control','placeholder'=>'Enter address']) !!}
        </div>
    </div>
    {{-- VENDOR FIELDS --}}
    <div class="col-lg-12">
        <div class="mb-2">
            {!! Form::label('about_me', 'About Vendor', ['class' => 'form-label']) !!}
            {!! Form::textarea('about_me', null,['class'=>'form-control','rows'=>3,'placeholder'=>'Enter vendor description']) !!}
        </div>
    </div>

    <div class="col-lg-12">
        <div class="mb-3">
            {!! Form::label('experience', 'Experience (Years)', ['class' => 'form-label required']) !!}
            {!! Form::number('experience', null,['class'=>'form-control','placeholder'=>'Enter years of experience']) !!}
        </div>
    </div>

    {{-- Verified Vendor --}}
    <div class="col-lg-6">
        {!! Form::label('verified', 'Verified Vendor', ['class' => 'form-label']) !!}
        <div class="mb-3 mt-2">
            <div class="form-check form-check-inline form-radio-success">
                {!! Form::radio('verified', 1, $page_method == 'edit' && $bundle['row']->verified == 1 ? true : false, ['class'=>'form-check-input','id'=>'verified1']) !!}
                {!! Form::label('verified1', 'Yes', ['class' => 'form-check-label']) !!}
            </div>
            <div class="form-check form-check-inline form-radio-danger">
                {!! Form::radio('verified', 0, $page_method == 'edit' && $bundle['row']->verified == 0 ? true : true, ['class'=>'form-check-input','id'=>'verified2']) !!}
                {!! Form::label('verified2', 'No', ['class' => 'form-check-label']) !!}
            </div>
        </div>
    </div>
    {{-- Hidden status field --}}
    {!! Form::hidden('status', $page_method=='edit' && $bundle['row']->verified ? 1 : 0, ['id'=>'status']) !!}

    <div class="col-lg-6">
        <div class="mb-4">
            {!! Form::label('image_input', 'Image', ['class' => 'form-label']) !!}
            {!! Form::file('image_input', ['class'=>'form-control']) !!}
        </div>
        @if($page_method=='edit' && $bundle['row']->user && $bundle['row']->user->image)
            <div class="col-xxl-4 col-xl-4 col-sm-6">
                <div class="gallery-box card">
                    <div class="gallery-container">
                        <a class="image-popup" href="{{ asset(imagePath($bundle['row']->user->image))}}" title="">
                            <img class="gallery-img img-fluid mx-auto lazy" data-src="{{ asset(imagePath($bundle['row']->user->image))}}" alt="" />
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <hr class="my-6 mx-n6">
    <h6>2. Vendor Services</h6>
    @if (count($bundle['services']) > 0)
            <div class="row">
                @foreach($bundle['services'] as $id => $name)
                    <div class="col-lg-2 d-flex mb-2">
                        <div class="form-check me-4">
                            {{ Form::checkbox('services[]', $id, $page_method=='edit' ? in_array($id, array_keys($bundle['vendor_services'])):false, ['id' => 'service_'.$id, 'class' => 'form-check-input']) }}
                            {{ Form::label('service_'.$id, $name, ['class' => 'form-check-label']) }}
                        </div>
                    </div>
                    <div class="col-lg-4 d-flex mb-2"> 
                        {!! Form::number('rate[]', $page_method=='edit' && $bundle['vendor_services'] && in_array($id, array_keys($bundle['vendor_services'])) ? $bundle['vendor_services'][$id]['rate']:null,['class'=>'form-control','placeholder'=>'Enter Rate', 'step'=>'0.1', 'min'=>'0']) !!}
                    </div>
                    <div class="col-lg-6 d-flex mb-2"> 
                        {!! Form::select('service_mode[]', $bundle['service_mode'], $page_method=='edit' && $bundle['vendor_services'] && in_array($id, array_keys($bundle['vendor_services'])) ? $bundle['vendor_services'][$id]['service_mode']: null,['class'=>'form-select mb-3 select2','id'=>'service_mode_'.$id]) !!}
                    </div>
                @endforeach
            </div>
    @else
    <span class="text-danger">No Services Found, Please Add a Service</span>
    @endif

    <div class="col-lg-12 border-top mt-3 mb-3">
        <div class="hstack gap-2" id="button-container">
            {!! Form::submit($button,['class'=>'btn btn-primary mt-3', 'id'=>'vendor_save_btn']) !!}
        </div>
    </div>
</div>

{!! Form::close() !!}
