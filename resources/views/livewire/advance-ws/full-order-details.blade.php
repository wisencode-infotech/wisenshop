<div>
    <section class="account-dashboard-page section-two">
        <!-- container -->
        <div class="container">
            <div class="row">
                <!-- column -->
                <div class="col-12 col-md-12 col-lg-12">
                    <!-- My Account right wrap -->
                    <div class="account-right-wrap">
                        <!-- Account order detail -->
                        <div class="account-order-detail">
                            @if(!empty($order_data->transactions))
                                @foreach($order_data->transactions as $transaction)
                                    <p>
                                        {{ __trans('Txn.') }} : <span> #{{ $transaction->transaction_id }}</span>
                                    </p>
                                @endforeach
                            @endif

                            <h5 class="account-title">{{ __trans('Order Details') }}<span class="px-2">-</span> #{{ $order_data->order_number ?? $order_data->id }}</h5>

                            <div>
                                <div class="bg-light px-4 py-3">
                                    <div class="row">
                                        <!-- Order Status -->
                                        <div class="col-6">
                                            <span class="d-inline-block text-xs text-dark me-2">{{ __trans('Order Status') }}:</span>
                                            <div class="w-100 w-auto">
                                                <span class="badge bg-{{ config('general.order_statuses_color.' . $order_data->status) }} text-uppercase py-1 px-2">{{ config('general.order_statuses.' . $order_data->status) }}</span>
                                            </div>
                                        </div>
                                        <!-- Payment Method -->
                                        <div class="col-6">
                                            <div style="float: right;">
                                                <span class="d-inline-block text-xs text-dark me-2">{{ __trans('Payment Method') }}:</span>
                                                <div class="w-100 w-auto">
                                                    <span class="badge bg-success text-light text-uppercase py-1 px-2">{{ $order_data->payment->details->name }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="order-detail-table mt-2">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col" style="width: 70%;">{{ __trans('Product') }}</th>
                                            <th scope="col" style="width: 30%;">{{ __trans('Total') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($order_data->products as $index => $product)
                            
                                        @php
                                            $price = $product->pivot->price;
                                            $quantity = $product->pivot->quantity;
                                        @endphp
                                        <tr>
                                            <td>
                                                {{ $product->name }} x {{ $quantity }}<br>
                                                @if($can_write_review)
                                                    <button wire:click="$dispatch('openReviewModal', { product_id: {{ $product->id }} })" class="cursor-pointer btn btn-outline-theme" style="font-size:12px;padding:3px;">Write a review</button>
                                                @endif
                                            </td>
                                            <td>
                                                <strong>{{ $order_data->currency->symbol }}{{ $price * $quantity }}:</strong>
                                            </td>
                                        </tr>
                                    @endforeach    
                                        <tr>
                                            <td><strong>{{ __trans('Sub Total') }}:</strong></td>
                                            <td><strong>{{ $order_data->currency->symbol . ' ' . number_format($order_data->total_price, 2) }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td><strong>{{ __trans('Discount') }}:</strong></td>
                                            <td>{{ $order_data->currency->symbol }}0.00</td>
                                        </tr>
                                        <tr>
                                            <td><strong>{{ __trans('Delivery Fee') }}:</strong></td>
                                            <td>{{ __trans('Free')  }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>{{ __trans('Tax') }}:</strong></td>
                                            <td>{{ $order_data->currency->symbol }}0.00</td>
                                        </tr>
                                        <tr>
                                            <td><strong>{{ __trans('Total') }}:</strong></td>
                                            <td><strong>{{ $order_data->currency->symbol . ' ' . number_format($order_data->total_price, 2) }}</strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            
                            @php 
                                $currency = $order_data->currency; 
                                $extra_information = json_decode($order_data->extra_information, true);
                            @endphp

                            <div class="order_process_section">
                                <livewire:order-progress :currentStatus="$order_data->status" />
                            </div>

                            @if (!empty($order_billing_address = $order_data->address->billingAddress) || !empty($order_shipping_address = $order_data->address->shippingAddress))
                            <!-- row -->
                            <div class="row mt-4">
                                @if (!empty($order_billing_address))
                                    <!-- column -->
                                    <div class="col-12 col-md-6 pe-md-5 pt-2">
                                        <h5 class="account-title">
                                        {{ __trans('Billing Address') }}
                                        </h5>
                                        <div class="address-column">

                                            <p>
                                                {{ $order_billing_address->address }},<br>
                                                {{ $order_billing_address->city }}<br>
                                                {{ $order_billing_address->state }},  {{ $order_billing_address->postal_code }}<br>
                                                {{ $order_billing_address->country }}</p>


                                                @if(!empty($extra_information['customer_contact_phone']))
                                                <p><i class="fa-solid fa-phone"></i>{{ $extra_information['customer_contact_phone'] ?? 'N/A' }}</p>
                                                @endif

                                                @if(!empty($extra_information['customer_contact_email']))
                                                <p>{{ $extra_information['customer_contact_email'] ?? 'N/A' }}</p>
                                                @endif

                                                @if(!empty($extra_information['customer_additional_notes']))
                                                <p>Notes: {{ $extra_information['customer_additional_notes'] ?? 'N/A' }}</p>
                                                @endif
                                                
                                        </div>
                                    </div>
                                @endif

                                @if (!empty($order_shipping_address))
                                    <!-- column -->
                                    <div class="col-12 col-md-6 pe-md-5 pt-2">
                                        <div class="order_shipping_address">
                                            <h5 class="account-title">
                                            {{ __trans('Shipping Address') }}
                                            </h5>
                                            <div class="address-column">
                                                <p>{{ $order_shipping_address->address }}<br>
                                                    {{ $order_shipping_address->city }}<br>
                                                    {{ $order_shipping_address->state }},  {{ $order_shipping_address->postal_code }}<br>
                                                    {{ $order_shipping_address->country }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- column -->
                                @endif
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>