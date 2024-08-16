<?php

namespace Modules\Clinic\Http\Livewire\Admin;

use Livewire\Component;


class ClinicCategory extends Component
{
    public $categories;
    public $parents;
    public $category;
    public $parent;
    public $image;
    public $description;

    protected $listeners=[
        'render_category'=>'render',
    ];

    protected function rules()
    {
        return[
            'category'  =>'required|max:200|unique:clinic_categories,id',
            'parent'    =>'required|numeric',
            'image'     =>'required|string',
            'description'=>'required|200',
        ];
    }

    public function render()
    {
        //بخاطر اینکه نام کامپوننت با نام مدل یکی هستش از یوز کردن مدل امتناع شده
        $this->categories=\Modules\Clinic\Entities\ClinicCategory::whereNotNull('parent_id')
                                ->get();
        $this->parents=\Modules\Clinic\Entities\ClinicCategory::whereNull('parent_id')
                                ->get();

        return view('clinic::livewire.admin.clinic-category')
            ->layout('masterView::admin.master.index');
    }

    public function addCategory()
    {
        $this->validate();
        \Modules\Clinic\Entities\ClinicCategory::create(
            [
                'title' =>$this->category,
                'image'
            ]
        );
    }

}
