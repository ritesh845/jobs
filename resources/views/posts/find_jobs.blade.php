@extends('layouts.main')
@section('content')

<div class="job-listing-area p-2">
    <div class="container">
        <div class="row">
            <!-- Left content -->
            <div class="col-xl-3 col-lg-3 col-md-4">
                <div class="row">
                    <div class="col-12">
                            <div class="small-section-tittle2 mb-45">
                            <div class="ion"> <svg 
                                xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="20px" height="12px">
                            <path fill-rule="evenodd"  fill="rgb(27, 207, 107)"
                                d="M7.778,12.000 L12.222,12.000 L12.222,10.000 L7.778,10.000 L7.778,12.000 ZM-0.000,-0.000 L-0.000,2.000 L20.000,2.000 L20.000,-0.000 L-0.000,-0.000 ZM3.333,7.000 L16.667,7.000 L16.667,5.000 L3.333,5.000 L3.333,7.000 Z"/>
                            </svg>
                            </div>
                            <h4>Filter Jobs</h4>
                        </div>
                    </div>
                </div>
                <!-- Job Category Listing start -->
                <div class="job-category-listing mb-50">
                    <!-- single one -->
                    <div class="single-listing">
                       <div class="small-section-tittle2">
                             <h4>Job Skill</h4>
                       </div>
                        <!-- Select job items start -->
                        <div class="row">
                            <div class="col-lg-12 form-group">
                            <select name="skill_id" class="form-control" id="skill" autocomplete="off">
                                <option value="">All Category</option>
                                @foreach($skills as $skill)
                                    <option value="{{$skill->skill_id}}">{{$skill->skill_name}}</option>
                                @endforeach
                            </select>
                            <input type="hidden" name="filter" value="{{$filter}}" id="filter">
                            </div>
                        </div>
                        <!--  Select job items End-->
                        <!-- select-Categories start -->
                        <div class="select-Categories pt-20 pb-50">
                            <div class="small-section-tittle2">
                                <h4>Job Type</h4>
                            </div>
                           
                            @foreach(JOB_TYPE as $key =>  $job_type)
                                <label class="container">{{$job_type}}
                                    <input type="checkbox" value="{{$key}}" name="job_type[]" class="job_type"  autocomplete="off" checked="checked">
                                    <span class="checkmark"></span>
                                </label>

                            @endforeach

                            
                        </div>
                        <!-- select-Categories End -->
                    </div>
                    <!-- single two -->
                    <div class="single-listing">
                       <div class="small-section-tittle2">
                             <h4>Job Location</h4>
                       </div>
                        <!-- Select job items start -->
                         <div class="row">
                            <div class="col-lg-12 form-group">
                                <select name="state_code" class="form-control" id="state" autocomplete="off">
                                    <option value="0">All States</option>
                                    @foreach($states as $state)
                                        <option value="{{$state->state_code}}">{{$state->state_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-12 form-group">
                                <select name="city_code" class="form-control" id="city">
                                    
                                </select>
                            </div>
                        </div>
                        <!--  Select job items End-->
                        <!-- select-Categories start -->
                        <div class="select-Categories pt-20 pb-50">
                            <div class="small-section-tittle2">
                                <h4>Experience</h4>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 form-group">
                                    <select name="experience" class="form-control" id="experience" autocomplete="off">
                                        {{-- <option value="0-0">Any</option> --}}
                                        @foreach(EXPERIENCE as $key => $experience)
                                            <option value="{{$key}}">{{$experience}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{-- @foreach(EXPERIENCE as $key => $experience)
                                <label class="container">{{$experience}}
                                    <input type="checkbox" {{$key =='' ? 'checked="checked"' : ''}} name="experience" value="{{$key}}" class="experience" autocomplete="off">
                                    <span class="checkmark" ></span>
                                </label>
                            @endforeach --}}
                        </div>
                        <!-- select-Categories End -->
                    </div>
                    <!-- single three -->
                    <div class="single-listing">
                        <!-- select-Categories start -->
                        <div class="select-Categories pb-50">
                            <div class="small-section-tittle2">
                                <h4>Posted Within</h4>
                            </div>
                            <label class="container">Any
                                <input type="checkbox" checked="checked" >
                                <span class="checkmark" ></span>
                            </label>
                            <label class="container">Today
                                <input type="checkbox" >
                                <span class="checkmark"></span>
                            </label>
                            <label class="container">Last 2 days
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container">Last 3 days
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container">Last 5 days
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container">Last 10 days
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <!-- select-Categories End -->
                    </div>
                    <div class="single-listing">
                        <!-- Range Slider Start -->
                        <aside class="left_widgets p_filter_widgets price_rangs_aside sidebar_box_shadow">
                            <div class="small-section-tittle2">
                                <h4>Filter Jobs</h4>
                            </div>
                            <div class="widgets_inner">
                                <div class="range_item">
                                    <!-- <div id="slider-range"></div> -->
                                    <input type="text" class="js-range-slider" value="" />
                                    <div class="d-flex align-items-center">
                                        <div class="price_text">
                                            <p>Salary :</p>
                                        </div>
                                        <div class="price_value d-flex justify-content-center">
                                            <input type="text" class="js-input-from" id="amount" readonly />
                                            <span>to</span>
                                            <input type="text" class="js-input-to" id="amount" readonly />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </aside>
                      <!-- Range Slider End -->
                    </div>
                </div>
                <!-- Job Category Listing End -->
            </div>
            <!-- Right content -->
            <div class="col-xl-9 col-lg-9 col-md-8">
                <!-- Featured_job_start -->
                <section class="featured-job-area">
                    <div class="container" id="filterJobsBody">
                        <!-- Count of Job list Start -->
                      {{--   <div class="row">
                            <div class="col-lg-12">
                                <div class="count-job mb-35">
                                    <span>01 Jobs found</span>
                                    <!-- Select job items start -->
                                    <div class="select-job-items">
                                        <span>Sort by</span>
                                        <select name="select">
                                            <option value="">None</option>
                                            <option value="">job list</option>
                                            <option value="">job list</option>
                                            <option value="">job list</option>
                                        </select>
                                    </div>
                                    <!--  Select job items End-->
                                </div>
                            </div>
                        </div> --}}
                        <!-- Count of Job list End -->
                        <!-- single-job-content -->
                            @include('posts.jobPostList')

                        </div>
                    </div>
                </section>
                <!-- Featured_job_end -->
            </div>
        </div>
    </div>
</div>

<!-- Job List Area End -->
<!--Pagination Start  -->
{{-- <div class="pagination-area pb-115 text-center">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="single-wrap d-flex justify-content-center">
                    <nav aria-label="Page navigation example">
                        @if ($posts->lastPage() > 1)
                            <ul class="pagination justify-content-start">
                                <li class="page-item {{ ($posts->currentPage() == 1) ? ' disabled' : '' }}"><a class="page-link" href="{{ $posts->url(1) }}"><span class="ti-angle-left"></span></a></li>

                                @for ($i = 1; $i <= $posts->lastPage(); $i++)
                                    <li class="page-item {{ ($posts->currentPage() == $i) ? ' active' : '' }}">
                                        <a href="{{ $posts->url($i) }}" class="page-link">{{ $i }}</a>
                                    </li>
                                @endfor
                                <li class="page-item {{ ($posts->currentPage() == $posts->lastPage()) ? ' disabled' : '' }}"><a class="page-link" href="{{ $posts->url($posts->currentPage()+1) }}"><span class="ti-angle-right"></span></a></li>
                            </ul>
                        @endif
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<script>
    $(document).ready(function(){
        $('#state').on('change',function(e){
            e.preventDefault();
            var state_code = $(this).val();
            fn_state_code(state_code);
        }); 

        $('#skill, .job_type, #city,#experience').on('change',function(e){
            e.preventDefault();
            search();
       
        });


        $(document).on('click', '.pagination a',function(event)
        {
            event.preventDefault();
            $('li').removeClass('active');
            $(this).parent('li').addClass('active');

            var myurl = $(this).attr('href');
            var page=$(this).attr('href').split('page=')[1];
            

            var filter = $('#filter').val();
            if(filter == 'no'){
               var url = '/jobs/public/find_jobs' + '?page='+page;  
               window.location.href = url;
            }else{
              
                search(page);
            }

           

        });


        function search(page = null){

            var skill_id = $('#skill').val();
            var city_code = $('#city').val();
            var experiences = $('#experience').val();

            // console.log();
            var job_type = [];
            var filter = $('#filter').val('yes');

            $("input[name^='job_type']:checked").each(function(){
                    job_type.push($(this).val());

            }); 

            // $("input[name^='experience']:checked").each(function(){
            //     experiences.push($(this).val());
            // });
            

            console.log(experiences)
            var urlName = '{{url('filterJobs')}}' + '?'+"skill_id="+skill_id+"&job_type="+job_type + "&city_code="+city_code+ "&experiences="+experiences;
            if(page !=null){
                var url = urlName + '&page='+page;  
            }else{
                var url = urlName;
            }

            $.ajax({
                type:'get',
                url:url,
                success:function(res){
                    // console.log(res)
                    $('#filterJobsBody').empty().html(res);
                }

            });

        }


    });                                                                     
</script>
<!--Pagination End  -->
@endsection