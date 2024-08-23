<?php

namespace Modules\Clinic\Http\Controllers\User\Coach;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Clinic\Entities\CoachSetting;
use Modules\Crm\Entities\Setting;

class CoachSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::user()->is_coach) {
                return $next($request);
            } else {
                alert()->warning('شما اجازه دسترسی به این صفحه را ندارید');
                return back();
            }
        });
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $settings_coaching=CoachSetting::where('coach_id',Auth::user()->coach->id)
                                    ->get();

        $settings=Setting::get();
        return view('clinic::user.coach.coach-setting')
                            ->with('settings_coaching',$settings_coaching)
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
        dd($request);
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
        if(!is_null($request->counseling_fi))
        {
            $status=$settings=CoachSetting::updateOrInsert([
                'setting' =>'counseling_fi',
                'coach_id' =>Auth::user()->coach->id,

            ],[
                'value'   =>$request->counseling_fi,
            ]);
        }

        if(!is_null($request->test_fi))
        {
            $status=$settings=CoachSetting::updateOrInsert([
                'setting' =>'test_fi',
                'coach_id' =>Auth::user()->coach->id,

            ],[
                'value'   =>$request->test_fi,
            ]);
        }

        if(!is_null($request->coaching_fi))
        {
            $status=$settings=CoachSetting::updateOrInsert([
                'setting' =>'coaching_fi',
                'coach_id' =>Auth::user()->coach->id,

            ],[
                'value'   =>$request->coaching_fi,
            ]);
        }

        if(!is_null($request->coaching_student))
        {
            $status=$settings=CoachSetting::updateOrInsert([
                'setting' =>'coaching_student',
                'coach_id' =>Auth::user()->coach->id,

            ],[
                'value'   =>$request->coaching_student,
            ]);
        }

        if(!is_null($request->meeting_today))
        {
            $status=$settings=CoachSetting::updateOrInsert([
                'setting' =>'meeting_today',
                'coach_id' =>Auth::user()->coach->id,

            ],[
                'value'   =>$request->meeting_today,
            ]);
        }

        if(!is_null($request->type_holding))
        {
            $status=$settings=CoachSetting::updateOrInsert([
                'setting' =>'type_holding',
                'coach_id' =>Auth::user()->coach->id,

            ],[
                'value'   =>$request->type_holding,
            ]);
        }

        if(!is_null($request->online_platforms))
        {
            $status=$settings=CoachSetting::updateOrInsert([
                'setting' =>'online_platforms',
                'coach_id' =>Auth::user()->coach->id,

            ],[
                'value'   =>$request->online_platforms,
            ]);
        }

        if(!is_null($request->address))
        {
            $status=$settings=CoachSetting::updateOrInsert([
                'setting' =>'address',
                'coach_id' =>Auth::user()->coach->id,

            ],[
                'value'   =>$request->address,
            ]);
        }

        if($status)
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
