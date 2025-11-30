<!-- End section -->
<div id="position">
    <div class="container">
        <ul>
            <li><a href="/">Home</a></li>
            @if($page_method !== 'index')
                <li><a href="{{route($route_name.'index')}}">{{ $page }}</a>
                </li>
                <li>{{ $page_title }}
                </li>
            @else
                <li>{{ $page_title }} </li>
            @endif

        </ul>
    </div>
</div>
