@extends('backend.layouts.main')
@section('content')
@role('job_seeker')
    @section('title','Job Seeker Dashboard')
@endrole
@role('employeer')
    @section('title','Employeer Dashboard')
@endrole



<div class="container-fluid pt-5" > 
    @role('employeer')
        @php 
            $posts = \App\Models\JobPost::where('employeer_id',session('user_id'))->cursor();
            $totalPost = collect($posts)->count();
            $activePost = collect($posts)->where('end_date','>=', date('Y-m-d'))->count();
            $expriePost = collect($posts)->where('end_date','<=', date('Y-m-d'))->count();
            $totRespondent = \App\Models\JobApplied::where('employeer_id',session('user_id'))->count();


            $jobs = \App\Models\JobApplied::with(['jobPost' => function($query){
                 $query->select('title','job_id');
                },'jobseeker' =>  function($query) {
                     $query->select('jobseeker_id','f_name','l_name','email','mobile');
            }])->where('employeer_id',session('user_id'))->orderBy('applied_date','desc')->cursor();
     
        @endphp
        <div class="row">
        
            <div class="col-xl-3 grid-margin">
                <a href="{{route('postjob.index')}}">
                <div class="card stretch-card mb-3 shadow-sm">
                    <div class="card-body text-center justify-content-between">
                        <h4 class="font-weight-semibold mb-3 text-brown"> <i class="fa fa-users"></i> Total Posted </h4>
                        <h3 class="text-success font-weight-bold">{{$totalPost}}</h3>
                    </div>
                </div>
                </a>
            </div> 
            <div class="col-xl-3 grid-margin">
                <div class="card stretch-card mb-3 shadow-sm">
                    <div class="card-body text-center justify-content-between">
                        <h4 class="font-weight-semibold mb-3 text-brown"> <i class="fa fa-users"></i> Total Active Post </h4>
                        <h3 class="text-success font-weight-bold">{{$activePost}}</h3>
                    </div>
                </div>
            </div> 
            <div class="col-xl-3 grid-margin">
                <div class="card stretch-card mb-3 shadow-sm">
                    <div class="card-body text-center justify-content-between">
                        <h4 class="font-weight-semibold mb-3 text-brown"> <i class="fa fa-users"></i> Total Expired Jobs </h4>
                        <h3 class="text-success font-weight-bold">{{$expriePost}}</h3>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 grid-margin">
                <div class="card stretch-card mb-3 shadow-sm">
                    <a href="{{route('applied_resume')}}">
                    <div class="card-body text-center justify-content-between">
                        <h4 class="font-weight-semibold mb-3 text-brown"> <i class="fa fa-users"></i> Total Respondent </h4>
                        <h3 class="text-success font-weight-bold">{{$totRespondent}}</h3>
                    </div>
                    </a>
                </div>
            </div>
        </div>
         <div class="row">
            <div class="col-md-12 table-responsive">
                <div class="card">
                    <div class="card-header bg-white">Applied Job Resume</div>
                    <div class="card-body">
                        <table class="table table-bordered"  id="myTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Job Title</th>
                                        <th>Jobseeker Name</th>
                                        <th>Jobseeker Email</th>
                                        <th>Jobseeker Mobile</th>
                                        <th>Applied Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $count = 1; @endphp
                                    @foreach($jobs as $job)
                                    <tr>
                                        <td>{{$count++}}</td>
                                        <td>{{$job->jobpost->title}}</td>
                                        <td>{{$job->jobseeker->full_name}}</td>
                                        <td>{{$job->jobseeker->email}}</td>
                                        <td>{{$job->jobseeker->mobile}}</td>
                                        <td>{{date('Y-m-d',strtotime($job->applied_date))}}</td>
                                        <td>
                                            <a title="Applier details Show" href="{{route('applier_profile',$job->jobseeker_id)}}" class="text-primary" ><i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Job Title</th>
                                        <th>Jobseeker Name</th>
                                        <th>Jobseeker Email</th>
                                        <th>Jobseeker Mobile</th>
                                        <th>Applied Date</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table> 
                        
                    </div>
                </div>            
            </div>
        </div>
    @endrole

    @role('super_admin')
        @php
            $employeers = \App\Models\Employeer::all();
            $jobseekers = \App\Models\Jobseeker::orderby('f_name')->count();
            $totalEmployeer = collect($employeers)->count();
            $activeEmployeer = collect($employeers)->where('status','A')->count();
            $pendingEmployeer = collect($employeers)->where('status','P')->count();
            $posts = \App\Models\JobPost::orderby('title')->cursor();
            $totalPost = collect($posts)->count();
            $activePost = collect($posts)->where('end_date','>=', date('Y-m-d'))->where('status','A')->count();
            $expriePost = collect($posts)->where('end_date','<=', date('Y-m-d'))->count();
        @endphp
        <div class="row">
            <div class="col-xl-3 grid-margin">
                <a href="{{route('admin.employeer')}}">
                    <div class="card stretch-card mb-3 shadow-sm">
                        <div class="card-body text-center justify-content-between">
                            <h4 class="font-weight-semibold mb-3 text-brown"> <i class="fa fa-users"></i> Total Employeers </h4>
                            <h3 class="text-success font-weight-bold">{{$totalEmployeer}}</h3>
                            <br>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 grid-margin">
                <a href="{{route('admin.employeer')}}">
                <div class="card stretch-card mb-3 shadow-sm">
                    <div class="card-body text-center justify-content-between">
                        <h4 class="font-weight-semibold mb-3 text-brown"> <i class="fa fa-users"></i> Total Active Employeers </h4>
                        <h3 class="text-success font-weight-bold">{{$activeEmployeer}}</h3>
                        <br>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-xl-3 grid-margin">
                <a href="{{url('admin/employeer/?status=pending')}}">
                <div class="card stretch-card mb-3 shadow-sm">
                    <div class="card-body text-center justify-content-between">
                        <h4 class="font-weight-semibold mb-3 text-brown"> <i class="fa fa-users"></i> Total Pending Employeers </h4>
                        <h3 class="text-success font-weight-bold">{{$pendingEmployeer}}</h3>
                    </div>
                </div>
                </a>
            </div> 
            <div class="col-xl-3 grid-margin">
                <a href="{{route('admin.jobseeker')}}">
                <div class="card stretch-card mb-3 shadow-sm">
                    <div class="card-body text-center justify-content-between">
                        <h4 class="font-weight-semibold mb-3 text-brown"> <i class="fa fa-users"></i> Total Jobseekers </h4>
                        <h3 class="text-success font-weight-bold">{{$jobseekers}}</h3>
                        <br>
                    </div>
                </div>
                </a>
            </div>
        </div>
         <div class="row">
            <div class="col-xl-3 grid-margin">
                <a href="{{route('admin.job_post')}}">
                <div class="card stretch-card mb-3 shadow-sm">
                    <div class="card-body text-center justify-content-between">
                        <h4 class="font-weight-semibold mb-3 text-brown"> <i class="fa fa-users"></i> Total Jobs Posted </h4>
                        <h3 class="text-success font-weight-bold">{{$totalPost}}</h3>
                    </div>
                </div>
                </a>
            </div> 
             <div class="col-xl-3 grid-margin">
                <a href="{{route('admin.job_post')}}">
                <div class="card stretch-card mb-3 shadow-sm">
                    <div class="card-body text-center justify-content-between">
                        <h4 class="font-weight-semibold mb-3 text-brown"> <i class="fa fa-users"></i> Total Active Jobs </h4>
                        <h3 class="text-success font-weight-bold">{{$activePost}}</h3>
                    </div>
                </div>
                </a>                
            </div> 
            <div class="col-xl-3 grid-margin">
                <a href="{{route('admin.job_post')}}">
                <div class="card stretch-card mb-3 shadow-sm">
                    <div class="card-body text-center justify-content-between">
                        <h4 class="font-weight-semibold mb-3 text-brown"> <i class="fa fa-users"></i> Total Expired Jobs </h4>
                        <h3 class="text-success font-weight-bold">{{$expriePost}}</h3>
                    </div>
                </div>
                </a>
            </div>
           
        </div>

    @endrole

    @role('job_seeker')
        @php 
             $jobApplied = \App\Models\JobApplied::where('jobseeker_id',session('user_id'))->count();
        @endphp
        <div class="row">
            <div class="col-xl-3 grid-margin">
                <div class="card stretch-card mb-3 shadow-sm">
                    <div class="card-body text-center justify-content-between">
                        <h4 class="font-weight-semibold mb-3 text-brown"> <i class="fa fa-users"></i> Total Jobs Applied </h4>
                        <h3 class="text-success font-weight-bold">{{$jobApplied}}</h3>
                    </div>
                </div>
            </div>
        </div> 
    @endrole
</div>

<script>
    $(document).ready(function(){
        $('#myTable').DataTable();
    });
</script>
@endsection
    