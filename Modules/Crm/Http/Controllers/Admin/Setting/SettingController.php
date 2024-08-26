<?php

namespace Modules\Crm\Http\Controllers\Admin\Setting;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Crm\Entities\Setting;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $setting=Setting::get();
        return view('crm::admin.setting.setting')
                        ->with('setting',$setting);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('crm::create');
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
        return view('crm::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('crm::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request)
    {

        $request->validate([
            'address'   =>'required|string|max:200',
            'tel'       =>'required|',
            'telegram'  =>'required|string|max:200',
            'instagram' =>'required|string|max:200',
            'youtube'   =>'required|string|max:200',
            'aparat'    =>'required|string|max:200',
            'linkedin'  =>'required|string|max:200'

        ]);

        if(!is_null($request->address))
        {
            $status=$settings=setting::updateOrInsert([
                'setting' =>'address',

            ],[
                'value'   =>$request->address,
            ]);
        }

        if(!is_null($request->tel))
        {
            $status=$settings=setting::updateOrInsert([
                'setting' =>'tel',

            ],[
                'value'   =>$request->tel,
            ]);
        }

        if(!is_null($request->telegram))
        {
            $status=$settings=setting::updateOrInsert([
                'setting' =>'telegram',

            ],[
                'value'   =>$request->telegram,
            ]);
        }

        if(!is_null($request->instagram))
        {
            $status=$settings=setting::updateOrInsert([
                'setting' =>'instagram',

            ],[
                'value'   =>$request->instagram,
            ]);
        }

        if(!is_null($request->youtube))
        {
            $status=$settings=setting::updateOrInsert([
                'setting' =>'youtube',

            ],[
                'value'   =>$request->youtube,
            ]);
        }

        if(!is_null($request->aparat))
        {
            $status=$settings=setting::updateOrInsert([
                'setting' =>'aparat',

            ],[
                'value'   =>$request->aparat,
            ]);
        }

        if(!is_null($request->linkedin))
        {
            $status=$settings=setting::updateOrInsert([
                'setting' =>'linkedin',

            ],[
                'value'   =>$request->linkedin,
            ]);
        }

        if($status)
        {
            alert()->success('تنظیمات بروزرسانی شد');
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
