<?php

namespace App\Livewire;

use App\Mail\InquiryMail;
use App\Models\Inquiry;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;


class ContactPage extends Component
{
    public $name;
    public $email;
    public $subject;
    public $description;
    public $isChecked = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'subject' => 'required|string|max:255',
        'description' => 'required|string|max:1000',
    ];

    public function submitForm()
    {
        $this->validate();

        // Store the form data as JSON in the inquiry_table
        $inquiry = Inquiry::create([
            'data' => json_encode([
                'name' => $this->name,
                'email' => $this->email,
                'subject' => $this->subject,
                'description' => $this->description,
            ])
        ]);

        $receiverEmails = explode(',', __setting('receiver_emails'));

        foreach ($receiverEmails as $email) {
            Mail::to(trim($email))->queue(new InquiryMail($inquiry->data));
        }
        
        $this->reset();

        $this->dispatch('notify', 'success', __trans('Your message has been sent successfully.'));
    }

    public function render()
    {
        return view('livewire.contact-page');
    }
}
