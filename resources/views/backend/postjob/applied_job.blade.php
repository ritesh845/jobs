@extends('backend.layouts.main')
@section('content')
<div class="container-fluid pt-5 pb-5" > 
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Applied Job List') }}
                   
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
                                        <th>Company Name</th>
                                        <th>Company Url</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                	@php $count = 1; @endphp
                                    @foreach($jobs as $job)
                                    <tr>
                                        <td>{{$count++}}</td>
                                        <td>{{$job->jobpost->title}}</td>
                                        <td>{{$job->jobpost->employeer->comp_name }}</td>
                                        <td>{{$job->jobpost->employeer->comp_url }}</td>
                                      
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Job Title</th>
                                        <th>Company Name</th>
                                        <th>Company Url</th>
                                        
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
