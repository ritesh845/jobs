@extends('backend.layouts.main')
@section('content')
<div class="container-fluid pt-5 pb-5" > 
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> {{ __('Jobs Post') }}
                   
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 table-responsive">
                            @include('backend.admin.posts.table')               
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
