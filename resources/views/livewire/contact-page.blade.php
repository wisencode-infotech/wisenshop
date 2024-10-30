@section('title', 'Contact Us')

<div>
    <div
        class="mx-auto flex w-full max-w-7xl flex-col px-5 py-10 pb-20 md:flex-row md:pb-10 xl:py-14 xl:px-8 xl:pb-14 2xl:px-14">
        <div class="order-2 w-full shrink-0 rounded-lg bg-light p-5 md:order-1 md:w-72 lg:w-96">
            <div class="mb-8 flex w-full items-center justify-center overflow-hidden"><img alt="Contact" loading="lazy"
                    width="299" height="232" decoding="async" data-nimg="1" class="h-auto w-full"
                    src="{{ asset('assets/frontend/img/static/media/contact-illustration.2f6adc05.svg') }}" style="color: transparent;"></div>
            <div class="mb-8 flex flex-col"><span class="mb-3 font-semibold text-heading">Address</span><span
                    class="text-sm text-body"><a class="" target="_blank" title="{{ __setting('address') }}"
                        href="">{{ __setting('address') }}</a></span></div>
            <div class="mb-8 flex flex-col"><span class="mb-3 font-semibold text-heading">Phone</span><span
                    class="text-sm text-body">{{ __setting('phone_number') }}</span></div>
            <div class="mb-8 flex flex-col"><span class="mb-3 font-semibold text-heading">Email Address</span><span
                    class="text-sm text-body">{{ __setting('email') }}</span></div>
            <div class="mb-8 flex flex-col"><span class="mb-3 font-semibold text-heading">Website</span>
                <div class="flex items-center justify-between"><span class="text-sm text-body">{{ __setting('website') }}</span><a
                        class="text-sm font-semibold text-accent hover:text-accent-hover focus:text-blue-500 focus:outline-none"
                        target="_blank" href="{{ __setting('website') }}">Visit This Site</a></div>
            </div>
            <div class="mb-8 flex flex-col"><span class="mb-4 font-semibold text-heading">Follow Us</span>
                <div class="flex items-center justify-start">
                    <a
                        class="text-muted transition-colors duration-300 focus:outline-none ltr:mr-8 ltr:last:mr-0 rtl:ml-8 rtl:last:ml-0 hover:undefined"
                        target="_blank" title="{{ __setting('facebook_link') }}"
                        href="{{ __setting('facebook_link') }}">
                        <i class="fa fa-facebook"> </i>
                    </a>
                    <a
                        class="text-muted transition-colors duration-300 focus:outline-none ltr:mr-8 ltr:last:mr-0 rtl:ml-8 rtl:last:ml-0 hover:undefined"
                        target="_blank" title="{{ __setting('twitter_link') }}" href="{{ __setting('twitter_link') }}">
                         <i class="fa fa-telegram"> </i>
                    </a>
                    <a
                        class="text-muted transition-colors duration-300 focus:outline-none ltr:mr-8 ltr:last:mr-0 rtl:ml-8 rtl:last:ml-0 hover:undefined"
                        target="_blank" title="{{ __setting('instagram_link') }}"
                        href="{{ __setting('instagram_link') }}">
                        <i class="fa fa-instagram"> </i>
                    </a>
                </div>
            </div>
        </div>
        <div
            class="order-1 mb-8 w-full rounded-lg bg-light p-5 md:order-2 md:mb-0 md:p-8 ltr:md:ml-7 rtl:md:mr-7 ltr:lg:ml-9 rtl:lg:mr-9">
            <h1 class="mb-7 font-body text-xl font-bold text-heading md:text-2xl">{{ __trans('How can we improve your experience?') }}
            </h1>
            <form wire:submit.prevent="submitForm">
                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                    <div>
                        <label for="name" class="mb-3 block text-sm font-semibold text-body-dark">Name</label>
                        <input wire:model="name" id="name" name="name" type="text"
                            class="w-full border rounded h-12" placeholder="Your name...">
                        @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="email" class="mb-3 block text-sm font-semibold text-body-dark">Email</label>
                        <input wire:model="email" id="email" name="email" type="email"
                            class="w-full border rounded h-12" placeholder="Your email...">
                        @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="my-5">
                    <label for="subject" class="mb-3 block text-sm font-semibold text-body-dark">Subject</label>
                    <input wire:model="subject" id="subject" name="subject" type="text"
                        class="w-full border rounded h-12" placeholder="Your subject...">
                    @error('subject') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <div class="my-5">
                    <label for="description" class="mb-3 block text-sm font-semibold text-body-dark">Description</label>
                    <textarea wire:model="description" id="description" name="description"
                        class="w-full border rounded h-12" rows="4" placeholder="Your message..." maxlength="150"></textarea>
                    @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <div class="text-center mt-8">
                    <button type="submit"
                        class="px-6 py-3 bg-accent text-light rounded font-bold uppercase">
                        <span wire:loading.remove >
                            {{ __trans('Send Message') }}
                        </span>
                        <span wire:loading>
                            {{ __trans('Sending...') }}
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
