<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0">Social Links</h5>
    </div>
    <div class="card-body">
        <div class="mb-3 d-flex">
            <div class="avatar-xs d-block flex-shrink-0 me-3">
                            <span class="avatar-title rounded-circle fs-16 bg-gradient text-light">
                                <i class="ri-facebook-fill"></i>
                            </span>
            </div>
            {!! Form::url('facebook', null,['class'=>'form-control','id'=>'facebook','placeholder'=>'Enter facebook profile link']) !!}
        </div>
        <div class="mb-3 d-flex">
            <div class="avatar-xs d-block flex-shrink-0 me-3">
                            <span class="avatar-title rounded-circle fs-16 bg-youtube">
                                <i class="ri-youtube-fill"></i>
                            </span>
            </div>
            {!! Form::url('youtube', null,['class'=>'form-control','id'=>'youtube','placeholder'=>'Enter youtube link']) !!}
        </div>
        <div class="mb-3 d-flex">
            <div class="avatar-xs d-block flex-shrink-0 me-3">
                            <span class="avatar-title rounded-circle fs-16 bg-instagram">
                                <i class="ri-instagram-fill"></i>
                            </span>
            </div>
            {!! Form::url('instagram', null,['class'=>'form-control','id'=>'instagram','placeholder'=>'Enter instagram link']) !!}
        </div>
        <div class="mb-3 d-flex">
            <div class="avatar-xs d-block flex-shrink-0 me-3">
                            <span class="avatar-title rounded-circle fs-16 bg-linkedin">
                                <i class="ri-linkedin-fill"></i>
                            </span>
            </div>
            {!! Form::url('linkedin', null,['class'=>'form-control','id'=>'linkedin','placeholder'=>'Enter linkedin link']) !!}
        </div>
        <div class="d-flex">
            <div class="avatar-xs d-block flex-shrink-0 me-3">
                            <span class="avatar-title rounded-circle fs-16 bg-tiktok">
                                <i class="bx bxl-tiktok"></i>
                            </span>
            </div>
            {!! Form::url('ticktock', null,['class'=>'form-control','id'=>'ticktock','placeholder'=>'Enter ticktock link']) !!}
        </div>
    </div>
</div>
