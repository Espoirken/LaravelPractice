<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Gate;
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
        if (!Gate::allows('isAdmin')) {
            abort(404);
        }
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
        if (!Gate::allows('isAdmin')) {
            abort(404);
        }
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
        if (!Gate::allows('isAdmin')) {
            abort(404);
        }
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
        if (!Gate::allows('isAdmin')) {
            abort(404);
        }
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
        if (!Gate::allows('isAdmin')) {
            abort(404);
        }
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
        if (!Gate::allows('isClient')) {
            abort(404);
        }
        $event = Event::find($id);
        $user = Auth::user();
        $children = $user->children;
        // dd($events->children()->where('child_id', $id)->get()->first()->pivot->attend);
        // $hasTask = $events->children()->where('event_id', $id)->exists();
        // dd($hasTask);
        // dd($children[0]->id);
        // dd($events->children[0]);
        // dd($event->children[0]->pivot->child_id == $id);
        // $attend = Child::find($id)->events->pivot->attend;
        // $children = Event::find($id)->children;
        // dd(Child::find($id)->events[0]->pivot->attend);
        // dd(Event::find($id)->children[0]->name);
        return view('admin.client.events.attend')->with('event', $event)
                                                ->with('children', $children);
    }

    public function attendees($id)
    {      
        if (!Gate::allows('isAdmin')) {
            abort(404);
        }
        $event = Event::find($id);
        $children = $event->children;
        return view('admin.client.events.attendees')->with('event', $event)
                                                ->with('children', $children);
    }

    public function join(Request $request, $event_id, $child_id)
    {     
        if (!Gate::allows('isClient')) {
            abort(404);
        }  
        $child = Child::find($child_id);
        if($child->events()->where('event_id', $event_id)->exists()){
            $child->events()->update(['attend' => 'Joined']);
        } else {
            $child->events()->attach($event_id,['attend' => 'Joined']);
        }
        $child->decrement('credits', 1);
        $child->attend = $request->attend;
        $child->save();
        return redirect()->back();
    }

    public function cancel(Request $request, $event_id, $child_id)
    {       
        if (!Gate::allows('isClient')) {
            abort(404);
        }
        $child = Child::find($child_id);
        $child->increment('credits', 1);
        $child->attend = $request->attend;
        $child->save();
        $child->events()->update(['attend' => 'Cancelled']);
        return redirect()->back();
    }
}
