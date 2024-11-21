@section('title', $page_content->name)

<div>
    <div class="flex flex-col items-start w-full md:px-5 py-10 mx-auto max-w-1920  lg:bg-gray-100 xl:flex-row ">
        <div class="w-full overflow-hidden lg:flex">
            <div class="shadow rounded w-full shadow-none sm:shadow">
                <div class="flex w-full flex-col">
                    <div>
                         {!! $page_content->content !!}
                    </div>
               </div>
            </div>
        </div>
    </div>
</div>