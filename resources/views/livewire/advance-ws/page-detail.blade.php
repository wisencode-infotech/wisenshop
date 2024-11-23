@section('title', $page_content->name)

<section class="bg-footer-page-section">
    <div class="container pt-4 pb-4">
        <div class="card">
            <div class="card-body">
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="about-content-wrap">
                            {!! $page_content->content !!}
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>