<div>
    <form wire:submit.prevent="$dispatch('applyFilters')">
        <div class="form-group mt-2">
            <input type="search" name="search" 
                placeholder="{{ __trans('Search your products from here') }}" 
                wire:model.live.debounce.250ms="search">
        </div>
    </form>
    <button class="close-search" wire:click="clearSearch"><span class="fa fa-close" style="font-size:32px"></span></button>
</div>