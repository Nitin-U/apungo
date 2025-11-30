@extends('frontend.layouts.master')
@section('title') Home @endsection
@section('css')
@endsection
@section('content')
    @include($module.'elements.inner_banner',['image'=> 'parallax_bg_1.jpg'])
    <main>
        <!-- Position -->
        @include($module.'elements.breadcrumb')



        <div class="container margin_60">

            <div class="row">

                <!--End aside -->
                <div class="col-lg-10">

{{--                    <div id="tools">--}}
{{--                        <div class="row justify-content-between">--}}
{{--                            <div class="col-md-3 col-sm-4">--}}
{{--                                <div class="styled-select-filters">--}}
{{--                                    <select name="sort_price" id="sort_price">--}}
{{--                                        <option value="" selected>Sort by price</option>--}}
{{--                                        <option value="lower">Lowest price</option>--}}
{{--                                        <option value="higher">Highest price</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-6 col-sm-4 d-none d-sm-block text-end">--}}
{{--                                <a href="all_tours_grid.html" class="bt_filters"><i class="icon-th"></i></a> <a href="#" class="bt_filters"><i class=" icon-list"></i></a>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                    </div>--}}
                    <!--/tools -->
                    @foreach($bundle['rows']  as $row)
                    <div class="strip_all_tour_list wow fadeIn" data-wow-delay="0.1s">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 position-relative">
{{--                                <div class="ribbon_3 popular"><span>Popular</span>--}}
{{--                                </div>--}}
                                <div class="wishlist">
                                    <a class="tooltip_flip tooltip-effect-1" href="javascript:void(0);">+<span class="tooltip-content-flip"><span class="tooltip-back">Add to wishlist</span></span></a>
                                </div>
                                <div class="img_list">
                                    <a href="#"><img src="{{ asset(imagePath($row->user->image)) }}" alt="Image">
                                        <div class="short_info"><i class="icon_set_1_icon-4"></i>vendor </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="tour_list_desc">
                                    <div class="rating"><i class="icon-smile voted"></i><i class="icon-smile  voted"></i><i class="icon-smile  voted"></i><i class="icon-smile  voted"></i><i class="icon-smile"></i><small>(75)</small>
                                    </div>
                                    <h3><strong>{{ $row->title ?? '' }} {{ $row->user->name  }}</strong></h3>
                                    <p>{{ $row->about_me ?? '' }} </p>
{{--                                    <ul class="add_info">--}}
{{--                                        <li>--}}
{{--                                            <div class="tooltip_styled tooltip-effect-4">--}}
{{--                                                <span class="tooltip-item"><i class="icon_set_1_icon-83"></i></span>--}}
{{--                                                <div class="tooltip-content">--}}
{{--                                                    <h4>Schedule</h4>--}}
{{--                                                    <strong>Monday to Friday</strong> 09.00 AM - 5.30 PM--}}
{{--                                                    <br>--}}
{{--                                                    <strong>Saturday</strong> 09.00 AM - 5.30 PM--}}
{{--                                                    <br>--}}
{{--                                                    <strong>Sunday</strong> <span class="label label-danger">Closed</span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <div class="tooltip_styled tooltip-effect-4">--}}
{{--                                                <span class="tooltip-item"><i class="icon_set_1_icon-41"></i></span>--}}
{{--                                                <div class="tooltip-content">--}}
{{--                                                    <h4>Address</h4> Musée du Louvre, 75058 Paris - France--}}
{{--                                                    <br>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <div class="tooltip_styled tooltip-effect-4">--}}
{{--                                                <span class="tooltip-item"><i class="icon_set_1_icon-97"></i></span>--}}
{{--                                                <div class="tooltip-content">--}}
{{--                                                    <h4>Languages</h4> English - French - Chinese - Russian - Italian--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <div class="tooltip_styled tooltip-effect-4">--}}
{{--                                                <span class="tooltip-item"><i class="icon_set_1_icon-27"></i></span>--}}
{{--                                                <div class="tooltip-content">--}}
{{--                                                    <h4>Parking</h4> 1-3 Rue Elisée Reclus--}}
{{--                                                    <br> 76 Rue du Général Leclerc--}}
{{--                                                    <br> 8 Rue Caillaux 94923--}}
{{--                                                    <br>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <div class="tooltip_styled tooltip-effect-4">--}}
{{--                                                <span class="tooltip-item"><i class="icon_set_1_icon-25"></i></span>--}}
{{--                                                <div class="tooltip-content">--}}
{{--                                                    <h4>Transport</h4>--}}
{{--                                                    <strong>Metro: </strong>Musée du Louvre station (line 1)--}}
{{--                                                    <br>--}}
{{--                                                    <strong>Bus:</strong> 21, 24, 27, 39, 48, 68, 69, 72, 81, 95--}}
{{--                                                    <br>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2">
                                <div class="price_list">
                                    <div><small>Learn more  about {{ $row->title ?? '' }} {{ $row->user->name  }}and check services you need</small>
                                        <p><a href="#" class="btn_1">Details</a>
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End strip -->
                    @endforeach
                    <nav aria-label="Page navigation">
                        {{ $bundle['rows']->links('vendor.pagination.default') }}
                    </nav>
                    <!-- end pagination-->

                </div>
                <!-- End col lg-9 -->
            </div>
            <!-- End row -->
        </div>
        <!-- End container -->
    </main>
@endsection

@section('js')
@endsection
