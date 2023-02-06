<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Question;

class QuestionShow extends Component
{
    public $question_id;

    public function render()
    {
        $question= Question::findOrFail($this->question_id);
        return view('livewire.question-show',[
            'question' => $question
        ]);
    }
}
