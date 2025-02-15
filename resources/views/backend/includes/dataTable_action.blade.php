<div class="row">
    <div class="hstack gap-2">
        <a href="{{ route($params['base_route'].'edit',$params['id']) }}" title="Edit"
           class="btn btn-outline-success waves-effect waves-light"><i class="ri-pencil-fill"></i></a>
        <button class="btn btn-outline-danger waves-effect waves-light cs-remove-data" title="Remove"
           cs-delete-route="{{ route($params['base_route'].'destroy',$params['id']) }}" data-value="{{$params['id']}}">
            <i class="ri-delete-bin-6-line"></i></button>
    </div>
</div>
