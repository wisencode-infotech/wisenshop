<div x-data="{ quantity: @entangle('quantity'), stockAvailable: @entangle('stock_available'), debounceTimeout: null }"> 

<template x-if="stockAvailable">
        <div>
            <template x-if="'{{ $layout }}' === 'product-details'">
                <div>
                    <div class="variation-add-to-cart justify-content-center">
                        <!-- Quantity -->
                        <div class="variation-quantity">
                            <!-- Quantity -->
                            <div class="quantity" >
                                <div class="quantity-button minus" @click.prevent="
                                if (quantity > 0) {
                                    quantity--; 
                                    clearTimeout(debounceTimeout); // Clear previous timeout
                                    debounceTimeout = setTimeout(() => {
                                        $wire.decrement();
                                    }, 300); // Adjust debounce time as needed
                                }
                            ">-</div>
                                <span class="input-text input-qty text my-auto h-auto" x-text="quantity"></span>
                                <div class="quantity-button plus" @click.prevent="
                                quantity++; 
                                clearTimeout(debounceTimeout); // Clear previous timeout
                                debounceTimeout = setTimeout(() => {
                                    $wire.call('increment', quantity);
                                }, 300); // Adjust debounce time as needed
                            ">+</div>
                            </div>
                        </div>
                        <div class="single-add-to-cart">
                            <a wire:navigate href="{{ route('frontend.guest.checkout') }}" class="btn btn-theme">{{ __trans('Buy Now') }}</a>
                        </div>
                    </div>
                </div>
            </template>

            <template x-if="'{{ $layout }}' === 'mini-cart-drawer'">
                <div>
                    <div class="quantity" >
                        <div class="quantity-button minus" @click.prevent="
                        if (quantity > 0) {
                            quantity--; 
                            clearTimeout(debounceTimeout); // Clear previous timeout
                            debounceTimeout = setTimeout(() => {
                                $wire.decrement();
                            }, 300); // Adjust debounce time as needed
                        }
                    ">-</div>
                        <span class="input-text input-qty text my-auto h-auto" x-text="quantity"></span>
                        <div class="quantity-button plus" @click.prevent="
                        quantity++; 
                        clearTimeout(debounceTimeout); // Clear previous timeout
                        debounceTimeout = setTimeout(() => {
                            $wire.call('increment', quantity);
                        }, 300); // Adjust debounce time as needed
                    ">+</div>
                    </div>
                </div>
            </template>

            <template x-if="'{{ $layout }}' === 'cart'">
                <div 
                    class="flex overflow-hidden flex-col-reverse items-center w-8 h-24 bg-accent text-heading rounded-full text-accent-contrast">
                   
                    <!-- Decrement button -->
                    <button @click.prevent="
                                if (quantity > 0) {
                                    quantity--; 
                                    clearTimeout(debounceTimeout); // Clear previous timeout
                                    debounceTimeout = setTimeout(() => {
                                        $wire.decrement();
                                    }, 300); // Adjust debounce time as needed
                                }
                            " 
                            class="cursor-pointer p-2 transition-colors duration-200 hover:bg-accent-hover focus:outline-0 px-5">
                        <i class="fa fa-minus"></i>
                    </button>

                    <div class="flex flex-1 items-center justify-center px-3 text-sm font-semibold !px-0">
                        <span x-text="quantity"></span>
                    </div>

                    <!-- Increment button -->
                    <button @click.prevent="
                                quantity++; 
                                clearTimeout(debounceTimeout); // Clear previous timeout
                                debounceTimeout = setTimeout(() => {
                                    $wire.call('increment', quantity);
                                }, 300); // Adjust debounce time as needed
                            " 
                            class="cursor-pointer p-2 transition-colors duration-200 hover:bg-accent-hover focus:outline-0 px-5">
                        <i class="fa fa-plus"></i>
                    </button>

                </div>

            </template>

            <template x-if="'{{ $layout }}' === 'large'">
           
                <div class="mb-3 w-full lg:mb-0 lg:max-w-[400px]">
                    <div 
                        class="overflow-hidden w-full h-14 rounded text-light bg-accent inline-flex justify-between text-accent-contrast">

                        <!-- Decrement button -->
                        <button @click.prevent="
                                    if (quantity > 0) {
                                        quantity--; 
                                        clearTimeout(debounceTimeout); // Clear previous timeout
                                        debounceTimeout = setTimeout(() => {
                                            $wire.decrement();
                                        }, 300); // Adjust debounce time as needed
                                    }
                                " 
                                class="cursor-pointer p-2 transition-colors duration-200 hover:bg-accent-hover focus:outline-0 px-5">
                            <i class="fa fa-minus"></i> 
                        </button>

                        <div class="flex flex-1 items-center justify-center px-3 text-sm font-semibold">
                            <span x-text="quantity"></span>
                        </div>

                        <!-- Increment button -->
                        <button @click.prevent="
                                    quantity++; 
                                    clearTimeout(debounceTimeout); // Clear previous timeout
                                    debounceTimeout = setTimeout(() => {
                                        $wire.call('increment', quantity);
                                    }, 300); // Adjust debounce time as needed
                                " 
                                class="cursor-pointer p-2 transition-colors duration-200 hover:bg-accent-hover focus:outline-0 px-5">
                            <i class="fa fa-plus"></i>
                        </button>

                    </div>

                </div>
            </template>

            <template x-if="'{{ $layout }}' !== 'cart' && '{{ $layout }}' !== 'large' && '{{ $layout }}' !== 'product-details' && '{{ $layout }}' !== 'mini-cart-drawer'">
            <div class="default-cart-dropdown">
                    <div class="quantity" >
                        <div class="quantity-button minus" @click.prevent="
                        if (quantity > 0) {
                            quantity--; 
                            clearTimeout(debounceTimeout); // Clear previous timeout
                            debounceTimeout = setTimeout(() => {
                                $wire.decrement();
                            }, 300); // Adjust debounce time as needed
                        }
                    ">-</div>
                        <span class="input-text input-qty text my-auto h-auto" x-text="quantity"></span>
                        <div class="quantity-button plus" @click.prevent="
                        quantity++; 
                        clearTimeout(debounceTimeout); // Clear previous timeout
                        debounceTimeout = setTimeout(() => {
                            $wire.call('increment', quantity);
                        }, 300); // Adjust debounce time as needed
                    ">+</div>
                    </div>
                </div>
            </template>
        </div>
    </template>

    <template x-if="!stockAvailable">
        <div>
            <template x-if="'{{ $layout }}' === 'large'">
                <span class="left-2 bg-red-600 text-white text-sm font-bold px-2 py-1 rounded">
                    {{ __trans('Out of Stock') }}
                </span>
            </template>

            <template x-if="'{{ $layout }}' === 'slim'">
                <span class="absolute w-full d-flex align-items-center justify-content-center text-center text-accent-contrast text-xs font-semibold bg-red-600 product-list-out-of-stock-span">
                    {{ __trans('Out of Stock') }}
                </span>
            </template>

            <!-- <template x-if="'{{ $layout }}' !== 'cart'">
                <span class="absolute w-full d-flex align-items-center justify-content-center text-center text-accent-contrast text-xs font-semibold bg-red-600 product-list-out-of-stock-span">
                    {{ __trans('Out of Stock') }}
                </span>
            </template> -->
        </div>
    </template>
</div>
