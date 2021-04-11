@extends('backend.layouts.main')
@section('content')
<div class="container-fluid pt-5 pb-5" > 
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('List Jobs Posted') }}
                   
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
                                        <th>Title</th>
                                        <th>Posted On</th>
                                        <th>Expiry On</th>
                                        <th>No of Job</th>
                                        <th>City</th>
                                        <th>Total Response</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $count = 0; @endphp
                                    @foreach($jobPosts as $jobPost)
                                    <tr>
                                        <td>{{++$count}}</td>
                                        <td>{{Str::limit($jobPost->title,40,$end = '...')}}</td>
                                        <td>{{date('d-m-Y',strtotime($jobPost->start_date))}}</td>
                                        <td>{{date('d-m-Y',strtotime($jobPost->end_date))}}</td>
                                        <td>{{$jobPost->no_of_job}}</td>
                                        <td>{{$jobPost->city->city_name}}</td>
                                        <td>{{$jobPost->tot_response}}</td>
                                        <td>{{$jobPost->show_status}}</td>
                                        <td>
                                            <a href="{{route('postjob.edit',$jobPost->job_id)}}" class=""><i class="fa fa-edit text-success"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                         <th>#</th>
                                        <th>Title</th>
                                        <th>Posted On</th>
                                        <th>Expiry On</th>
                                        <th>No of Job</th>
                                        <th>City</th>
                                        <th>Total Response</th>
                                        <th>Status</th>
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
