<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Gate;
use Hash;
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
        if (Gate::allows('isAdmin')||Gate::allows('isCoach')) {
            $clients = User::where('roles', 'Client')->paginate(10);
            return view('admin.client.index')->with('clients', $clients);
        }
        abort(404);
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
        return view('admin.client.create');
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
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'landline' => 'required',
            'mobile' => 'required',
            'expiration' => 'required',
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
        $client->polo_club_id = $request->polo_club_id;
        $client->expiration = Carbon::parse($request->expiration);
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
        if (Gate::allows('isAdmin')||Gate::allows('isCoach')) {
            $users = User::findOrFail($id);
            return view('admin.client.show')->with('users', $users);
        }
        abort(404);
        
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
        $client = User::findOrFail($id);
        return view('admin.client.edit')->with('client', $client);
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
            'expiration' => 'required',
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
        $client->polo_club_id = $request->polo_club_id;
        $client->expiration = Carbon::parse($client->expiration);
        $client->status = $request->status;;
        $client->save();
        toastr()->success('Client was updated successfully!');
        return redirect('admin/clients');
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
        $client = User::findOrFail($id);
        $client->delete();
        toastr()->success('Client was deleted successfully!');
        return redirect('admin/clients');
    }

    public function view($id)
    {
        $client = User::findOrFail($id);
        return view('admin.client.client_detail')->with('client', $client);
    }

    public function detail()
    {
        $users = Auth::user();
        $birthdate = Carbon::parse($users->birthdate);
        return view('admin.detail')->with('users', $users)
                                    ->with('birthdate', $birthdate);
    }
    
    public function search(Request $request)
    {       
        if (!Gate::allows('isAdmin')) {
            abort(404);
        }
        $clients = User::where('username', 'like', '%' . request('search') . '%')
        ->orWhere('first_name', 'like', '%' . request('search') . '%')
        ->orWhere('middle_name', 'like', '%' . request('search') . '%')
        ->orWhere('last_name', 'like', '%' . request('search') . '%')
        ->orWhere('email', 'like', '%' . request('search') . '%')
        ->orWhere('status', 'like', '%' . request('search') . '%')
        ->paginate(10);
        return view('admin.client.index')->with('clients', $clients);
    }

    public function edit_profile($id)
    {
        $users = Auth::user();
        $birthdate = Carbon::parse($users->birthdate);
        return view('admin.edit_profile')->with('users', $users)
                                        ->with('birthdate', $birthdate);
    }

    public function update_profile(Request $request, $id)
    {
        $this->validate($request, [
            'username' => 'required',
            'email' => "email|unique:users,email,$id",
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'birthdate' => 'required',
            'landline' => 'required',
            'mobile' => 'required',
        ]);
        $users = User::findOrFail($id);
        $users->username = $request->username;
        if(!empty($request->password)){
            $users->password = Hash::make($request->password);
        }
        $users->first_name = $request->first_name;
        $users->middle_name = $request->middle_name;
        $users->last_name = $request->last_name;
        $users->landline = $request->landline;
        $users->birthdate = $request->birthdate;
        $users->mobile = $request->mobile;
        $users->email = $request->email;
        $users->save();
        toastr()->success('Account was updated successfully!');
        return redirect()->back();
    }
}
