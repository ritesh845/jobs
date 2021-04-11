@extends('backend.layouts.main')
@section('content')
<div class="container-fluid pt-5 pb-5" > 
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        {{ __('Profile') }}
                        {{-- <a href=""  class="btn btn-sm btn-success pull-right">Edit</a> --}}
                    </h5>
                </div>

                <div class="card-body">
                    <form id="formProfile" enctype="multipart/form-data" method="post">
                        <div class="row">
                            <div class="col-md-3 bg-light pt-4 text-center">
                                <img src="{{asset($employeer->photo !=null ? '/storage/'.$employeer->photo : 'img/user_img.png')}}" style="border-radius: 30px;" width="200" height="200" class="">

                                 <div class="mb-3 mt-3 fieldShow d-none">
                                    <label>Upload Company Logo</label>
                                    <input type="file" name="photo" class="form-control">
                                </div>  

                                <h5 class="mt-3 font-weight-bold fieldHide">
                                    {{$employeer->f_name .' '. $employeer->l_name}}</h5>

                                <div class="mb-3 mt-3 fieldShow d-none">
                                    <label>First Name</label>
                                    <input type="text" name="f_name" class="form-control" value="{{$employeer->f_name}}" required="">
                                </div>  
                                <div class="mb-3 mt-3 fieldShow d-none">
                                    <label>Last Name</label>
                                    <input type="text" name="l_name" class="form-control" value="{{$employeer->l_name}}" required="">
                                </div>


                                 <h5 class="text-muted fieldHide">{{$employeer->designation}}</h5>

                                 <div class="mb-3 mt-3 fieldShow d-none">
                                    <label>Desgination</label>
                                    <input type="text" name="designation" value="{{$employeer->designation}}"  class="form-control">
                                </div>

                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <h5 class="font-weight-bold">Information
                                            <a href="javascript:void(0)" id="fromEdit" class="pull-right"><i class="fa fa-edit text-success"></i></a>
                                            <button type="submit" class="btn btn-success btn-sm pull-right mr-2 d-none" id="formSubmit">Update</button>
                                            <input type="hidden" name="employeer_id" value="{{$employeer->employeer_id}}">
                                        </h5>
                                        <hr>
                                    </div> 
                                    <div class="col-md-12 form-group">
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label class="">User Type</label>
                                                
                                                <select name="user_type" class="fieldShow d-none form-control">
                                                   @foreach($userTypes as $userType)
                {{$userType->user_type ==  $employeer->user_type ? ($user_type = $userType->user_type_name ) : '' }}
                                                    <option value="{{$userType->user_type}}" {{(old('user_type') ?? $employeer->user_type) == $userType->user_type ? 'selected' : '' }}>{{$userType->user_type_name}}</option>
                                                @endforeach
                                                </select>

                                                <input type="text" name="" class="fieldHide form-control readonly" value="{{isset($user_type) ? $user_type : ''}}">


                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label class="font-weight-bold">Email Address</label>  <br>                                       
                                                <input type="text" name="email" value="{{$employeer->email}}"  class="form-control readonly">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label class="font-weight-bold">Mobile Number</label><br>
                                                <input type="text" name="mobile" value="{{$employeer->mobile}}"  class="form-control readonly text-muted">
                                            </div>
                                        </div>
                                         <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label class="font-weight-bold">Company Name</label><br>
                                                <input type="text" name="comp_name" value="{{$employeer->comp_name}}"  class="form-control readonly text-muted">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label class="font-weight-bold">Company Website</label><br>
                                                <input type="text" name="comp_url" value="{{$employeer->comp_url}}"  class="form-control readonly text-muted">
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
                                    <div class="col-md-12 form-group">
                                        <h5 class="font-weight-bold">Address</h5>
                                        <hr>
                                    </div> 
                                    <div class="col-md-12 form-group">
                                        <div class="row">
                                            <div class="col-md-4 form-group">
                                                <label class="font-weight-bold">Address Line 1</label><br>
                                                 <input type="text" name="address_line1" value="{{$employeer->address_line1}}"  class="form-control readonly text-muted">

                                            </div>
                                            @if($employeer->address_line2 !='')
                                                <div class="col-md-4 form-group">
                                                    <label class="font-weight-bold">Address Line 2</label><br>
                                                    <input type="text" name="address_line2" value="{{$employeer->address_line2}}"  class="form-control readonly text-muted" >
                                                </div>
                                            @endif
                                            <div class="col-md-4 form-group">
                                                <label class="font-weight-bold">Country Name</label><br>
                                                <input type="text"  value="India"  class="form-control readonly text-muted fieldHide">

                                                <select class="form-control required fieldShow d-none" name="country_code">
                                                <option value="">Select Country</option>
                                                <option value="102" selected="selected">India</option>
                                              

                                            </select>
                                                 

                                            </div>
                                            <div class="col-md-4 form-group">
                                                <label class="font-weight-bold">State Name</label><br>
                                                <input type="text" value="{{$employeer->state !=null ? $employeer->state->state_name : '' }}"  class="form-control readonly text-muted fieldHide">

                                                <select class="form-control required fieldShow d-none" name="state_code" id="state">
                                                    <option value="">Select State</option>
                                                    @foreach($states as $state)
                                                        <option value="{{$state->state_code}}" {{$employeer->state_code == $state->state_code ? 'selected' : ''}}>{{$state->state_name}}</option>
                                                    @endforeach
                                                </select>


                                            </div> 
                                            <div class="col-md-4 form-group">
                                                <label class="font-weight-bold">City Name</label><br>
                                                <input type="text" value="{{$employeer->city !=null ? $employeer->city->city_name : ''}}"  class="form-control readonly text-muted fieldHide">

                                                <select class="form-control required fieldShow d-none" name="city_code" id="city">
                                                </select>

                                            </div>
                                            <div class="col-md-4 form-group">
                                                <label class="font-weight-bold">Pin Code</label><br>
                                                <input type="text" name="pin_code" value="{{$employeer->pin_code}}"  class="form-control readonly text-muted">
                                            </div>
                                        </div>
                                    </div> 
                                </div>
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
        $('.readonly').attr('readonly',true);
        $('.fieldShow').addClass('d-none');
        $('.readonly').css({'border':'none','background-color':'white'});

        $('#fromEdit').on('click',function(e){
            e.preventDefault();
            $('.fieldHide').addClass('d-none');
            $('.fieldShow').removeClass('d-none');
            $('.readonly').attr('readonly',false);
           
            $('.readonly').css({'border':'1px solid black','background-color':'white'});
            $('#formSubmit').removeClass('d-none');

        })

        $('#state').on('change',function(e){
            e.preventDefault();
            var state_code = $(this).val();
            fn_state_code(state_code);
        });
        var stateCode = "{{$employeer->state_code !=null ? $employeer->state_code : ''}}";
        var cityCode = "{{$employeer->city_code !=null ? $employeer->city_code : ''}}";
        if(stateCode !=''){
            fn_state_code(stateCode,cityCode)
        }

    
        $('#formProfile').submit(function(event) {
            event.preventDefault();    
            var formData = new FormData(this);
            console.log(formData);
              $.ajax({
                type:'post',
                processData: false,
                contentType: false,
                url:"{{route('employeer.profile_update')}}",
                data:formData,
                success:function(res){
                    console.log(res)
                    alert('Profile Updated Successfully');   
                }
            })
        })

    })
</script>
@endsection
