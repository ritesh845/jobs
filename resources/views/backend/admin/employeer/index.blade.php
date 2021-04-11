@extends('backend.layouts.main')
@section('content')
<div class="container-fluid pt-5 pb-5" > 
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> {{$status == 'A' ? 'Active' : 'Pending' }} {{ __('Employeer') }}
                   
                </div>

                <div class="card-body">
                    @if($message = Session::get('success'))
                        <div class="alert alert-success">
                            <strong> {{$message}}</strong>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-12 mb-5">
                            <a href="{{route('admin.employeer')}}" class="btn btn-sm {{$status == 'A' ? 'btn-primary' : 'btn-secondary'}} mr-2">Active</a>
                            <a href="{{url('admin/employeer')}}?status=pending" class="btn btn-sm {{$status == 'P' ? 'btn-primary' : 'btn-secondary'}} ">Pending</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 table-responsive">
                            @include('backend.admin.employeer.table')               
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
