<?php
namespace App\Http\Controllers\Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Mail;
use App\Mail\EmailAccount;
use Illuminate\Http\Request;
use Carbon\Carbon;


class RegisterController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $msgs = [
            'other_email.different' => '"Other Email Address" must not be equalt to "Email Address"',
        ];
        
        $this->validate(request(), [
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
            'first_name' => 'required',
            'last_name' => 'required',
            'landline' => 'required',
            'mobile' => 'required',
            'other_email' => 'required|email|different:email',
        ], $msgs);
        
        $client = new User;
        $client->username = $request->username;
        $client->email = $request->email;
        $client->password = Hash::make($request->password);
        $client->first_name = $request->first_name ? $request->first_name : '';
        $client->middle_name = $request->middle_name ? $request->middle_name : '';
        $client->last_name = $request->last_name ? $request->last_name : '';
        $client->landline = $request->landline ? $request->landline : '';
        $client->mobile = $request->mobile ? $request->mobile : '';
        $client->polo_club_id = $request->polo_club_id ? $request->polo_club_id : '';
        $client->expiration = Carbon::now();
        $client->expiration = $client->expiration->addYear(1);
        $client->status = 'Active';
        $client->other_email = $request->other_email;
        Mail::to($client->email)->send(new EmailAccount($request->username, $request->password));
        $client->save();
        
        return redirect()
                ->to('/login')
                ->with(
                    'registration_success',
                    'You have successfully registered. You can now log in and register your child.'
                );
    }
    
}