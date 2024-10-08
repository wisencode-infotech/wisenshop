@extends('backend.layouts.master')

@section('title') Orders @endsection

@section('content')

@component('backend.components.breadcrumb')
@slot('li_1') <a href="{{ route('backend.order.index') }}">Orders</a> @endslot
@slot('title') Details #{{ $order->id }} @endslot
@endcomponent

@php $currency = $order->currency; @endphp

<div class="row">
    <div class="col-lg-12">
     <div class="card">
        <div class="card-body">
            <div class="invoice-title">
                <div class="float-end">
                    <h4 class="float-end font-size-16">Order # {{ $order->id }}</h4>
                    <br>
                    <span class="badge rounded-pill badge-soft-{{ $status_color }} font-size-12">{{ $status }}</span>
                </div>
                
                <div class="auth-logo mb-4">
                    <img src="{{ url('assets/frontend/img/logo.png') }}" class="img-fluid img-thumbnail" alt="">
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-6">
                    @if(!empty($order->address->billing_address_id))
                    <address>
                        <strong>Billed To:</strong><br>
                        {{ $order->user->name }}<br>
                        {{ $order->address->billingAddress->address }}<br>
                        {{ $order->address->billingAddress->city }}<br>
                        {{ $order->address->billingAddress->state }},  {{ $order->address->billingAddress->postal_code }}<br>
                        {{ $order->address->billingAddress->country }}
                    </address>
                    @endif
                </div>
                <div class="col-sm-6 text-sm-end">
                    @if(!empty($order->address->shipping_address_id))
                    <address class="mt-2 mt-sm-0">
                        <strong>Shipped To:</strong><br>
                        {{ $order->address->shippingAddress->address }}<br>
                        {{ $order->address->shippingAddress->city }}<br>
                        {{ $order->address->shippingAddress->state }},  {{ $order->address->shippingAddress->postal_code }}<br>
                        {{ $order->address->shippingAddress->country }}
                    </address>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 mt-3">
                    @if(!empty($extraInformation['customer_contact_email']))
                    <p>{{ $extraInformation['customer_contact_email'] ?? 'N/A' }}</p>
                    @endif

                    @if(!empty($extraInformation['customer_contact_phone']))
                    <p>{{ $extraInformation['customer_contact_phone'] ?? 'N/A' }}</p>
                    @endif

                    @if(!empty($extraInformation['customer_additional_notes']))
                    <p>Notes: {{ $extraInformation['customer_additional_notes'] ?? 'N/A' }}</p>
                    @endif

                    @if(!empty($order->payment->details))
                    <address>
                        <strong>Payment Method</strong><br>
                        {{ $order->payment->details->name }}<br>
                        {{ $order->payment->details->description }}
                    </address>
                    @endif

                  
                    <address>
                        <strong>Currency</strong><br>
                        {{ $currency->code }}
                    </address>
                   

                </div>
                <div class="col-sm-6 mt-3 text-sm-end">
                    <address>
                        <strong>Order Date:</strong><br>
                        @php $formattedDate = date('F d, Y', strtotime($order->created_at)); @endphp
                        {{ $formattedDate }}<br><br>
                    </address>
                </div>
            </div>
            <div class="py-2 mt-3">
                <h3 class="font-size-15 fw-bold">Order summary</h3>
            </div>
            <div class="table-responsive">
                <table class="table table-nowrap">
                    <thead>
                        <tr>
                            <th style="width: 70px;">No.</th>
                            <th>Item</th>
                            <th class="text-end">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        @php $subtotal = 0; $total = 0; @endphp

                        @foreach($order->products as $index => $product)

                        @php
                            $price = $product->pivot->price;
                            $quantity = $product->pivot->quantity;
                        @endphp
                        
                        <tr>
                            <td>{{ ++$index }}</td>
                            <td>{{ $quantity .' X '. $product->name }}</td>
                            <td class="text-end">{{ $currency->symbol }}{{ $price * $quantity }}</td>
                        </tr>
                        @php $subtotal += $price * $quantity; @endphp
                        @php $total += $price * $quantity; @endphp
                        @endforeach
                        <tr>
                            <td colspan="2" class="text-end">Sub Total</td>
                            <td class="text-end">{{ $currency->symbol }}{{ number_format($subtotal, 2) }}</td>
                        </tr>
                        <!-- <tr>
                            <td colspan="2" class="border-0 text-end">
                                <strong>Shipping</strong></td>
                                <td class="border-0 text-end">$13.00</td>
                            </tr> -->
                            <tr>
                                <td colspan="2" class="border-0 text-end">
                                    <strong>Total</strong></td>
                                    <td class="border-0 text-end"><h4 class="m-0">{{ $currency->symbol }} {{ number_format($total, 2) }}</h4></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="d-print-none">
                        <div class="float-end">
                            <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light me-1"><i class="fa fa-print"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection
    @section('script')
    @endsection