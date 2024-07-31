<?php

namespace Modules\Lms\Http\Livewire\Admin\Students;

use Livewire\Component;
use Modules\Lms\Entities\Course;
use Modules\Lms\Entities\Student;

class Students extends Component
{
    public $courses;
    public $readyToLoad=false;
    public $students;
    public $Student;
    public $course;
    public $status_selected;
    public function mount(Student $Student)
    {
        $this->Student=$Student;
        $this->students=Student::orderby('id','desc')
                            ->get();
    }

    public function render()
    {
        $this->courses=Course::orderby('id','desc')
                                ->get();

        $this->status=$this->Student->status();

        return view('lms::livewire.admin.students.students')
                    ->layout('masterView::admin.master.index');
    }

    public function loadStudents()
    {
        $this->readyToLoad=true;
    }

    public function updatedCourse()
    {
        $this->students=Student::where('course_id',$this->course)
                            ->get();
    }

    public function updatedStatusSelected()
    {

        $this->students=Student::where('status',$this->status_selected)
                                        ->get();
    }
}
