<?php

namespace App\Http\Livewire;

use App\Models\Quiz;
use Livewire\Component;

class QuizIndex extends Component
{
    public function render()
    {
        $quizs = Quiz::latest()->paginate(15);
        return view('livewire.quiz-index',[
             'quizs' => $quizs,
        ]);
    }

    public function quizDelete($id) {
        $quiz= Quiz::findOrFail($id);
        $quiz->delete();
        flash()->addSuccess('Quiz deleted successfully');
    }
}
