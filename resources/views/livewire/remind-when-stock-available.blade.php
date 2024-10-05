<div>
    <!-- Reminder button -->
    <button wire:click="remind" type="button" 
            class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-full transition-colors text-lg text-accent mr-1
            border {{ $isReminded ? 'border-green-500' : 'border-gray-300' }} p-1">
        <i class="fa-{{ $isReminded ? 'solid' : 'regular' }} fa-bell"></i>
    </button>

    <!-- Full-screen Drawer (for email input if user is not logged in) -->
    <div x-data="{ isDrawerOpen: @entangle('isDrawerOpen') }" 
         x-show="isDrawerOpen"
         class="fixed inset-0 z-50 bg-gray-900 bg-opacity-50 transition-opacity duration-300 flex justify-end"
         x-cloak>
        <!-- Drawer content -->
        <div class="h-full w-80 bg-white shadow-lg transition-transform transform duration-300 ease-in-out"
             :class="{ 'translate-x-0': isDrawerOpen, 'translate-x-full': !isDrawerOpen }">
            <div class="p-6">
                <h2 class="text-lg font-semibold mb-6 text-gray-700">Enter Your Email</h2>
                
                <form wire:submit.prevent="submitEmail" class="space-y-4">
                    <!-- Email Input -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email address</label>
                        
                        <input type="text" id="email" wire:model="email" 
                               class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                               placeholder="Enter your email">
                        @error('email') 
                            <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <!-- Buttons -->
                    <div class="flex justify-between">
                        <button type="submit" 
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-accent bg-accent-600 hover:bg-accent-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Set Reminder
                        </button>
                        
                        <button type="button" 
                                @click="isDrawerOpen = false" 
                                class="inline-flex justify-center py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
