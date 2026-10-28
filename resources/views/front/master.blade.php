<!DOCTYPE html>

<html
    lang="en"
    class="light-style layout-menu-fixed"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="{{asset('assets-front')}}/"
    data-template="vertical-menu-template-free"
>

<!-- Head -->
@include('front.partials.head')
<!-- / Head -->

<body>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Sidebar -->
        @include('front.partials.sidebar')

        <!-- / Sidebar -->

        <!-- Layout container -->
        <div class="layout-page">
            <!-- Header -->

            @include('front.partials.header')

            <!-- / Header -->

            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->
                <div class="container-xxl flex-grow-1 container-p-y">
                    @yield('content')
                </div>
                <!-- / Content -->

                <!-- Footer -->
                @include('front.partials.footer')

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


<!-- Scripts -->
@include('front.partials.scripts')
<!-- / Scripts -->
</body>
</html>
