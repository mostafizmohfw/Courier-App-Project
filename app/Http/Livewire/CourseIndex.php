<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;

class CourseIndex extends Component
{
    public function render()
    {
        $courses = Course::with('user')->paginate(10);
        // dd($courses);
        return view('livewire.course-index', [
            'courses' => $courses
        ]);

    }
    public function courseDelete($id) {

        permission_check('lead-management');
        $course = Course::findOrFail($id);
        $course->delete();
        flash()->addSuccess('Course deleted successfully');
    }
}
