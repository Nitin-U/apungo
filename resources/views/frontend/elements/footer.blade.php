
<footer class="revealed">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h3>Need help?</h3>
                <a href="tel://{{ $setting_data->phone ?? $setting_data->mobile ?? '' }}" id="phone">{{ $setting_data->phone ?? $setting_data->mobile ?? '' }}</a>
                <a href="mailto:{{ $setting_data->email ?? '' }} id="email_footer">{{ $setting_data->email ?? '' }}</a>
            </div>
            <div class="col-md-3">
                <h3>About</h3>
                <ul>
                    <li><a href="#">About us</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Login</a></li>
                    <li><a href="#">Register</a></li>
                    <li><a href="#">Terms and condition</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h3>Discover</h3>
                <ul>
                    <li><a href="#">Community blog</a></li>
                    <li><a href="#">Tour guide</a></li>
                    <li><a href="#">Wishlist</a></li>
                    <li><a href="#">Gallery</a></li>
                </ul>
            </div>
            <div class="col-md-2">
                <h3>Settings</h3>
                <div class="styled-select">
                    <select name="lang" id="lang">
                        <option value="English" selected>English</option>
                        <option value="French">French</option>
                        <option value="Spanish">Spanish</option>
                        <option value="Russian">Russian</option>
                    </select>
                </div>
                <div class="styled-select">
                    <select name="currency" id="currency">
                        <option value="USD" selected>USD</option>
                        <option value="EUR">EUR</option>
                        <option value="GBP">GBP</option>
                        <option value="RUB">RUB</option>
                    </select>
                </div>
            </div>
        </div><!-- End row -->
        <div class="row">
            <div class="col-md-12">
                <div id="social_footer">
                    <ul>
                        <li><a href="#0"><i class="bi bi-instagram"></i></a></li>
                        <li><a href="#0"><i class="bi bi-whatsapp"></i></a></li>
                        <li><a href="#0"><i class="bi bi-facebook"></i></a></li>
                        <li><a href="#0"><i class="bi bi-twitter-x"></i></a></li>
                        <li><a href="#0"><i class="bi bi-youtube"></i></a></li>
                    </ul>
                    <p>© {{$setting_data->title ?? ''}} 2025</p>
                </div>
            </div>
        </div><!-- End row -->
    </div><!-- End container -->
</footer><!-- End footer -->

<div id="toTop"></div><!-- Back to top button -->

<!-- Search Menu -->
<div class="search-overlay-menu">
    <span class="search-overlay-close"><i class="icon_set_1_icon-77"></i></span>
    <form role="search" id="searchform" method="get">
        <input value="" name="q" type="text" placeholder="Search..." />
        <button type="submit"><i class="icon_set_1_icon-78"></i>
        </button>
    </form>
</div><!-- End Search Menu -->

