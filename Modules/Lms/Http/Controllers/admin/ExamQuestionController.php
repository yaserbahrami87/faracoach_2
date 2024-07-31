<?php

namespace Modules\Lms\Http\Controllers\admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Lms\Entities\Exam;
use Modules\Lms\Entities\ExamQuestion;

class ExamQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('lms::index');
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
     * @param ExamQuestion $ExamQuestion
     * @return Renderable
     */
    public function edit(Exam $Exam,ExamQuestion $ExamQuestion)
    {
        return view('lms::admin.exams.questions.examQuestion_edit')
                                ->with('Exam',$Exam)
                                ->with('ExamQuestion',$ExamQuestion);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param ExamQuestion $ExamQuestion
     * @return Renderable
     */
    public function update(Request $request,Exam $Exam,ExamQuestion $ExamQuestion)
    {
        $request->validate(
            [
                'title'     =>'required|string|max:200',
                'answer1'   =>'required|string|max:200',
                'answer2'   =>'required|string|max:200',
                'answer3'   =>'required|string|max:200',
                'answer4'   =>'required|string|max:200',
                'correct'   =>'required|numeric|between:1,4',
                'score'     =>'required|numeric|between:0,100',
            ]);

        $question=$ExamQuestion->update(
            [
                'title'          =>$request->title,
                'score'          =>$request->score,
                'user_id'        =>Auth::user()->id,
            ]);

        $loop=1;
        foreach ($ExamQuestion->answers as $answer)
        {
            $tmp="answer".$loop;
            $answer->update(
                [
                    'title'          =>$request->$tmp,
                    'is_correct'     =>NULL,
                ]);
            if($request->correct==$loop)
            {
                $answer->update([
                    'is_correct'     =>1,
                ]);
            }

            $loop++;
        }


        alert()->success('سوال با موفقیت بروزرسانی شد')->persistent('بستن');


        return back();
    }

    /**
     * Remove the specified resource from storage.
     * @param ExamQuestion $ExamQuestion
     * @return Renderable
     */
    public function destroy(Exam $Exam,ExamQuestion $ExamQuestion)
    {
        $status=$ExamQuestion->delete();
        if($status)
        {
            alert()->success('سوال با موفقیت حذف شد')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در حذف سوال')->persistent('بستن');
        }

        return back();

    }
}
