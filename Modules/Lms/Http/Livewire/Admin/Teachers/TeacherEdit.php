<?php

namespace Modules\Lms\Http\Livewire\Admin\Teachers;

use Livewire\Component;
use Modules\Crm\Entities\User;
use Modules\Lms\Entities\Teacher;

class TeacherEdit extends Component
{
    public $teacher;
    public $q;
    public $users=[];
    public $user_id;
    public $biography;
    public $status;
    public function mount(Teacher $Teacher)
    {
        $this->Teacher=$Teacher;
        $this->q=$Teacher->user->tel;
        $this->users=User::where('id',$Teacher->user_id)
                            ->get();

    }

    protected function rules()
    {
        return [
            'Teacher.user_id'   =>'required|numeric|unique:users,tel,'.$this->Teacher->id,
            'Teacher.biography' =>'required|max:2000',
            'Teacher.status'    =>'required|boolean',
            'q'         =>'required|max:50'
        ];
    }

    public function render()
    {


        return view('lms::livewire.admin.teachers.teacher-edit')
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

    public function update()
    {
        $this->validate();
        $this->Teacher->save();

        $this->emit('toast','success','اطلاعات با موفقیت به روزرسانی شد');
        alert()->success('اطلاعات با موفقیت به روزرسانی شد')->persistent('بستن');
        return redirect()->route('admin.course.teachers');
    }
}
