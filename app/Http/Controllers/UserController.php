<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Child;
use Carbon\Carbon;

class UserController extends Controller
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
        $users = Auth::user();
        return view('admin.client.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('admin.client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'name' => 'required',
        //     'birthdate' => 'required',
        //     'level' => 'required',
        //     'batting' => 'required',
        //     'throwing_hand' => 'required',
        //     'condition' => 'required',
        // ]);
        // $users = new Child;
        // // dd($request->expiration);
        // $users->name = $request->name;
        // $users->birthdate = $request->birthdate;
        // $users->level = $request->level;
        // $users->batting = $request->batting;
        // $users->throwing_hand = $request->throwing_hand;
        // $users->expiration = Carbon::parse($request->expiration);
        // $users->special_medical_condition = $request->condition;
        // $users->save();
        // toastr()->success('Child was created successfully!');
        // return redirect('admin/children');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
