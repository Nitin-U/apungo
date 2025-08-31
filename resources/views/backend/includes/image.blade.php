<div class="col-xxl-10">
    <div class="gallery-box card">
        <div class="gallery-container">
            @if($components['image'])
            <a class="image-popup" id="{{$components['id']}}" href="{{ asset(imagePath($components['image']))}}" title="">
                <img class="gallery-img img-fluid mx-auto" loading="lazy" src="{{ asset(imagePath($components['image']))}}" alt="" />
            </a>
            @else
                <a class="image-popup" id="{{$components['id']}}" href="{{ asset('assets/backend/img/avatars/default2.jpg')}}" title="">
                    <img class="gallery-img img-fluid mx-auto" loading="lazy" src="{{ asset('assets/backend/img/avatars/default2.jpg')}}" alt="" />
                </a>
            @endif
        </div>
    </div>
</div>
