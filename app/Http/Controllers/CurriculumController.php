<?php

namespace App\Http\Controllers;

use App\Models\Curriculum;
use Illuminate\Http\Request;

class CurriculumController extends Controller
{
    public function index() {
        return view('curriculum.index');
    }

    public function create() {
        //
    }

    public function show($id) {
        return view('curriculum.show', [
            'curriculum_id' => $id
        ]);
    }

    public function edit($id) {
        return view('curriculum.edit', [
            'curriculum_id' => $id
        ]);
    }

    public function delete($id) {
        //
    }
}
