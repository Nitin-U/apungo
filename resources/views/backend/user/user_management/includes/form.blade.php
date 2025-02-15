@if($page_method == 'edit')
    {!! Form::model($data['row'], ['route' => [$base_route.'update',$data['row']->id ], 'method' => 'PUT','class'=>'submit_form','enctype'=>'multipart/form-data']) !!}
@else
    {!! Form::open(['route' => $base_route.'store', 'method'=>'POST', 'class'=>'submit_form','enctype'=>'multipart/form-data']) !!}
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
            {!! Form::label('email', 'Name', ['class' => 'form-label required']) !!}
            {!! Form::text('email', null,['class'=>'form-control','id'=>'email','placeholder'=>'Enter email']) !!}
        </div>
    </div>
    <div class="col-lg-12">
        <div class="mb-3">
            {!! Form::label('password', 'Password', ['class' => 'form-label required']) !!}
            <div class="position-relative auth-pass-inputgroup mb-3">
                {!!Form::password('password_input', ['class' => 'form-control pe-5', 'placeholder'=>'Enter password','id'=>'password-input']) !!}
                {!! Form::button('<i class="ri-eye-fill align-middle"></i>',['class' => 'btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted','id'=>'password-addon']) !!}
            </div>
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
            {!! Form::select('gender', ['male' => 'Male', 'female' => 'Female','others'=>'Others'], $page_method == 'edit' ? $data['row']->user_type:'male',['class'=>'form-select mb-3 select2','id'=>'gender']) !!}
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
        @if($page_method=='edit' && $data['row']->image)
            <div class="col-xxl-4 col-xl-4 col-sm-6">
                <div class="gallery-box card">
                    <div class="gallery-container">
                        <a class="image-popup" href="{{ asset(imagePath($data['row']->image))}}" title="">
                            <img class="gallery-img img-fluid mx-auto lazy" data-src="{{ asset(imagePath($data['row']->image))}}" alt="" />
                            <div class="gallery-overlay">
                                <h5 class="overlay-caption">Feature Image</h5>
                            </div>
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
        @if($page_method=='edit' && $data['row']->cover)
            <div class="col-xxl-4 col-xl-4 col-sm-6">
                <div class="gallery-box card">
                    <div class="gallery-container">
                        <a class="image-popup" href="{{ asset(imagePath($data['row']->cover))}}" title="">
                            <img class="gallery-img img-fluid mx-auto lazy" data-src="{{ asset(imagePath($data['row']->cover))}}" alt="" />
                            <div class="gallery-overlay">
                                <h5 class="overlay-caption">Cover Image</h5>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <div class="col-lg-12">
        <div class="mb-3">
            {!! Form::label('user_type', 'User Type', ['class' => 'form-label']) !!}
            {!! Form::select('user_type', ['admin' => 'Admin', 'general' => 'General'], $page_method == 'edit' ? $data['row']->user_type:'admin',['class'=>'form-select mb-3 select2','id'=>'user_type']) !!}
        </div>
    </div>
    <div class="col-lg-12 border-top mt-3">
        <div class="hstack gap-2">
            {!! Form::submit($button,['class'=>'btn btn-success mt-3','id'=>'user-add-button']) !!}
        </div>
    </div>
</div>

{!! Form::close() !!}
