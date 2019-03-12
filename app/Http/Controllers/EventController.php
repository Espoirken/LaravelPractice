<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Child;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::paginate(10);
        return view('admin.client.events.index')->with('events', $events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.client.events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'detail' => 'required',
            'status' => 'required',
        ]);

        $event = new Event;
        $event->title = $request->title;
        $event->detail = $request->detail;
        $event->status = $request->status;
        $event->save();
        toastr()->success('Event was created successfully!');
        return redirect('admin/events');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);
        return view('admin.client.events.edit')->with('event', $event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'detail' => 'required',
            'status' => 'required',
        ]);
        $event = Event::find($id);
        $event->title = $request->title;
        $event->detail = $request->detail;
        $event->status = $request->status;
        $event->save();
        toastr()->success('Event was updated successfully!');
        return redirect('admin/events');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();
        toastr()->success('Event was deleted successfully!');
        return redirect('admin/events');
    }

    public function search(Request $request)
    {       
        $events = Event::where('title', 'like', '%' . request('search') . '%')
        ->orWhere('detail', 'like', '%' . request('search') . '%')
        ->paginate(10);
        return view('admin.client.events.index')->with('events', $events);
    }

    public function attend($id)
    {      
        $event = Event::find($id);
        $children = Child::all();
        return view('admin.client.events.attend')->with('event', $event)
                                                ->with('children', $children);
    }

    public function join(Request $request, $event_id, $child_id)
    {       
        $child = Child::find($child_id);
        $child->events()->attach($event_id,['attend' => 'Joined']);
        $child->attend = $request->attend;
        $child->save();
        return redirect()->back();
    }

    public function cancel(Request $request, $event_id, $child_id)
    {       
        $child = Child::find($child_id);
        $child->attend = $request->attend;
        $child->save();
        $child->events()->update(['attend' => 'Cancelled']);
        return redirect()->back();
    }
}
