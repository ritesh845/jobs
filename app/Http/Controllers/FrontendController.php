<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserType;
use App\Models\City;
use App\Models\JobPost;
use App\Models\JobSkills;
use App\Models\SkillMast;
use App\Models\State;
use App\Models\JobApplied;

class FrontendController extends Controller
{
    public function get_user_type($id)
    {
        $userTypes = UserType::where('role_id',$id)->orderBy('user_type_name')->get();
        return $userTypes;
    }
    public function get_cities($id)
    {
        $cities = City::where('state_code',$id)->orderBy('city_name')->get();
        return $cities;
    }

    public function job_details($id){
        $post = JobPost::find($id);
        if(!empty($post)){
            
            return view('posts.job_details',compact('post'));
        }else{
            abort(404);
        }
    }
    public function find_jobs(){
        $posts = JobPost::has('employeer')->select('job_id','title','job_type','salary_min','salary_max','exp_min','exp_max','employeer_id','negotiable','start_date','city_code','state_code','created_at')->where('end_date','>=', date('Y-m-d'))->where('status','A')->orderBy('created_at','desc')->paginate(5);

        $skills = SkillMast::orderBy('skill_name')->cursor();
        $states = State::orderBy('state_name')->cursor();
        $filter = 'no';

        return view('posts.find_jobs',compact('posts','skills','states','filter'));
      
    }

    public function filterJobs(){
        $posts = JobPost::has('employeer')->select('job_id','title','job_type','salary_min','salary_max','exp_min','exp_max','employeer_id','negotiable','start_date','city_code','state_code','created_at')->where('status','A');
        if(request()->skill_id !=null){
            $job_id =  JobSkills::where('skill_id',request()->skill_id)->pluck('job_id');
            if(count($job_id) !=0){
                $posts->whereIn('job_id',$job_id);

            }
        }
        $job_types = explode(',', request()->job_type);
        //$experiences =  request()->experiences !='' ?  explode(',', request()->experiences) : [];

        if(count($job_types) !=0){
            $posts->whereIn('job_type',$job_types);
        }
        if(request()->city_code !='null' && request()->city_code !=''  ){
            $posts->where('city_code',request()->city_code);
        }

        $experiences = explode(',', request()->experiences);
        $exp_min = $experiences[0];
        $exp_max = $experiences[1];

        

        // return $posts->get();

        $posts = $posts->where('end_date','>=', date('Y-m-d'))->orderBy('created_at','desc')->paginate(3);
        return view('posts.jobPostList',compact('posts'));
    }
}
