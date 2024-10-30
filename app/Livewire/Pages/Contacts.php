<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use App\Models\Contact;

class Contacts extends Component
{
    public $name;
    public $email;
    public $message;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'message' => 'required|string',
    ];

    public function submit()
    {
        $this->validate();

        Contact::create([
            'name' => $this->name,
            'email' => $this->email,
            'message' => $this->message,
        ]);

        session()->flash('success', 'Thank you for contacting us!');

        $this->reset(['name', 'email', 'message']);
    }

    public function render()
    {
        return view('livewire.pages.contacts');
    }
}
