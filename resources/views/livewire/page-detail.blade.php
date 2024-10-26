@section('title', $page_content->name)

<div>
    <div class="flex flex-col items-start w-full px-5 py-10 mx-auto max-w-1920 bg-light lg:bg-gray-100 xl:flex-row xl:py-14 xl:px-8 2xl:px-14">
        <div class="w-full overflow-hidden lg:flex">
            <div class="md:p-8 bg-light shadow rounded w-full shadow-none sm:shadow">
                <div class="flex w-full flex-col">
                    <div class="mb-8 flex items-center justify-center sm:mb-10">
                       <h1 class="text-center text-lg font-semibold text-heading sm:text-xl">{{ $page_content->name }}</h1>
                   </div>

                    <div>
                         {!! $page_content->content !!}
                    </div>
               </div>
            </div>
        </div>
    </div>
</div>