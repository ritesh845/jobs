<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employeer;
use App\Models\JobPost;

use App\Models\Jobseeker;
class AdminController extends Controller
{
    
	public function get_employeer(){
		if(isset(request()->status)){
			request('status') == 'pending' ? ($status = 'P') : abort(404);
		}else{
			$status = 'A';
		}
		$employeers = Employeer::where('status',$status)->orderBy('created_at','desc')->cursor();
		return view('backend.admin.employeer.index',compact('employeers','status'));
	}

	public function employeer_active($id){

		$employeer = Employeer::find($id);
		if(!empty($employeer)){
			$employeer->update(['status' => 'A']);

			$posts  = JobPost::where('end_date','>=', date('Y-m-d'))->where(['status' => 'P', 'employeer_id' => $id])->update(['status' => 'A']);

			// return $posts;
			// foreach ($variable as $key => $value) {
					
			// }


		}else{
			abort(404);
		}

		return redirect('admin/employeer?status=pending')->with('success','Member Activated Successfully');
	}


	public function get_jobseeker(){
		 $jobseekers = JobSeeker::orderBy('f_name','asc')->cursor();
		 return view('backend.admin.jobseeker.index',compact('jobseekers'));
	}

	public function get_jobPosts(){
		$jobPosts = JobPost::orderBy('created_at','desc')->cursor();
		return view('backend.admin.posts.index',compact('jobPosts'));
	}

}
