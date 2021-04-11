@extends('backend.layouts.main')
@section('content')
<div class="container-fluid pt-5 pb-5" > 
    <div class="row justify-content-center">
        <div class="col-md-10 ">
            <div class="card">
                <div class="card-header">{{ __('Create Job') }} <span class="text-danger"> {{session('status') == 'P' ? "(Your account is not active so you will create posts but your post is not shown on site. Whenever admin will activate your account your post will be automatically shown on site.)" : ''  }}</span></div>

                <div class="card-body">
                    <form autocomplete="off" method="post" action="{{route('postjob.store')}}" id="exampleForm">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group error-div">
                                <label class="font-weight-bold required">Job Title</label>
                                <input type="text" name="post_title" class="form-control required">
                            </div>
                            <div class="col-md-6 form-group error-div ">
                                <label class="font-weight-bold required">Job Role</label>
                                <select name="job_role_id" class="form-control required">
                                    <option value="">Select Job Role</option>
                                    @foreach($jobRoles as $jobRole)
                                        <option value="{{$jobRole->job_role_id}}">{{$jobRole->job_role_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 form-group error-div ">
                                <label class="font-weight-bold required">Job Type</label>
                                <select name="job_type" class="form-control required">
                                    <option value="">Select Job Type</option>
                                    @foreach(JOB_TYPE as $key => $job_type)
                                        <option value="{{$key}}">{{$job_type}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 form-group error-div ">
                                <label class="font-weight-bold required">Number of Job</label>
                                <input type="number" name="no_of_job" class="form-control required" min="1" value="1">
                            </div>

                            <div class="col-md-6 form-group error-div">
                                <label class="font-weight-bold required">Job Posted Date</label>
                                <input type="text" readonly="readonly" name="start_date" class="form-control datepicker required" value="{{date('Y-m-d')}}" data-date-format="yyyy-mm-dd" id="start_date">
                            </div>

                            <div class="col-md-6 form-group error-div">
                                <label class="font-weight-bold required">Job Expired Date</label>
                                <input type="text" readonly="readonly" name="end_date" class="form-control datepicker required" data-date-format="yyyy-mm-dd" value="{{date('Y-m-d',strtotime("+1 month"))}}">
                            </div>
                             <div class="col-md-12 form-group error-div">         
                                <hr>                     
                                <input type="checkbox" name="negotiable" >
                                <label class="font-weight-bold">Is Salary Negotiable</label>
                            </div>

                        </div>
                        <div class="row">
                            
                            {{-- <div class="col-md-6 form-group error-div">
                                <label class="font-weight-bold required">Salary Type</label>
                                <select name="salary_type" class="form-control">
                                    <option value="">Select Salary Type</option>
                                    @foreach(SALARY_TYPE as $s_key => $salary_type)
                                        <option value="{{$s_key}}">{{$salary_type}}</option>
                                    @endforeach
                                </select>
                            </div> --}}
                            {{-- <div class="col-md-6"></div> --}}
                            <div class="col-md-6 form-group error-div">
                                <label class="font-weight-bold">Salary Min</label>
                                <input type="text" name="salary_min" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Enter minimum salary."> 
                            </div>

                            <div class="col-md-6 form-group error-div">
                                <label class="font-weight-bold">Salary Max</label>
                                <input type="text" name="salary_max" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"  placeholder="Enter maximum salary." >
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group error-div">
                                <label class="font-weight-bold required">Experience Min</label>
                                <input type="number" min="0" name="exp_min" class="form-control required" value="0">
                            </div>

                            <div class="col-md-6 form-group error-div">
                                <label class="font-weight-bold required">Experience Max</label>
                                <input type="number" min="1" name="exp_max" class="form-control required" value="1">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6 form-group error-div" >
                                <label class="font-weight-bold required">Job Skill</label>
                                <select name="job_skill[]" class="form-control selectSkill required" multiple="multiple">
                                    <option value="" disabled="disabled">Select Job Skill</option>
                                    @foreach($skills as $skill)
                                        <option value="{{$skill->skill_id}}">{{$skill->skill_name}}</option>
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
                                        <option value="{{$state->state_code}}" >{{$state->state_name}}</option>
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
                            <div class="col-md-12 form-group error-div" >
                                <label class="font-weight-bold required">Job Description</label>
                                <textarea name="description" class="form-control required" rows="10" cols="20" id="editor" placeholder="Enter job description here..."></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group error-div" >
                                <button type="submit" class="btn btn-sm btn-success" >Submit</button>
                                {{-- {{session('status') == 'P' ? 'disabled="disabled"' : '' }} --}}
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
