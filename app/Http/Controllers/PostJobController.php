<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobRoles;
use App\Models\SkillMast;
use App\Models\JobPost;
use App\Models\JobSkills;
use App\Models\State;
use Auth;
use App\Models\Employeer;
use App\Models\JobApplied;
use App\Models\Jobseeker;
use App\Models\User;
use App\Models\City;
use App\Notifications\Notifications;

use Session;
class PostJobController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $jobPosts = JobPost::where('employeer_id',Session('user_id'))->orderBy('created_at','desc')->get();
        return view('backend.postjob.index',compact('jobPosts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $jobRoles = JobRoles::orderBy('job_role_name')->get();
        $skills = SkillMast::orderBy('skill_name')->get();
         $states  = State::where('country_code',102)->orderBy('state_name')->get();
         return view('backend.postjob.create',compact('jobRoles','skills','states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validation($request);

       return redirect()->route('postjob.index')->with('success', "Job Created successfully");
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
        $jobRoles = JobRoles::orderBy('job_role_name')->get();
        $skills = SkillMast::orderBy('skill_name')->get();
        $jobPost = JobPost::find($id);
        $states  = State::where('country_code',102)->orderBy('state_name')->get();
        return view('backend.postjob.edit',compact('jobRoles','skills','jobPost','states'));
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
        $this->validation($request,$id);
        return redirect()->route('postjob.index')->with('success', "Job Updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function validation($request,$job_id = null){
       
        $data = [
            'employeer_id'=> Session('user_id'),
            'title'       => $request->post_title,
            'job_role_id' => $request->job_role_id,
            'no_of_job'   => $request->no_of_job,
            'start_date'  => $request->start_date,
            'end_date'    => $request->end_date,
            'salary_type' => $request->salary_type,
            'salary_min'  => $request->salary_min,
            'salary_max'  => $request->salary_max,
            'exp_min'     => $request->exp_min,
            'exp_max'     => $request->exp_max,
            'description' => $request->description,
            'state_code'  => $request->state_code,
            'city_code'   => $request->city_code,
        ];

        $data['job_type'] = $request->job_type;
        if(session('status') == 'A'){
            $data['status'] = 'A';
        }
        
        if($job_id !=null){
            JobPost::find($job_id)->update($data);
            JobSkills::where('job_id',$job_id)->delete();
        }else{
            $job_id = JobPost::create($data)->job_id;
        }
 
        foreach ($request->job_skill as $key =>  $job_skill) {
            $skill = [
                'job_id'     => $job_id, 
                'skill_id'   => $job_skill,
                'skill_name' => SkillMast::find($job_skill)->skill_name,
            ];
            JobSkills::insert($skill);
        }
    }

    public function apply_job(Request $request){
        $job_id = $request->job_id;
        $jobseeker = Jobseeker::firstWhere('user_id',Auth::user()->id);
        
        $jobapplied =  JobApplied::firstWhere(['job_id' => $job_id,'jobseeker_id' => $jobseeker->jobseeker_id]);
        $jobPost = JobPost::find($job_id);


        if(empty($jobapplied)){                    
            $data = [
                'job_id'        => $job_id,
                'jobseeker_id'  => $jobseeker->jobseeker_id,
                'employeer_id'  => $request->employeer_id
            ];


            $user = User::find($request->employeerUserId);

            $notify = [
                'id'        => $job_id,
                'title'     => 'Job Applied by '. $jobseeker->full_name,
                'message'   =>  $request->title.' job applied.',
                'url'       => '/applier_profile/'.$jobseeker->jobseeker_id

            ];

            $user->notify(new Notifications($notify));
            JobApplied::insert($data);

            $jobPost->increment('tot_response',1);
            return redirect()->back()->with('success','Job Applied successfully.');
        }else{
            return redirect()->back()->with("error",'You have already applied this job.');
        }
    }

    public function applied_resume(){
        $jobs = JobApplied::with(['jobPost' => function($query){
            $query->select('title','job_id');
        },'jobseeker' =>  function($query) {
             $query->select('jobseeker_id','f_name','l_name','email','mobile');
        }])->where('employeer_id',session('user_id'))->orderBy('applied_date','desc')->cursor();
 
        return view('backend.postjob.applied_resume',compact('jobs'));
    }

    public function applied_job(){
        $jobs = JobApplied::with(['jobPost' => function($query){
            $query->select('title','job_id');
        }])->where('jobseeker_id',session('user_id'))->orderBy('applied_date','desc')->cursor();
 
        return view('backend.postjob.applied_job',compact('jobs'));
    }



    public function applier_profile($id){

        $jobseeker = Jobseeker::firstWhere('jobseeker_id',$id);
        return view('jobseeker.profile',compact('jobseeker'));
    }

    public function searchResumeIndex(){
        $cities =  City::has('posts')->orderBy('city_code')->cursor();
        return view('backend.search_resume.index',compact('cities'));
    }
    
}
