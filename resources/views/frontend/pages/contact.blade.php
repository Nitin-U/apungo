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
    {{-- MAP FIXED: Showing Nepal (Kathmandu) --}}

    <script>
        function initMap() {
            const nepalLocation = { lat: 27.7172, lng: 85.3240 }; // Kathmandu

            const map = new google.maps.Map(document.getElementById("map_contact"), {
                zoom: 14,
                center: nepalLocation,
            });

            new google.maps.Marker({
                position: nepalLocation,
                map: map,
                title: "Our Office (Kathmandu, Nepal)",
            });
        }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_MAPS_KEY&callback=initMap" async defer></script>
    <!-- END MAP -->

    {{-- Directions --}}
    <div id="directions">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <form action="https://www.google.com/maps" method="get" target="_blank">
                        <div class="input-group">
                            <input type="text" name="saddr" placeholder="Enter your starting point" class="form-control style-2" />
                            <input type="hidden" name="daddr" value="Kathmandu, Nepal" />
                            <span class="input-group-btn">
                                <button class="btn" type="submit" style="margin-left:0;">GET DIRECTIONS</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Breadcrumbs FIXED --}}
    <!-- <div id="position">
        <div class="container">
            <ul>
                <li><a href="{{ route(FRONTEND.'home') }}">Home</a></li>
                <li><a href="{{ route(FRONTEND.'contact') }}">Contact</a></li>
                <li>Contact Page</li>
            </ul>
        </div>
    </div> -->

    <div class="container margin_60">

        <div class="row">
            <div class="col-md-8">

                <div class="form_title">
                    <h3><strong><i class="icon-pencil"></i></strong> Fill the form below</h3>
                    <p>Feel free to send us a message anytime.</p>
                </div>

                <div class="step">
                    <form method="post" action="#" id="contactform">
                        @csrf

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" name="name_contact" placeholder="Enter Name">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" name="lastname_contact" placeholder="Enter Last Name">
                                </div>
                            </div>
                        </div>

                        {{-- Email + Phone --}}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email_contact" placeholder="Enter Email">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" name="phone_contact" placeholder="Enter Phone number">
                                </div>
                            </div>
                        </div>

                        {{-- Message --}}
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Message</label>
                                    <textarea rows="5" class="form-control" name="message_contact" placeholder="Write your message"></textarea>
                                </div>
                            </div>
                        </div>

                        {{-- Verification --}}
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Human verification</label>
                                <input type="text" class="form-control add_bottom_30" placeholder="Are you human? 3 + 1 =">
                                <input type="submit" value="Submit" class="btn_1" id="submit-contact">
                            </div>
                        </div>
                    </form>
                </div>

            </div>

            <div class="col-md-4">

                <div class="box_style_1">
                    <span class="tape"></span>
                    <h4>Address <span><i class="icon-pin pull-right"></i></span></h4>
                    <p>Kathmandu, Nepal</p>

                    <hr>

                    <h4>Help center <span><i class="icon-help pull-right"></i></span></h4>
                    <p>If you have any questions, feel free to ask.</p>

                    <ul id="contact-info">
                        <li>+977 9800000000</li>
                        <li><a href="mailto:info@domain.com">info@domain.com</a></li>
                    </ul>
                </div>

                <div class="box_style_4">
                    <i class="icon_set_1_icon-57"></i>
                    <h4>Need <span>Help?</span></h4>
                    <a href="tel://9800000000" class="phone">+977 9800000000</a>
                    <small>Monday to Friday 9.00am - 7.30pm</small>
                </div>

            </div>
        </div>
    </div>

</main>

@endsection

@section('js')
@endsection