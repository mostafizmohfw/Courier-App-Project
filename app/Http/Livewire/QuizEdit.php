<?php

namespace App\Http\Livewire;

use App\Models\Quiz;
use Livewire\Component;
use App\Models\Question;

class QuizEdit extends Component
{
    public $quiz;
    public $question_id;
    public $name;


    public function mount() {
        $quizmount = Quiz::findOrFail($this->quiz->id);
        $this->name = $quizmount->name;
    }

    protected $rules = [
        'name' => 'required',
    ];   

    public function render()
    {
        //dd($this->quiz->questions->pluck('id')->toArray());
        $questions = Question::select(['id', 'name'])->whereNotIn('id', $this->quiz->questions->pluck('id')->toArray())->get();
        return view('livewire.quiz-edit', [
            'questions' => $questions
        ]);
    }

    public function addQuestion() {
        $this->quiz->questions()->attach($this->question_id);
        $this->question_id = '';

        flash()->addSuccess('Question added successfully');

        return redirect(route('quiz.show', $this->quiz->id));
    }

    public function editQuiz(){
            $this->validate();
            $quiz = Quiz::findOrFail($this->quiz->id);

            $quiz->name = $this->name;
            $quiz->save();

            flash()->addSuccess('Quiz edit successfully');
    }

    public function removeQuiz($id){
        $quiz = Quiz::findOrFail($this->quiz->id);
        $quiz->questions()->detach($id);

        flash()->addSuccess('Quiz removed successfully');

        return redirect()->route('quiz.edit',$this->quiz->id);
    }
}
