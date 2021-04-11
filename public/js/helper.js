function fn_state_code(state_code,oldCityCode =''){
    if(state_code !='0'){
        $.ajax({
            type:'get',
            url:"/jobs/public/get_cities/"+state_code,
            success:function(res){
                $('#city').empty();
                $('#city').append('<option value="">Select City</option>');
                $.each(res,function(i,v){
                    $('#city').append('<option value="'+v.city_code+'" '+(oldCityCode == v.city_code ? 'selected' : '')+'> '+v.city_name+' </option>')
                })
            }
        });
    }else{
        $('#city').empty();
    }
   
}
