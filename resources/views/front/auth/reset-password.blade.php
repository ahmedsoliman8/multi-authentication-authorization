@section('title','Reset Password Page')
    <!DOCTYPE html>

<html
    lang="en"
    class="light-style customizer-hide"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="{{asset('assets-front')}}/"
    data-template="vertical-menu-template-free"
>


@include('front.partials.authHead')

<body>
<!-- Content -->

<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <!-- Register -->
            <div class="card">
                <div class="card-body">
                    <!-- Logo -->
                    @include('front.partials.authLogo')

                    <!-- /Logo -->
                    <h4 class="mb-2">Reset Password  🚀</h4>



                    <form id="formAuthentication" class="mb-3" method="POST" action="{{ route('password.store') }}">
                        @csrf
                        <!-- Password Reset Token -->
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
                        <div class="mb-3">

                            <x-input-label for="email" class="form-label" :value="__('Email')"/>
                            <x-text-input
                                type="text"
                                class="form-control"
                                id="email"
                                name="email"
                                placeholder="Enter your email"
                                autofocus
                                :value="old('email', $request->email)"
                            />
                            <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                        </div>

                        <div class="mb-3 form-password-toggle">
                            <x-input-label class="form-label" for="password" :value="__('Password')"/>
                            <div class="input-group input-group-merge">
                                <x-text-input
                                    type="password"
                                    id="password"
                                    class="form-control"
                                    name="password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password"
                                />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>

                            </div>
                            <x-input-error :messages="$errors->get('password')" class="mt-2"/>
                        </div>

                        <div class="mb-3 form-password-toggle">
                            <x-input-label class="form-label" for="password_confirmation"
                                           :value="__('Confirm Password')"/>
                            <div class="input-group input-group-merge">
                                <x-text-input
                                    type="password"
                                    id="password_confirmation"
                                    class="form-control"
                                    name="password_confirmation"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password"
                                />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>

                            </div>
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
                        </div>

                        <!--
                                               <div class="mb-3">
                                                   <div class="form-check">
                                                       <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms"/>
                                                       <label class="form-check-label" for="terms-conditions">
                                                           I agree to
                                                           <a href="javascript:void(0);">privacy policy & terms</a>
                                                       </label>
                                                   </div>
                                               </div>
                                               -->
                        <button type="submit" class="btn btn-primary d-grid w-100"> {{ __('Reset Password') }}</button>
                    </form>


                </div>
            </div>
            <!-- /Register -->
        </div>
    </div>
</div>

<!-- / Content -->


@include('front.partials.authScripts')
</body>
</html>
