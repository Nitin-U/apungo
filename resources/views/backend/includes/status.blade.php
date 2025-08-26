@php $route = $components['route_name'] ?? $route_name; @endphp
<div class="btn-group view-btn" id="status-button-{{ $components['id'] }}">
    <button class="btn btn-light dropdown-toggle" style="width: 10em;" type="button" id="dropdownMenuClickableInside" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
        {{ucwords( $components['status'] ? 'Active':'Inactive' )}}
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuClickableInside" style="">
        @if( $components['status'] )
            <li><a class="dropdown-item change-status" cs-update-route="{{ route($route.'status-update') }}" href="#" value="0" id="{{$components['id']}}">Inactive</a></li>
        @else
            <li><a class="dropdown-item change-status" cs-update-route="{{ route($route.'status-update') }}" href="#" value="1" id="{{$components['id']}}">Active</a></li>
        @endif
    </ul>
</div>
