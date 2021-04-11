@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">@if($role_type =='post_job')  Employeer @else Jobseeker  @endif{{ __(' Register') }}</div>
                <div class="card-body">
                    <form method="post" action="{{ route('register') }}" autocomplete="off" enctype="multipart/form-data" id="example-form">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 form-group"><h3>Login Details</h3></div>                    
                            <div class="col-md-6 mb-3 error-div form-group">
                                <input type="email" class="form-control required" name="email" placeholder="Email Address" value="{{old('email')}}">
                                @error('email')
                                    <span class="text-danger font-size-13" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3 error-div form-group">
                                <input type="password" class="form-control required" name="password" placeholder="Password" >
                                @error('password')
                                    <span class="text-danger font-size-13" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>    
                        <hr>
                        <div class="row">
                            <div class="col-md-12 form-group"><h3>Personal Details</h3></div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3 error-div form-group">
                                <label class="required" for="user_type" >{{ __('User Type') }}</label>
                                <select class="form-control required" name="user_type" id="user_type">
                                    <option value="">Select User Type</option>
                                    @foreach($userTypes as $userType)
                                        <option value="{{$userType->user_type}}" {{old('user_type') == $userType->user_type ? 'selected' : '' }}>{{$userType->user_type_name}}</option>
                                    @endforeach
                                </select>
                            </div>    
                             @if($role_type == 'post_resume')
                                <div class="col-md-6 mb-3 error-div form-group">
                                <label class="required" for="iap_no" >{{ __('IAP Membership Number') }}</label>
                                <input type="text" name="iap_no" class="form-control required" value="{{old('iap_no')}}" placeholder="Enter IAP Number">
                                 @error('iap_no')
                                    <span class="text-danger font-size-13" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>  
                            @endif                    
                        </div>
                        <div class="row">                          
                            @if($role_type == 'post_job')
                                <div class="col-md-12 form-group"><h3>Contact Person</h3></div>
                            @endif
                            <div class="col-md-6 mb-3 error-div form-group">
                                <label class="required" for="f_name" >{{ __('First Name') }}</label>
                                <input type="text" class="form-control required" name="f_name" placeholder="Enter First Name" value="{{old('f_name')}}">
                                @error('f_name')
                                    <span class="text-danger font-size-13" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3 error-div form-group">
                                <label class="required" for="l_name" >{{ __('Last Name') }}</label>
                                <input type="text" class="form-control required" name="l_name" placeholder="Enter Last Name" value="{{old('l_name')}}">
                                @error('l_name')
                                    <span class="text-danger font-size-13" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3 error-div form-group">
                                <label class="required" for="mobile" >{{ __('Mobile') }}</label>
                                <input type="text" class="form-control required" name="mobile" placeholder="Enter Mobile Number" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" value="{{old('mobile')}}">
                                @error('mobile')
                                    <span class="text-danger font-size-13" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        @if($role_type === 'post_job')
                            <div class="row">
                                <div class="col-md-6 mb-3 error-div form-group">
                                    <label class="required" for="designation" >Contact Person Designation</label>
                                    <input type="text" class="form-control required" name="designation" placeholder="Enter Company Designation" value="{{old('designation')}}">
                                </div> 
                                <div class="col-md-6 mb-3 error-div form-group">
                                    <label class="required" for="comp_name" >Company Name</label>
                                    <input type="text" class="form-control required" name="comp_name" placeholder="Enter Company Name" value="{{old('comp_name')}}">
                                </div>
                                
                                <div class="col-md-6 mb-3 error-div form-group">
                                    <label class="" for="comp_url" >Company Website Url</label>
                                    <input type="text" class="form-control" name="comp_url" placeholder="Enter Company Website" value="{{old('comp_url')}}">
                                </div> 
                            </div>
                        @endif
                        <div class="row"> 
                            <div class="col-md-6 mb-3 error-div form-group">
                                <label class="required" for="address_line1">Address Line 1</label>
                                <input type="text" name="address_line1" class="form-control required" placeholder="Address Line 1" value="{{old('address_line1')}}">
                                @error('address_line1')
                                    <span class="text-danger font-size-13" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="col-md-6 mb-3 error-div form-group">
                                <label class="" for="address_line2">Address Line 2</label>
                                <input type="text" name="address_line2" class="form-control" placeholder="Address Line 2" value="{{old('address_line2')}}">

                                @error('address_line2')
                                    <span class="text-danger font-size-13" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3 error-div form-group">
                                <label class="required" for="country_code" >{{ __('Country') }}</label>
                                <select class="form-control required" name="country_code">
                                    <option value="">Select Country</option>
                                    <option value="102" selected="selected">India</option>
                                    {{-- @foreach($states as $state)
                                        <option value="{{$state->state_code}}" {{old('state_code') == $state->state_code ? 'selected' : ''}}>{{$state->state_name}}</option>
                                    @endforeach --}}
                                </select>
                            </div>
                            <div class="col-md-6 mb-3 error-div form-group">
                                <label class="required" for="state_code" >{{ __('State') }}</label>
                                <select class="form-control required" name="state_code" id="state">
                                    <option value="">Select State</option>
                                    @foreach($states as $state)
                                        <option value="{{$state->state_code}}" {{old('state_code') == $state->state_code ? 'selected' : ''}}>{{$state->state_name}}</option>
                                    @endforeach
                                </select>

                                @error('state_code')
                                    <span class="text-danger font-size-13" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3 error-div form-group">
                                <label class="required" for="city_code" >{{ __('City') }}</label>
                                <select class="form-control required" name="city_code" id="city">
                                </select>
                                @error('city_code')
                                    <span class="text-danger font-size-13" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3 error-div form-group">
                                <label class="required" for="pin_code" >{{ __('Pin Code') }}</label>
                                <input type="text" class="form-control required" name="pin_code" placeholder="Enter Pin Code" value="{{old('pin_code')}}"  oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" value="{{old('mobile')}}">
                                @error('quoted_printable_decode(str)')
                                    <span class="text-danger font-size-13" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        @if($role_type == 'post_resume')
                            <div class="row">
                                <div class="col-md-6 error-div form-group">
                                    <label for="resume">Upload Resume <span class="text-danger">*</span>  <span class="text-muted font-size-11">  Upload .docx, or pdf only </span></label>
                                    <input type="file" name="resume" class="form-control required" accept=".pdf,.doc">
                                </div>
                            </div>                           
                        @endif 
                        <div class="row mb-0">
                            <div class="col-md-6 form-group">
                                <input type="hidden" name="role_type" value="{{$role_type}}">
                                <button type="submit" class="btn ">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>  
                    </form>   
                </div>
            </div>
        </div>
        <div class="col-md-6"></div>
    </div>
</div>

<script>
                                   
    $(document).ready(function(){
        $('.datepicker').datepicker({
            'setDate': new Date()
        }); 

        
        $('label.required').append('<span class="text-danger"> * </span>');

        $('#state').on('change',function(e){
            e.preventDefault();
            var state_code = $(this).val();
            fn_state_code(state_code);
        });
        var stateCode = "{{old('state_code')}}";
        var cityCode = "{{old('city_code')}}";
        if(stateCode !=''){
            fn_state_code(stateCode,cityCode)
        }


        var form = $("#example-form");

        form.validate({   
            rules: {    
                'mobile' :{
                    minlength:10,
                    maxlength:10,
                },
                'password' :{
                    minlength:8,
                },
                'pin_code' :{
                    minlength:6,
                    maxlength:6,
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

    })
</script>

@endsection
