<div class="card">
    <div class="card-header">
        <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#google-info-tab"
                   role="tab">
                    Google Info
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#add-website-metadata"
                   role="tab">
                    Meta Data
                </a>
            </li>
        </ul>
    </div>
    <!-- end card header -->
    <div class="card-body">
        <div class="tab-content">
            <div class="tab-pane active" id="google-info-tab" role="tabpage">
                <div class="mb-3">
                    {!! Form::label('google_analytics', 'Google Analytics Code', ['class' => 'form-label']) !!}
                    {!! Form::text('google_analytics', null,['class'=>'form-control','id'=>'google_analytics','placeholder'=>'Enter google analytics code']) !!}
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            {!! Form::label('google_map', 'Google Map Link', ['class' => 'form-label']) !!}
                            {!! Form::textarea('google_map', null,['class'=>'form-control','id'=>'google_map','placeholder'=>'Enter google map link code']) !!}
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-lg-6">
                        <div class="mb-3">
                            {!! Form::label('meta_pixel', 'Google Meta Pixel', ['class' => 'form-label']) !!}
                            {!! Form::textarea('meta_pixel', null,['class'=>'form-control','id'=>'meta_pixel','placeholder'=>'Enter meta pixel code']) !!}
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end tab-pane -->

            <div class="tab-pane" id="add-website-metadata" role="tabpage">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            {!! Form::label('meta_title', 'Meta title', ['class' => 'form-label']) !!}
                            {!! Form::text('meta_title', null,['class'=>'form-control','id'=>'meta_title','placeholder'=>'Enter meta title']) !!}
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            {!! Form::label('meta_tags', 'Meta Tags', ['class' => 'form-label']) !!}
                            {!! Form::text('meta_tags', null,['class'=>'form-control','id'=>'meta_tags','placeholder'=>'Enter website tags', 'data-choices','data-choices-multiple-remove'=>'true']) !!}
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-3">
                            {!! Form::label('meta_description', 'Meta title', ['class' => 'form-label']) !!}
                            {!! Form::textarea('meta_description', null,['class'=>'form-control','id'=>'meta_description','placeholder'=>'Enter meta description']) !!}
                        </div>
                    </div>
                </div>

            </div>
            <!-- end tab pane -->
        </div>
        <!-- end tab content -->
    </div>
    <!-- end card body -->
</div>
