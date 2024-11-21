<div class="flex w-full flex-col divide-y divide-gray-200 divide-opacity-70 sm:flex-row sm:items-center sm:space-x-8 sm:divide-y-0 sm:divide-x rtl:sm:space-x-reverse rtl:sm:divide-x-reverse">
    <div class="w-full pb-4 sm:w-auto sm:pb-0">
        <span class="inline-flex shrink-0 items-center rounded-full bg-product-rating px-6 py-2 text-3xl font-semibold mb-4">
          {{ round($product->average_rating) }}
           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25.056 24" class="h-6 w-6 ltr:ml-2 rtl:mr-2">
              <g data-name="Group 36413" fill="currentColor">
                 <path id="Path_22667" data-name="Path 22667" d="M19.474,34.679l-6.946-4.346L5.583,34.679a.734.734,0,0,1-1.1-.8L6.469,25.93.263,20.668a.735.735,0,0,1,.421-1.3l8.1-.566,3.064-7.6a.765.765,0,0,1,1.362,0l3.064,7.6,8.1.566a.735.735,0,0,1,.421,1.3L18.588,25.93l1.987,7.949a.734.734,0,0,1-1.1.8Z" transform="translate(0 -10.792)"></path>
              </g>
           </svg>
        </span>
        <p class="text-sm text-white bg-gray-400 rounded text-center"><span>{{ $product->total_reviews }} {{ __trans('ratings') }}</span></p>
    </div>

    <div class="w-full space-y-3 py-0.5 pt-4 sm:w-auto sm:pt-0 ltr:sm:pl-8 rtl:sm:pr-8">
        @foreach ([5, 4, 3, 2, 1] as $star)

        @php
            $count = $count = $product->getTotalReviewsAttribute($star);
            $percentage = $product->total_reviews > 0 ? ($count / $product->total_reviews) * 100 : 0;
            $color = config('general.review_colors.' . $star); // Get the color for the current star
        @endphp

        <div class="flex items-center text-sm text-heading">
            <div class="flex w-11 shrink-0 items-center space-x-1 font-semibold rtl:space-x-reverse">
                    <span class="text-sm font-semibold text-heading">{{ $star }}</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25.056 24" class="h-2.5 w-2.5 ltr:ml-1.5 rtl:mr-1.5">
                    <g data-name="Group 36413" fill="currentColor">
                        <path id="Path_22667" data-name="Path 22667" d="M19.474,34.679l-6.946-4.346L5.583,34.679a.734.734,0,0,1-1.1-.8L6.469,25.93.263,20.668a.735.735,0,0,1,.421-1.3l8.1-.566,3.064-7.6a.765.765,0,0,1,1.362,0l3.064,7.6,8.1.566a.735.735,0,0,1,.421,1.3L18.588,25.93l1.987,7.949a.734.734,0,0,1-1.1.8Z" transform="translate(0 -10.792)"></path>
                    </g>
                    </svg>
            </div>
            <div class="relative h-[5px] w-52 overflow-hidden rounded-md bg-[#F1F1F1]">
            <div class="absolute h-full rounded-md {{ $color }}" style="width: {{ $percentage }}%;"></div>
            </div>
            <div class="shrink-0 ltr:pl-5 rtl:pr-5">{{ $count }}</div>
        </div>
        @endforeach
</div>
</div>