<?php

namespace Modules\Event\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Event\Entities\Event;
use Modules\Event\Entities\EventParticipants;

class EventParticipantsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('event::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(Event $event)
    {

        return view('event::admin.participants.participant-insert')
                        ->with('event',$event);
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
        return view('event::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('event::edit');
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
    public function destroy(EventParticipants $EventParticipants)
    {
        $status=$EventParticipants->delete();
        if($status)
        {
            alert()->success('کاربر با موفقیت از لیست شرکت کننده ها حذف شد')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در حذف کاربر از لیست شرکت کننده ها')->persistent('بستن');
        }

        return back();
    }
}
