<table class="table table-bordered" id="myTable">
    <thead>
        <tr>
            <th>#</th>
            <th>Jobseeker Name</th>
            <th>Jobseeker Type</th>
            <th>Jobseeker Email</th>
            <th>Jobseeker Mobile</th>
            {{-- <th>Address</th> --}}
            {{-- <th>Action</th> --}}
        </tr>
    </thead>
    <tbody>
        @php $count = 1; @endphp
        @foreach($jobseekers as $jobseeker)
            <tr>
                <td>{{$count++}}</td>
                <td>{{$jobseeker->full_name}}</td>
                <td>{{!empty($jobseeker->userTypes) ? $jobseeker->userTypes->user_type_name : ''}}</td>
                <td>{{$jobseeker->email}}</td>
                <td>{{$jobseeker->mobile}}</td>
                {{-- <td>{{getFullAddress($jobseeker)}}</td> --}}
            
            </tr>
        @endforeach
      
    </tbody>
   
</table>
<script>
    $(document).ready(function(){
        $('#myTable').DataTable();
    });
</script>