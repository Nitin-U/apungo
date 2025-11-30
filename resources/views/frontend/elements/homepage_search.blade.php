<div id="search_container_2">
    <div id="search_2">
        <ul class="nav nav-tabs">
            <li><a href="#search_pandit" data-bs-toggle="tab" class="active show" id="tab_bt_1"><span>Search Pandit</span></a></li>
            {{--            <li><a href="#hotels" data-bs-toggle="tab" id="tab_bt_2"><span>Hotels</span></a></li>--}}
            {{--            <li><a href="#restaurants" data-bs-toggle="tab" id="tab_bt_3"><span>Restaurants</span></a></li>--}}
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade active show" id="search_pandit">
                {!! Form::open(['route' => $route_name.'search', 'method'=>'POST', 'class'=>'search-form']) !!}
                <div class="row g-0 custom-search-input-2">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <input class="form-control" type="text" name='location' placeholder="Location">
                            <i class="icon_pin_alt"></i>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <input class="form-control date-pick" type="text" name="dates" placeholder="When.." autocomplete="off">
                            <i class="icon_calendar"></i>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            {!! Form::select('service_mode',['physical'=>'Physical','online'=>'Online'],null,['class'=>'form-select service_mode','placeholder'=>'Select mode..','id'=>'service_mode']) !!}
                            <i class="icon-article"></i>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <input type="submit" class="btn_search" value="Search">
                    </div>
                </div>
                <!-- /row -->
                {!! Form::close() !!}
            </div>
            <!-- End tab -->
        </div>
    </div>
    <!-- End search_container_2 -->
</div>
