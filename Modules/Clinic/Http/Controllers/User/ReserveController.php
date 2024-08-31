<?php

namespace Modules\Clinic\Http\Controllers\User;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Clinic\Entities\Reserve;

class ReserveController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {

        return view('clinic::user.reserves');
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

    public function ignoreUser(Reserve $Reserve)
    {
        if(Auth::user()->id==$Reserve->user_id)
        {
            $Reserve->status=12;
            $Reserve->booking->status=0;
            $Reserve->booking->save();
            $status=$Reserve->save();
            if($status)
            {
                alert()->success('درخوسات جلسه با موفقیت رد شد');
            }
            else
            {
                alert()->error('خطا در لغو جلسه');
            }
        }
        else
        {
            alert()->warning('شما مجاز به دسترسی به این بخش ندارید');
        }


        return back();

    }

    public function cancelUser(Reserve $Reserve)
    {
        if(Auth::user()->id==$Reserve->user_id)
        {
            $Reserve->status=3;
            $Reserve->booking->status=0;
            $Reserve->booking->save();
            $status=$Reserve->save();
            if($status)
            {
                alert()->success('جلسه با موفقیت لغو شد');
            }
            else
            {
                alert()->error('خطا در لغو جلسه');
            }
        }
        else
        {
            alert()->warning('شما مجاز به دسترسی به این بخش ندارید');
        }
        return back();

    }


}


