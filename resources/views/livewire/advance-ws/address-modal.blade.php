<div x-data="{ isModalOpen: @entangle('is_modal_open') }" x-init="
      Livewire.on('openModal', () => isModalOpen = true);
      Livewire.on('closeModal', () => isModalOpen = false);
    ">

  <!-- Bootstrap Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
       x-bind:class="{ 'show': isModalOpen }" x-bind:style="{ display: isModalOpen ? 'block' : 'none' }">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{ __trans('Add New Address') }}</h5>
          <button type="button" class="btn-close" aria-label="{{ __trans('Close') }}" @click="isModalOpen = false; $wire.closeModal();"></button>
        </div>
        <div class="modal-body">
          <form wire:submit.prevent="saveAddress">
            <input type="hidden" wire:model="id">

            <!-- Address Type -->
            <div class="mb-3">
              <label class="form-label">{{ __trans('Type') }}</label>
              <div class="d-flex gap-3">
                <div class="form-check">
                  <input class="form-check-input" type="radio" id="billing" wire:model="address_type" value="billing">
                  <label class="form-check-label" for="billing">{{ __trans('Billing') }}</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" id="shipping" wire:model="address_type" value="shipping">
                  <label class="form-check-label" for="shipping">{{ __trans('Shipping') }}</label>
                </div>
              </div>
            </div>

            <!-- Country -->
            <div class="mb-3">
              <label for="country" class="form-label">{{ __trans('Country') }}</label>
              <input type="text" id="country" class="form-control" wire:model="country">
              @error('country') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <!-- City -->
            <div class="mb-3">
              <label for="city" class="form-label">{{ __trans('City') }}</label>
              <input type="text" id="city" class="form-control" wire:model="city">
              @error('city') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <!-- State -->
            <div class="mb-3">
              <label for="state" class="form-label">{{ __trans('State') }}</label>
              <input type="text" id="state" class="form-control" wire:model="state">
              @error('state') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <!-- Postal Code -->
            <div class="mb-3">
              <label for="postal_code" class="form-label">{{ __trans('Postal Code') }}</label>
              <input type="text" id="postal_code" class="form-control" wire:model="postal_code">
              @error('postal_code') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <!-- Street Address -->
            <div class="mb-3">
              <label for="address" class="form-label">{{ __trans('Street Address') }}</label>
              <textarea id="address" class="form-control" rows="4" wire:model="address"></textarea>
              @error('address') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <!-- Save Button -->
            <button type="submit" class="btn btn-theme w-100">
              <span wire:loading.remove>{{ __trans('Save') }}</span>
              <span wire:loading>{{ __trans('Loading...') }}</span>
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
