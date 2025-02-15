<!-- logo card -->
<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0">Setting Images</h5>
    </div>
    <div class="card-body">
        <div class="col-lg-6">
            <div class="mb-3">
                {!! Form::label('logo_input', 'Images', ['class' => 'form-label required']) !!}
                {!! Form::file('logo_input', ['class'=>'form-control','id'=>'logo_input']) !!}
            </div>
            @if($data['row'] && $data['row']->logo)
                <div class="col-xxl-4 col-xl-4 col-sm-6">
                    <div class="gallery-box card">
                        <div class="gallery-container">
                            <a class="image-popup" href="{{ asset(imagePath($data['row']->logo))}}" title="">
                                <img class="gallery-img img-fluid mx-auto lazy" data-src="{{ asset(imagePath($data['row']->logo))}}" alt="" />
                                <div class="gallery-overlay">
                                    <h5 class="overlay-caption">Logo Image</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="col-lg-6">
            <div class="mb-3">
                {!! Form::label('white_logo_input', 'White Logo Image', ['class' => 'form-label']) !!}
                {!! Form::file('white_logo_input', ['class'=>'form-control','id'=>'white_logo_input']) !!}
            </div>
            @if($data['row'] && $data['row']->logo_white)
                <div class="col-xxl-4 col-xl-4 col-sm-6">
                    <div class="gallery-box card">
                        <div class="gallery-container">
                            <a class="image-popup" href="{{ asset(imagePath($data['row']->logo_white))}}" title="">
                                <img class="gallery-img img-fluid mx-auto lazy" data-src="{{ asset(imagePath($data['row']->logo_white))}}" alt="" />
                                <div class="gallery-overlay">
                                    <h5 class="overlay-caption">White Logo Image</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="col-lg-6">
            <div class="mb-3">
                {!! Form::label('favicon_input', 'Favicon image', ['class' => 'form-label']) !!}
                {!! Form::file('favicon_input', ['class'=>'form-control','id'=>'favicon_input']) !!}
            </div>
            @if($data['row'] && $data['row']->favicon)
                <div class="col-xxl-4 col-xl-4 col-sm-6">
                    <div class="gallery-box card">
                        <div class="gallery-container">
                            <a class="image-popup" href="{{ asset(imagePath($data['row']->favicon))}}" title="">
                                <img class="gallery-img img-fluid mx-auto lazy" data-src="{{ asset(imagePath($data['row']->favicon))}}" alt="" />
                                <div class="gallery-overlay">
                                    <h5 class="overlay-caption">favicon Image</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
<!-- end logo card -->
