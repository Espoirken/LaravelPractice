<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Auth;
use Gate;
use App\Event;
use App\User;
use App\Child;
use App\Mail\EventMail;
use App\Mail\EventUpdate;
use App\Mail\CancelEvent;
use Carbon\Carbon;
use function Opis\Closure\unserialize;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $now = Carbon::now('Asia/Manila');
        $events = Event::latest()->paginate(10);
        return view('admin.client.events.index')->with('events', $events)
                                                ->with('now', $now);
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
        $children = Child::all();
        return view('admin.client.events.create')->with('children', $children);
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
            'ended_at' => 'required',
        ]);

        $event = new Event;
        $event->title = $request->title;
        $event->detail = $request->detail;
        $event->joinees = $request->joinees != null ? serialize($request->joinees) : '';
        $event->ended_at = Carbon::parse($request->ended_at);
        $event->save();
        $this->mail($event->title, $event->detail, $event->id, $event->joinees, $event->ended_at->format('F d, Y'));
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
        $event = Event::findOrFail($id);
        $lists = Child::all();
        $children = [];
        $joinees = [];
        $all = [];

        if ($event->joinees != NULL) {
            foreach (unserialize($event->joinees) as $key => $joinees) {
                $children[] = Child::find($joinees);
            }
            foreach ($lists as $key => $value) {
                $allchild[] = $value;
            }
            $all = array_diff($allchild, $children);
            $joinees = array_intersect($children, $allchild);
        }
        return view('admin.client.events.edit')->with('event', $event)
                                                ->with('children', $children)
                                                ->with('all', $all)
                                                ->with('joinees', $joinees)
                                                ->with('lists', $lists);
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
            'ended_at' => 'required',
        ]);
        $event = Event::findOrFail($id);

        if( ($event->title != $request->title) || ($event->detail != $request->detail) 
            || ($event->ended_at != $request->ended_at) ){

            $users = User::all();
            foreach ($users as $key => $user) {
                Mail::to($user->email)->send(new EventUpdate($event->title, $event->detail, $event->ended_at, $event->joinees, $request->title, $request->detail, $request->ended_at,$request->joinees));
            }
        }
        
        $event->title = $request->title;
        $event->detail = $request->detail;
        $event->joinees = $request->joinees != null ? serialize($request->joinees) : '';
        $event->ended_at = Carbon::parse($request->ended_at);
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
        $event = Event::findOrFail($id);
        $now = Carbon::now('Asia/Manila');
        if($event->status == 'Cancelled' || $event->ended_at < $now){
            abort(404);
        }
        
        $event->status = 'Cancelled';
        $event->save();

        if((count($event->children) > 0)){
            foreach ($event->children as $key => $child) {
                Child::where('id', [$child->id])->increment('credits', 1);
                User::find($child->user->id);
                $name[] = $child->name;
                $credits[] = $child->credits;
                $emails[] = $child->user->email;
            }

            $unique_emails = array_unique($emails);
            foreach ($unique_emails as $key => $unique_email) {
                Mail::to($unique_email)->send(new CancelEvent($name, $credits, $event->title));
            }
            
        }
        
        toastr()->success('Event was cancelled successfully!');
        return redirect('admin/events');
    }

    public function search(Request $request)
    {
        $q_search = request('search');
        $events = Event::where('title', 'like', '%' . $q_search . '%')
        ->orWhere('detail', 'like', '%' . $q_search . '%')
        ->latest()
        ->paginate(10);
        $now = Carbon::now('Asia/Manila');
        return view('admin.client.events.index', compact('events', 'now', 'q_search'));
    }

    public function attend($id)
    {      
        if (!Gate::allows('isClient')) {
            abort(404);
        }
        $event = Event::findOrFail($id);

        if( $event->status == "Cancelled" ) abort(404);
        $user = Auth::user();
        $children = $user->children;
        $joinees = unserialize($event->joinees);
        $joinee = [];
        $child = [];
        if(!empty($joinees)){
            foreach ($joinees as $key => $list) {
                $joinee[] = Child::find($list);
            }
        }
        if(!empty($children)){
            foreach ($children as $key => $kids) {
                $child[] = $kids;
            }
        }
        
        $array = $child;
        if( !empty($joinee) && !empty($child) ) $array = array_intersect($child,$joinee);
        
        $now = Carbon::now('Asia/Manila');
        return view('admin.client.events.attend')->with('event', $event)
                                                ->with('children', $children)
                                                ->with('now', $now)
                                                ->with('joinee', $joinee)
                                                ->with('array', $array);
    }

    public function attendees($id)
    {      
        $now = Carbon::now('Asia/Manila');
        $event = Event::findOrFail($id);
        $children = $event->children;
        $user = Auth::user();
        $joinee = [];
        $joinees = unserialize($event->joinees);
        if(!empty($joinees)){
            foreach ($joinees as $key => $list) {
                $joinee[] = Child::find($list);
            }
        }
        $datetoday = Carbon::parse($now->toDateString()); 
        return view('admin.client.events.attendees')->with('event', $event)
                                                ->with('children', $children)
                                                ->with('now', $now)
                                                ->with('datetoday', $datetoday)
                                                ->with('user', $user)
                                                ->with('joinee', $joinee);
    }

    public function join(Request $request, $event_id, $child_id)
    {     
        if (!Gate::allows('isClient')) {
            abort(404);
        }
        $now = Carbon::now('Asia/Manila');
        $event = Event::findOrFail($event_id);
        if($event->ended_at < $now || $event->attendees()->where('child_id',$child_id)->first() != null){
            abort(404);
        }
        $child = Child::findOrFail($child_id);
        if($child->expiration == NULL ){
            toastr()->error('Your child does not have credits expiration yet, please contact your administrator!');
            return redirect()->back();
        }
        if($child->expiration < $now){
            toastr()->error('Your child\'s credits has expired, please contact your administrator!');
            return redirect()->back();
        }
        if($child->credits <= 0){
            toastr()->error('Insufficient credits!');
            return redirect()->back();
        }
        if($child->events()->where('event_id', $event_id)->exists()){
            $child->events()->update(['attend' => 'Joined']);
        } else {
            $child->events()->attach($event_id,['attend' => 'Joined']);
        }
        $child->decrement('credits', 1);
        $child->save();
        toastr()->success('Your child has joined successfully!');
        return redirect()->back();
    }

    public function cancel(Request $request, $event_id, $child_id)
    {
        $event = Event::findOrFail($event_id);
        //prevent multiple increment when canceling by checking if the child is really one of the joinees
        if (!Gate::allows('isClient') || $event->attendees()->where('child_id',$child_id)->first() == null) {
            abort(404);
        }
        $child = Child::findOrFail($child_id);
        $child->increment('credits', 1);
        $child->save();
        //delete attendee record
        
        $event->attendees()->where('child_id',$child_id)->delete();

        return redirect()->back();
    }

    public function mail($title, $detail, $id, $joinees, $registration_end_date)
    {
        $users = User::all();
        foreach ($users as $key => $user) {
            Mail::to($user->email)->send(new EventMail($title, $detail, $id, $joinees, $registration_end_date));
        }
        
        return 'Email was sent';
    }
}
