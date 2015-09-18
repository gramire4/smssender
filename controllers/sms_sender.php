<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class sms_sender extends MY_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		
	}
	
	public function send_sms_text($phone,$message)
	{
		$this->load->library('smssender');
		$this->smssender->sms_config($phone,$message);
	}
}