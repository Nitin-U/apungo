<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ucwords(@$setting_data->meta_description ?? $setting_data->description ?? '')}}">
    <meta name="keywords" content=" {{@$setting_data->meta_tags ?? ''}}">
    <meta name="author" content="">

    @if (\Request::is('/'))
        <title> {{ucwords($setting_data->title ?? '')}}</title>
    @else
        <title>@yield('title') |  {{ucwords($setting_data->title ?? '')}} </title>
        @yield('seo')
    @endif

    <!-- Favicons-->
    <link rel="shortcut icon" type="image/x-icon" href="{{ $setting_data->favicon ?  asset(imagePath($setting_data->favicon)) : ''}}">

    {{--    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">--}}
{{--    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">--}}
{{--    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">--}}
{{--    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">--}}

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Gochi+Hand&amp;family=Montserrat:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">

    <!-- COMMON CSS -->
    <link href="{{ asset('assets/frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/vendors.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/custom/custom_style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/backend/vendor/css/toastify.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- ALTERNATIVE COLORS CSS -->
    <link href="#" id="colors" rel="stylesheet">


    <script async src="https://www.googletagmanager.com/gtag/js?id={{@$setting_data->google_analytics}}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', '{{@$setting_data->google_analytics}}');
    </script>

    @yield('css')
    @stack('styles')
</head>

<body class="datepicker_mobile_full"> <!-- Remove this class to disable datepicker full on mobile -->

<div id="preloader">
    <div class="sk-spinner sk-spinner-wave">
        <div class="sk-rect1"></div>
        <div class="sk-rect2"></div>
        <div class="sk-rect3"></div>
        <div class="sk-rect4"></div>
        <div class="sk-rect5"></div>
    </div>
</div>
<!-- End Preload -->

<div class="layer"></div>
<!-- Mobile menu overlay mask -->

<!-- Header================================================== -->
<header>
    <div id="top_line">
        <div class="container">
            <div class="row">
                <div class="col-6"><i class="icon-phone"></i><strong>tel:{{ $setting_data->phone ?? $setting_data->mobile ?? '' }}</strong></div>
                <div class="col-6">
                    <ul id="top_links">
                        <li><a href="#sign-in-dialog" id="access_link">Sign in</a></li>
                        <li><a href="#" id="wishlist_link">Wishlist</a></li>
                    </ul>
                </div>
            </div><!-- End row -->
        </div><!-- End container-->
    </div><!-- End top line-->

    <div class="container">
        <div class="row">
            <div class="col-3">
                <div id="logo_home">
                    <h1><a href="/" title="{{ucwords($setting_data->title ?? '')}}">{{ucwords($setting_data->title ?? '')}}</a></h1>
                </div>
            </div>
            <nav class="col-9">
                <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="javascript:void(0);"><span>Menu mobile</span></a>
                <div class="main-menu">
                    <div id="header_menu">
                        <img src="{{asset('assets/frontend/img/logo_sticky.png')}}" width="160" height="34" alt="{{ucwords($setting_data->title ?? '')}}">
                    </div>
                    <a href="#" class="open_close" id="close_in"><i class="icon_set_1_icon-77"></i></a>
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);" class="show-submenu">Home <i class="icon-down-open-mini"></i></a>
                            <ul>
                                <li><a href="#">Owl Carousel Slider</a></li>
                                <li><a href="#">KenBurns Slider</a></li>
                                <li><a href="#">Home items with Carousel</a></li>
                                <li><a href="#">Home with Search V2</a></li>
                                <li class="third-level"><a href="javascript:void(0);">Revolution slider <strong class="badge badge-danger">New!</strong></a>
                                    <ul>
                                        <li><a href="#">Default slider</a></li>
                                        <li><a href="#">Basic slider</a></li>
                                        <li><a href="#">Youtube Hero</a></li>
                                        <li><a href="#">Vimeo Hero</a></li>
                                        <li><a href="#">Full Screen <strong class="badge badge-danger">New!</strong></a></li>
                                        <li><a href="#">Full Screen Slicey <strong class="badge badge-danger">New!</strong></a></li>
                                        <li><a href="#">Carousel</a></li>
                                        <li><a href="#">Mailchimp Newsletter</a></li>
                                        <li><a href="#">Fixed Caption</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Layer slider</a></li>
                                <li><a href="#">With Only tours</a></li>
                                <li><a href="#">Single image</a></li>
                                <li><a href="#">Header video</a></li>
                                <li><a href="#">With search panel</a></li>
                                <li><a href="#">With tabs</a></li>
                                <li><a href="#">With map</a></li>
                                <li><a href="#">With search bar</a></li>
                                <li><a href="#">Search bar + Video</a></li>
                                <li><a href="#">With Text Rotator</a></li>
                                <li><a href="#">With Cookie Bar (EU law)</a></li>
                                <li><a href="#">Popup Advertising</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);" class="show-submenu">Tours <i class="icon-down-open-mini"></i></a>
                            <ul>
                                <li><a href="#">All tours list</a></li>
                                <li><a href="#">All tours grid</a></li>
                                <li><a href="#">All tours Sort Masonry</a></li>
                                <li><a href="#">All tours map listing</a></li>
                                <li><a href="#">Single tour page</a></li>
                                <li><a href="#">Single tour with gallery</a></li>
                                <li class="third-level"><a href="javascript:void(0);">Single tour fixed sidebar</a>
                                    <ul>
                                        <li><a href="#">Single tour fixed sidebar</a></li>
                                        <li><a href="#">Single tour 2 Fixed Sidebar</a></li>
                                        <li><a href="#">Cart Fixed Sidebar</a></li>
                                        <li><a href="#">Payment Fixed Sidebar</a></li>
                                        <li><a href="#">Confirmation Fixed Sidebar</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Single tour working booking</a></li>
                                <li><a href="#">Single tour cart</a></li>
                                <li><a href="#">Single tour booking</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);" class="show-submenu">Hotels <i class="icon-down-open-mini"></i></a><ul>
                                <li><a href="#">All hotels list</a></li>
                                <li><a href="#">All hotels grid</a></li>
                                <li><a href="#">All hotels Sort Masonry</a></li>
                                <li><a href="#">All hotels map listing</a></li>
                                <li><a href="#">Single hotel page</a></li>
                                <li><a href="#">Single hotel working booking</a></li>
                                <li><a href="#">Single hotel contact working</a></li>
                                <li><a href="#">Cart hotel</a></li>
                                <li><a href="#">Booking hotel</a></li>
                                <li><a href="#">Confirmation hotel</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);" class="show-submenu">Transfers <i class="icon-down-open-mini"></i></a>
                            <ul>
                                <li><a href="#">All transfers list</a></li>
                                <li><a href="#">All transfers grid</a></li>
                                <li><a href="#">All transfers Sort Masonry</a></li>
                                <li><a href="#">Single transfer page</a></li>
                                <li><a href="#">Cart transfers</a></li>
                                <li><a href="#">Booking transfers</a></li>
                                <li><a href="#">Confirmation transfers</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);" class="show-submenu">Restaurants <i class="icon-down-open-mini"></i></a>
                            <ul>
                                <li><a href="#">All restaurants list</a></li>
                                <li><a href="#">All restaurants grid</a></li>
                                <li><a href="#">All restaurants Sort Masonry</a></li>
                                <li><a href="#">All restaurants map listing</a></li>
                                <li><a href="#">Single restaurant page</a></li>
                                <li><a href="#">Booking restaurant</a></li>
                                <li><a href="#">Confirmation restaurant</a></li>
                            </ul>
                        </li>
                        <li class="megamenu submenu">
                            <a href="javascript:void(0);" class="show-submenu-mega">Bonus<i class="icon-down-open-mini"></i></a>
                            <div class="menu-wrapper">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <h3>Header styles</h3>
                                        <ul>
                                            <li><a href="#">Default transparent</a></li>
                                            <li><a href="#">Plain color</a></li>
                                            <li><a href="#">Plain color on scroll</a></li>
                                            <li><a href="#">With socials on top</a></li>
                                            <li><a href="#">With language selection</a></li>
                                            <li><a href="#">With lang and conversion</a></li>
                                            <li><a href="#">With full horizontal menu</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-4">
                                        <h3>Footer styles</h3>
                                        <ul>
                                            <li><a href="#">Footer default</a></li>
                                            <li><a href="#">Footer style 2</a></li>
                                            <li><a href="#">Footer style 3</a></li>
                                            <li><a href="#">Footer style 4</a></li>
                                            <li><a href="#">Footer style 6</a></li>
                                            <li><a href="#">Footer style 7</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-4">
                                        <h3>Shop section</h3>
                                        <ul>
                                            <li><a href="#">Shop</a></li>
                                            <li><a href="#">Shop single</a></li>
                                            <li><a href="#">Shop cart</a></li>
                                            <li><a href="#">Shop Checkout</a></li>
                                        </ul>
                                    </div>
                                </div><!-- End row -->
                            </div><!-- End menu-wrapper -->
                        </li>
                        <li class="megamenu submenu">
                            <a href="javascript:void(0);" class="show-submenu-mega">Pages<i class="icon-down-open-mini"></i></a>
                            <div class="menu-wrapper">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <h3>Pages</h3>
                                        <ul>
                                            <li><a href="#">About us</a></li>
                                            <li><a href="#">General page</a></li>
                                            <li><a href="#">Tourist guide</a></li>
                                            <li><a href="#">Wishlist page</a></li>
                                            <li><a href="#">Faq</a></li>
                                            <li><a href="#">Faq smooth scroll</a></li>
                                            <li><a href="#">Pricing tables</a></li>
                                            <li><a href="#">Gallery 3 columns</a></li>
                                            <li><a href="#">Gallery 4 columns</a></li>
                                            <li><a href="#">Grid gallery</a></li>
                                            <li><a href="#">Grid gallery with filters</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-4">
                                        <h3>Pages</h3>
                                        <ul>
                                            <li><a href="#">Contact us 1</a></li>
                                            <li><a href="#">Contact us 2</a></li>
                                            <li><a href="#">Blog</a></li>
                                            <li><a href="#">Blog left sidebar</a></li>
                                            <li><a href="#">Login</a></li>
                                            <li><a href="#">Register</a></li>
                                            <li><a href="#" target="_blank">Invoice</a></li>
                                            <li><a href="#">404 Error page</a></li>
                                            <li><a href="#">Site launch / Coming soon</a></li>
                                            <li><a href="#">Tour timeline</a></li>
                                            <li><a href="#"><i class="icon-map"></i>  Full screen map</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-4">
                                        <h3>Elements</h3>
                                        <ul>
                                            <li><a href="#"><i class="icon-columns"></i> Footer with working newsletter</a></li>
                                            <li><a href="#"><i class="icon-inbox-alt"></i> Icon pack 1 (1900)</a></li>
                                            <li><a href="#"><i class="icon-inbox-alt"></i> Icon pack 2 (100)</a></li>
                                            <li><a href="#"><i class="icon-inbox-alt"></i> Icon pack 3 (30)</a></li>
                                            <li><a href="#"><i class="icon-inbox-alt"></i> Icon pack 4 (200)</a></li>
                                            <li><a href="#"><i class="icon-inbox-alt"></i> Icon pack 5 (360)</a></li>
                                            <li><a href="#"><i class="icon-tools"></i> Shortcodes</a></li>
                                            <li><a href="#" target="blank"><i class=" icon-mail"></i> Responsive email template</a></li>
                                            <li><a href="#"><i class="icon-cog-1"></i> Admin area</a></li>
                                            <li><a href="#"><i class="icon-align-right"></i>  RTL Version</a></li>
                                        </ul>
                                    </div>
                                </div><!-- End row -->
                            </div><!-- End menu-wrapper -->
                        </li>
                    </ul>
                </div><!-- End main-menu -->
                <ul id="top_tools">
                    <li>
                        <a href="javascript:void(0);" class="search-overlay-menu-btn"><i class="icon_search"></i></a>
                    </li>
                    <li>
                        <div class="dropdown dropdown-cart">
                            <a href="#0" data-bs-hover="dropdown" class="cart_bt"><i class="icon_bag_alt"></i><strong>3</strong></a>
                            <ul class="dropdown-menu" id="cart_items">
                                <li>
                                    <div class="image"><img src="{{ asset('assets/frontend/img/thumb_cart_1.jpg') }}" alt="image"></div>
                                    <strong><a href="#">Louvre museum</a>1x $36.00 </strong>
                                    <a href="#" class="action"><i class="icon-trash"></i></a>
                                </li>
                                <li>
                                    <div class="image"><img src="{{ asset('assets/frontend/img/thumb_cart_2.jpg') }}" alt="image"></div>
                                    <strong><a href="#">Versailles tour</a>2x $36.00 </strong>
                                    <a href="#" class="action"><i class="icon-trash"></i></a>
                                </li>
                                <li>
                                    <div class="image"><img src="{{ asset('assets/frontend/img/thumb_cart_3.jpg') }}" alt="image"></div>
                                    <strong><a href="#">Versailles tour</a>1x $36.00 </strong>
                                    <a href="#" class="action"><i class="icon-trash"></i></a>
                                </li>
                                <li>
                                    <div>Total: <span>$120.00</span></div>
                                    <a href="#" class="button_drop">Go to cart</a>
                                    <a href="#" class="button_drop outline">Check out</a>
                                </li>
                            </ul>
                        </div><!-- End dropdown-cart-->
                    </li>
                </ul>
            </nav>
        </div>
    </div><!-- container -->
</header><!-- End Header -->

<div id="search_container_2">
    <div id="search_2">
        <ul class="nav nav-tabs">
            <li><a href="#tours" data-bs-toggle="tab" class="active show" id="tab_bt_1"><span>Tours</span></a></li>
            <li><a href="#hotels" data-bs-toggle="tab" id="tab_bt_2"><span>Hotels</span></a></li>
            <li><a href="#restaurants" data-bs-toggle="tab" id="tab_bt_3"><span>Restaurants</span></a></li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade active show" id="tours">
                <form>
                    <div class="row g-0 custom-search-input-2">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Address autocomplete" id="autocomplete">
                                <i class="icon_pin_alt"></i>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <input class="form-control date-pick" type="text" name="dates" placeholder="When..">
                                <i class="icon_calendar"></i>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="panel-dropdown">
                                <a href="#">Guests <span class="qtyTotal tours">1</span></a>
                                <div class="panel-dropdown-content">
                                    <!-- Quantity Buttons -->
                                    <div class="qtyButtons tours">
                                        <label>Adults</label>
                                        <input type="text" name="qtyInput_tours" value="1">
                                    </div>
                                    <div class="qtyButtons tours">
                                        <label>Childrens</label>
                                        <input type="text" name="qtyInput_tours" value="0">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <input type="submit" class="btn_search" value="Search">
                        </div>
                    </div>
                    <!-- /row -->
                </form>
            </div>
            <!-- End tab -->
            <div class="tab-pane fade" id="hotels">
                <form>
                    <div class="row g-0 custom-search-input-2">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Hotel Name, City...">
                                <i class="icon_pin_alt"></i>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <input class="form-control date-pick" type="text" name="dates" placeholder="When..">
                                <i class="icon_calendar"></i>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="panel-dropdown">
                                <a href="#">Guests <span class="qtyTotal hotels">1</span></a>
                                <div class="panel-dropdown-content">
                                    <!-- Quantity Buttons -->
                                    <div class="qtyButtons hotels">
                                        <label>Adults</label>
                                        <input type="text" name="qtyInput_hotels" value="1">
                                    </div>
                                    <div class="qtyButtons hotels">
                                        <label>Childrens</label>
                                        <input type="text" name="qtyInput_hotels" value="0">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <input type="submit" class="btn_search" value="Search">
                        </div>
                    </div>
                    <!-- /row -->
                </form>
            </div>
            <!-- End tab -->
            <div class="tab-pane" id="restaurants">
                <form>
                    <div class="row g-0 custom-search-input-2">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Restaurant Name, City...">
                                <i class="icon_pin_alt"></i>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <input class="form-control date-pick" type="text" name="dates" placeholder="When..">
                                <i class="icon_calendar"></i>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="panel-dropdown">
                                <a href="#">Guests <span class="qtyTotal restaurants">1</span></a>
                                <div class="panel-dropdown-content">
                                    <!-- Quantity Buttons -->
                                    <div class="qtyButtons restaurants">
                                        <label>Adults</label>
                                        <input type="text" name="qtyInput_restaurants" value="1">
                                    </div>
                                    <div class="qtyButtons restaurants">
                                        <label>Childrens</label>
                                        <input type="text" name="qtyInput_restaurants" value="0">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <input type="submit" class="btn_search" value="Search">
                        </div>
                    </div>
                    <!-- /row -->
                </form>
            </div>
            <!-- End tab -->
        </div>
    </div>
    <!-- End search_container_2 -->
</div>
<!-- End search_container -->
