<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Question;

class QuizShowAll extends Component
{
    public $quiz;
    public $answerOpitons = [
       'answer_a',
       'answer_b',
       'answer_c',
       'answer_d',
    ];
    public $answer;
    public $answer_id;
    public $count_correct_answer = 0;
    public $count_incorrect_answer = 0;
    public $correct_answers = [];
    public $percentageMark;

    public function render() {
        return view('livewire.quiz-show-all');
    }

    public function check() {
        $question_id = explode(',', $this->answer)[1];
        $question = Question::findOrFail($question_id);


        if ($question->correct_answer == explode(',', $this->answer)[0]) {
            flash()->addSuccess('Correct answer');
            $correct = true;
        } else {
            flash()->addError('Wrong answer');
            $correct = false;
        }

        $this->answered[$question->id] = $correct;
    }

    public function answerUpdate($id){
        $this->answer_id = $id;
    }

    public function result(){
        $question = Question::select('correct_answer')->findOrFail($this->answer_id);
        if($question->correct_answer === $this->answer[$this->answer_id]){
            flash()->addSuccess('Your answer is correct!');
            $this->correct_answers[$this->answer_id] = true;
            $this->count_correct_answer++;
        }else{
            flash()->addWarning('Your answer is wrong.');
            $this->correct_answers[$this->answer_id] = false;
            $this->count_incorrect_answer++;

        }
    }

    public function finalResult(){
        $quiz = Quiz::findOrFail($this->quiz->id);
        $total_question = count($quiz->questions);
        
    }
}
