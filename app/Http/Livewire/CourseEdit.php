<?php

namespace App\Http\Livewire;

use DateTime;
use DatePeriod;
use DateInterval;
use App\Models\User;
use App\Models\Course;
use Livewire\Component;
use App\Models\Curriculum;
use Illuminate\Support\Carbon;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

class CourseEdit extends Component
{
    public $days = [
        'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'
    ];
    public $course_id;
    public $name;
    public $image;
    public $price;
    public $description;
    public $selectedDays = [];
    public $selectedTeachers = [];
    public $end_date;
    public $time;

    public function mount(){
        $course = Course::findOrFail($this->course_id);
        $this->name = $course->name;
        $this->image = $course->image;
        $this->price =  $course->price;
        $this->description = $course->description;
        $this->end_date = $course->end_date;
        foreach($course->curriculums as $curriculum){
            $this->time = $curriculum->class_time;
            $this->selectedDays = $curriculum->class_day;
        }

        $this->selectedTeachers = $course->teachers()->pluck('users.id')->toArray();
        $this->selectedDays = $course->curriculums()->pluck('curriculums.class_day')->toArray();
        $this->selectedTime = $course->curriculums()->pluck('curriculums.class_time')->toArray();
    }


    public function render()
    {
        $course = Course::with('curriculums')->findOrFail($this->course_id);
        $teachers = User::Role('Teacher')->get();
        return view('livewire.course-edit',[
            'teachers' => $teachers,
            'course' => $course
        ]);
    }

    protected $rules = [
        'name' => 'required',
        // 'slug' => 'required',
        'description' => 'required',
        'price' => 'required',
        'end_date' => 'required',
    ];

    public function formSubmit() {

        $course = Course::with('curriculums')->findOrFail($this->course_id);
        $course_id = $course->id;

        foreach ($course->curriculums as $curriculum) {
            $course->curriculums()->delete($course->id);
        }

        $slug = strtolower(preg_replace('/\s+/u', '-', trim($this->name)));

        $this->validate();

        // $course->name = $this->name;
        // $course->slug = $slug;
        // $course->description = $this->description;
        // $course->price = $this->price;
        // $course->end_date = $this->end_date;
        // $course->user_id = Auth::user()->id;

        // $course->save();
        
        $course->update([
            'name' => $this->name,
            'slug' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'user_id' => auth()->user()->id
        ]);
        $i = 1;
        $course_name = $course->name;
        $start_date = new DateTime(Carbon::now());
        $end_date =   new DateTime($this->end_date);
        $interval =  new DateInterval('P1D');
        $date_range = new DatePeriod($start_date, $interval, $end_date);
        foreach($this->selectedDays as $day) {
            foreach ($date_range as $date) {
                if($date->format("l") === $day){
                    Curriculum::create([
                        'name' => $course_name . ' #' . $i++,
                        'class_day' => $day,
                        'class_time' => $this->time,
                        'class_date' => $date,
                        'course_id' => $course_id,
                    ]);
                    // foreach($course->curriculums as $curriculum){
                    // $curriculum->name = $course_name;
                    // $curriculum->course_id = $course_id;
                    // $curriculum->class_date = $date->format('Y-m-d');
                    // $curriculum->class_time =  $this->time;
                    // $curriculum->class_day = $day;
                    // $curriculum->save();
                    // }
                }
            }
        }

        $course->teachers()->sync($this->selectedTeachers);

        flash()->addSuccess('Course with Curriculam Updated successfully');

        return redirect()->route('courses.index');
    }
}
