<div>
    @if($is_open)
        <div class="fixed inset-0 z-50 overflow-y-auto" dir="ltr" id="headlessui-dialog-:r9:" role="dialog" aria-modal="true" data-headlessui-state="open">
           <div class="min-h-full text-center md:p-5">
              <div class="{{ $is_open ? '' : 'lg:' }} fixed inset-0 h-full w-full bg-gray-900 bg-opacity-50 opacity-100"></div>
              <span class="{{ $is_open ? 'lg:' : '' }}inline-block h-screen align-middle" aria-hidden="true">&ZeroWidthSpace;</span>
              <div class="min-w-content relative inline-block max-w-full align-middle transition-all ltr:text-left rtl:text-right opacity-100 scale-100" id="headlessui-dialog-panel-:ra:" data-headlessui-state="open">
                 <button wire:click="close" aria-label="Close panel" class="absolute top-4 z-[60] inline-block outline-none focus:outline-0 ltr:right-4 rtl:left-4">
                    <span class="sr-only">close</span>
                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                       <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                 </button>
                 <div class="flex h-full min-h-screen w-screen flex-col justify-center bg-light md:h-auto md:min-h-0 md:max-w-[590px] md:rounded-xl">
                    <div class="flex items-center border-b border-border-200 p-7">
                       <div class="flex shrink-0"><img alt="{{ $product->name }}" loading="lazy" width="90" height="90" decoding="async" data-nimg="1" class="inline-flex rounded bg-gray-200" srcset="{{ $product->display_image_url }}" src="{{ $product->display_image_url }}" style="color: transparent;"></div>
                       <div class="ltr:pl-6 rtl:pr-6">
                          <h3 class="mb-2 text-base font-semibold leading-[1.65em] text-heading">{{ $product->name }}</h3>
                       </div>
                    </div>
                    <div class="p-7">
                          <div class="mb-5">
                            <label class="block text-sm font-semibold mb-2">Ratings</label>
                            <div class="w-auto">
                                <ul class="rc-rate flex space-x-2 text-3xl" role="radiogroup">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <li class="{{ $rating >= $i ? 'text-yellow-500' : 'text-gray-300' }}" wire:click="$set('rating', {{ $i }})">
                                            ★
                                        </li>
                                    @endfor
                                </ul>
                                 @error('rating')
                                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            </div>
                          <div class="mb-5"><label for="comment" class="mb-3 block text-sm font-semibold leading-none text-body-dark">Description</label>
                            <textarea id="comment" wire:model="comment" class="flex w-full appearance-none items-center rounded px-4 py-3 text-sm text-heading transition duration-300 ease-in-out focus:outline-0 focus:ring-0 border border-border-base focus:border-accent" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" rows="4"></textarea>
                            @error('comment')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mt-8"><button wire:click="submit" data-variant="normal" class="inline-flex items-center justify-center shrink-0 font-semibold leading-none rounded outline-none transition duration-300 ease-in-out focus:outline-0 focus:shadow focus:ring-1 focus:ring-accent-700 bg-accent text-light border border-transparent hover:bg-accent-hover px-5 py-0 h-12 h-11 w-full sm:h-12">Submit</button></div>
                       
                    </div>
                 </div>
              </div>
           </div>
        </div>
    @endif
</div>
