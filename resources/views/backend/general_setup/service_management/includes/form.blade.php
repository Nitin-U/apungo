@if($page_method == 'edit')
    {!! Form::model($bundle['row'], ['route' => [$route_name.'update',$bundle['row']->id], 'method' => 'PUT','class'=>'submit_form']) !!}
@else
    {!! Form::open(['route' => $route_name.'store', 'method'=>'POST','class'=>'submit_form']) !!}
@endif

<div class="mb-3">
    {!! Form::label('name','Name',['class'=>'form-label required']) !!}
    {!! Form::text('name', null, ['class'=>'form-control','required']) !!}
</div>

<div class="mb-3">
    {!! Form::label('description','Description',['class'=>'form-label']) !!}
    {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
</div>

<div class="mb-3">
    {!! Form::label('status','Status',['class'=>'form-label']) !!}
    <div>
        <label class="form-check form-check-inline">
            {!! Form::radio('status',1,true,['class'=>'form-check-input']) !!} Active
        </label>
        <label class="form-check form-check-inline">
            {!! Form::radio('status',0,false,['class'=>'form-check-input']) !!} Inactive
        </label>
    </div>
</div>

<div class="text-end">
    {!! Form::submit($button,['class'=>'btn btn-primary']) !!}
</div>

{!! Form::close() !!}