<?php

namespace Modules\Clinic\Http\Controllers\User;

use App\Services\JalaliDate;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Clinic\Entities\Coach;
use Modules\Clinic\Entities\CoachCategory;
use Modules\Clinic\Entities\CoachType;

class CoachController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('clinic::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {

        if(Auth::user()->completedProfile())
        {
            $coachTypes=CoachType::get();
            $coachCategories=CoachCategory::get();
            return view('clinic::user.coach.coach-insert')
                ->with('coachCategories',$coachCategories)
                ->with('coachTypes',$coachTypes);
        }
        else
        {
            alert()->error('برای درخواست همکاری ابتدا اطلاعات پروفایل خود را تکمیل نمایید')->persistent('بستن');
            return redirect()->route('user.profile.show');
        }
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {

        $request->validate([
            'count_meeting'         =>'required|numeric',
            'coachType'             =>'required|numeric',
            'coachCategory'         =>'required|array',
            'education_background'  =>'required|string',
            'certificates'          =>'required|string',
            'experience'            =>'required|string',
            'skills'                =>'required|string',
            'researches'            =>'nullable|string',
//            'service'               =>'required|array',
//            'expertise'             =>'required|array',
//            'tendency'              =>'required|array'
        ]);

        $coach=Auth::user()->coach()->create($request->all()+
        [
            'coach_type_id' =>$request->coachType
        ]);

        $coach->coachcategories()->attach($request->coachCategory);
        Auth::user()->request_portals()->create([
            'type'          =>'coach_request',
            'description'   =>'تکمیل فرم اولیه درخواست همکاری کوچ ',
            'date_fa'       =>JalaliDate::get_jalaliNow(),
            'time_fa'       =>JalaliDate::get_timeNow(),
        ]);
        if($coach)
        {
            alert()->success('اطلاعات اولیه شما با موفقیت ذخیر شده')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در ذخیره اطلاعات اولیه')->persistent('بستن');
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
