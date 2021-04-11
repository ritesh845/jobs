@extends('backend.layouts.main')
@section('content')
<div class="container-fluid pt-5 pb-5" > 
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        {{ __('Profile') }}
                        {{-- <a href=""  class="btn btn-sm btn-success pull-right">Edit</a> --}}
                    </h5>
                </div>

                <div class="card-body">
                    <form action="{{route('jobseeker.profile_update')}}" enctype="multipart/form-data" method="post" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col-md-3 bg-light pt-4 text-center">
                                <img src="{{asset($jobseeker->photo !=null ? '/storage/'.$jobseeker->photo : 'img/user_img.png')}}" style="border-radius: 30px;" width="200" height="200" class="">

                                <div class="mb-3 mt-3 ">
                                    <label>Upload Image</label>
                                    <input type="file" name="photo" class="form-control">
                                </div>  
                                <hr>
                                <div class="mb-3 mt-3 ">
                                    <label>First Name</label>
                                    <input type="text" name="f_name" class="form-control" value="{{$jobseeker->f_name}}" required="">
                                </div>  
                                <div class="mb-3 mt-3">
                                    <label>Last Name</label>
                                    <input type="text" name="l_name" class="form-control" value="{{$jobseeker->l_name}}" required="">
                                </div>

                                <hr>
                                <div class="mb-3 mt-3 ">
                                    <label>Resume Upload</label>
                                    <input type="file" name="resume" class="form-control">
                                </div>

                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <h5 class="font-weight-bold">Information                       
                                            <a href="{{route('jobseeker.profile',$jobseeker->user_id)}}" class="btn btn-sm btn-info pull-right">Back</a>
                                           
                                        </h5>
                                        <hr>
                                    </div> 
                                    <div class="col-md-12 form-group">
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label class="">User Type</label>
                                                <input type="text" name="" class="form-control " value="{{$jobseeker->userTypes->user_type_name}}" readonly="readonly" >
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label class="">Iap Number</label>
                                                <input type="text" name="" class="form-control  readonly" value="{{$jobseeker->iap_no}}" readonly="readonly" >
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label class="font-weight-bold">Email Address</label>  <br>                                       
                                                <input type="text" name="email" value="{{$jobseeker->email}}"  class="form-control " readonly="readonly">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label class="font-weight-bold">Mobile Number</label><br>
                                                <input type="text" name="mobile" value="{{$jobseeker->mobile}}"  class="form-control readonly text-muted">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label class="font-weight-bold">Year Of Experienced</label><br>
                                                <input type="number" name="experienced" value="{{$jobseeker->experienced}}" max="50" min="0" class="form-control text-muted required" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <h5 class="font-weight-bold">About</h5>
                                        <hr class="mb-1">
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <textarea  style="resize: none" name="description" class="text-muted  form-control readonly text-muted" rows="8" cols="20" >Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. class
                                        </textarea>
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
                                             <input type="text" name="address_line1" value="{{$jobseeker->address_line1}}"  class="form-control readonly text-muted">

                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label class="font-weight-bold">Address Line 2</label><br>
                                            <input type="text" name="address_line2" value="{{$jobseeker->address_line2}}"  class="form-control readonly text-muted" >
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label class="font-weight-bold">Country Name</label><br>
                                          

                                            <select class="form-control required" name="country_code">
                                                <option value="">Select Country</option>
                                                <option value="102" selected="selected">India</option>
                                              

                                            </select>
                                             

                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label class="font-weight-bold">State Name</label><br>
                                            
                                            <select class="form-control required " name="state_code" id="state">
                                                <option value="">Select State</option>
                                                @foreach($states as $state)
                                                    <option value="{{$state->state_code}}" {{$jobseeker->state_code == $state->state_code ? 'selected' : ''}}>{{$state->state_name}}</option>
                                                @endforeach
                                            </select>


                                        </div> 
                                        <div class="col-md-4 form-group">
                                            <label class="font-weight-bold">City Name</label><br>
                                           
                                            <select class="form-control required" name="city_code" id="city">
                                            </select>

                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label class="font-weight-bold">Pin Code</label><br>
                                            <input type="text" name="pin_code" value="{{$jobseeker->pin_code}}"  class="form-control readonly text-muted">
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
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="qualBody">
                                        @php $count = 0; @endphp
                                        @foreach($jobseeker->qualifications as $qualification)
                                            <tr id="row{{$count}}">
                                                <td class="form-group error-di">
                                                  <select class="form-control qual_catg" name="qual_catg_code[]" id="{{$count}}">
                                                      <option value="">Select Qual Category Name</option>
                                                      @foreach($quals as $qual)
                                                        <option value="{{$qual->qual_catg_code}}" {{$qualification->qual_catg_code == $qual->qual_catg_code ? 'selected="selected"' : ''}} >{{$qual->qual_catg_desc}}</option>
                                                      @endforeach
                                                  </select>
                                                </td>
                                                <td class="form-group">
                                                   <select class="form-control " id="qual{{$count}}" name="qual_code[]">
                                                    @if($qualification->qual_code !=null)
                                                        @foreach(\App\Models\QualMast::where('qual_catg_code',$qualification->qual_catg_code)->get() as $qual)
                                                            <option value="{{$qual->qual_code}}">{{$qual->qual_name}}</option>
                                                        @endforeach
                                                     @endif
                                                  </select>
                                                </td>
                                                <td class="form-group">
                                                  <input type="text" name="board[]" value="{{$qualification->board}}" class="form-control" placeholder="Enter board/university name">
                                                </td>
                                                <td class="form-group" style="width: 10%">
                                                    <select name="year[]" class="form-control">
                                                        <option value="">Year</option>
                                                        @foreach(YEARS as $yKey => $year)
                                                            <option value="{{$yKey}}" {{$qualification->year == $yKey ? 'selected="selected"' : ''}}>{{$year}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td class="form-group" style="width: 15%">
                                                  <input type="text"  name="percent[]" class="form-control"  oninput="this.value = this.value.replace(/[^0-9|.]/g, '').replace(/(\..*)\./g, '$1');" value="{{$qualification->percent}}">
                                                </td>
                                                <td>
                                                    @if($count == 0)
                                                        <a href="javascript:void(0)" class="btn btn-sm btn-success" id="addMore"><i class="fa fa-plus"></i></a>
                                                    @else
                                                        <a href="javascript:void(0)" class="btn btn-sm btn-danger removeBtn" id="{{$count}}"><i class="fa fa-minus"></i></a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @php $count++; @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12 form-group"><h4 class="font-weight-bold">Experience Details</h4></div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 form-group">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="required">Company Name</th>
                                            <th class="required">Designation</th>
                                            <th class="required">From</th>
                                            <th class="required">To</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="expBody">
                                        @php $ecount = 0; @endphp
                                        @foreach($jobseeker->experiences as $experience)
                                        <tr id="erow{{$ecount}}">
                                            <td class="error-di form-group">
                                                <input type="text" name="company[]" value="{{$experience->company}}" class="form-control" placeholder="Enter company name"  >
                                            </td>
                                            <td  class="error-di form-group">
                                                <input type="text" name="designation[]" value="{{$experience->designation}}" class="form-control" placeholder="Enter designation">
                                            </td>
                                            <td  class="error-di form-group">
                                                <input type="text" name="from[]" value="{{$experience->start_date}}" class="form-control datepicker" placeholder="Enter from date" data-date-format="yyyy-mm-dd">
                                            </td>
                                            <td  class="error-di form-group">
                                                <input type="text" name="to[]" value="{{$experience->end_date}}" class="form-control datepicker" placeholder="Enter to date" data-date-format="yyyy-mm-dd">
                                            </td>
                                            <td  class="error-di form-group">
                                                @if($ecount == 0)
                                                    <a href="javascript:void(0)" class="btn btn-sm btn-success" id="addExp"><i class="fa fa-plus"></i></a>
                                                @else
                                                    <a href="javascript:void(0)" class="btn btn-sm btn-danger removeExpBtn" id="{{$ecount}}"><i class="fa fa-minus"></i></a>
                                                @endif

                                            </td>
                                        </tr>
                                       @php $ecount++; @endphp
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
                                <select name="job_skill[]" class="form-control selectSkill" multiple="multiple">
                                    <option value="" disabled="disabled">Select Job Skill</option>
                                    @foreach($skills as $skill)
                                        <option value="{{$skill->skill_id}}" {{ $jobseeker->skills !=null ? (!empty(collect($jobseeker->skills)->firstWhere('skill_id',$skill->skill_id)) ? 'selected="selected"'  : '') : ''}}>{{$skill->skill_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <input type="hidden" name="jobseeker_id" value="{{$jobseeker->jobseeker_id}}"> 
                                <button type="submit" class="btn btn-success btn-sm pull-right mr-2" id="formSubmit">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){

        $('.selectSkill').select2();

        $(document).on('focus', '.datepicker', function () {
          $(this).datepicker();
        }); 

        $('#state').on('change',function(e){
            e.preventDefault();
            var state_code = $(this).val();
            fn_state_code(state_code);
        });
        var stateCode = "{{$jobseeker->state_code !=null ? $jobseeker->state_code : ''}}";
        var cityCode = "{{$jobseeker->city_code !=null ? $jobseeker->city_code : ''}}";
        if(stateCode !=''){
            fn_state_code(stateCode,cityCode)
        }

   


        var row = "{{$count}}";
        $('#addMore').on('click',function(e){
            e.preventDefault();
            var html = '<tr id="row'+row+'"><td class="form-group error-di"><select class="form-control qual_catg" name="qual_catg_code[]" id="'+row+'"><option value="">Select Qual Category Name</option> @foreach($quals as $qual)<option value="{{$qual->qual_catg_code}}">{{$qual->qual_catg_desc}}</option>@endforeach</select></td><td class="form-group"><select class="form-control qual" name="qual_code[]" id="qual'+row+'"></select></td><td class="form-group"><input type="text" name="board[]" value="" class="form-control" placeholder="Enter board/university name"></td><td class="form-group" style="width: 10%"><select name="year[]" class="form-control"><option value="">Year</option>@foreach(YEARS as $yKey => $year) <option value="{{$yKey}}">{{$year}}</option>@endforeach</select></td><td class="form-group" style="width: 15%"><input type="text"  name="percent[]" value="" class="form-control" ></td><td><a href="javascript:void(0)" class="btn btn-sm btn-danger removeBtn" id="'+row+'"><i class="fa fa-minus"></i></a></td></tr>';
            $('#qualBody').append(html);
            row++;
        });

        var erow = 1;
        $('#addExp').on('click',function(e){
            e.preventDefault();
            var html = '<tr id="erow'+erow+'"><td class="error-di form-group"><input type="text" name="company[]" value="" class="form-control" placeholder="Enter company name" </td><td class="error-di form-group"><input type="text" name="designation[]" value="" class="form-control" placeholder="Enter designation"></td><td class="error-di form-group"><input type="text" name="from[]" value="" class="form-control datepicker" placeholder="Enter from date" data-date-format="yyyy-mm-dd"></td><td class="error-di form-group"><input type="text" name="to[]" value="" class="form-control datepicker" placeholder="Enter to date" data-date-format="yyyy-mm-dd"></td><td><a href="javascript:void(0)" class="btn btn-sm btn-danger removeExpBtn" id="'+erow+'"><i class="fa fa-minus"></i></a></td></tr>';
            $('#expBody').append(html);
            erow++;
        });


        $(document).on('change','.qual_catg',function(e){
            e.preventDefault();
            var qual_catg_code =  $(this).val();
            var qual_id = $(this).attr('id');

            if(qual_catg_code !=''){
                $.ajax({
                    type:'GET',
                    url:"{{url('get_qualification')}}/"+qual_catg_code,
                    success:function(res){
                        $('#qual'+qual_id).empty();
                        $.each(res,function(i,v){
                            $('#qual'+qual_id).append('<option value="'+v.qual_code+'">'+v.qual_name+'</option>');
                        });
                    }
                });
            }else{
                $('#qual'+qual_id).empty();
            }
        });

        $(document).on('click','.removeBtn',function(e){
            e.preventDefault();
            var rowId = $(this).attr('id');
            $('#row'+rowId).remove(); 
        });
        $(document).on('click','.removeExpBtn',function(e){
            e.preventDefault();
            var rowId = $(this).attr('id');
            $('#erow'+rowId).remove(); 
        });

    })
</script>
@endsection
