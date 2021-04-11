<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employeer;
use App\Models\Jobseeker;
use Session;
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

    public function login(Request $request)
    {
        $this->validateLogin($request);

        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }
        if($this->guard()->validate($this->credentials($request))){
            $user = $this->guard()->getLastAttempted();

            if($user->email_verified_at !=null && $this->attemptLogin($request)) {
                if($user->hasRole('employeer')){
                   $employeer =  Employeer::firstWhere('user_id',$user->id);
                   $user_id =  $employeer->employeer_id;
                   $status = $employeer->status;
                }elseif($user->hasRole('job_seeker')){
                   $user_id =  Jobseeker::firstWhere('user_id',$user->id)->jobseeker_id; 
                   $status = 'A';
                }else{
                   $user_id = $user->id; 
                   $status = 'A';
                }
                Session::put('user_id',$user_id);
                Session::put('status',$status);
                return $this->sendLoginResponse($request);                
            }else{

              $this->incrementLoginAttempts($request);
              //$user->code = SendCode::sendCode($user->phone);
              if($user->save()){
                 return redirect()->back()->with('warning','Your account is not active. We already sent activation link, Check your email and click on the link to verify your email');
              }
            }

        }

        
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }
    
    protected function authenticated(Request $request, $user)
    {
        $url =  $this->redirectTo = url()->previous();
        $homeUrl =url('/').'/';   

        if($url == $homeUrl){
          return redirect()->intended($this->redirectPath());
        }
        else{
          return redirect()->intended($url);
        }
     }
}
