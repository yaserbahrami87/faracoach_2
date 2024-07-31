<?php

namespace Modules\Lms\Http\Controllers\admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Lms\Entities\ExamTake;

class ExamTakeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $ExamTakes=ExamTake::orderby('id','desc')
                        ->get();

        return view('lms::admin.exams.takeExams.takeExams')
                            ->with('ExamTakes',$ExamTakes);
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
    public function show(ExamTake $ExamTake)
    {
        return view('lms::admin.exams.takeExams.takeExam_show')
                    ->with('ExamTake',$ExamTake);
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
     * @param ExamTake $ExamTake
     * @return Renderable
     */
    public function update(Request $request,ExamTake $ExamTake)
    {
        $request->validate(
            [
                'status'    =>'required|numeric|between:0,2'
            ]);

        $status=$ExamTake->update($request->all());
        if($status)
        {
            alert()->success('وضعیت آزمون با موفقیت تغییر کرد')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در تغییر وضعیت آزمون')->persistent('بستن');
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
