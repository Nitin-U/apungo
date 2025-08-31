<div class="row">
    <div class="hstack gap-2">
        <a href="{{ route($components['route_name'].'edit',$components['id']) }}" title="Edit"
           class="btn btn-icon btn-label-primary waves-effect waves-light"><i class="icon-base bx bxs-edit-alt"></i></a>
        <a href="{{ route($components['route_name'].'show', $components['id']) }}" title="View Details"
           class="btn btn-icon btn-label-primary waves-effect waves-light">
            <i class="icon-base bx bx-show icon-sm"></i>
        </a>
        <button class="btn btn-icon btn-label-danger waves-effect waves-light cs-remove-data" title="Remove"
           cs-delete-route="{{ route($components['route_name'].'destroy',$components['id']) }}" data-value="{{$components['id']}}">
            <i class="icon-base bx bx-trash"></i></button>
    </div>
</div>
