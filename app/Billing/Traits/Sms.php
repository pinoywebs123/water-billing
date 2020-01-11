<?php

namespace App\Billing\Traits;
use App\User;

trait Sms {

	public $apicode = "ST-CODYC463571_3XEVJ";

	function itexmo($number,$message){
                $ch = curl_init();
                $itexmo = array('1' => $number, '2' => $message, '3' => "ST-CODYC463571_3XEVJ");
                curl_setopt($ch, CURLOPT_URL,"https://www.itexmo.com/php_api/api.php");
                curl_setopt($ch, CURLOPT_POST, 1);
                 curl_setopt($ch, CURLOPT_POSTFIELDS, 
                          http_build_query($itexmo));
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                return curl_exec ($ch);
                curl_close ($ch);
    }

    public function sendSms($message, $customer_id){
    	$number =  User::find($customer_id)->profile->contact;
    	$result = $this->itexmo($number,$message);
	    if ($result == ""){
	    return false;
	    
	    }else if ($result == 0){
	    return true;
	    }
	    else{   
	    return false;
	    }

	    
    }

}