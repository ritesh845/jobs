     <footer class="footer">
            <div class="container">
              <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2021</span>
              </div>
            </div>
          </footer>
         </div>
        <!-- main-panel ends -->
      </div>

    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="{{asset("js/datepicker.js")}}"></script>
    <script src="{{asset("js/helper.js")}}"></script>
    <script src="{{asset('js/jquery-validate.min.js')}}"></script>
    <script src="{{asset("ckeditor/ckeditor.js")}}"></script>
    {{-- <script src="{{asset('js/jquery.validate.min.js')}}"></script> --}}

     {{-- <script src="{{asset('backend/vendors/js/vendor.bundle.base.js')}}"></script> --}}
    <!-- endinject -->
    <!-- Plugin js for this page -->
   {{--  <script src="{{asset('backend/vendors/jquery-bar-rating/jquery.barrating.min.js')}}"></script>
    <script src="{{asset('backend/vendors/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('backend/vendors/flot/jquery.flot.js')}}"></script>
    <script src="{{asset('backend/vendors/flot/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('backend/vendors/flot/jquery.flot.categories.js')}}"></script>
    <script src="{{asset('backend/vendors/flot/jquery.flot.fillbetween.js')}}"></script>
    <script src="{{asset('backend/vendors/flot/jquery.flot.stack.js')}}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('backend/js/off-canvas.js')}}"></script>
    <script src="{{asset('backend/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('backend/js/misc.js')}}"></script>
    <script src="{{asset('backend/js/settings.js')}}"></script>
    <script src="{{asset('backend/js/todolist.js')}}"></script> --}}
    <!-- endinject -->
    <!-- Custom js for this page -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script >
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
</script>

    <script src="{{asset('backend/js/dashboard.js')}}"></script>

    <script src="{{asset('backend/js/settings.js')}}"></script>
    
</body>
</html>