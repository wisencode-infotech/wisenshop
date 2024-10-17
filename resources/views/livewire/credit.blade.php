@section('title', __trans('Credit'))

<div>
    <div class="flex flex-col items-start w-full px-5 py-10 mx-auto max-w-1920 bg-light lg:bg-gray-100 xl:flex-row xl:py-14 xl:px-8 2xl:px-14">
        @livewire('user-sidebar')
        <div class="w-full overflow-hidden lg:flex">
            <div class="p-5 md:p-8 bg-light shadow rounded w-full shadow-none sm:shadow">
               <div class="flex w-full flex-col">
                  <div class="mb-8 flex items-center justify-center sm:mb-10">
                     <h1 class="text-center text-lg font-semibold text-heading sm:text-xl">{{ __trans('Credit') }}</h1>
                  </div>

                  <div class="flex items-center justify-center h-64 mt-4">
                    <div class="bg-accent text-white px-6 py-3 rounded-full shadow-lg">
                      <p class="text-2xl font-bold">
                        <span class="align-top text-sm">{{ __appCurrencySymbol() }}</span> 
                        <span class="text-4xl">{{ number_format(Auth::user()->credit ?? 0, 2) }}</span>
                      </p>
                    </div>
                  </div>                  
                     
               </div>
            </div>
        </div>
    </div>
</div>