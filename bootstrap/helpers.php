<?php
const SITE_NAME = 'Job Portal';
const SITE_LOGO = "img/logo.png";
const SITE_LOGO1 = "img/logo1.png";

const SITE_EMAIL = 'info@physiojobs.com';
const SITE_PHONE = '+91-7349434943';
const SITE_ADDRESS = 'County Park <br> Madhya Indore, 452016';

const GENDER = [
	'M'  => 'Male',
	'F'  => 'Female',
	'O'  => 'Other'	
];

const JOB_TYPE = [
    'FT'  => 'Full Time',
    'PT'  => 'Part Time',
    'WH'  => 'Work From Home' 
];

const SALARY_TYPE = [
    'W' => 'Weekly',
    'M' => 'Monthly',
    'Y' => 'Yearly'
];
const EXPERIENCE = [
    '0-0'   => 'Any',
    '0-2'   => '0-2 Years',
    '2-5'   => '2-5 Years',
    '5-7'   => '5-7 Years',
    '7-0'   => '7 more...',
];


const YEARS = [
    '1970' => '1970',
    '1971' => '1971',
    '1972' => '1972',
    '1973' => '1973',
    '1974' => '1974',
    '1975' => '1975',
    '1976' => '1976',
    '1977' => '1977',
    '1978' => '1978',
    '1979' => '1979',
    '1980' => '1980',
    '1981' => '1981',
    '1982' => '1982',
    '1983' => '1983',
    '1984' => '1984',
    '1985' => '1985',
    '1986' => '1986',
    '1987' => '1987',
    '1988' => '1988',
    '1989' => '1989',
    '1990' => '1990',
    '1991' => '1991',
    '1992' => '1992',
    '1993' => '1993',
    '1994' => '1994',
    '1995' => '1995',
    '1996' => '1996',
    '1997' => '1997',
    '1998' => '1998',
    '1999' => '1999',
    '2000' => '2000',
    '2001' => '2001',
    '2002' => '2002',
    '2003' => '2003',
    '2004' => '2004',
    '2005' => '2005',
    '2006' => '2006',
    '2007' => '2007',
    '2008' => '2008',
    '2009' => '2009',
    '2010' => '2010',
    '2011' => '2011',
    '2012' => '2012',
    '2013' => '2013',
    '2014' => '2014',
    '2015' => '2015',
    '2016' => '2016',
    '2017' => '2017',
    '2018' => '2018',
    '2019' => '2019',
    '2020' => '2020',
    '2021' => '2021',
];


if (!function_exists('file_upload')) {
    function file_upload($file,$folder,$data = [],$fieldName=null){      
        if(!empty($data) !=0){
            if($data->$fieldName != null){
               Storage::delete('public/'.$data->$fieldName);
            }
        }
        $name =  time().'_'.$file->getClientOriginalName();
        $file->storeAs('public/'.date('Y').'/'.date('M').'/'.$folder, $name);
        $path = date('Y').'/'.date('M').'/'.$folder.'/'.$name;
        return $path;
    }
}

if (!function_exists('getFullAddress')) {
    function getFullAddress($data){      
        return  $data->city->city_name.', '.$data->state->state_name.', '.'India'.', '.$data->pin_code;
        // return $path;
    }
}

?>