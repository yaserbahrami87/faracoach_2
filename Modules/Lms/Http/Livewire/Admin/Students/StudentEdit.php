<?php

namespace Modules\Lms\Http\Livewire\Admin\Students;

use Livewire\Component;
use Modules\Crm\Entities\User;
use Modules\Lms\Entities\Course;
use Modules\Lms\Entities\Student;

class StudentEdit extends Component
{
    public $Student;
    public $student_status;
    public $q;
    public $Users=[];
    public $courses=[];
    public $user_id;
    public $course_id;
    public $date_fa;
    public $status;
    public $check;

    public function mount(Student $Student,User $User)
    {
        $this->Student=$Student;
        $this->q=$Student->user->tel;
        $this->User=$User;

        $this->Users=User::where('tel',$this->Student->user->tel)
                                ->get();

    }

    protected function rules()
    {
        return[
            'q'         =>'required|max:50',
            'Student.user_id'   =>'required|numeric',
            'Student.course_id' =>'required|numeric',
            'Student.date_fa'   =>'required|date_format:Y/m/d|max:11',
            'Student.status'    =>'required|numeric'
        ];
    }

    public function render()
    {
        $this->student_status=$this->Student->status();
        $this->courses=Course::orderby('id','desc')
            ->get();

        $this->dispatchBrowserEvent('plugins');
        return view('lms::livewire.admin.students.student-edit')
                            ->layout('masterView::admin.master.index');
    }

    public function updated($name)
    {
        $this->validateOnly($name);
    }

    public function updatedQ()
    {
        $this->validateOnly('q');
        $this->Users=User::orwhere('fname','like',"%$this->q%")
            ->orwhere('lname','like',"%$this->q%")
            ->orwhere('tel','like',"%$this->q%")
            ->get();
    }

    public function updateStudent()
    {
        $this->validate();
//        $this->check=Student::where('user_id',$this->Student->user_id)
//                            ->where('course_id',$this->Student->course_id)
//                            ->get();


        $this->Student->save();

        if($this->Student)
        {
            alert()->success('دانشجو با موفقیت بروزرسانی شد');
        }
        else
        {
            alert()->error('خطا در بروزرسانی دانشجو');
        }
        return redirect()->route('admin.course.all');



    }
}
