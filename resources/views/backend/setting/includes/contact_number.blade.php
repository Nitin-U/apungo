<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0">Contacts</h5>
    </div>
    <div class="card-body">
        <div class="mb-3">
            {!! Form::label('phone', 'Phone', ['class' => 'form-label']) !!}
            {!! Form::text('phone', null,['class'=>'form-control','id'=>'phone','placeholder'=>'Enter phone number']) !!}
        </div>
        <div class="mb-3">
            {!! Form::label('mobile', 'Mobile', ['class' => 'form-label']) !!}
            {!! Form::text('mobile', null,['class'=>'form-control','id'=>'mobile','placeholder'=>'Enter mobile number']) !!}
        </div>
    </div>
    <!-- end card body -->
</div>

<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0">Social Number</h5>
    </div>
    <!-- end card body -->
    <div class="card-body">
        <div class="mb-3">
            {!! Form::label('whatsapp', 'Whatsapp required', ['class' => 'form-label']) !!}
            {!! Form::text('whatsapp', null,['class'=>'form-control','id'=>'whatsapp','placeholder'=>'Enter whatsapp number']) !!}
        </div>
        <div class="mb-3">
            {!! Form::label('viber', 'Viber', ['class' => 'form-label']) !!}
            {!! Form::text('viber', null,['class'=>'form-control','id'=>'viber','placeholder'=>'Enter viber number']) !!}
        </div>
    </div>
</div>
