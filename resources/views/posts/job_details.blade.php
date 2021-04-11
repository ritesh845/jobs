@extends('layouts.main')
@section('content')
<div class="job-post-company p-2">
    <div class="container">
        <div class="row justify-content-between">
            <!-- Left Content -->
            
            <div class="col-xl-7 col-lg-8">
              @if($message = Session::get('success'))
                <div class="alert alert-success">
                    <span>{{$message}}</span>
                </div> 
              @endif
              @if($message = Session::get('error'))
                <div class="alert alert-danger">
                    <span>{{$message}}</span>
                </div> 
              @endif
                <!-- job single -->
              @include('layouts.postList',['post' => $post ])
                  <!-- job single End -->
               
                <div class="job-post-details mt-4">
                    <div class="post-details1 mb-50">
                        <!-- Small Section Tittle -->
                        <div class="small-section-tittle">
                            <h4>Job Description</h4>
                        </div>
                        {!! $post->description !!}
                    </div>
                    
                </div>



            </div>
            <!-- Right Content -->
            <div class="col-xl-4 col-lg-4">
                <div class="post-details3  mb-50">
                    <!-- Small Section Tittle -->
                   <div class="small-section-tittle">
                       <h4>Job Overview</h4>
                   </div>
                  <ul>
                      <li>Posted date : <span>{{date('d M Y', strtotime($post->start_date))}}</span></li>
                      <li>Location : <span>{{$post->city !=null ? $post->city->city_name : '' }}</span></li>
                      <li>Vacancy : <span>{{$post->no_of_job}}</span></li>
                      <li>Job nature : <span>{{Arr::get(JOB_TYPE,$post->job_type)}}</span></li>
                      <li>Salary :  <span><i class="fa fa-rupee"></i> {{(int)$post->salary_min}}</span></li>
                      {{-- <li>Application date : <span>12 Sep 2020</span></li> --}}
                  </ul>
                 <div class="apply-btn2">
                    @guest
                      <a href="{{url('register')}}/?type=post_resume" class="btn btn-sm pl-3 pr-3 mb-2">Register To Apply</a>
                      <a href="javascript:void(0)" class="btn pl-3 pr-3" id="loginBtn">Login To Apply</a>
                    @else

                      @role('job_seeker')
                      <form action="{{route('apply_job')}}" method="post">
                          @csrf
                          <input type="hidden" name="job_id" value="{{$post->job_id}}" >
                          <input type="hidden" name="employeerUserId" value="{{$post->employeer->user_id}}" >
                          <input type="hidden" name="title" value="{{$post->title}}" >
                          <input type="hidden" name="employeer_id" value="{{$post->employeer_id}}" >

                          <button class="btn pl-3 pr-3">Apply</button>
                      </form>
                      @endrole
                    @endguest
                 </div>
               </div>
                <div class="post-details4  mb-50">
                    <!-- Small Section Tittle -->
                   <div class="small-section-tittle">
                       <h4>Company Information</h4>
                   </div>
                      <span><a href="" class="text-primary">{{$post->employeer->comp_name}}</a></span>
                      <p>{!! Str::limit($post->employeer->description, 130, $end='...') !!}</p>
                    <ul>
                        <li>Name: <span>{{$post->employeer->comp_name}} </span></li>
                        <li>Web : <span> {{$post->employeer->comp_url}} </span></li>
                        <li>Email: <span>{{$post->employeer->email}} </span></li>
                    </ul>
               </div>
            </div>
        </div>
    </div>
</div>
@include('models.loginModal')
<script >
  $(document).ready(function(){
      $('#loginBtn').on('click',function(e){
          e.preventDefault();

          $('.login_modal').modal('show');
      });

  });
</script>
@endsection