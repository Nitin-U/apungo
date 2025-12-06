<section class="parallax-window" data-parallax="scroll"
         data-image-src="{{ isset($page_image) && $page_image  ? asset(imagePath($page_image)) :
asset('assets/frontend/img/'.$image) }}">
    <div class="parallax-content-1 opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
        <div class="animated fadeInDown">
            <h1>{{ $page_title ?? ''}}</h1>
            <p>{{ $page_subtitle ?? ''}}</p>
        </div>
    </div>
</section>
