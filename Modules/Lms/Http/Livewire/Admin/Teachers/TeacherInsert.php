<?php

namespace Modules\Lms\Http\Livewire\Admin\Teachers;

use Livewire\Component;
use Modules\Crm\Entities\User;
use Modules\Lms\Entities\Teacher;

class TeacherInsert extends Component
{
    public $teacher;
    public $q;
    public $users=[];
    public $user_id;
    public $biography;
    public $status;

    public function mount(Teacher $teacher)
    {
        $this->teacher=$teacher;
    }

    protected function rules()
    {
        return [
            'user_id'   =>'required|numeric|unique:teachers,user_id',
            'biography' =>'required|max:2000',
            'status'    =>'required|boolean',
            'q'         =>'required|max:50'
        ];
    }
    public function render()
    {
        return view('lms::livewire.admin.teachers.teacher-insert')
                    ->layout('masterView::admin.master.index');
    }

    public function updatedQ()
    {

        $this->q=str_replace('+98','',$this->q);
        $this->q=str_replace('+','',$this->q);
        $this->q=(ltrim($this->q, '0'));
        $this->q=(trim($this->q));

        $this->users=User::orwhere('tel','like',"%$this->q%")
                                    ->orwhere('fname','like',"%$this->q%")
                                    ->orwhere('lname','like',"%$this->q%")
                                    ->get();

        $this->validateOnly('q');

    }

    public function updated($name)
    {
        $this->validateOnly($name);
    }

    public function register()
    {
        $this->validate();
        $this->teacher::create([
                    'user_id'   =>$this->user_id,
                    'biography' =>$this->biography,
                    'status'    =>$this->status
        ]);

        $this->emit('toast','success','استاد با موفقیت اضافه شد');
        alert()->success('استاد با موفقیت اضافه شد')->persistent('بستن');
        return redirect()->route('admin.course.teacher.create');
    }
}
