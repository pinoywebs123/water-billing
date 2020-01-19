<?php

namespace App\Billing\Traits;
use App\User;
use App\Billing as BillModel;

trait Sms {

	function itexmo($number,$message, $apicode = "ST-CODYC463571_3XEVJ"){
                $ch = curl_init();
                $itexmo = array('1' => $number, '2' => $message, '3' => $apicode);
                curl_setopt($ch, CURLOPT_URL,"https://www.itexmo.com/php_api/api.php");
                curl_setopt($ch, CURLOPT_POST, 1);
                 curl_setopt($ch, CURLOPT_POSTFIELDS, 
                          http_build_query($itexmo));
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                return curl_exec ($ch);
                curl_close ($ch);
    }

    public function sendSms($customer_id, $bill_id){
    	$number =  User::find($customer_id)->profile->contact;
    	$account_id = User::find($customer_id)->account_id;
    	$bill = BillModel::find($bill_id)->bill;
    	$due_date = BillModel::find($bill_id)->end_date;

    	$message = "Dear valued customer Your balance for the month of ".$due_date.", For the account no. ".$account_id." is P".$bill.". To pay your bill, please visit us at the Sibalom Water District office";
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

    public function sendPaidSms($user){
        $number =  User::find($user)->profile->contact;
        $message = "Dear customer thank you for paying your outstanding balance";
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