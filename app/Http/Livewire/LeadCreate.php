<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LeadCreate extends Component
{
    public $name;
    public $email;
    public $phone;
    public $note;
    
    public function render()
    {
        return view('livewire.lead-create');
    }
}
