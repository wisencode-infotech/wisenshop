@section('title', __trans('Notifications'))

<div>
    <!-- heading banner section -->
    <section class="heading-banner-section">
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
                                <li class="breadcrumb-item active" aria-current="page">{{ __trans('Notifications') }}</li>
                            </ol>
                        </nav>
                        <!-- page title -->
                        <h1>{{ __trans('Notifications') }}</h1>

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

    <!-- Account dashboard page section -->
    <section class="account-dashboard-page section-two">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- column -->
                <div class="col-12 col-md-4 col-lg-3">
                    <!-- My Account left menu -->
                    @livewire('user-sidebar')
                </div>
                <!-- column -->
                <div class="col-12 col-md-8 col-lg-9">
                    <!-- My Account right wrap -->
                    <div class="account-right-wrap">
                        <!-- Account order -->
                        <div class="account-order">
                            <div class="order-table table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th scope="col">{{ __trans('Title') }}</th>
                                            <th scope="col">{{ __trans('Notification') }}</th>
                                            <th scope="col">{{ __trans('Time') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($notifications as $notification)
                                        <tr>
                                            <td>
                                                @if($notification->type == 'order')
                                                    <i class="fa fa-box text-accent"></i>
                                                @else
                                                    <i class="fa fa-info-circle text-accent"></i>
                                                @endif
                                            </td>
                                            <td>{{ $notification->title }}</td>
                                            <td>{{ $notification->message }}</td>
                                            <td>{{ $notification->created_at->diffForHumans() }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                @if($notifications->hasMorePages())
                                <div class="mt-8 text-center">
                                    <button wire:click="loadMore" data-variant="normal" class="btn btn-dark">
                                        <!-- Show "Load More" when not loading -->
                                        <span wire:loading.remove>{{ __trans('Load More') }}</span>
                                        <!-- Show "Load More..." while loading -->
                                        <span wire:loading wire:target="loadMore">{{ __trans('Loading...') }}</span>
                                    </button>
                                </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Account dashboard page section -->
</div>
