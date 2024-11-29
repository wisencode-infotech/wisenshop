@section('title', 'Contact Us')

<div>
    <!-- heading banner section -->
    <section class="heading-banner-section cms-heading">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- column -->
                <div class="col-12">
                    <!-- heading banner wrap-->
                    <div class="heading-banner-wrap">
                        <!-- breadcrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a wire:navigate href="{{ route('frontend.home') }}">{{ __trans('Home') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __trans('Contact us') }}</li>
                            </ol>
                        </nav>
                        <!-- page title -->
                        <h1>{{ __trans('Contact us') }}</h1>

                        <!-- heading banner img -->
                        <div class="heading-banner-img">
                            <!-- <img src="assets/images/heading-banner-img.png" alt="heading banner img"> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!--/ End Hero slider section -->

    <!-- Contact us page section -->
    <section class="contact-us-page-section section-two">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- column -->
                <div class="col-12">
                    <!-- module header -->
                    <div class="module-header">
                        <div class="module-header-left">
                            <h2 class="entry-title">{{ __trans('Contact Information') }}</h2>
                            <p>{{ __trans('Fill the form below or write us .We will help you as soon as possible.') }}</p>
                        </div>
                    </div>

                    <!-- row -->
                    <div class="row">
                        <!-- column -->
                        <div class="col-12 col-lg-6">
                            <!-- Contact Information -->
                            <div class="contact-information">
                                <div class="contact-information-box">
                                    <div class="icon"><img src="{{ asset('assets/frontend/img/static/media/themes/advance-ws/contact-phone-icon.svg') }}" alt="phone icon"></div>
                                    <div class="information">
                                        <h4>{{ __trans('Phone number') }}</h4>
                                        <p><a href="tel:{{ __setting('phone_number') }}">{{ __setting('phone_number') }}</a><br>
                                        </p>
                                    </div>
                                </div>
                                <div class="contact-information-box">
                                    <div class="icon"><img src="{{ asset('assets/frontend/img/static/media/themes/advance-ws/contact-email-icon.svg') }}" alt="email icon"></div>
                                    <div class="information">
                                        <h4>{{ __trans('Email address') }}</h4>
                                        <p><a href="mailto:clare@gmail.com">{{ __setting('email') }}</a><br>
                                        </p>
                                    </div>
                                </div>
                                <div class="information-full-box">
                                    <div class="contact-information-box">
                                        <div class="icon"><img src="{{ asset('assets/frontend/img/static/media/themes/advance-ws/contact-address-icon.svg') }}" alt="address icon"></div>
                                        <div class="information">
                                            <h4>{{ __trans('Location') }}</h4>
                                            <p>{{ __setting('address') }}</p>
                                        </div>
                                    </div>

                                    <!-- Contact map -->
                                    <!-- <div class="contact-map">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9802.359525824946!2d0.9656365325643845!3d52.105395131109226!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d9a3de6cffe70d%3A0x9ffa9aa04db84ce4!2sTDP%20Agency!5e0!3m2!1sen!2sin!4v1679333366309!5m2!1sen!2sin" height="320" style="border:0; width: 100%;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </div> -->

                                </div>
                            </div>
                        </div>
                        <!-- column -->
                        <div class="col-12 col-lg-6">
                            <!-- Contact form -->
                            <div class="contact-form">
                                <form class="all-form" wire:submit.prevent="submitForm">
                                    <div class="form-group">
                                        <label for="name">{{ __trans('Name') }}</label>
                                        <input type="text" class="form-control" wire:model="name" id="name" name="name">
                                        @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email">{{ __trans('Email') }}*</label>
                                        <input class="form-control" wire:model="email" id="email" name="email" type="email">
                                        @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="subject">{{ __trans('Subject') }}*</label>
                                        <input type="text" class="form-control" wire:model="subject" id="subject" name="subject">
                                        @error('subject') <span class="text-red-500">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="description">{{ __trans('Description') }}</label>
                                        <textarea class="form-control" wire:model="description" id="description" name="description"></textarea>
                                        @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
                                    </div>
                                    <button type="submit" class="btn btn-dark btn-style-2">
                                        <span wire:loading.remove >
                                            {{ __trans('Send Message') }}
                                        </span>
                                        <span wire:loading>
                                            {{ __trans('Sending...') }}
                                        </span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Contact us page section -->
</div>
