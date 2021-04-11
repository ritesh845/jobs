@extends('layouts.main')
@section('content')
<section class="featured-job-area">
  <div class="container">
        <!-- Section Tittle -->
        <div class="row">
            <div class="col-lg-12 mb-3">
                <div class="section-tittle text-center mb-2">
                    <h4>Latest Jobs</h4>
                    <hr>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach($posts as $post)
                  <div class="col-xl-6 shadow-sm" >
                    <a href="{{route('job_details',$post->job_id)}}">
                        @include('layouts.postList',['post' => $post ])
                    </a>
                </div>
            @endforeach
             
        </div>
  </div>
</section>
<hr>
<div class="section">
  <div class="container"> 
    <!-- title start -->
    <div class="titleTop">
      <div class="subtitle">Here You Can See</div>
      <h3>Popular <span>Searches</span></h3>
    </div>
    <!-- title end -->
    <div class="topsearchwrap row">
      <div class="col-md-6"> 
        <!--Categories start-->
        <h4>Browse By Categories</h4>
        <ul class="row catelist">
          @foreach($skills as $skill)
            <li class="col-md-6 col-sm-6"><a href="#.">{{$skill->skill_name}} <span>({{collect($skill->posts)->where('status','A')->count()}})</span></a></li>
          @endforeach
        </ul>
        <!--Categories end--> 
      </div>
      <div class="col-md-6"> 
        <!--Cities start-->
        <h5>Browse By Cities</h5>
        <ul class="row catelist">
          @foreach($cities as $city)
            <li class="col-md-6 col-sm-6 col-xs-6"><a href="#.">{{$city->city_name}} <span>({{collect($city->posts)->where('status','A')->count()}})</span></a></li>
          @endforeach
         
        </ul>
        <!--Cities end--> 
      </div>
    </div>
  </div>
</div>

@endsection