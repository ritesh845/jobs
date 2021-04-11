@extends('backend.layouts.main')
@section('content')
<div class="container-fluid pt-5 pb-5" > 
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        {{ __('Profile') }}

                        @role('employeer')
                            <a href="{{route('applied_resume')}}"  class="btn btn-sm btn-success pull-right">Back</a>
                        @endrole

                    </h5>
                </div>

                <div class="card-body">
                   
                        <div class="row">
                            <div class="col-md-3 bg-light pt-4 text-center">
                                <img src="{{asset($jobseeker->photo !=null ? '/storage/'.$jobseeker->photo : 'img/user_img.png')}}" style="border-radius: 30px;" width="200" height="200" class="">


                                <h5 class="mt-3 font-weight-bold fieldHide">
                                    {{$jobseeker->f_name .' '. $jobseeker->l_name}}</h5>


                                <h5 class="mt-3 font-weight-bold fieldHide">Resume</h5>

                                <div class="mb-3 mt-3"> 
                                    <a href="{{asset('storage/'.$jobseeker->resume)}}">{{$jobseeker->resume}}</a>
                                </div>

                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <h5 class="font-weight-bold">Information
                                           @role('job_seeker')
                                            <a href="{{route('jobseeker.editProfile',$jobseeker->jobseeker_id)}}" id="fromEdit" class="pull-right"><i class="fa fa-edit text-success"></i></a>
                                            @endrole
                                        </h5>
                                        <hr>
                                    </div> 
                                    <div class="col-md-12 form-group">
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label class="font-weight-bold">User Type</label>
                                                <input type="text" name="" class="form-control border-0 p-0 readonly" value="{{$jobseeker->userTypes->user_type_name}}">
                                            </div>
                                             <div class="col-md-6 form-group">
                                                <label class="">Iap Number</label>
                                                <input type="text" name="" class="form-control border-0 p-0 readonly bg-white" value="{{$jobseeker->iap_no}}" readonly="readonly" >
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label class="font-weight-bold">Email Address</label>  <br>                                       
                                                <input type="text" name="email" value="{{$jobseeker->email}}"  class="form-control border-0 p-0 readonly">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label class="font-weight-bold">Mobile Number</label><br>
                                                <input type="text" name="mobile" value="{{$jobseeker->mobile}}"  class="form-control border-0 p-0 readonly text-muted">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label class="font-weight-bold">Year Of Experienced</label><br>
                                                <input type="text" name="experienced" value="{{$jobseeker->experienced}}" max="50" min="0" class="form-control border-0 p-0 readonly text-muted" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <h5 class="font-weight-bold">About</h5>
                                        <hr class="mb-1">
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <textarea  style="resize: none" name="description" class="text-muted  form-control readonly text-muted border-0 p-0" rows="8" cols="20" >{{$jobseeker->description}}</textarea>
                                    </div> 
                                </div>
                          
                                <div class="col-md-12 form-group">
                                    <h5 class="font-weight-bold">Address</h5>
                                    <hr>
                                </div> 
                                <div class="col-md-12 form-group">
                                    <div class="row">
                                        <div class="col-md-4 form-group">
                                            <label class="font-weight-bold">Address Line 1</label><br>
                                             <input type="text" name="address_line1" value="{{$jobseeker->address_line1}}"  class="form-control readonly text-muted border-0 p-0">

                                        </div>
                                        @if($jobseeker->address_line2 !='')
                                            <div class="col-md-4 form-group">
                                                <label class="font-weight-bold">Address Line 2</label><br>
                                                <input type="text" name="address_line2" value="{{$jobseeker->address_line2}}"  class="form-control readonly text-muted border-0 p-0" >
                                            </div>
                                        @endif
                                        <div class="col-md-4 form-group">
                                            <label class="font-weight-bold">Country Name</label><br>
                                            <input type="text"  value="India"  class="form-control readonly text-muted  border-0 p-0">                                          

                                        </select>
                                             

                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label class="font-weight-bold">State Name</label><br>
                                            <input type="text" value="{{$jobseeker->state !=null ? $jobseeker->state->state_name : '' }}"  class="form-control readonly text-muted border-0 p-0">

                                        </div> 
                                        <div class="col-md-4 form-group">
                                            <label class="font-weight-bold">City Name</label><br>
                                            <input type="text" value="{{$jobseeker->city !=null ? $jobseeker->city->city_name : ''}}"  class="form-control readonly text-muted border-0 p-0">
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label class="font-weight-bold">Pin Code</label><br>
                                            <input type="text" name="address_line2" value="{{$jobseeker->pin_code}}"  class="form-control readonly border-0 p-0 text-muted">
                                        </div>
                                    </div>
                                </div> 
                                <hr>
                            </div>
                        </div>
                        <hr>
                        <div class="row mt-4">
                            <div class="col-md-12 form-group">
                                <h5 class="font-weight-bold">Qualification Details</h5>
                                <hr>
                            </div> 

                            <div class="col-md-12 form-group">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Qualification Category Name</th>
                                            <th>Qualification Name</th>
                                            <th>Board University</th>
                                            <th>Year</th>
                                            <th>CGPA/Percentage</th>
                                        </tr>
                                    </thead>
                                    <tbody id="qualBody">
                                        @foreach($jobseeker->qualifications as $qualification)
                                            <tr id="">
                                                <td class="form-group error-di">
                                                    <input type="text" class="form-control text-muted border-0 p-0 readonly" name="" value="{{$qualification->qual_catg_desc}}">
                                                </td>
                                                <td class="form-group">
                                                    <input type="text" class="form-control text-muted border-0 p-0 readonly" value="{{$qualification->qual_name}}">
                                                </td>
                                                <td class="form-group">
                                                  <input type="text" nvalue="{{$qualification->board}}" class="form-control readonly border-0 p-0 text-muted" >
                                                </td>
                                                <td class="form-group" style="width: 10%">
                                                  <input type="text"  value="{{$qualification->year}}" class="form-control readonly border-0 p-0 text-muted" >
                                                </td>
                                                <td class="form-group" style="width: 15%">
                                                  <input type="text"  value="{{$qualification->percent}}" class="form-control readonly border-0 p-0 text-muted">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12 form-group"><h4 class="font-weight-bold">Education Details</h4></div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 form-group">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Company Name</th>
                                            <th>Designation</th>
                                            <th>From</th>
                                            <th>To</th>
                                        </tr>
                                    </thead>
                                    <tbody id="expBody">
                                       @foreach($jobseeker->experiences as $experience)
                                        <tr id="">
                                            <td class="error-di form-group">
                                                <input type="text"  value="{{$experience->company}}" class="form-control border-0 p-0" >
                                            </td>
                                            <td  class="error-di form-group">
                                                <input type="text" value="{{$experience->designation}}" class="form-control border-0 p-0">
                                            </td>
                                            <td  class="error-di form-group">
                                                <input type="text" value="{{date('Y-m-d',strtotime($experience->from))}}" class="form-control border-0 p-0">
                                            </td>
                                            <td  class="error-di form-group">
                                                <input type="text"value="{{date('Y-m-d',strtotime($experience->to))}}" class="form-control border-0 p-0">
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12 form-group"><h4 class="font-weight-bold">Skill Details</h4></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label class="font-weight-bold">Select Skill</label>
                                   <ul>
                                        @foreach($jobseeker->skills as $skill)
                                            <li>{{$skill->skill_name}}</li>
                                        @endforeach 
                                   </ul>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
