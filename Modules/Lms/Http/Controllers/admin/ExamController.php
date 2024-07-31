<?php

namespace Modules\Lms\Http\Controllers\admin;

use App\Providers\JalaliDateServiceProvider;
use App\Services\JalaliDate;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Lms\Entities\Certificate;
use Modules\Lms\Entities\Exam;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $exams=Exam::orderby('id','desc')
                    ->get();
        return view('lms::admin.exams.exams')
                        ->with('exams',$exams);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $certificates=Certificate::where('status',1)
                        ->get();
        return view('lms::admin.exams.exam-insert')
                            ->with('certificates',$certificates);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {

        $request->validate([
            'exam'          =>'required|string|max:200|unique:exams',
            'description'   =>'nullable|string|',
            'certificate_id'=>'nullable|numeric',
            'pass'          =>'required|numeric|between:0,100',
        ]);

        $status=Exam::create($request->all()+
            [
                'user_id'   =>Auth::user()->id,
            ]);


        if($status)
        {
            alert()->success('آزمون با موفقیت ایجاد شد.لطفا سوالات مربوط به آزمون را وارد کنید')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در ایجاد آزمون')->persistent('بستن');
        }

        return back();
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
     * @param Exam $exam
     * @return Renderable
     */
    public function edit(Exam $Exam)
    {
        $certificates=Certificate::where('status',1)
                        ->get();
        return view('lms::admin.exams.exam-edit')
                        ->with('certificates',$certificates)
                        ->with('exam',$Exam);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Exam $Exam
     * @return Renderable
     */
    public function update(Request $request, Exam $Exam)
    {
        $request->validate([
            'exam'          =>'required|string|max:200|unique:exams,exam,'.$Exam->id,
            'description'   =>'required|string|',
            'certificate_id'=>'nullable|numeric',
            'pass'          =>'required|numeric|between:0,100',
        ]);
        $status=$Exam->update($request->all());
        if($status)
        {
            alert()->success('آزمون با موفقیت به روزرسانی شد')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در بروزرسانی')->persistent('بستن');
        }

        return redirect()->route('admin.course.exams');
    }

    /**
     * Remove the specified resource from storage.
     * @param Exam $Exam
     * @return Renderable
     */
    public function destroy(Exam $Exam)
    {
        $status=$Exam->delete();
        if($status)
        {
            alert()->success('آزمون با موفقیت حذف شد')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در حذف آزمون')->persistent('بستن');
        }

        return redirect()->route('admin.course.exams');
    }

    public function examQuetions_show (Exam $Exam)
    {
        return view('lms::admin.exams.questions.examQuestions')
                        ->with('Exam',$Exam);
    }

    public function ExamQuetions_create (Exam $Exam)
    {
        return view('lms::admin.exams.questions.examQuestion_Insert')
            ->with('Exam',$Exam);

    }

    public function ExamQuetions_store(Request $request,Exam $Exam)
    {

        $request->validate(
            [
                'title'     =>'required|string',
                'answer1'   =>'required|string',
                'answer2'   =>'required|string',
                'answer3'   =>'required|string',
                'answer4'   =>'required|string',
                'correct'   =>'required|numeric|between:1,4',
                'score'     =>'required|numeric|between:0,100',
            ]);

            $question=Auth::user()->examQuestion_insert()->create(
            [
                'title'          =>$request->title,
                'is_question'    =>1,
                'score'          =>$request->score,
                'exam_id'        =>$Exam->id,
                'date_fa'        =>JalaliDate::get_jalaliNow(),
                'time_fa'        =>JalaliDate::get_timeNow(),

            ]);


        $answer1=Auth::user()->examQuestion_insert()->create(
            [
                'title'          =>$request->answer1,
                'question_id'    =>$question->id,

            ]);
        $answer2=Auth::user()->examQuestion_insert()->create(
            [
                'title'          =>$request->answer2,
                'question_id'    =>$question->id,

            ]);
        $answer3=Auth::user()->examQuestion_insert()->create(
            [
                'title'          =>$request->answer3,
                'question_id'    =>$question->id,

            ]);
        $answer4=Auth::user()->examQuestion_insert()->create(
            [
                'title'          =>$request->answer4,
                'question_id'    =>$question->id,

            ]);



        if($request->correct==1)
        {
            $answer1->is_correct=1;
            $answer1->save();
        }
        elseif($request->correct==2)
        {
            $answer2->is_correct=1;
            $answer2->save();
        }
        elseif($request->correct==3)
        {
            $answer3->is_correct=1;
            $answer3->save();
        }
        elseif($request->correct==4)
        {
            $answer4->is_correct=1;
            $answer4->save();
        }

        if($answer1 && $answer2 && $answer3 && $answer4 && $question)
        {
            alert()->success('سوال با موفقیت به آزمون اضافه شد')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در ثبت آزمون');
        }

        return back();
    }
}
