@extends('frontend.layouts.master')
@section('title') Home @endsection
@section('css')
@endsection
@section('content')
@include($module.'elements.inner_banner',['image'=> 'parallax_bg_1.jpg'])
	<main>
		<!-- Position -->
        @include($module.'elements.breadcrumb')
		<!-- Position -->

		<div class="collapse" id="collapseMap">
			<div id="map" class="map"></div>
		</div>
		<!-- End Map -->

		<div class="container margin_60">
			<div class="row">
				<aside class="col-lg-3">
					<p>
						<a class="btn_map" data-bs-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap" data-text-swap="Hide map" data-text-original="View on map">View on map</a>
					</p>

					<div class="box_style_cat">
						<ul id="cat_nav">
							<li><a href="#" id="active"><i class="icon_set_1_icon-51"></i>All tours <span>(141)</span></a>
							</li>
							<li><a href="#"><i class="icon_set_1_icon-3"></i>City sightseeing <span>(20)</span></a>
							</li>
							<li><a href="#"><i class="icon_set_1_icon-4"></i>Museum tours <span>(16)</span></a>
							</li>
							<li><a href="#"><i class="icon_set_1_icon-44"></i>Historic Buildings <span>(12)</span></a>
							</li>
							<li><a href="#"><i class="icon_set_1_icon-37"></i>Walking tours <span>(11)</span></a>
							</li>
							<li><a href="#"><i class="icon_set_1_icon-14"></i>Eat & Drink <span>(20)</span></a>
							</li>
							<li><a href="#"><i class="icon_set_1_icon-43"></i>Churces <span>(08)</span></a>
							</li>
							<li><a href="#"><i class="icon_set_1_icon-28"></i>Skyline tours <span>(11)</span></a>
							</li>
						</ul>
					</div>

					<div id="filters_col">
                        <a data-bs-toggle="collapse" href="#collapseFilters" aria-expanded="false" aria-controls="collapseFilters" id="filters_col_bt"><i class="icon_set_1_icon-65"></i>Filters</a>
                        <div class="collapse show" id="collapseFilters">
                            <div class="filter_type">
                                <h6>Price</h6>
                                <input type="text" id="range" name="range" value="">
                            </div>
                            <div class="filter_type">
                                <h6>Star Category</h6>
                                <ul>
                                    <li>
                                        <label class="container_check">
                                            <span class="rating">
                                                <i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i>
                                            </span>(15)
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="container_check">
                                            <span class="rating">
                                                <i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81"></i>
                                            </span>(10)
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="container_check">
                                            <span class="rating">
                                                <i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81"></i><i class="icon_set_1_icon-81"></i>
                                            </span>(22)
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="container_check">
                                            <span class="rating">
                                                <i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81"></i><i class="icon_set_1_icon-81"></i><i class="icon_set_1_icon-81"></i>
                                            </span>(08)
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="container_check">
                                            <span class="rating">
                                                <i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81"></i><i class="icon_set_1_icon-81"></i><i class="icon_set_1_icon-81"></i><i class="icon_set_1_icon-81"></i>
                                            </span>(08)
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                            <div class="filter_type">
                                <h6>Review Score</h6>
                                <ul>
                                    <li>
                                        <label class="container_check">
                                            Superb: 9+ (77)
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="container_check">
                                            Good: 7+ (909)
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="container_check">
                                            Pleasant: 6+ (1196)
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="container_check">
                                             No rating (198)
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                            <div class="filter_type">
                                <h6>Facility</h6>
                                <ul>
                                    <li>
                                        <label class="container_check">
                                             Pet allowed
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="container_check">
                                             Wifi
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="container_check">
                                             Spa
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="container_check">
                                             Restaurant
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="container_check">
                                             Pool
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="container_check">
                                             Parking
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                     <li>
                                        <label class="container_check">
                                             Fitness center
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                            <div class="filter_type">
                                <h6>District</h6>
                                <ul class="mb-0">
                                    <li>
                                        <label class="container_radio">
                                             Paris Centre
                                            <input type="radio" name="location">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="container_radio">
                                             La Defance
                                            <input type="radio" name="location">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="container_radio">
                                            La Marais
                                            <input type="radio" name="location">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="container_radio">
                                            Latin Quarter
                                            <input type="radio" name="location">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!--End collapse -->
                    </div>
                    <!--End filters col-->
				</aside>
				<!--End aside -->

				<div class="col-lg-9">

					<div id="tools">
						<div class="row justify-content-between">
							<div class="col-md-3 col-sm-4">
                                <div class="styled-select-filters">
                                    <select name="sort_price" id="sort_price" data-filter-group="sort_price">
                                        <option value="*" data-filter-value="" selected="">Show all</option>
                                        <option value="lower_price" data-filter-value=".lower_price">Lowest price</option>
                                        <option value="higher_price" data-filter-value=".higher_price">Higher price</option>
                                    </select>
                                </div>
                            </div>
							<div class="col-md-6 col-sm-4 d-none d-sm-block text-end">
								<a href="#" class="bt_filters"><i class="icon-th"></i></a> <a href="all_tours_list.html" class="bt_filters"><i class=" icon-list"></i></a>
							</div>
						</div>
					</div>
					<!--End tools -->
                    <div class="isotope-wrapper">
					<div class="row">
						<div class="col-md-6 isotope-item lower_price">
							<div class="tour_container">
								<div class="ribbon_3 popular"><span>Popular</span>
								</div>
								<div class="img_container">
									<a href="single_tour.html">
										<img src="img/tour_box_1.jpg" width="800" height="533" class="img-fluid" alt="Image">
										<div class="short_info">
											<i class="icon_set_1_icon-44"></i>Historic Buildings<span class="price"><sup>$</sup>45</span>
										</div>
									</a>
								</div>
								<div class="tour_title">
									<h3><strong>Arc Triomphe</strong> tour</h3>
									<div class="rating">
										<i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><small>(75)</small>
									</div>
									<!-- end rating -->
									<div class="wishlist">
										<a class="tooltip_flip tooltip-effect-1" href="#">+<span class="tooltip-content-flip"><span class="tooltip-back">Add to wishlist</span></span></a>
									</div>
									<!-- End wish list-->
								</div>
							</div>
							<!-- End box tour -->
						</div>
						<!-- End col-md-6 -->

						<div class="col-md-6 isotope-item lower_price">
							<div class="tour_container">
								<div class="ribbon_3 popular"><span>Popular</span>
								</div>
								<div class="img_container">
									<a href="single_tour.html">
										<img src="img/tour_box_2.jpg" width="800" height="533" class="img-fluid" alt="Image">
										<div class="short_info">
											<i class="icon_set_1_icon-43"></i>Churches<span class="price"><sup>$</sup>45</span>
										</div>
									</a>
								</div>
								<div class="tour_title">
									<h3><strong>Notredame</strong> tour</h3>
									<div class="rating">
										<i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><small>(75)</small>
									</div>
									<!-- end rating -->
									<div class="wishlist">
										<a class="tooltip_flip tooltip-effect-1" href="#">+<span class="tooltip-content-flip"><span class="tooltip-back">Add to wishlist</span></span></a>
									</div>
									<!-- End wish list-->
								</div>
							</div>
							<!-- End box tour -->
						</div>
						<!-- End col-md-6 -->
					</div>
					<!-- End row -->

					<div class="row">
						<div class="col-md-6 isotope-item higher_price">
							<div class="tour_container">
								<div class="ribbon_3 popular"><span>Popular</span>
								</div>
								<div class="img_container">
									<a href="single_tour.html">
										<img src="img/tour_box_3.jpg" width="800" height="533" class="img-fluid" alt="Image">
										<div class="short_info">
											<i class="icon_set_1_icon-44"></i>Historic Buildings<span class="price"><sup>$</sup>45</span>
										</div>
									</a>
								</div>
								<div class="tour_title">
									<h3><strong>Versailles</strong> tour</h3>
									<div class="rating">
										<i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><small>(75)</small>
									</div>
									<!-- end rating -->
									<div class="wishlist">
										<a class="tooltip_flip tooltip-effect-1" href="#">+<span class="tooltip-content-flip"><span class="tooltip-back">Add to wishlist</span></span></a>
									</div>
									<!-- End wish list-->
								</div>
							</div>
							<!-- End box tour -->
						</div>
						<!-- End col-md-6 -->

						<div class="col-md-6 isotope-item higher_price">
							<div class="tour_container">
								<div class="ribbon_3 popular"><span>Popular</span>
								</div>
								<div class="img_container">
									<a href="single_tour.html">
										<img src="img/tour_box_4.jpg" width="800" height="533" class="img-fluid" alt="Image">
										<div class="short_info">
											<i class="icon_set_1_icon-30"></i>Walking tour<span class="price"><sup>$</sup>45</span>
										</div>
									</a>
								</div>
								<div class="tour_title">
									<h3><strong>Pompidue</strong> tour</h3>
									<div class="rating">
										<i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><small>(75)</small>
									</div>
									<!-- end rating -->
									<div class="wishlist">
										<a class="tooltip_flip tooltip-effect-1" href="javascript:void(0);">+<span class="tooltip-content-flip"><span class="tooltip-back">Add to wishlist</span></span></a>
									</div>
									<!-- End wish list-->
								</div>
							</div>
							<!-- End box tour -->
						</div>
						<!-- End col-md-6 -->
					</div>
					<!-- End row -->

					<div class="row">
						<div class="col-md-6 isotope-item lower_price">
							<div class="tour_container">
								<div class="ribbon_3 popular"><span>Popular</span>
								</div>
								<div class="img_container">
									<a href="single_tour.html">
										<img src="img/tour_box_1.jpg" width="800" height="533" class="img-fluid" alt="Image">
										<div class="short_info">
											<i class="icon_set_1_icon-28"></i>Skyline tours<span class="price"><sup>$</sup>45</span>
										</div>
									</a>
								</div>
								<div class="tour_title">
									<h3><strong>Tour Eiffel</strong> tour</h3>
									<div class="rating">
										<i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><small>(75)</small>
									</div>
									<!-- end rating -->
									<div class="wishlist">
										<a class="tooltip_flip tooltip-effect-1" href="javascript:void(0);">+<span class="tooltip-content-flip"><span class="tooltip-back">Add to wishlist</span></span></a>
									</div>
									<!-- End wish list-->
								</div>
							</div>
							<!-- End box tour -->
						</div>
						<!-- End col-md-6 -->

						<div class="col-md-6 isotope-item lower_price">
							<div class="tour_container">
								<div class="ribbon_3"><span>Top rated</span>
								</div>
								<div class="img_container">
									<a href="single_tour.html">
										<img src="img/tour_box_5.jpg" width="800" height="533" class="img-fluid" alt="Image">
										<div class="short_info">
											<i class="icon_set_1_icon-44"></i>Historic Buildings<span class="price"><sup>$</sup>45</span>
										</div>
									</a>
								</div>
								<div class="tour_title">
									<h3><strong>Pantheon</strong> tour</h3>
									<div class="rating">
										<i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><small>(75)</small>
									</div>
									<!-- end rating -->
									<div class="wishlist">
										<a class="tooltip_flip tooltip-effect-1" href="javascript:void(0);">+<span class="tooltip-content-flip"><span class="tooltip-back">Add to wishlist</span></span></a>
									</div>
									<!-- End wish list-->
								</div>
							</div>
							<!-- End box tour -->
						</div>
						<!-- End col-md-6 -->
					</div>
					<!-- End row -->

					<div class="row">
						<div class="col-md-6 isotope-item lower_price">
							<div class="tour_container">
								<div class="ribbon_3"><span>Top rated</span>
								</div>
								<div class="img_container">
									<a href="single_tour.html">
										<img src="img/tour_box_8.jpg" width="800" height="533" class="img-fluid" alt="Image">
										<div class="short_info">
											<i class="icon_set_1_icon-3"></i>City sightseeing<span class="price"><sup>$</sup>45</span>
										</div>
									</a>
								</div>
								<div class="tour_title">
									<h3><strong>Open Bus</strong> tour</h3>
									<div class="rating">
										<i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><small>(75)</small>
									</div>
									<!-- end rating -->
									<div class="wishlist">
										<a class="tooltip_flip tooltip-effect-1" href="javascript:void(0);">+<span class="tooltip-content-flip"><span class="tooltip-back">Add to wishlist</span></span></a>
									</div>
									<!-- End wish list-->
								</div>
							</div>
							<!-- End box tour -->
						</div>
						<!-- End col-md-6 -->

						<div class="col-md-6 isotope-item higher_price">
							<div class="tour_container">
								<div class="ribbon_3"><span>Top rated</span>
								</div>
								<div class="img_container">
									<a href="single_tour.html">
										<img src="img/tour_box_9.jpg" width="800" height="533" class="img-fluid" alt="Image">
										<div class="short_info">
											<i class="icon_set_1_icon-4"></i>Museums<span class="price"><sup>$</sup>45</span>
										</div>
									</a>
								</div>
								<div class="tour_title">
									<h3><strong>Louvre museum</strong> tour</h3>
									<div class="rating">
										<i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><small>(75)</small>
									</div>
									<!-- end rating -->
									<div class="wishlist">
										<a class="tooltip_flip tooltip-effect-1" href="javascript:void(0);">+<span class="tooltip-content-flip"><span class="tooltip-back">Add to wishlist</span></span></a>
									</div>
									<!-- End wish list-->
								</div>
							</div>
							<!-- End box tour -->
						</div>
						<!-- End col-md-6 -->
					</div>
					<!-- End row -->
                    </div>
                    <!-- End isotope-wrapper -->

					<nav aria-label="Page navigation">
						<ul class="pagination justify-content-center">
							<li class="page-item">
								<a class="page-link" href="#" aria-label="Previous">
									<span aria-hidden="true">&laquo;</span>
									<span class="sr-only">Previous</span>
								</a>
							</li>
							<li class="page-item active"><span class="page-link">1</span>
							</li>
							<li class="page-item"><a class="page-link" href="#">2</a></li>
							<li class="page-item"><a class="page-link" href="#">3</a></li>
							<li class="page-item">
								<a class="page-link" href="#" aria-label="Next">
									<span aria-hidden="true">&raquo;</span>
									<span class="sr-only">Next</span>
								</a>
							</li>
						</ul>
					</nav>
					<!-- end pagination-->

				</div>
				<!-- End col lg 9 -->
			</div>
			<!-- End row -->
		</div>
		<!-- End container -->
	</main>
	<!-- End main -->
@endsection

@section('js')
@endsection