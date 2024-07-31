<?php

namespace Modules\Event\Http\Controllers\admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Event\Entities\Event;
use Modules\Event\Entities\EventOrganizer;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $events=Event::orderby('id','desc')
                ->get();
        return view('event::admin.events.events-all')
                    ->with('events',$events);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $organizers=EventOrganizer::where('status',1)
                                ->get();
        return view('event::admin.events.event-insert')
                                ->with('organizers',$organizers);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {

        $request->validate([
            'event'         => 'required|persian_alpha_num|min:3|unique:events,event',
            'shortlink'     => 'required|string|min:3|unique:events,shortlink',
            'eventorganizer_id'=> 'required|array',
            'description'   => 'required|string|min:3|',
            'capacity'      => 'required|numeric|',
            'type'          => 'required|numeric|',
            'address'       => 'required_with:type,1|string|',
            'image'         => 'required|string|max:200',
            'video'         => 'nullable|string|min:3|',
            'start_date'    => 'required|date_format:Y/m/d|max:11|',
            'start_time'    => 'required|string|max:6|',
            'end_date'      => 'required|date_format:Y/m/d|max:11|',
            'end_time'      => 'required|string|max:6|',
            'duration'      => 'required|string|min:3|',
            'expire_date'   => 'required|date_format:Y/m/d|max:11|',
            'event_text'    => 'required|string|min:10|',
            'heading'       => 'nullable|string|min:10|',
            'contacts'      => 'nullable|string|min:10|',
            'faq'           => 'nullable|string|min:10|',
            'links'         => 'nullable|string|min:10|',
        ]);

        $event=Event::create($request->all()+[
                'user_id'   =>Auth::user()->id,
            ]);

        $event->eventOrganizers()->attach($request->eventorganizer_id);

        if($event)
        {
            alert()->success('رویداد با موفقیت ثبت شد')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در ثبت رویداد')->persistent('بستن');
        }

        return redirect()->route('admin.event.all');
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
    public function destroy($id)
    {
        //
    }
}
