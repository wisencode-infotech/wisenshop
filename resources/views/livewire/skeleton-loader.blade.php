<div class="w-full pb-20 @if(isset($apply_top_margin) && $apply_top_margin == true) pt-4 lg:py-6 @endif px-4 xl:px-0">
    <div class="grid grid-cols-[repeat(auto-fill,minmax(300px,1fr))] gap-4">
        @foreach($skeletons as $index)
            <div class="p-4 bg-white shadow-lg rounded-lg animate-pulse">
                <!-- Heart Icon -->
                <div class="flex justify-start mb-2">
                    <div class="h-6 w-6 bg-gray-200 rounded-full"></div>
                </div>

                <!-- Image Placeholder -->
                <div class="h-48 bg-gray-200 rounded-lg"></div>

                <!-- Title and Description -->
                <div class="mt-3">
                    <div class="h-4 bg-gray-200 rounded w-1/2"></div> <!-- Short text -->
                    <div class="h-4 bg-gray-200 rounded w-full mt-2"></div> <!-- Paragraph line -->
                    <div class="h-6 bg-gray-200 rounded w-2/3 mt-1"></div> <!-- Longer title -->
                </div>

                <!-- Price Placeholder -->
                <div class="mt-4">
                    <div class="flex justify-between items-center mt-4">
                    <div class="h-6 bg-gray-200 rounded w-1/2"></div>
                        <div class="h-10 w-10 bg-gray-200 rounded-full"></div> <!-- Minus button -->
                        <div class="h-6 w-10 bg-gray-200 rounded"></div> <!-- Quantity box -->
                        <div class="h-10 w-10 bg-gray-200 rounded-full"></div> <!-- Plus button -->
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