<!-- Sign In Popup -->
<div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide">
    <div class="small-dialog-header">
        <h3>Sign In</h3>
    </div>
    <form id="login_form" action="" method="POST">
        @csrf
        <div class="sign-in-wrapper">
            <a href="#0" class="social_bt facebook">Login with Facebook</a>
            <a href="#0" class="social_bt google">Login with Google</a>
            <div class="divider"><span>Or</span></div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" id="email">
                <i class="icon_mail_alt"></i>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" id="password" value="">
                <i class="icon_lock_alt"></i>
            </div>
            <div class="clearfix add_bottom_15">
                <div class="checkboxes float-start">
                    <label class="container_check">Remember me
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="float-end"><a id="forgot" href="javascript:void(0);">Forgot Password?</a></div>
            </div>

            <div class="text-center"><input type="submit" value="Log In" name="action" class="btn_login"></div>

            <div class="text-center">
                Don’t have an account? <a id="signup_link" href="javascript:void(0);">Sign up</a>
            </div>
        </div>
    </form>

    <form id="forgot_pw" style="display:none;" action="" method="POST">
        @csrf
        <div class="form-group">
            <label>Please confirm login email below</label>
            <input type="email" class="form-control" name="email_forgot" id="email_forgot">
            <i class="icon_mail_alt"></i>
        </div>
        <p>You will receive an email containing a reset link.</p>
        <div class="text-center">
            <input type="submit" value="Reset Password" name="action" class="btn_1">
        </div>
    </form>

    <!-- SIGN UP SECTION -->
    <!-- <form id="sign_up" style="display:none;" action="{{ route('signup.store') }}" method="POST" enctype="multipart/form-data"> -->
    {!! Form::open(['route' => 'signup.store', 'method'=>'POST', 'class'=>'submit_form', 'id'=>'sign_up','enctype'=>'multipart/form-data', 'style'=> 'display:none']) !!}

        @csrf
        <div class="form-group">
            <label>Full Name</label>
            <input type="text" class="form-control" name="name" required>
            <i class="icon_profile"></i>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email_signup" required>
            <i class="icon_mail_alt"></i>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password_signup" required>
            <i class="icon_lock_alt"></i>
        </div>

        <div class="form-group">
            <label>Years of Experience</label>
            <input type="number" min="0" class="form-control" name="experience" required>
            <i class="icon_calendar"></i>
        </div>

        <div class="form-group">
            <label>Document Type</label>
            <select name="document_type" class="form-control" required>
                <option value="">Select Type</option>
                <option value="id_proof">ID Proof</option>
                <option value="license">License</option>
                <option value="certificate">Certificate</option>
                <option value="other">Other</option>
            </select>
        </div>

        <div class="form-group">
            <label>Document Upload</label>
            <input type="file" class="form-control" name="document" required>
            <i class="icon_upload"></i>
        </div>

        <div class="form-group form-check mt-2">
            <input type="checkbox" class="form-check-input" id="termsCheck" name="agreement" value="1" required>
            <label class="form-check-label" for="termsCheck">
                I agree with <a href="#">Terms & Conditions</a>
            </label>
        </div>

        <div class="text-center">
            <input type="submit" value="Create Account" class="btn_1">
        </div>
    </form>
    <!--form -->
</div>
<!-- /Sign In Popup -->

<!-- Common scripts -->
<script src="{{ asset('assets/frontend/js/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/common_scripts_min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/functions.js') }}"></script>
<script src="{{asset('assets/base/base.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/backend/vendor/js/toastify-js.js')}}"></script>

<!-- DATEPICKER  -->
<script>
    $(function() {
        'use strict';
        $('input[name="dates"]').daterangepicker({
            autoUpdateInput: false,
            minDate:new Date(),
            locale: {
                cancelLabel: 'Clear'
            }
        });
        $('input[name="dates"]').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('MM-DD-YY') + ' > ' + picker.endDate.format('MM-DD-YY'));
        });
        $('input[name="dates"]').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });
    });
</script>

<!-- Input quantity  -->
<script src="{{ asset('assets/frontend/js/input_qty.js') }}"></script>

<!-- Autocomplete -->
<script>
    function initMap() {
        var input = document.getElementById('autocomplete');
        var autocomplete = new google.maps.places.Autocomplete(input);

        autocomplete.addListener('place_changed', function() {
            var place = autocomplete.getPlace();
            if (!place.geometry) {
                window.alert("Autocomplete's returned place contains no geometry");
                return;
            }

            var address = '';
            if (place.address_components) {
                address = [
                    (place.address_components[0] && place.address_components[0].short_name || ''),
                    (place.address_components[1] && place.address_components[1].short_name || ''),
                    (place.address_components[2] && place.address_components[2].short_name || '')
                ].join(' ');
            }
        });
    }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBXp1EtixNDI7rdzmX5nn0TkHbT94QOPnc&amp;libraries=places&amp;callback=initMap"></script>

@include($module.'includes.toast_message')

@yield('js')
@stack('scripts')
<!-- SWITCHER  -->
{{--<script src="{{ asset('assets/frontend/js/switcher.js') }}"></script>--}}
{{--<div id="style-switcher">--}}
{{--    <h2>Color Switcher <a href="#"><i class="icon_set_1_icon-65"></i></a></h2>--}}
{{--    <div>--}}
{{--        <ul class="colors" id="color1">--}}
{{--            <li><a href="#" class="default" title="Defaul"></a></li>--}}
{{--            <li><a href="#" class="aqua" title="Aqua"></a></li>--}}
{{--            <li><a href="#" class="green_switcher" title="Green"></a></li>--}}
{{--            <li><a href="#" class="orange" title="Orange"></a></li>--}}
{{--            <li><a href="#" class="blue" title="Blue"></a></li>--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--</div>--}}


</body>
</html>
