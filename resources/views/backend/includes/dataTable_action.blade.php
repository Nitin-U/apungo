<div class="row">
    <div class="hstack gap-2">
        <a href="{{ route($components['route_name'].'edit',$components['id']) }}" title="Edit"
           class="btn btn-icon btn-label-primary waves-effect waves-light"><i class="icon-base bx bxs-edit-alt icon-sm"></i></a>
        <button type="button" class="btn btn-icon btn-label-danger waves-effect waves-light cs-remove-data" title="Trash"
                cs-delete-route="{{ route($components['route_name'].'destroy',$components['id']) }}" data-value="{{$components['id']}}">
            <span class="icon-base bx bx-trash icon-sm"></span>
        </button>
    </div>
</div>
