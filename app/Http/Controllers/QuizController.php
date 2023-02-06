<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index() {
        return view('quiz.index');
    }

    public function create() {
        return view('quiz.create');
    }

    public function edit($id) {
        $quiz = Quiz::findOrFail($id);
        return view('quiz.edit',[
            'quiz' => $quiz
        ]);
    }

    public function show($id) {
        $quiz = Quiz::findOrFail($id);
        // dd($quiz);
        return view('quiz.show',[
            'quiz' => $quiz
        ]);
    }

    public function quizShow($id) {
        $quiz = Quiz::findOrFail($id);
        return view('quiz.quiz-show', [
            'quiz' => $quiz,
        ]);
    }
}
