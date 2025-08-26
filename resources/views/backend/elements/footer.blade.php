<!-- Footer -->
<footer class="content-footer footer bg-footer-theme">
    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
        <div class="mb-2 mb-md-0">
            ©
            <script>
                document.write(new Date().getFullYear());
            </script>
            , {{ucwords(@$setting_data->website_name)}}
{{--            made with ❤️ by--}}
{{--            <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">ThemeSelection</a>--}}
        </div>
        <div>
            <a href="#" target="_blank" class="footer-link me-4" >Documentation</a>
            <a href="#" target="_blank" class="footer-link me-4">Support</a>
        </div>
    </div>
</footer>
<!-- / Footer -->

<div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
</div>
<!-- / Layout page -->

</div>
<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- / Layout wrapper -->
<!-- Core JS -->
<script src="{{ asset('assets/backend/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('assets/backend/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('assets/backend/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/backend/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

<script src="{{ asset('assets/backend/vendor/js/menu.js') }}"></script>

<!-- Icons. Uncomment required icon fonts -->
<link rel="stylesheet" href="{{ asset('assets/backend/vendor/fonts/boxicons.css') }}" />

<!-- endbuild -->

<!-- Main JS -->
<script src="{{asset('assets/backend/js/main.js')}}"></script>

<!-- Additional JS -->
<script src="{{asset('assets/backend/vendor/js/select2.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/backend/vendor/js/toastify-js.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/base/nav-scroll.js')}}"></script>
<script src="{{asset('assets/backend/vendor/js/moment.min.js')}}"></script>
<script src="{{asset('assets/backend/vendor/js/flatpickr.js')}}"></script>
@yield('js')
@stack('scripts')

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="{{asset('assets/backend/js/buttons.js')}}"></script>
</body>
</html>
