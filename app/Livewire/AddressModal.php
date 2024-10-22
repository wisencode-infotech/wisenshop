<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ShippingAddress;
use App\Models\BillingAddress;

class AddressModal extends Component
{
    public $id;
    public $is_modal_open = false;
    public $address_type = 'billing'; // Default type
    public $address, $city, $state, $postal_code, $country;

    protected $listeners = ['open-modal' => 'openModal', 'deleteShippingAddress', 'deleteBillingAddress', 'editBillingAddress', 'editShippingAddress'];

    protected $rules = [
        'address' => 'required|string',
        'city' => 'required|string',
        'state' => 'required|string',
        'postal_code' => 'required|string',
        'country' => 'required|string',
    ];

    public function openModal($type = null)
    {
        $this->resetFields(); // Reset form fields
        $this->is_modal_open = true;
        $this->address_type = $type ?? 'billing';
    }

    public function closeModal()
    {
        $this->is_modal_open = false;
    }

    public function resetFields()
    {
        $this->id = '';
        $this->address = '';
        $this->city = '';
        $this->state = '';
        $this->postal_code = '';
        $this->country = '';
    }

    public function saveAddress()
    {

        $this->validate(); // Validate the form data

        $data = [
            'user_id' => auth()->id(),
            'address' => $this->address,
            'city' => $this->city,
            'state' => $this->state,
            'postal_code' => $this->postal_code,
            'country' => $this->country,
        ];

        if ($this->id) {
            
            if ($this->address_type === 'shipping') {
                $shippingAddress = ShippingAddress::find($this->id);
                $shippingAddress->update($data);
            } else {
                $billingAddress = BillingAddress::find($this->id);
                $billingAddress->update($data);
            }
            
        } else {
            
            if ($this->address_type === 'shipping') {
                ShippingAddress::create($data);
            } else {
                BillingAddress::create($data);
            }
        }

        $this->dispatch('addressSaved');

        $this->closeModal(); // Close the modal after saving

        $this->dispatch('notify', 'success', __trans('Address saved successfully!'));
    }

    

    public function editBillingAddress($address_id){
        
        $billing_address = BillingAddress::find($address_id);

        $this->is_modal_open = true;
        $this->address_type = 'billing';
        $this->address = $billing_address->address;
        $this->country = $billing_address->country;
        $this->state = $billing_address->state;
        $this->city = $billing_address->city;
        $this->postal_code = $billing_address->postal_code;
        $this->id = $address_id;
    }

    public function deleteBillingAddress($address_id){

        BillingAddress::find($address_id)->delete();

        $this->dispatch('addressSaved');
        
        $this->dispatch('notify', 'error', __trans('Billing Address deleted successfully!'));
    }

    public function editShippingAddress($address_id){
        
        $billing_address = ShippingAddress::find($address_id);

        $this->is_modal_open = true;
        $this->address_type = 'shipping';
        $this->address = $billing_address->address;
        $this->country = $billing_address->country;
        $this->state = $billing_address->state;
        $this->city = $billing_address->city;
        $this->postal_code = $billing_address->postal_code;
        $this->id = $address_id;
    }

    public function deleteShippingAddress($address_id){
        
        ShippingAddress::find($address_id)->delete();

        $this->dispatch('addressSaved');

        $this->dispatch('notify', 'error', __trans('Shipping Address deleted successfully!'));
    }

    

    public function render()
    {
        return view('livewire.address-modal');
    }
}
