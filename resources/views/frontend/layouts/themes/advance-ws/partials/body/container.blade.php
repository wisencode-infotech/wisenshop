<!-- wrapper -->
<div class="wrapper">
    <!-- Preloader -->
    <div class="preloader d-none">
        <div class="preloader-inner">
            <img src="https://demo.webbytemplate.com/html-templates/bootstrap/clare-e-commerce/html/assets/images/loader-icon.svg" alt="loader icon">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- End Preloader -->

    <!-- Header -->
    @include('frontend/layouts/partials/header')
    <!--/ End Header -->

    <!-- Site-primary -->
    <main class="site-primary">
        {{ $slot }}
    </main>
    <!--/ End site-primary -->

    <div wire:ignore>
        <!--/ Footer -->
            @include('frontend/layouts/partials/footer')
        <!--/ End Footer -->
    </div>

</div>