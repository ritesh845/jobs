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
            </tr>
        </tfoot>
    </table>    
    <script>
    $(document).ready(function(){
        $('#myTable').DataTable();
    });
</script>
