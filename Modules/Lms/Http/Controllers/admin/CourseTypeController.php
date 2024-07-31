<?php

namespace Modules\Lms\Http\Controllers\admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Validation\Rule;
use Modules\Lms\Entities\Course;
use Modules\Lms\Entities\CourseType;

class CourseTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $courseTypes=CourseType::get();
        return view('lms::admin.course-types.course-type-all')
                        ->with('courseTypes',$courseTypes);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('lms::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('lms::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(CourseType $CourseType)
    {
        return view('lms::admin.course-types.course-type-edit')
                                    ->with('CourseType',$CourseType);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request,CourseType $CourseType)
    {
        $request->validate([
            'type'       =>'required|max:200|min:3|unique:course_types,type,'.$CourseType->id,
            'shortlink'  =>'required|max:200|min:3|unique:course_types,shortlink,'.$CourseType->id,
            'status'     =>'required|boolean',
        ]);

        $status=$CourseType->update($request->all());
        if($status)
        {
            alert()->success('دسته بندی با موفقیت بروزرسانی شد')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در بروزرسانی')->persistent('بستن');
        }

        return redirect()->route('admin.course.coursetype.edit',['CourseType'=>$CourseType->shortlink]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(CourseType $CourseType)
    {
        $status=$CourseType->delete();
        if($status)
        {
            alert()->success('دسته بندی با موفقیت حذف شد')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در حذف دسته بندی')->persistent('بستن');
        }

        return redirect()->route('admin.course.coursetypes');
    }
}
