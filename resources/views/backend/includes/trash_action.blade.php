<div class="row">
    <div class="hstack gap-2">
        {!! Form::open(['route' => [$route_name.'restore', $row['id']],'data-value'=>$row['id'],'method'=>'POST', 'class'=>'restore_trash']) !!}
        <button cs-restore-route="{{ route($route_name.'restore',$row['id']) }}" data-value="{{$row['id']}}"
                class="btn btn-icon btn-label-primary waves-effect waves-light" title="Restore">
            <i class="icon-base bx bx-repost"></i></button>
        {!! Form::close() !!}

        {!! Form::open(['route' => [$route_name.'remove-trash', $row['id']],'data-value'=>$row['id'],'method'=>'DELETE', 'class'=>'remove_trash']) !!}
        <button type="submit" class="btn btn-icon btn-label-danger waves-effect waves-light cs-remove-trash"
                title="Remove Permanently">
            <i class="icon-base bx bx-trash"></i></button>
        {!! Form::close() !!}

    </div>
</div>
