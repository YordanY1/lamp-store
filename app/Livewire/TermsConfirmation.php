<?php

namespace App\Livewire;

use Livewire\Component;

class TermsConfirmation extends Component
{
    public $agreed;

    public function mount()
    {

        $this->agreed = session()->has('terms_agreed');
    }

    public function agree()
    {
        session(['terms_agreed' => true]);
        $this->agreed = true;
    }

    public function disagree()
    {
        session(['terms_agreed' => false]);
        $this->agreed = true;
    }

    public function render()
    {
        return view('livewire.terms-confirmation');
    }
}
