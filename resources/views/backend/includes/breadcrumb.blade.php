<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">{{ $page }}</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{route($module.'dashboard')}}">Dashboard</a></li>
                    @if($page_method !=='index')
                        <li class="breadcrumb-item"><a href="{{route($base_route.'index')}}">{{ $page }}</a></li>
                        <li class="breadcrumb-item active">{{ $page_title }}</a></li>
                    @else
                        <li class="breadcrumb-item active">{{ $page }}</a></li>
                    @endif
                </ol>
            </div>

        </div>
    </div>
</div>
