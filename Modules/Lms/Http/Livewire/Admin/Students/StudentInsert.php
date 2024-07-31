<?php

namespace Modules\Lms\Http\Livewire\Admin\Students;

use Livewire\Component;
use Modules\Crm\Entities\User;
use Modules\Lms\Entities\Course;
use Modules\Lms\Entities\Student;

class StudentInsert extends Component
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
        $this->User=$User;
    }

    protected function rules()
    {
        return[
            'q'         =>'required|max:50',
            'user_id'   =>'required|numeric',
            'course_id' =>'required|numeric',
            'date_fa'   =>'required|date_format:Y/m/d|max:11',
            'status'    =>'required|numeric'
        ];
    }

    public function render()
    {
        $this->student_status=$this->Student->status();
        $this->courses=Course::orderby('id','desc')
                            ->get();

        $this->dispatchBrowserEvent('plugins');
        return view('lms::livewire.admin.students.student-insert')
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

    public function addStudent()
    {
        $this->validate();
        $this->check=Student::where('user_id',$this->user_id)
            ->where('course_id',$this->course_id)
            ->get();

        if($this->check->count()==0)
        {
            $this->Student=$this->Student::create([
                'user_id'    =>$this->user_id,
                'course_id'  =>$this->course_id,
                'date_fa'    =>$this->date_fa,
                'status'     =>$this->status,
            ]);

            if($this->Student)
            {
                alert()->success('دانشجو با موفقیت به دوره اضافه شد');
            }
            else
            {
                alert()->error('خطا در اضافه کردن دانشجو به دوره');
            }
            return redirect()->route('admin.course.all');
        }
        else
        {
            $this->emit('toast','error','این دانشجو در دوره مورد نظر وجود دارد');
        }


    }
}
