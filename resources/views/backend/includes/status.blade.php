@php $route = $params['base_route'] ?? $base_route; @endphp
<div class="btn-group view-btn" id="status-button-{{ $params['id'] }}">
    <button class="btn btn-light dropdown-toggle" style="width: 10em;" type="button" id="dropdownMenuClickableInside" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
        {{ucwords( $params['status'] ? 'Active':'Inactive' )}}
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuClickableInside" style="">
        @if( $params['status'] )
            <li><a class="dropdown-item change-status" cs-update-route="{{ route($route.'status-update') }}" href="#" value="0" id="{{$params['id']}}">Inactive</a></li>
        @else
            <li><a class="dropdown-item change-status" cs-update-route="{{ route($route.'status-update') }}" href="#" value="1" id="{{$params['id']}}">Active</a></li>
        @endif
    </ul>
</div>
