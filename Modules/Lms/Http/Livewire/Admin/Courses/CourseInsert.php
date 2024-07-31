<?php

namespace Modules\Lms\Http\Livewire\Admin\Courses;

use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Lms\Entities\Course;
use Modules\Lms\Entities\CourseType;
use Modules\Lms\Entities\Teacher;

class CourseInsert extends Component
{
    public $Course;
    public $Teachers=[];
    public $CourseTypes=[];
    public $teacher_id=[];
    use WithFileUploads;

    public function mount(Course $Course)
    {
        $this->Course=$Course;
        $this->dispatchBrowserEvent('plugins');
    }

    protected function rules()
    {
        return [
            'Course.course'     =>'required|max:200|min:5|unique:courses,course,'.$this->Course->id,
            'Course.shortlink'  =>'required|max:200|min:5|unique:courses,shortlink,'.$this->Course->id,
            'Course.image'      =>'required|mimes:jpeg,jpg,png,bmp|max:1024',
            'teacher_id'        =>'required|array',

        ];
    }

    public function render()
    {
        $this->Teachers=Teacher::where('status',1)
                                ->get();

        $this->CourseTypes=CourseType::where('status',1)
                                    ->get();

        $this->dispatchBrowserEvent('plugins');

        return view('lms::livewire.admin.courses.course-insert')
                            ->layout('masterView::admin.master.index');
    }

    public function handleUploadImage()
    {
        $this->fileName="course_".time().".".$this->Course->image->extension();
        $this->User->personal_image->storeAs('/documents/images',$this->fileName);
        return $this->fileName;
    }

    public function updated($name)
    {
        $this->validateOnly($name);
    }

    public function updatedImage()
    {
        dd("H");
        $this->Course->image=$this->handleUploadImage();
    }

    public function register()
    {
        $this->Course->save();
        $this->Course->teachers()->attach($this->teacher_id);
    }


}
