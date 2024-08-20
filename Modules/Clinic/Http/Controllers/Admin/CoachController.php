<?php

namespace Modules\Clinic\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\RequestPortal\Entities\RequestPortal;

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
    public function update(Request $request,RequestPortal $requestPortal)
    {

        $request->validate([
            'status' =>'required|between:0,5'
        ]);

        if($requestPortal->type=='coach_request')
        {
            $requestPortal->user->coach->status=$request->status;
            $status=$requestPortal->user->coach->save();
            alert()->success('وضعیت کوچ تغییر کرد')->persistent('بستن');
        }
        elseif($requestPortal->type=='coach_service_request')
        {
            $tmp=($requestPortal->clinicCategoriesRequestPortal->first()->id);
            $status=$requestPortal->clinicCategoriesRequestPortal()->updateExistingPivot($tmp,['status'=>$request->status]);
        }
        else
        {
            alert()->error('خطا در نوع درخواست')->persistent('بستن');
            return back();
        }



        //$requestPortal->clinicCategoriesRequestPortal->first()->getOriginal('pivot_status');

        if(!is_null($status))
        {
            $status=$requestPortal->update($request->all());
            if($status)
            {
                alert()->success('وضعیت درخواست تغییر کرد')->persistent('بستن');
            }
            else
            {
                alert()->error('خطا در وضعیت بروزرسانی ')->persistent('بستن');
            }
        }
        else
        {
            alert()->error('خطا در تغییر وضعیت ')->persistent('بستن');
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
