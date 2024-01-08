<?php  
use App\Libraries\MHzAuth;
use App\Models\UsersModel;


if(!function_exists('get_user')){
	function get_user(){
		if(MHzAuth::check()){
			$userModel = new UsersModel();
			return $userModel->asObject()->where('id',MHzAuth::id())->first();
		}else{
			return null;
		}
	}
}

function json($data, $kill_script=true) {
    echo '<pre>'.json_encode($data, JSON_PRETTY_PRINT).'</pre>';

    if (isset($kill_script)) {
        die();
    }
}

// function checkSQL($variable)
// {
// 	$ci =& get_instance();
// 	if($variable == "") { echo "Data Empty"; }
// 	echo "<pre>";
// 	print_r ($variable);
// 	echo "</pre>";
// 	echo "<hr>";
// 	echo $db->getLastQuery();
// 	die();
// }

function checkPost()
{
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		// Print the POST array
		$p = $_POST;
		echo "<pre>";
		print_r ($p);
		echo "</pre>";
	}else{
		echo "No POSTED Data!";
	}  
	die(); 
}

function makeRandomString($strlen, $uppercase=false) {
    $characters = '-_23456789abcdefghjkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ';
    $random_string = '';
    for ($i = 0; $i < $strlen; $i++) {
        $random_string .= $characters[mt_rand(0, strlen($characters) - 1)];
    }

    if ($uppercase == true) {
        $random_string = strtoupper($random_string);
    }
    return $random_string;
}

function convertDate($datetime_str, $format)
{
    //==Convert String date to some format:
    switch ($format) {
        case 'full_datetime':
            // * FULL-LONG DATETIME format,  11 February 2018 11:05 am
        $the_date = date('d F Y H:i a', strtotime($datetime_str));
        break; 
        case 'mysql_datetime':
            // * MySQL DATETIME format,  2018-02-11 11:05:20.
        $the_date = date('Y-m-d H:i:s', strtotime($datetime_str));
        break;  
        case 'mysql_date':
            // * MySQL DATETIME format,  2018-02-11.
        $the_date = date('Y-m-d', strtotime($datetime_str));
        break; 		
        case 'mydate':
            // * mydate, dd-mmm-yy, 11-Feb-18..
        $the_date = date('d-M-y', strtotime($datetime_str));
        break;
        case 'overtime':
            // * overtime date, dd-mmm-yy, 11-Feb-18 11:05
        $the_date = date('d-M-y H:i', strtotime($datetime_str));
        break;                                      
  
    }
    return $the_date;
}

function convertDateFromUnixDate($unixTime, $format)
{
    //==Convert Unix Time to some format:
    switch ($format) {
        case 'mysql_datetime':
            // * MySQL DATETIME format,  2018-02-11 11:05:20.
        $the_date = date('Y-m-d H:i:s', $datetime_str);
        break;  
        case 'mysql_date':
            // * MySQL DATETIME format,  2018-02-11.
        $the_date = date('Y-m-d', $datetime_str);
        break; 		
        case 'mydate':
            // * mydate, dd-mmm-yy, 11-Feb-18..
        $the_date = date('d-M-y', $datetime_str);
        break;
        case 'overtime':
            // * overtime date, dd-mmm-yy, 11-Feb-18 11:05
        $the_date = date('d-M-y H:i', $datetime_str);
        break;                                      
  
    }
    return $the_date;
}

function convertUnixDate($datetimepicker){
	$timestamp = strtotime($datetimepicker);

	$year = date('Y', $timestamp);
	$month = date('m', $timestamp);
	$day = date('d', $timestamp);
	$hour = date('H', $timestamp);
	$minute = date('i', $timestamp);
	$second = date('s', $timestamp);

	$timestamp = mktime($hour, $minute, $second, $month, $day, $year);
	return $timestamp;
}