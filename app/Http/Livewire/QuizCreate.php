<?php

namespace App\Http\Livewire;

use App\Models\Quiz;
use Livewire\Component;

class QuizCreate extends Component
{
    public $name;

    public function render()
    {
        return view('livewire.quiz-create');
    }

    protected $rules = [
        'name' => 'required',
    ];

    public function formSubmit(){
        $this->validate();
        $quiz = Quiz::create([
            'name' => $this->name,
        ]);
        flash()->addSuccess('Quiz Created Successfull!');
        return redirect()->route('quiz.index');
    }
}
