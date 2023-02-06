<?php

namespace App\Http\Livewire;

use App\Models\Quiz;
use Livewire\Component;
use App\Models\Question;

class QuizShow extends Component
{
    public $question_id;
    public $quiz;

    public function render()
    {
        $quiz = Quiz::findOrFail($this->quiz->id);
        $questions = Question::select(['id', 'name'])->whereNotIn('id', $this->quiz->questions->pluck('id')->toArray())->get();
        return view('livewire.quiz-show',[
            'quiz' => $quiz,
            'questions' => $questions,
        ]);
    }

    public function addQuestion() {
        $this->quiz->questions()->attach($this->question_id);
        $this->question_id = '';

        flash()->addSuccess('Question added successfully');

        return redirect(route('quiz.show', $this->quiz->id));
    }
}
