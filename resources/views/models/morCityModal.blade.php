<div class="modal fade" id="cityModal" tabindex="-1" role="dialog" aria-labelledby="cityModalLabel" aria-hidden="true">  
  <div class="modal-dialog  modal-lg " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Recruiter's Location</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="row">
        @foreach(collect($cities) as $city)
              <div class="col-md-4">
                <input type="checkbox" name="city_code" value="{{$city->city_code}}"><label class="ml-2">{{$city->city_name}}  <span>({{collect($city->posts)->count()}})</span></label>
              </div>
        @endforeach
          </div>  
      </div>
      <div class="modal-footer">
        <div class="row">
          <div class="col-md-12 text-center">
              <a href="javascript:void(0)" class="btn btn-sm btn-primary">Search Resume</a>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</div>