<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;
use App\Models\Attendance;
use App\Models\Curriculum;

class CurriculumShow extends Component
{
    public $curriculum_id;
    public $course_id;

    public function render()
    {
        $curriculum = Curriculum::where('id', $this->curriculum_id)->firstOrFail();
        return view('livewire.curriculum-show',[
            'curriculum' => $curriculum,
        ]);
    }

    public function curriculumDelete($id) {

        $curriculum = Curriculum::findOrFail($id);
        $curriculum->delete();
        flash()->addSuccess('Curriculum deleted successfully');
        return redirect()->route('courses.index');
    }

    public function attendance($student_id) {
        Attendance::create([
            'curriculum_id' => $this->curriculum_id,
            'user_id' => $student_id
        ]);

        flash()->addSuccess('Attendance added successfully!');
    }
}
