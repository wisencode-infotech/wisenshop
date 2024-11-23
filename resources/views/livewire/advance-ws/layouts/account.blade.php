<!-- resources/views/layouts/account.blade.php -->
<main class="site-primary">
    <!-- Account Page section -->
    <section class="my-account-page">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- column -->
                <div class="col-12">
                    <!-- Slot for child content -->
                    {{ $slot }}
                </div>
            </div>
        </div>
    </section>
    <!--/ End Account Page section -->
</main>