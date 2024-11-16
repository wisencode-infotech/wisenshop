<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <script>document.write(new Date().getFullYear())</script> © {{ __setting('site_title') }}.
            </div>
            <div class="col-sm-6">
                <div class="text-sm-end d-none d-sm-block">
                    Design & Develop by <a href="{{ env('APP_AUTHOR_SITE', 'https://wisencode.com') }}">{{ env('APP_AUTHOR_COMPANY_NAME', 'Wisencode Infotech') }}</a>
                </div>
            </div>
        </div>
    </div>
</footer>