@section('title','Back Forget Password Page')
    <!DOCTYPE html>

<html
    lang="en"
    class="light-style customizer-hide"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="{{asset('assets-back')}}/"
    data-template="vertical-menu-template-free"
>


@include('back.partials.authHead')

<body>
<!-- Content -->

<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <!-- Register -->
            <div class="card">
                <div class="card-body">
                    <!-- Logo -->
                    @include('back.partials.authLogo')

                    <!-- /Logo -->
                    <h4 class="mb-2">Forgot Password? 🔒</h4>
                    <p class="mb-4">Enter your email and we'll send you instructions to reset your password</p>
                    <x-auth-session-status class="mb-4" :status="session('status')"/>
                    <form id="formAuthentication" class="mb-3" method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="mb-3">

                            <x-input-label class="form-label" for="email" :value="__('Email')"/>
                            <x-text-input
                                class="form-control"
                                id="email"
                                type="email" name="email"
                                :value="old('email')"
                                placeholder="Enter your email"
                                autofocus
                            />
                            <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                        </div>
                        <button type="submit" class="btn btn-primary d-grid w-100">Send Reset Link</button>
                    </form>
                    <div class="text-center">
                        <a href="{{route('back.login')}}" class="d-flex align-items-center justify-content-center">
                            <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
                            Back to login
                        </a>
                    </div>
                </div>
            </div>
            <!-- /Register -->
        </div>
    </div>
</div>

<!-- / Content -->


@include('back.partials.authScripts')
</body>
</html>
