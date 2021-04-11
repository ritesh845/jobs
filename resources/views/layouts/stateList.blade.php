<select name="state_code" class="form-control" id="state_code">
    <option value="">Select State</option>
    @foreach($states as $state)
        <option value="{{$skill->skill_id}}" {{$state_code == $state->state_code ? 'selected' : ''}}>{{$skill->skill_name}}</option>
    @endforeach
</select>