@extends('backend.layouts.main')
@section('content')
<div class="container-fluid pt-5 pb-5" > 
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Applied Job Resume List') }}
                   
                </div>

                <div class="card-body">
                    @if($message = Session::get('success'))
                        <div class="alert alert-success">
                            <strong> {{$message}}</strong>
                        </div>
                    @endif
			
                    <div class="row">
                        <div class="col-md-12 table-responsive">
                            <table class="table table-bordered"  id="myTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Job Title</th>
                                        <th>Jobseeker Name</th>
                                        <th>Jobseeker Email</th>
                                        <th>Jobseeker Mobile</th>
                                        <th>Applied Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@php $count = 1; @endphp
                                    @foreach($jobs as $job)
                                    <tr>
                                        <td>{{$count++}}</td>
                                        <td>{{$job->jobpost->title}}</td>
                                        <td>{{$job->jobseeker->full_name}}</td>
                                        <td>{{$job->jobseeker->email}}</td>
                                        <td>{{$job->jobseeker->mobile}}</td>
                                        <td>{{date('Y-m-d',strtotime($job->applied_date))}}</td>
                                      	<td>
                                      		<a title="Applier details Show" href="{{route('applier_profile',$job->jobseeker_id)}}" class="text-primary" ><i class="fa fa-eye"></i></a>
                                      	</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Job Title</th>
                                        <th>Jobseeker Name</th>
                                        <th>Jobseeker Email</th>
                                        <th>Jobseeker Mobile</th>
                                        <th>Applied Date</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>               
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#myTable').DataTable();
    });
</script>
@endsection
