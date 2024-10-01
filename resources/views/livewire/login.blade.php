@section('title', 'Login')

<div>

    <div
        class="mx-auto flex w-full max-w-7xl flex-col px-5 py-10 pb-20 md:flex-row md:pb-10 xl:py-14 xl:px-8 xl:pb-14 2xl:px-14">
        <div
            class="order-1 mb-8 w-full rounded-lg bg-light p-5 md:order-2 md:mb-0 md:p-8 ltr:md:ml-7 rtl:md:mr-7 ltr:lg:ml-9 rtl:lg:mr-9">
            <h1 class="mb-7 font-body text-xl font-bold text-heading md:text-2xl">Login
            </h1>
            <form wire:submit.prevent="authenticate" action="post">
                <div class="grid grid-cols-1 gap-5">
                    <div><label for="email"
                            class="mb-3 block text-sm font-semibold leading-none text-body-dark">Email</label><input
                            id="email" name="email" type="text"
                            class="flex w-full appearance-none items-center px-4 text-sm text-heading transition duration-300 ease-in-out focus:outline-0 focus:ring-0 border border-border-base rounded focus:border-accent h-12"
                            autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false"
                            aria-invalid="false" placeholder="Your email..."></div>
                </div>
                <div class="my-5 grid grid-cols-1 gap-5">
                    <div><label for="email"
                            class="mb-3 block text-sm font-semibold leading-none text-body-dark">Password</label><input
                            id="email" name="password" type="password"
                            class="flex w-full appearance-none items-center px-4 text-sm text-heading transition duration-300 ease-in-out focus:outline-0 focus:ring-0 border border-border-base rounded focus:border-accent h-12"
                            autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false"
                            aria-invalid="false" placeholder="Your Password..."></div>
                </div>

                <div class="text-center mt-8"><button data-variant="normal"
                        class="inline-flex items-center justify-center shrink-0 font-semibold leading-none rounded outline-none transition duration-300 ease-in-out focus:outline-0 focus:shadow focus:ring-1 focus:ring-accent-700 bg-accent text-light border border-transparent hover:bg-accent-hover px-6 py-5 text-sm font-bold uppercase">Login</button></div>
            </form>
        </div>
    </div>
</div>
