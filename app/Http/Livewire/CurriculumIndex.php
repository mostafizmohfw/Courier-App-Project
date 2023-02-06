<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;
use App\Models\Curriculum;

class CurriculumIndex extends Component
{
    public function render()
    {
        $curriculum = Curriculum::with('course')->get();
        return view('livewire.curriculum-index',[
            'curriculum' => $curriculum,
        ]);
    }
    public function courseDelete($id) {
        $curriculum = Curriculum::findOrFail($id);
        $curriculum->delete();
        flash()->addSuccess('Curriculum deleted successfully');
        return redirect()->route('courses.index');
    }
}
