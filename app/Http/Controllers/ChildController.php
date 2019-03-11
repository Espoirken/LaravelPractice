<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Child;
use Gate;

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

        $children = Child::all();
        return view('admin.client.children.index')->with('children', $children);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $child->condition = $request->condition;
        $child->save();
        return redirect('/admin/children');
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
        return redirect('admin/children');
    }
}
