<?php

namespace App\Http\Livewire;

use App\Models\Lead;
use App\Models\User;
use App\Models\Course;
use App\Models\Invoice;
use App\Models\Payment;
use Livewire\Component;
use App\Models\InvoiceItem;
use Illuminate\Support\Str;

class Admission extends Component
{
    public $search;
    public $leads = [];
    public $lead_id;
    public $course_id;
    public $selectedCourse;
    public $payment;
    public $name;
    public $email;
    public $password;
    public $notFound = false;
    public $user_id;

    public function render() {
        $courses = Course::all();
        return view('livewire.admission',[
            'courses' => $courses
        ]);
    }

    public function search() {
        $this->notFound = true;
        $this->course_id = null;
        $this->lead_id = null;
        $this->selectedCourse = null;
        $this->leads = Lead::where('name', 'like', '%'.$this->search.'%')
        ->orWhere('email', 'like', '%'.$this->search.'%')
        ->orWhere('phone', 'like', '%'.$this->search.'%')
        ->get();
    }

    public function courseSelected() {
        $this->selectedCourse = Course::findorfail($this->course_id);
    }


    public function admit() {
        $lead = Lead::findOrFail($this->lead_id);
        $user = User::create([
            'name' => $lead->name,
            'email' => $lead->email,
            'password' => Str::random(8),
        ]);

        $lead->delete();

        $invoice = Invoice::create([
            'due_date' => now()->addDays(7),
            'user_id' => $user->id,
        ]);

        InvoiceItem::create([
            'name' => 'Course: ' . $this->selectedCourse->name,
            'price' => $this->selectedCourse->price,
            'quantity' => 1,
            'invoice_id' => $invoice->id,
        ]);

        $this->selectedCourse->students()->attach($user->id);

        if(!empty($this->payment)) {
            Payment::create([
                'amount' => $this->payment,
                'invoice_id' => $invoice->id,
                'transaction_id' => Str::random(8),
            ]);
        }

        $this->selectedCourse = null;
        $this->course_id = null;
        $this->lead_id = null;
        $this->search = null;
        $this->leads = [];

        flash()->addSuccess('Admission successful');
    }
    
    public function addStudent(){
        $this->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required'
        ]);
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);

        $this->user_id = $user->id;

    }
    public function studentAdmit(){

        $invoice = Invoice::create([
            'due_date' => now()->addDays(7),
            'user_id' => $this->user_id,
        ]);

        InvoiceItem::create([
            'name' => 'Course: ' . $this->selectedCourse->name,
            'price' => $this->selectedCourse->price,
            'quantity' => 1,
            'invoice_id' => $invoice->id,
        ]);

        $this->selectedCourse->students()->attach($this->user_id);

        if (!empty($this->payment)) {
            Payment::create([
                'amount' => $this->payment,
                'invoice_id' => $invoice->id,
                'transaction_id' => Str::random(8),
            ]);
        }

        $this->selectedCourse = null;
        $this->course_id = null;
        $this->lead_id = null;
        $this->search = null;
        $this->leads = [];
        $this->notFound = false;

        flash()->addSuccess('Registration Complete and Admission Successful');
    }
}
