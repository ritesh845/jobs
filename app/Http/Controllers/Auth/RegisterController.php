<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\UserType;
use App\Models\Role;
use App\Models\State;
use App\Models\Employeer;
use App\Models\Jobseeker;
use App\Models\JobSeekerQualification;
use App\Models\JobSeekerExperience;
use App\Models\JobSeekerSkill;


use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Str;
use App\Mail\VerifyMail;
use Mail;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    public function showRegistrationForm()
    {
        $status= false;
        if(request('type') !=''){
            if(request('type') === 'post_resume' || request('type') === 'post_job' ){
                $status = true;
                $role_type = request('type');
            }
        }

        if($status){
            
            $role_id = request('type') == 'post_job' ? '3' : '2';
            $userTypes = UserType::where('role_id',$role_id)->orderBy('user_type_name')->get();
            $states  = State::where('country_code',102)->orderBy('state_name')->get();
            $roles = Role::where('id', '!=', '1')->get();
            return view('auth.register',compact('roles','states','role_type','userTypes'));
        }else{
            return view('errors.notfound');
        }

        
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        // return $request->all();
        // return $this->create($request->all());
        event(new Registered($user = $this->create($request->all())));

        return $this->registered($request, $user)
                        ?: redirect('/login')->with('success','We sent activation link, Check your email and click on the link to verify your email');

        // $this->guard()->login($user);

        // if ($response = $this->registered($request, $user)) {
        //     return $response;
        // }

        // return $request->wantsJson()
        //             ? new JsonResponse([], 201)
        //             : redirect($this->redirectPath());
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            // 'username'  => ['required', 'string', 'max:50','unique:users'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'  => ['required', 'string', 'min:8'],
            'user_type' => ['required','not_in:""'],
            'f_name'    => ['required','max:110'],
            'l_name'    => ['required','max:110'],
            'mobile'    => ['required','min:10','max:11'],            
            'address_line1' => ['required','min:3','max:190'],
            'address_line2' => ['nullable','min:3','max:190'],
            'country_code'  => ['required','not_in:""'],
            'state_code'    => ['required','not_in:""'],
            'city_code'     => ['required','not_in:""'],
            'pin_code'      => ['required','min:6','max:7'],
            'iap_no'        => ['required']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $role_id = $data['role_type'] === 'post_job' ? '3' : '2';
        $user = User::create([
            'name'     => $data['f_name'].' '.$data['l_name'],
            'email'    => $data['email'],
            'mobile'   => $data['mobile'],
            'password' => Hash::make($data['password']),
            'role_id'  => $role_id,
            'status'   => 'P',
            'remember_token'=> Str::random(40),
        ]);
       $user->attachRole($role_id);

        $regData = [
            'user_id'   => $user->id,
            'user_type' => $data['user_type'],
            'f_name'    => $data['f_name'],
            'l_name'    => $data['l_name'],
            'email'     => $data['email'],
            'mobile'    => $data['mobile'],
            'address_line1' => $data['address_line1'],
            'address_line2' => $data['address_line2'],
            'country_code'  => $data['country_code'],
            'state_code'    => $data['state_code'],
            'city_code'     => $data['city_code'],
            'pin_code'      => $data['pin_code'],
            'status'        => 'P',
        ];

        if($data['role_type'] == 'post_job'){
            $regData['comp_name'] = $data['comp_name'];
            $regData['designation'] = $data['designation'];
            $regData['comp_url'] = $data['comp_url'];
           Employeer::create($regData);
        }else{
            $regData['iap_no'] = $data['iap_no'];
            if($data['resume'] !=''){
                $regData['resume'] = file_upload($data['resume'],'resume');
            }

            $jobseeker_id = Jobseeker::create($regData)->jobseeker_id;
            $genData = [ //blankrow generete data with jobseeker id
                'jobseeker_id'   => $jobseeker_id,
            ];
            JobSeekerQualification::insert($genData);   

            JobSeekerExperience::insert($genData);
            JobSeekerSkill::insert($genData);
        }
        Mail::to($user->email)->send(new VerifyMail($user));

        return $user;
    }
}
