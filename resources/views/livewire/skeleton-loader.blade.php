<div class="w-full pt-4 pb-20 lg:py-6 px-4 xl:px-0">
    <div class="grid grid-cols-[repeat(auto-fill,minmax(300px,1fr))] gap-3">
        @foreach($skeletons as $index) <!-- Create multiple skeleton loaders for better UX -->
            <div class="animate-pulse">
                <div class="h-40 bg-gray-200 rounded"></div>
                <div class="mt-2 h-4 bg-gray-200 rounded"></div>
                <div class="mt-1 h-4 bg-gray-200 rounded"></div>
            </div>
        @endforeach
    </div>
</div>