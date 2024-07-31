<?php

namespace Modules\Lms\Http\Livewire\Admin\CourseTypes;

use Livewire\Component;
use Modules\Lms\Entities\CourseType;

class CourseTypesInsert extends Component
{
    public $courseType;
    public $type;
    public $shortlink;
    public $status;
    public function mount(CourseType $courseType)
    {
        $this->courseType=$courseType;
    }

    protected function rules()
    {
        return[
            'type'      =>'required|unique:course_types,type|max:200|min:3',
            'shortlink' =>'required|unique:course_types,shortlink|max:200|min:3',
            'status'    =>'required|boolean'
        ];
    }

    public function render()
    {

        return view('lms::livewire.admin.course-types.course-types-insert')
                            ->layout('masterView::admin.master.index');
    }

    public function updated($name)
    {
        $this->validateOnly($name);
    }
    public function register()
    {
        $this->validate();
        $this->courseType->create([
           'shortlink'  =>$this->shortlink,
           'type'       =>$this->type,
            'status'    =>$this->status
        ]);

        $this->emit('toast','success','نوع دوره با موفقیت اضافه شد');
        alert()->success('نوع دوره با موفقیت اضافه شد')->persistent('بستن');
        return redirect()->route('admin.course.coursetype');
    }




}
