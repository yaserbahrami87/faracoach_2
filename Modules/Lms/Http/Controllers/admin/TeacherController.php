<?php

namespace Modules\Lms\Http\Controllers\admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Lms\Entities\Teacher;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $teachers=Teacher::get();

        return view('lms::admin.teachers.teachers-all')
                        ->with('teachers',$teachers);
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
    public function edit($id)
    {
        return view('lms::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param Teacher $Teacher
     * @return Renderable
     */
    public function destroy(Teacher $Teacher)
    {
        $status=$Teacher->delete();
        if($status)
        {
            alert()->success('استاد با موفقیت حذف شد')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در جذف اطلاعات استاد')->persistent('بستن');
        }

        return redirect()->route('admin.course.teachers');

    }
}
