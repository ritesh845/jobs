<div class="single-job-items  row ">
  <div class="job-items col-lg-12">
      <div class="row">
         {{--  <div class="company-img col-lg-2">
              <a href="{{route('job_details')}}">

                <img src="{{asset($post->employeer->photo !=null ? '/storage/'.$post->employeer->photo : 'img/user_img.png')}}" alt="" width="85" height="85">

              </a>
          </div> --}}
          <div class="job-tittle col-lg-12">
              <h6>{{Str::limit($post->title,40,$end = '...')}}</h6>
              <ul>
                  <li><i class="fa fa-suitcase" aria-hidden="true"></i> {{(int)$post->exp_min}} - {{(int)$post->exp_max}} yr</li>                                        
                  <li>
                    <i class="fa fa-money" aria-hidden="true"></i>
                   @if($post->salary_min !=null)

                    <i class="fa fa-rupee"> {{(int)$post->salary_min}}</i> - <i class="fa fa-rupee"> {{(int)$post->salary_max}}</i>
                  @else
                    Not Disclosed

                  @endif
                  </li>
                  <br>
                  <li class="mb-1">Posted: {{$post->created_at->diffForHumans()}}
                  </li> 
                  <li class="mb-1"><i class="fa fa-map-marker"></i>{{$post->city !=null ? $post->city->city_name : '' }} {{$post->state !=null ? ', '.$post->state->state_name : '' }}
                  </li> 
                  <br>
                  <li class="pl-3 pt-2 justify-content-center " style="border-top: 1px solid #dfdfdf;">
                    @php 
                      $skills = collect($post->skills)->take(4);
                      $count = count($skills);
                    @endphp
                      @foreach($skills as $key => $skill)
                        {{  (($count- $key) != 0 ? ' • ' : '') . $skill->skill_name  }}
                        
                      @endforeach
                  </li>
              </ul>
          </div>
      </div>
  </div>
  {{-- <div class="items-link f-right col-lg-3 text-right">
      <a href="{{route('job_details')}}">{{Arr::get(JOB_TYPE,$post->job_type)}}</a>
      <span>{{date('d-m-Y',strtotime($post->start_date))}}</span>
  </div> --}}
</div>