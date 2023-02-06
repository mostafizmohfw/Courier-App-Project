<?php

namespace App\Http\Livewire;

use DateTime;
use DatePeriod;
use DateInterval;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Course;
use Livewire\Component;
use App\Models\Curriculum;
use Illuminate\Support\Facades\Auth;

class CourseCreate extends Component
{
    public $name;
    public $description;
    public $price;
    public $selectedDays = [];
    public $time;
    public $end_date;
    public $class_date;
    public $selectedTeachers = [];
    // public $image = 'https://laravel.com/img/logomark.min.svg';

    public $days = [
        'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'
    ];

    protected $rules = [
        'name' => 'required|unique:courses,name',
        // 'slug' => 'required',
        'description' => 'required',
        'price' => 'required',
        'end_date' => 'required',
    ];

    public function render()
    {
        $teachers = User::Role('Teacher')->get();
        return view('livewire.course-create',[
            'teachers' => $teachers
        ]);
    }

    public function formSubmit() {
        $slug = strtolower(preg_replace('/\s+/u', '-', trim($this->name)));
        $this->validate();
        $course = Course::create([
            'name' => $this->name,
            'slug' => $slug,
            'description' => $this->description,
            'price' => $this->price,
            'end_date' => $this->end_date,
            'user_id' => Auth::user()->id
        ]);

        $course_id = $course->id;
        $numberOfClass = 0;
        $start_date = new DateTime(Carbon::now());
        $end_date =   new DateTime($this->end_date);
        $interval =  new DateInterval('P1D');
        $date_range = new DatePeriod($start_date, $interval, $end_date);
        foreach($this->selectedDays as $day) {
            foreach ($date_range as $date) {
                if($date->format("l") === $day){
                    $curriculum = Curriculum::create([
                        $numberOfClass++,
                        'name' => $this->name.' '.$numberOfClass,
                        'course_id' => $course_id,
                        'image'=>'https://i.ytimg.com/vi/ImtZ5yENzgE/maxresdefault.jpg',
                        'class_date' => $date->format('Y-m-d'),
                        'class_time' => $this->time,
                        'class_day' => $day,
                    ]);
                }
            }
        }

        $course->teachers()->attach($this->selectedTeachers);

        flash()->addSuccess('Course with Curriculam created successfully');

        return redirect()->route('courses.index');
    }

}
