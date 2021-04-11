@extends('backend.layouts.main')
@section('content')
<div class="container-fluid pt-5 pb-5" > 
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Search Resume') }}
                   
                </div>

                <div class="card-body">
                   
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-header bg-white p-2">
                                    <p class="card-title">Search Recruiter's</p>
                                </div>
                                <div class="card-body p-2">
                                    <h6>Recruiter's Location</h6>
                                    <div class="">
                                        @foreach(collect($cities)->take(5) as $city)
                                            <input type="checkbox" name="city_code" value="{{$city->city_code}}"><label class="ml-2">{{$city->city_name}} <span>({{collect($city->posts)->count()}})</span></label>
                                            <br>
                                        @endforeach
                                        @if(count($cities) > 5)
                                            <a href="javascript:void(0)" id="moreCity" class="ml-4" data-toggle="modal" data-target="#cityModal">more</a>
                                        @endif

                                    </div>
                                </div>
                            </div>     
                        </div>
                        <div class="col-md-8">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('models.morCityModal')
<script>
    $(document).ready(function(){
        $('#myTable').DataTable();
    });
</script>
@endsection
