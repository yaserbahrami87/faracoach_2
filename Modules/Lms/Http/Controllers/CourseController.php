<?php

namespace Modules\Lms\Http\Controllers;

use App\Services\JalaliDate;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Lms\Entities\Course;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        if($request->has('type') && $request->type=='performing')
        {

            $courses= Course::where('start','<=',JalaliDate::get_jalaliNow())
                ->orderby('id','desc')
                ->get();
        }
        elseif($request->has('type') && $request->type=='held')
        {

            $courses= Course::where('end','<',JalaliDate::get_jalaliNow())
                ->orderby('id','desc')
                ->get();
        }
        elseif ($request->has('type') && $request->type=='special')
        {
            $courses=Course::where('start','>=',JalaliDate::get_jalaliNow())
                                        ->whereNotNull('fi_off')
                                        ->orderby('id','desc')
                                        ->get();
        }
        else
        {
            $courses=Course::where('start','>=',JalaliDate::get_jalaliNow())
                            ->orderby('id','desc')
                            ->get();
        }
        return view('courses_all')
                        ->with('courses',$courses);
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
    public function show(Course $course)
    {

        return view('course_single')
                    ->with('course',$course);
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
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
