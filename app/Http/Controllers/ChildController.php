<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Child;
use Gate;
use Carbon\Carbon;

class ChildController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (!Gate::allows('isClient')) {
            abort(404);
        }

        $children = Child::paginate(10);
        return view('admin.client.children.index')->with('children', $children);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.client.children.create');
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
            'name' => 'required',
            'birthdate' => 'required',
            'level' => 'required',
            'batting' => 'required',
            'throwing_hand' => 'required',
            'condition' => 'required',
        ]);
        $child = new Child;
        $child->name = $request->name;
        $child->birthdate = $request->birthdate;
        $child->level = $request->level;
        $child->batting = $request->batting;
        $child->throwing_hand = $request->throwing_hand;
        $child->expiration = Carbon::parse($request->expiration);
        $child->special_medical_condition = $request->condition;
        $child->status = 'Active';
        $child->save();
        toastr()->success('Child was created successfully!');
        return redirect('admin/children');
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
        $child = Child::find($id);
        return view('admin.client.children.edit')->with('child', $child);
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
            'name' => 'required',
            'birthdate' => "required",
            'level' => 'required',
            'batting' => 'required',
            'throwing_hand' => 'required',
            'condition' => 'required',
        ]);
        $child = Child::find($id);
        $child->name = $request->name;
        $child->birthdate = $request->birthdate;
        $child->level = $request->level;
        $child->batting = $request->batting;
        $child->throwing_hand = $request->throwing_hand;
        $child->special_medical_condition = $request->condition;
        $child->status = 'Active';
        $child->save();
        toastr()->success('Child was updated successfully!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Child::find($id);
        $user->delete();
        toastr()->success('Child was deleted successfully!');
        return redirect('admin/children');
    }
    
    public function search(Request $request)
    {       
        $children = Child::where('name', 'like', '%' . request('search') . '%')
        ->orWhere('credits', 'like', '%' . request('search') . '%')
        ->orWhere('expiration', 'like', '%' . request('search') . '%')
        ->orWhere('level', 'like', '%' . request('search') . '%')
        ->orWhere('batting', 'like', '%' . request('search') . '%')
        ->orWhere('throwing_hand', 'like', '%' . request('search') . '%')
        ->orWhere('special_medical_condition', 'like', '%' . request('search') . '%')
        ->paginate(10);
        return view('admin.client.children.index')->with('children', $children);
    }
}
