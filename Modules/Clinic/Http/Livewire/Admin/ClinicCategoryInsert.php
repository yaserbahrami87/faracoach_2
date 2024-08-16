<?php

namespace Modules\Clinic\Http\Livewire\Admin;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Modules\Clinic\Entities\ClinicCategory;

class ClinicCategoryInsert extends ModalComponent
{
    public $category;
    public $parent;
    public $image;
    public $description;
    public $categories;
    public $parents;

    public static function modalMaxWidth(): string
    {
        // 'sm'
        // 'md'
        // 'lg'
        // 'xl'
        // '2xl'
        // '3xl'
        // '4xl'
        // '5xl'
        // '6xl'
        // '7xl'
        return '2xl';
    }

    protected function rules()
    {
        return[
            'category'          =>'required|max:200|unique:clinic_categories,title,',
            'parent'            =>'required|numeric',
            'description'       =>'required|max:200',
        ];
    }

    public function render()
    {
        //بخاطر اینکه نام کامپوننت با نام مدل یکی هستش از یوز کردن مدل امتناع شده
        $this->categories=ClinicCategory::whereNotNull('parent_id')
            ->get();
        $this->parents=ClinicCategory::whereNull('parent_id')
            ->get();

        return view('clinic::livewire.admin.clinic-category-insert');
    }

    public function addCategory()
    {
        $this->validate();
        $status=ClinicCategory::create(
            [
                'title' =>$this->category,
                'parent_id' =>$this->parent,
                'description'=>$this->description,
            ]
        );

        if($status)
        {
            $this->emit('toast','success','دسته با موفقیت اضافه شد');
        }
        else
        {
            $this->emit('toast','error','خطا در اضافه کردن دسته بندی');
        }

        $this->emit('render_category');


    }
}
