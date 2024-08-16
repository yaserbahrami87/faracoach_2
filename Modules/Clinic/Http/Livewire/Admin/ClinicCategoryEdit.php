<?php

namespace Modules\Clinic\Http\Livewire\Admin;

use Livewire\Component;

use LivewireUI\Modal\ModalComponent;
use Modules\Clinic\Entities\ClinicCategory;

class ClinicCategoryEdit extends ModalComponent
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
            'category.title'    =>'required|max:200|unique:clinic_categories,title,'.$this->category->id,
            'category.parent_id'            =>'required|numeric',
            'category.description'       =>'required|max:200',
        ];
    }

    public function mount(ClinicCategory $ClinicCategory)
    {
        $this->category=$ClinicCategory;
    }


    public function render()
    {
        $this->categories=ClinicCategory::whereNotNull('parent_id')
            ->get();
        $this->parents=ClinicCategory::whereNull('parent_id')
            ->get();
        return view('clinic::livewire.admin.clinic-category-edit');
    }

    public function update()
    {
        $this->validate();
        $status=$this->category->save();
        if($status)
        {
            $this->emit('toast','success','دسته بندی با موفقیت ویرایش شد');
        }
        else
        {
            $this->emit('toast','danger','خطا در ویرایش بروزرسانی');
        }

        $this->emit('render_category');
    }
}
