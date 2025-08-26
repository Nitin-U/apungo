@if($page_method == 'edit')
    {!! Form::model($bundle['row'], ['route' => [$route_name.'update',$bundle['row']->id ], 'method' => 'PUT','class'=>'submit_form','enctype'=>'multipart/form-data']) !!}
@else
    {!! Form::open(['route' => $route_name.'store', 'method'=>'POST', 'class'=>'submit_form','enctype'=>'multipart/form-data']) !!}
@endif

<div class="row">

    {{-- USER FIELDS --}}
    <div class="col-lg-6">
        <div class="mb-3">
            {!! Form::label('name', 'Full Name', ['class' => 'form-label required']) !!}
            {!! Form::text('name', null,['class'=>'form-control','placeholder'=>'Enter full name']) !!}
        </div>
    </div>

    <div class="col-lg-6">
        <div class="mb-3">
            {!! Form::label('email', 'Email', ['class' => 'form-label required']) !!}
            {!! Form::email('email', null,['class'=>'form-control','placeholder'=>'Enter email']) !!}
        </div>
    </div>

    <div class="col-lg-6">
        <div class="mb-3">
            {!! Form::label('password_input', 'Password', ['class' => 'form-label ' . ($page_method=='create' ? 'required' : '')]) !!}
            {!! Form::password('password_input',['class'=>'form-control','placeholder'=>'Enter password']) !!}
        </div>
    </div>

    <div class="col-lg-6">
        <div class="mb-3">
            {!! Form::label('password_input_confirmation', 'Confirm Password', ['class' => 'form-label ' . ($page_method=='create' ? 'required' : '')]) !!}
            {!! Form::password('password_input_confirmation',['class'=>'form-control','placeholder'=>'Confirm password']) !!}
        </div>
    </div>

    <div class="col-lg-6">
        <div class="mb-3">
            {!! Form::label('contact', 'Contact', ['class' => 'form-label']) !!}
            {!! Form::text('contact', null,['class'=>'form-control','placeholder'=>'Enter contact number']) !!}
        </div>
    </div>

    <div class="col-lg-6">
        <div class="mb-3">
            {!! Form::label('address', 'Address', ['class' => 'form-label']) !!}
            {!! Form::text('address', null,['class'=>'form-control','placeholder'=>'Enter address']) !!}
        </div>
    </div>

    <hr class="mt-3 mb-3">

    {{-- VENDOR FIELDS --}}
    <div class="col-lg-6">
        <div class="mb-3">
            {!! Form::label('title', 'Vendor Title', ['class' => 'form-label']) !!}
            {!! Form::text('title', null,['class'=>'form-control','placeholder'=>'Enter vendor title']) !!}
        </div>
    </div>

    <div class="col-lg-12">
        <div class="mb-3">
            {!! Form::label('about_me', 'About Vendor', ['class' => 'form-label']) !!}
            {!! Form::textarea('about_me', null,['class'=>'form-control','rows'=>3,'placeholder'=>'Enter vendor description']) !!}
        </div>
    </div>

    <div class="col-lg-6">
        <div class="mb-3">
            {!! Form::label('experience', 'Experience (Years)', ['class' => 'form-label']) !!}
            {!! Form::number('experience', null,['class'=>'form-control','placeholder'=>'Enter years of experience']) !!}
        </div>
    </div>

    <div class="col-lg-6">
        <div class="mb-3">
            {!! Form::label('rating', 'Rating', ['class' => 'form-label']) !!}
            {!! Form::number('rating', null,['class'=>'form-control','step'=>'0.1','placeholder'=>'0-5']) !!}
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
                {!! Form::radio('verified', 0, $page_method == 'edit' && $bundle['row']->verified == 0 ? true : false, ['class'=>'form-check-input','id'=>'verified2']) !!}
                {!! Form::label('verified2', 'No', ['class' => 'form-check-label']) !!}
            </div>
        </div>
    </div>
    {{-- Hidden status field --}}
    {!! Form::hidden('status', $page_method=='edit' && $bundle['row']->verified ? 1 : 0, ['id'=>'status']) !!}

    <div class="col-lg-6">
        <div class="mb-4">
            {!! Form::label('profile_picture', 'Profile Picture', ['class' => 'form-label']) !!}
            {!! Form::file('profile_picture', ['class'=>'form-control']) !!}
        </div>
        @if($page_method=='edit' && $bundle['row']->profile_picture)
            <img src="{{ asset(imagePath($bundle['row']->profile_picture)) }}" alt="Profile" class="img-fluid rounded" width="100">
        @endif
    </div>

    <div class="col-lg-12 border-top mt-3 mb-3">
        <div class="hstack gap-2">
            {!! Form::submit($button,['class'=>'btn btn-primary mt-3']) !!}
        </div>
    </div>
</div>

{!! Form::close() !!}