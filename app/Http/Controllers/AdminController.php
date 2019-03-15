<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;
use Gate;
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
        $user = Auth::user();
        $admins = User::where('roles', 'Admin')->orWhere('roles', 'Coach')->where('id', '!=', $user->id)->paginate(10);
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
        $client->roles = $request->roles;
        $client->status = 'Active';
        $client->save();
        toastr()->success('User was created successfully!');
        return redirect('admin/list');
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
        $admin = User::findOrFail($id);
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
        if (!Gate::allows('isAdmin')) {
            abort(404);
        }
        $this->validate($request, [
            'username' => 'required',
            'email' => "email|unique:users,email,$id",
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'landline' => 'required',
            'mobile' => 'required',
            'status' => 'required',
        ]);
        $client = User::findOrFail($id);
        $client->username = $request->username;
        $client->email = $request->email;
        if(!empty($request->password)){
            $client->password = Hash::make($request->password);
        }
        $client->first_name = $request->first_name;
        $client->middle_name = $request->middle_name;
        $client->last_name = $request->last_name;
        $client->landline = $request->landline;
        $client->mobile = $request->mobile;
        $client->roles = $request->roles;
        $client->status = $request->status;
        $client->save();
        toastr()->success('User was updated successfully!');
        return redirect('admin/list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        toastr()->success('User was deleted successfully!');
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
