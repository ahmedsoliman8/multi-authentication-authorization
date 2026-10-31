<!DOCTYPE html>

<html
    lang="en"
    class="light-style layout-menu-fixed"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="{{asset('assets-back')}}/"
    data-template="vertical-menu-template-free"
>

<!-- Head -->
@include('back.partials.head')
<!-- / Head -->

<body>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Sidebar -->
        @include('back.partials.sidebar')

        <!-- / Sidebar -->

        <!-- Layout container -->
        <div class="layout-page">
            <!-- Header -->

            @include('back.partials.header')

            <!-- / Header -->

            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->
                <div class="container-xxl flex-grow-1 container-p-y">
                    @yield('content')
                </div>
                <!-- / Content -->

                <!-- Footer -->
                @include('back.partials.footer')

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
@include('back.partials.scripts')
<!-- / Scripts -->
</body>
</html>
