@extends('backend.layouts.main')
@section('content')
<div class="container-fluid pt-5" > 
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Edit Job') }} </div>

                <div class="card-body">
                    <form autocomplete="off" method="post" action="{{route('postjob.update',$jobPost->job_id)}}">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-md-6 form-group ">
                                <label class="font-weight-bold required">Job Title</label>
                                <input type="text" name="post_title" class="form-control required" value="{{$jobPost->title}}">
                            </div>
                            <div class="col-md-6 form-group ">
                                <label class="font-weight-bold required">Job Role</label>
                                <select name="job_role_id" class="form-control required">
                                    <option value="">Select Job Role</option>
                                    @foreach($jobRoles as $jobRole)
                                        <option value="{{$jobRole->job_role_id}}" {{$jobPost->job_role_id == $jobRole->job_role_id ? 'selected' : ''}}>{{$jobRole->job_role_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 form-group ">
                                <label class="font-weight-bold required">Job Type</label>
                                <select name="job_type" class="form-control required">
                                    <option value="">Select Job Type</option>
                                    @foreach(JOB_TYPE as $key => $job_type)
                                        <option value="{{$key}}" {{$jobPost->job_type == $key ? 'selected="selected' : ''}}>{{$job_type}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 form-group ">
                                <label class="font-weight-bold required">Number of Job</label>
                                <input type="number" name="no_of_job" class="form-control required" min="1" value="1" value="{{$jobPost->no_of_job}}">
                            </div>

                            <div class="col-md-6 form-group">
                                <label class="font-weight-bold required">Job Posted Date</label>
                                <input type="text" readonly="readonly" name="start_date" class="form-control datepicker required" value="{{date('Y-m-d',strtotime($jobPost->start_date))}}" data-date-format="yyyy-mm-dd" >
                            </div>

                            <div class="col-md-6 form-group">
                                <label class="font-weight-bold required">Job Expired Date</label>
                                <input type="text" readonly="readonly" name="end_date" class="form-control datepicker required" data-date-format="yyyy-mm-dd" value="{{date('Y-m-d',strtotime($jobPost->end_date))}}">
                            </div>
                             <div class="col-md-12 form-group">         
                                <hr>                     
                                <input type="checkbox" name="negotiable" {{$jobPost->negotiable !=null ? 'checked="checked"' : ''}} >
                                <label class="font-weight-bold required">Is Salary Negotiable</label>
                            </div>

                        </div>
                        <div class="row">
                            
                            {{-- <div class="col-md-6 form-group">
                                <label class="font-weight-bold required">Salary Type</label>
                                <select name="salary_type" class="form-control">
                                    <option value="">Select Salary Type</option>
                                    @foreach(SALARY_TYPE as $s_key => $salary_type)
                                        <option value="{{$s_key}}">{{$salary_type}}</option>
                                    @endforeach
                                </select>
                            </div> --}}
                            {{-- <div class="col-md-6"></div> --}}
                            <div class="col-md-6 form-group">
                                <label class="font-weight-bold required">Salary Min</label>
                                <input type="text" name="salary_min" class="form-control required" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Enter minimum salary." value="{{$jobPost->salary_min}}"> 
                            </div>

                            <div class="col-md-6 form-group">
                                <label class="font-weight-bold required">Salary Max</label>
                                <input type="text" name="salary_max" class="form-control required" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"  placeholder="Enter maximum salary."  value="{{$jobPost->salary_max}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label class="font-weight-bold required">Experience Min</label>
                                <input type="number" min="0" name="exp_min" class="form-control required" value="{{$jobPost->exp_min}}">
                            </div>

                            <div class="col-md-6 form-group">
                                <label class="font-weight-bold required">Experience Max</label>
                                <input type="number" min="1" name="exp_max" class="form-control required" value="{{$jobPost->exp_max}}">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6 form-group" >
                                <label class="font-weight-bold required">Job Skill</label>
                                <select name="job_skill[]" class="form-control selectSkill required" multiple="multiple">
                                    <option value="">Select Job Skill</option>
                                    @foreach($skills as $skill)
                                        <option value="{{$skill->skill_id}}" {{!empty(collect($jobPost->skills)->firstWhere('skill_id',$skill->skill_id)) ? 'selected="selected"' : ''}}>{{$skill->skill_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                     
                        <hr>
                        <div class="row">

                            <div class="col-md-4 form-group error-div">
                                <label class="font-weight-bold required">State Name</label>
                                <select class="form-control required " name="state_code" id="state">
                                    <option value="">Select State</option>
                                    @foreach($states as $state)
                                        <option value="{{$state->state_code}}" {{$jobPost->state_code == $state->state_code ? 'selected="selected"' : ''}}>{{$state->state_name}}</option>
                                    @endforeach
                                </select>


                            </div> 
                            <div class="col-md-4 form-group error-div">
                                <label class="font-weight-bold required">City Name</label><br>
                             
                                <select class="form-control required" name="city_code" id="city">
                                </select>

                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12 form-group" >
                                <label class="font-weight-bold required">Job Description</label>
                                <textarea name="description" class="form-control required" rows="10" cols="20" id="editor" placeholder="Enter job description here...">{{$jobPost->description}}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group" >
                                <button type="submit" class="btn btn-sm btn-success">Submit</button>
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

        CKEDITOR.replace('editor');
        $('.datepicker').datepicker({
            'setDate': new Date()
        }); 


        $('.selectSkill').select2();

       $('#state').on('change',function(e){
            e.preventDefault();
            var state_code = $(this).val();
            fn_state_code(state_code);
        });
        var stateCode = "{{$jobPost->state_code !=null ? $jobPost->state_code : ''}}";
        var cityCode = "{{$jobPost->city_code !=null ? $jobPost->city_code : ''}}";
        if(stateCode !=''){
            fn_state_code(stateCode,cityCode)
        }

        $('label.required').append('<span class="text-danger"> *</span>');

        var form = $("#exampleForm");

        form.validate({   
            rules: {
                'end_date' : {
                    greaterthan : '#start_date'
                }
            },
            errorElement: "em",
            errorPlacement: function errorPlacement(error, element) { 
                element.after(error);
                error.addClass( "help-block" );

             },
            highlight: function ( element, errorClass, validClass ) {
                $( element ).parents( ".error-div" ).addClass( "has-error" ).removeClass( "has-success" );
            },
            unhighlight: function (element, errorClass, validClass) {
                $( element ).parents( ".error-div" ).addClass( "has-success" ).removeClass( "has-error" );
            },
        });    
        $.validator.addMethod('greaterthan',function(value,element,params){
        

            if (!/Invalid|NaN/.test(new Date(value))) {
            return new Date(value) > new Date($(params).val());
            }

            return isNaN(value) && isNaN($(params).val()) 
            || (Number(value) > Number($(params).val())); 


        },"Expired date is greater than posted date");

    }); 
</script>
@endsection
