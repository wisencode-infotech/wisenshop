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
            <form>
                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                    <div><label for="name"
                            class="mb-3 block text-sm font-semibold leading-none text-body-dark">Name</label><input
                            id="name" name="name" type="text"
                            class="flex w-full appearance-none items-center px-4 text-sm text-heading transition duration-300 ease-in-out focus:outline-0 focus:ring-0 border border-border-base rounded focus:border-accent h-12"
                            autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false"
                            aria-invalid="false" placeholder="Your name..."></div>
                    <div><label for="email"
                            class="mb-3 block text-sm font-semibold leading-none text-body-dark">Email</label><input
                            id="email" name="email" type="email"
                            class="flex w-full appearance-none items-center px-4 text-sm text-heading transition duration-300 ease-in-out focus:outline-0 focus:ring-0 border border-border-base rounded focus:border-accent h-12"
                            autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false"
                            aria-invalid="false" placeholder="Your email..."></div>
                </div>
                <div class="my-5"><label for="subject"
                        class="mb-3 block text-sm font-semibold leading-none text-body-dark">Subject</label><input
                        id="subject" name="subject" type="text"
                        class="flex w-full appearance-none items-center px-4 text-sm text-heading transition duration-300 ease-in-out focus:outline-0 focus:ring-0 border border-border-base rounded focus:border-accent h-12"
                        autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false"
                        aria-invalid="false" placeholder="Your subject..."></div>
                <div class="my-5"><label for="description"
                        class="mb-3 block text-sm font-semibold leading-none text-body-dark">Description</label>
                    <textarea id="description" name="description"
                        class="flex w-full appearance-none items-center rounded px-4 py-3 text-sm text-heading transition duration-300 ease-in-out focus:outline-0 focus:ring-0 border border-border-base focus:border-accent"
                        autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" rows="4"
                        placeholder="Your message..." maxlength="150"></textarea>
                </div>
                <div class="text-[#1F2937] text-base font-medium">
                    <div class="flex items-center"><input id="isChecked" name="isChecked" type="checkbox"
                            class="checkbox"><label for="isChecked"
                            class="text-[#1F2937] text-base font-medium text-body text-sm primary">I'd like to hear
                            from Pickbazar in the future. (You can unsubscribe at any time)</label></div>
                </div>
                <div class="text-center mt-8"><button data-variant="normal"
                        class="inline-flex items-center justify-center shrink-0 font-semibold leading-none rounded outline-none transition duration-300 ease-in-out focus:outline-0 focus:shadow focus:ring-1 focus:ring-accent-700 bg-accent text-light border border-transparent hover:bg-accent-hover px-6 py-5 text-sm font-bold uppercase">Send
                        Message</button></div>
            </form>
        </div>
    </div>
</div>
