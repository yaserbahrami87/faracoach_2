<?php

namespace Modules\Clinic\Http\Controllers\Admin\Coach;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Crm\Entities\Setting;


class CoachSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $settings=Setting::get();
        return view('clinic::admin.coach.coach-setting')
                            ->with('settings',$settings);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('clinic::create');
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
        return view('clinic::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('clinic::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request)
    {
        if(!is_null($request->coaching_student_count))
        {
            $status=$settings=setting::updateOrInsert([
                'setting' =>'coaching_student_count',

            ],[
                'value'   =>$request->coaching_student_count,
            ]);
        }

        if(!is_null($request->coaching_student_fi))
        {
            $status=$settings=setting::updateOrInsert([
                'setting' =>'coaching_student_fi',

            ],[
                'value'   =>$request->coaching_student_fi,
            ]);
        }

        if(!is_null($status))
        {
            alert()->success('تنظیمات با موفقیت بروزرسانی شد');
        }
        else
        {
            alert()->error('خطا در بروزرسانی');
        }

        return back();

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
