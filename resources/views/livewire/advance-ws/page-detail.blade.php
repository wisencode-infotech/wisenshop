@section('title', $page_content->name)

<div>
    <section class="cms-page-section section-two">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- column -->
                <div class="col-12">
                    <!-- cms content -->
                    <div class="cms-content">
                        {!! $page_content->content !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>