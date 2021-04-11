<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employeer;
use App\Models\Jobseeker;
use App\Models\JobSeekerQualification;
use App\Models\JobSeekerExperience;
use App\Models\JobSeekerSkill;

use App\Models\QualCatgMast;
use App\Models\QualMast;
use App\Models\State;
use App\Models\UserType;

use App\Models\SkillMast;
use App\Models\JobPost;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
     
        return view('home');
    }  

    public function employeer_profile($id){
        $employeer = Employeer::where('user_id',$id)->first();
        // return $employeer->usertype;
        $states  = State::where('country_code',102)->orderBy('state_name')->get();
        $userTypes = UserType::where('role_id',3)->orderBy('user_type_name')->get();
        return view('employeer.profile',compact('employeer','states','userTypes'));
    }

    public function employeer_profile_update(Request $request){
        $data = [
            'user_type'     => $request->user_type,
            'f_name'        => $request->f_name,
            'l_name'        => $request->l_name,
            'mobile'        => $request->mobile,
            'address_line1' => $request->address_line1,
            'address_line2' => $request->address_line2,
            'country_code'  => $request->country_code,
            'state_code'    => $request->state_code,
            'city_code'     => $request->city_code,
            'pin_code'      => $request->pin_code,
            'description'   => $request->description
        ];
        $employeer = Employeer::find($request->employeer_id);
        // dd($request->photo);
        if($request->hasFile('photo')){
            $data['photo'] = file_upload($request->photo,'photo');
        }
        // return $data;

       return $employeer->update($data);
        // dd($request->all());
    }


    public function jobseeker_profile($id){
        $jobseeker = Jobseeker::where('user_id',$id)->first();      
        return view('jobseeker.profile',compact('jobseeker'));
    }

    public function jobseeker_editProfile($id){
        $skills = SkillMast::orderBy('skill_name')->get();
        $jobseeker = Jobseeker::find($id);
      
        $quals = QualCatgMast::orderBy('qual_catg_code')->get();
        $states  = State::where('country_code',102)->orderBy('state_name')->get();
        $userTypes = UserType::where('role_id',2)->orderBy('user_type_name')->get();
        return view('jobseeker.editProfile',compact('jobseeker','states','userTypes','quals','skills'));
    }


    public function jobseeker_profile_update(Request $request){
        // return $request->all();
        $data = [
            'f_name'        => $request->f_name,
            'l_name'        => $request->l_name,
            'mobile'        => $request->mobile,
            'address_line1' => $request->address_line1,
            'address_line2' => $request->address_line2,
            'country_code'  => $request->country_code,
            'state_code'    => $request->state_code,
            'city_code'     => $request->city_code,
            'pin_code'      => $request->pin_code,
            'description'   => $request->description,
            'experienced'   => $request->experienced
        ];

        $jobseeker_id = $request->jobseeker_id;
        $jobseeker = Jobseeker::find($jobseeker_id);

        if($request->hasFile('photo')){
            $data['photo'] = file_upload($request->photo,'photo',$jobseeker,'photo');
        }

        if($request->hasFile('resume')){
            $data['resume'] = file_upload($request->resume,'resume',$jobseeker,'resume');
        }

        $jobseeker->update($data);


        JobSeekerQualification::where('jobseeker_id',$jobseeker_id)->delete();
        JobSeekerExperience::where('jobseeker_id',$jobseeker_id)->delete();

        foreach ($request->qual_catg_code as $qkey => $qual_catg_code) {
            if($qual_catg_code !=''){
                $qual = [
                    'jobseeker_id'   => $jobseeker_id,
                    'qual_catg_code' => $qual_catg_code,
                    'qual_catg_desc' => QualCatgMast::find($qual_catg_code)->qual_catg_desc,
                    'qual_name'      => QualMast::find($request->qual_code[$qkey])->qual_name,
                    'qual_code'      => $request->qual_code[$qkey],
                    'board'          => $request->board[$qkey],
                    'year'           => $request->year[$qkey],
                    'percent'        => $request->percent[$qkey]
                ];
                // return $qual;
                JobSeekerQualification::insert($qual);
            }
        }   

        foreach ($request->company as $ckey => $company) {
            $expData = [
                'jobseeker_id'  => $jobseeker_id,
                'company'       => $company,
                'designation'   => $request->designation[$ckey],
                'start_date'    => $request->from[$ckey],
                'end_date'      => $request->to[$ckey]
            ];
            JobSeekerExperience::insert($expData);
        }

        if(isset($request->job_skill)){
            JobSeekerSkill::where('jobseeker_id',$jobseeker_id)->delete();

            foreach ($request->job_skill as $skill) {
                $skill = [
                    'jobseeker_id' => $jobseeker_id,
                    'skill_name' => SkillMast::find($skill)->skill_name,
                    'skill_id'  => $skill
                ];
                JobSeekerSkill::insert($skill);
            }
        }

        return redirect()->route('jobseeker.profile',$jobseeker->user_id)->with('success','Profile Updated Successfully.');
        // dd($request->all());
    }

    public function get_qualification($qual_catg_code){
        return QualMast::where('qual_catg_code',$qual_catg_code)->get();
    }

    // public function employeerProfileEdit($id){
    //     $employeer = Employeer::where('user_id',$id)->first();
    //     return view('employeer.profile',compact('employeer'));
    // }
   
    public function notification_read($id,$id1 = null){
      // return $id1;
      $notification = auth()->user()->unreadNotifications->where('id',$id)->first();
       $notification->markAsRead();
       if($id1 !=null){
        return 'success';
       }

       return redirect($notification->data['url']);
    }


}
