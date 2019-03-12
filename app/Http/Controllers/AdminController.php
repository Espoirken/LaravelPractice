<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use Carbon\Carbon;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = User::all()->where('roles', 'Admin');
        return view('admin.index')->with('admins', $admins);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
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
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'landline' => 'required',
            'mobile' => 'required',
            'status' => 'required',
        ]);
        $client = new User;
        $client->username = $request->username;
        $client->email = $request->email;
        $client->password = Hash::make($request->password);
        $client->first_name = $request->first_name;
        $client->middle_name = $request->middle_name;
        $client->last_name = $request->last_name;
        $client->landline = $request->landline;
        $client->mobile = $request->mobile;
        $client->expiration = Carbon::createFromFormat('Y/m/d', '9999/99/99')->timestamp;
        $client->status = 'Active';
        $client->save();
        toastr()->success('Client was created successfully!');
        return redirect('admin/clients');
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
        $admin = User::find($id);
        return view('admin.edit')->with('admin', $admin);
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
        $user = User::find($id);
        $user->delete();
        toastr()->success('Admin was deleted successfully!');
        return redirect('admin/list');
    }

    public function search(Request $request)
    {       
        //bug
        $user = User::where('roles', 'Admin');
        $admins = $user->where('username', 'like', '%' . request('search') . '%')
        ->orWhere('first_name', 'like', '%' . request('search') . '%')
        ->orWhere('middle_name', 'like', '%' . request('search') . '%')
        ->orWhere('last_name', 'like', '%' . request('search') . '%')
        ->orWhere('email', 'like', '%' . request('search') . '%')
        ->orWhere('status', 'like', '%' . request('search') . '%')
        ->paginate(10);
        return view('admin.index')->with('admins', $admins);
    }
}
