<?php

namespace App\Http\Controllers\Auth;


use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //Google Login
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    //Google Callback
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        $this->_registerOrLoginUser($user);

        // Return Home After Login
        return redirect()->route('home');
    }

    //Facebook Login
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    //Facebook Callback
    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();

        $this->_registerOrLoginUser($user);

        // Return Home After Login
        return redirect()->route('home');
    }

    //Github Login
    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    //Github Callback
    public function handleGithubCallback()
    {
        try{
            $user = Socialite::driver('github')->user();

            $this->_registerOrLoginUser($user);

            // Return Home After Login
            return redirect()->route('home');
        }
        catch(\Exception $e){
            return redirect('/login');
        };


    }
    //Azure Login
    public function redirectToAzure()
    {
        return Socialite::driver('azure')->redirect();
    }

    //Azure Callback
    public function handleAzureCallback()
    {
        $user = Socialite::driver('azure')->user();

        $this->_registerOrLoginUser($user);

        // Return Home After Login
        return redirect()->route('home');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email'    => 'required|string',
            'password' => 'required|string',
        ]);

        $username = $request->email;
        $password = $request->password;

        $dt         = Carbon::now();
        $todayDate  = $dt->toDayDateTimeString();

        if (Auth::attempt(['email'=> $username,'password'=> $password,'status'=>'Active'])) {
            /** get session */
            $user = Auth::User();
            Session::put('name', $user->name);
            Session::put('email', $user->email);
            Session::put('status', $user->status);
            Session::put('avatar', $user->avatar);

            $activityLog = ['name'=> Session::get('name'),'email'=> $username,'description' => 'Has log in','date_time'=> $todayDate,];
            DB::table('activity_logs')->insert($activityLog);

           // Toastr::success('Login successfully :)','Success');
            return redirect()->intended('home');
        } else {
           // Toastr::error('fail, WRONG USERNAME OR PASSWORD :)','Error');
            return redirect('login');
        }
    }

    protected function _registerOrLoginUser($data){
        $user = User::where('email','=', $data->email)->first();
        if(!$user){
            $user = new User();

            $user->name=$data->name;
            $user->email=$data->email;
            $user->provider_ID=$data->id;
            $user->avatar=$data->avatar;
            $user->save();

        }
        Auth::login($user);

    }


}
