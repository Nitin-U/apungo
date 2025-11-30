@if($page_method == 'edit')
    {!! Form::model($bundle['row'], ['route' => [$route_name.'update',$bundle['row']->id], 'method' => 'PUT','class'=>'submit_form','enctype'=>'multipart/form-data']) !!}
@else
    {!! Form::open(['route' => $route_name.'store', 'method'=>'POST','class'=>'submit_form','enctype'=>'multipart/form-data']) !!}
@endif

<div class="row">
    <!-- Full Name -->
    <div class="mb-3 col-md-6">
        {!! Form::label('name','Full Name',['class'=>'form-label required']) !!}
        {!! Form::text('name', $bundle['row']->user->name ?? null, ['class'=>'form-control','required']) !!}
    </div>

    <!-- Contact -->
    <div class="mb-3 col-md-6">
        {!! Form::label('contact','Contact',['class'=>'form-label required']) !!}
        {!! Form::text('contact', $bundle['row']->user->contact ?? null, ['class'=>'form-control','required']) !!}
    </div>
</div>

<div class="row">
    <!-- Email -->
    <div class="mb-3 col-md-6">
        {!! Form::label('email','Email',['class'=>'form-label required']) !!}
        {!! Form::email('email', $bundle['row']->email ?? null, ['class'=>'form-control','required']) !!}
    </div>

    <!-- Title -->
    <div class="mb-3 col-md-6">
        {!! Form::label('title','Title',['class'=>'form-label']) !!}
        {!! Form::text('title', $bundle['row']->title ?? null, ['class'=>'form-control']) !!}
    </div>
</div>

<div class="row">
    <!-- Verified -->
    <div class="mb-3 col-md-6">
        {!! Form::label('verified','Verified',['class'=>'form-label']) !!}
        <div>
            <label class="form-check form-check-inline">
                {!! Form::radio('verified', 1, $bundle['row']->verified == 1, ['class'=>'form-check-input']) !!} Yes
            </label>
            <label class="form-check form-check-inline">
                {!! Form::radio('verified', 0, $bundle['row']->verified == 0, ['class'=>'form-check-input']) !!} No
            </label>
        </div>
    </div>

    <!-- Status -->
    <div class="mb-3 col-md-6">
        {!! Form::label('status','Status',['class'=>'form-label']) !!}
        <div>
            <label class="form-check form-check-inline">
                {!! Form::radio('status',1, $bundle['row']->user->status == 1, ['class'=>'form-check-input']) !!} Active
            </label>
            <label class="form-check form-check-inline">
                {!! Form::radio('status',0, $bundle['row']->user->status == 0, ['class'=>'form-check-input']) !!} Inactive
            </label>
        </div>
    </div>
</div>

<!-- Experience -->
<div class="mb-3">
    {!! Form::label('experience','Experience',['class'=>'form-label']) !!}
    {!! Form::text('experience', $bundle['row']->experience ?? null, ['class'=>'form-control']) !!}
</div>

<!-- Image Section -->
<div class="mb-3">
    {!! Form::label('image','Vendor Image',['class'=>'form-label']) !!}
    @if(!empty($bundle['row']->image))
        <div class="mb-2">
            <img src="{{ asset('storage/images/'.$bundle['row']->image) }}" alt="Vendor Image" class="img-thumbnail" style="max-width:150px;">
        </div>
    @endif
    {!! Form::file('image_input', ['class'=>'form-control']) !!}
</div>

<div class="text-end">
    {!! Form::submit($button,['class'=>'btn btn-primary']) !!}
</div>

{!! Form::close() !!}