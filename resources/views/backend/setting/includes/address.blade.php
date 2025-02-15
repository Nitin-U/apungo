<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0">Address</h5>
    </div>
    <div class="card-body">
        <div class="mb-3">
            {!! Form::label('email', 'Email', ['class' => 'form-label required']) !!}
            {!! Form::text('email', null,['class'=>'form-control','id'=>'email','placeholder'=>'Enter website email']) !!}
        </div>

        <div class="mb-3">
            {!! Form::label('address', 'Address', ['class' => 'form-label']) !!}
            {!! Form::text('address', null,['class'=>'form-control','id'=>'address','placeholder'=>'Enter company address']) !!}
        </div>
    </div>
    <!-- end card body -->
</div>
