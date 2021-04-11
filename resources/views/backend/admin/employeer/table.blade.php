<table class="table table-bordered" id="myTable">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>User Type</th>
            <th>Email Address</th>
            <th>Mobile Number</th>
            <th>Designation</th>
            <th>Company Name</th>
            {{-- <th>Address</th> --}}
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @php $count = 1; @endphp
        @foreach($employeers as $employeer)
            <tr>
                <td>{{$count++}}</td>
                <td>{{$employeer->full_name}}</td>
                <td>{{$employeer->userType->user_type_name}}</td>
                <td>{{$employeer->email}}</td>
                <td>{{$employeer->mobile}}</td>
                <td>{{$employeer->designation}}</td>
                <td>{{$employeer->comp_name}}</td>
                {{-- <td>{{getFullAddress($employeer)}}</td> --}}
                <td>
                    @if($employeer->status == 'A')
                        <span class="text-success">Active</span>
                    @else
                        <a href="{{route('admin.employeer_active',$employeer->employeer_id)}}" class="btn btn-sm btn-success" onclick="return confirm('Are you sure?')">Approve</a>
                    @endif
                
                </td>
            </tr>
        @endforeach
      
    </tbody>
   
</table>
<script>
    $(document).ready(function(){
        $('#myTable').DataTable();
    });
</script>