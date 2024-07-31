<?php

namespace Modules\Lms\Http\Controllers\admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Modules\Lms\Entities\Course;
use Modules\Lms\Entities\CourseType;
use Modules\Lms\Entities\Teacher;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $Courses=Course::orderby('id','desc')
                        ->get();

        return view('lms::admin.courses.courses')
                        ->with('Courses',$Courses);
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

       $request->validate([
           'course'         =>'required|max:200|min:5|unique:courses,course,',
           'shortlink'      =>'required|max:200|min:5|unique:courses,shortlink,',
//           'image'          =>'required|mimes:jpeg,jpg,png,bmp|max:1024',
           'image'          =>'required|max:200',
           'teacher'        =>'required|array',
           'courseType_id'  =>'required|numeric',
           'duration'       =>'required|numeric',
           'duration_date'  =>'required|max:50',
           'count_students' =>'required|numeric',
           'start'          =>'required|date_format:Y/m/d|max:11',
           'end'            =>'required|date_format:Y/m/d|max:11',
           'course_days'    =>'required|max:30',
           'course_times'   =>'required|date_format:H:i',
           'exam'           =>'required|date_format:Y/m/d|max:11',
           'fi'             =>'required|numeric',
           'fi_off'         =>'required|numeric',
           'prepayment'     =>'required|numeric',
           'peymant_off'    =>'required|numeric|max:100',
           'type_peymant_id'=>'required|numeric|between:1,3',
           'infocourse'     =>'required',
       ]);


       $image=(strrchr($request->image,'/'));
       $image=str_replace('/','',$image);
       $request->image=$image;

       $Course=Course::create($request->all());

//        if ($request->has('image') && $request->file('image')->isValid()) {
//            $file = $request->file('image');
//            $image = "course-" . time() . "." . $request->file('image')->extension();
//            $path = public_path('/documents/');
//            $files = $request->file('image')->move($path, $image);
//        }
//       $Course->image=$image;
//       $Course->save();

       $Course->teachers()->attach($request->teacher);
       if($Course)
       {
           alert()->success('دوره با موفقیت ثبت شد');
       }
       else
       {
           alert()->error('خطا در اضافه کردن دوره');
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
     * @param Course $Course
     * @return Renderable
     */
    public function edit(Course $Course)
    {
        $Teachers=Teacher::where('status',1)
            ->get();

        $CourseTypes=CourseType::where('status',1)
            ->get();

        return view('lms::admin.courses.course-edit')
                        ->with('Course',$Course)
                        ->with('Teachers',$Teachers)
                        ->with('CourseTypes',$CourseTypes);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Course $Course
     * @return Renderable
     */
    public function update(Request $request,Course $Course)
    {
        $request->validate([
            'course'         =>'required|max:200|min:5|unique:courses,course,'.$Course->id,
            'shortlink'      =>'required|max:200|min:5|unique:courses,shortlink,'.$Course->id,
//            'image'          =>'nullable|mimes:jpeg,jpg,png,bmp|max:1024',
            'image'          =>'required|max:200',
            'teacher'        =>'required|array',
            'courseType_id'  =>'required|numeric',
            'duration'       =>'required|numeric',
            'duration_date'  =>'required|max:50',
            'count_students' =>'required|numeric',
            'start'          =>'required|date_format:Y/m/d|max:11',
            'end'            =>'required|date_format:Y/m/d|max:11',
            'course_days'    =>'required|max:30',
            'course_times'   =>'required|date_format:H:i',
            'exam'           =>'required|date_format:Y/m/d|max:11',
            'fi'             =>'required|numeric',
            'fi_off'         =>'required|numeric',
            'prepayment'     =>'required|numeric',
            'peymant_off'    =>'required|numeric|max:100',
            'type_peymant_id'=>'required|numeric|between:1,3',
            'infocourse'     =>'required',
        ]);


        $status=$Course->update($request->all());
//        if ($request->has('image') && $request->file('image')->isValid()) {
//            $file = $request->file('image');
//            $image = "course-" . time() . "." . $request->file('image')->extension();
//            $path = public_path('/documents/');
//            $files = $request->file('image')->move($path, $image);
//            $Course->image=$image;
//            $Course->save();
//        }
        DB::table('course_teacher')->where('course_id', $Course->id)->delete();
        $Course->teachers()->attach($request->teacher);

        if($status)
        {
            alert()->success('دوره با موفقیت بزورسانی شد');
        }
        else
        {
            alert()->error('خطا در بروزرسانی');
        }

        return redirect()->route('admin.course.all');

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

    public function students (Course $Course)
    {

        return view('lms::admin.students.students-all')
                            ->with('Course',$Course);
    }
}
