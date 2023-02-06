<?php

namespace App\Http\Livewire;

use App\Models\Lead;
use Livewire\Component;

class LeadShow extends Component
{
    public $lead_id;
    public $name;
    public $email;
    public $phone;
    public $note;

    public function render()
    {
        $lead = Lead::findOrFail($this->lead_id);
        return view('livewire.lead-show', [
            'notes' => $lead->notes,
            'lead' => $lead
        ]);
    }
}
