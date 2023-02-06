<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;
use App\Models\Curriculum;

class CourseShow extends Component
{
    public $course_id;

    public function render()
    {
        $course = Course::where('id', $this->course_id)->with('curriculums', 'teachers')->firstOrFail();
        // $allClass = Curriculum::where('course_id',$course->id)->orderBy('class_date')->get();
        // dd($course);
        return view('livewire.course-show',[
            'course' => $course,
            // 'allClass' => $allClass
        ]);
    }

        public function curriculumDelete($id) {

        permission_check('lead-management');
        $curriculum = Curriculum::findOrFail($id);
        $curriculum->delete();
        flash()->addSuccess('Curriculum deleted successfully');
    }
}
