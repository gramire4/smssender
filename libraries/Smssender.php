<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Smssender {

    public function sms_config($phone,$message){
		$username = SMSUSER;
	    $password = SMSPASS;
	    $destination = "$phone"; //Multiple numbers can be entered, separated by a comma
	    $source    = 'LOOK FOR';
	    $text = $message;//Sanitzing is needed
	    $ref = 'abc123';
	    //$ref = $this->model_user->is_loged()."".$id_room."".$id_unit.date('s');
	        
	    $content =  'username='.rawurlencode($username).
	                '&password='.rawurlencode($password).
	                '&to='.rawurlencode($destination).
	                '&from='.rawurlencode($source).
	                '&message='.rawurlencode($text).
	                '&ref='.rawurlencode($ref);
	  
	    $smsbroadcast_response = $this->sendSMS($content);
	    $response_lines = explode("\n", $smsbroadcast_response);
	    
	    foreach( $response_lines as $data_line){
	        $message_data = "";
	        $message_data = explode(':',$data_line);
	    }
	}

	function sendSMS($content) {
        $ch = curl_init('https://api.smsbroadcast.com.au/api-adv.php');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $content);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec ($ch);
        curl_close ($ch);
        return $output;    
    }
}

/* End of file SMSSender.php */