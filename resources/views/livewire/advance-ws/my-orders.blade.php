@section('title', __trans('Orders'))

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
                                <li class="breadcrumb-item"><a wire:navigate href="{{ route('frontend.home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">My Orders</li>
                            </ol>
                        </nav>
                        <!-- page title -->
                        <h1>My Orders</h1>

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
                                            <th scope="col">Order</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Total</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                        <tr>
                                            <td>
                                                <p><a wire:navigate href="{{ route('frontend.orders.details', $order->id) }}">#{{ $order->order_number ?? $order->id }}</a></p>
                                            </td>
                                            <td>{{ $order->created_at->format('M d, Y h:i A') }}</td>
                                            <td>{{ $order->payment->details->name }}</td>
                                            <td>{{ $order->currency->symbol . ' ' . number_format($order->total_price, 2) }}</td>
                                            <td><a wire:navigate href="{{ route('frontend.orders.details', $order->id) }}" class="btn btn-dark view-btn">View</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @if ($orders->hasMorePages())
                                <div class="mt-8 text-center">
                                    <button wire:click="loadMore" data-variant="normal" class="btn btn-dark">
                                        <!-- Show "Load More" when not loading -->
                                        <span wire:loading.remove wire:target="loadMore">{{ __trans('Load More') }}</span>
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