<?php

namespace App\Http\Livewire;

use App\Models\Curriculum;
use Livewire\Component;

class CurriculumEdit extends Component
{
    public $curriculum_id;
    public $name;
    public $class_time;
    public $class_day;
    public $selectedDay;
    public $class_date;
    public $days = [
        'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'
    ];

    public function mount(){
        $curriculum = Curriculum::findOrFail($this->curriculum_id);
        $this->name = $curriculum->name;
        $this->class_time = $curriculum->class_time;
        $this->class_date = $curriculum->class_date;
        $this->class_day = $curriculum->class_day;
        $this->selectedDay = $curriculum->class_day;
        if (isset($days)) {
            $this->selectedDay = $curriculum->class_day;
        }

    }

    protected $rules = [
        'name' => 'required',
    ];

    public function render()
    {
        return view('livewire.curriculum-edit');
    }

    public function curriculumUpdate(){
        $this->validate();
        $curriculum = Curriculum::findOrFail($this->curriculum_id);

        $curriculum->name = $this->name;
        $curriculum->class_time = $this->class_time;
        $curriculum->class_day = $this->selectedDay;
        $curriculum->class_date = $this->class_date;
        $curriculum->save();

        flash()->addSuccess('Curriculum updated successfully');

        return redirect()->route('courses.index');

    }
}
