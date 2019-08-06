<?php

namespace App\Billing\Auth;
use Illuminate\Http\Request;
use Auth;
/**
 * 
 */
class AuthClass
{
	private $request;
	
	function __construct(Request $request)
	{
		$this->request = $request;
	}

	public function loginAttempt()
	{
		if(Auth::attempt($this->request->only('email','password')))
		{
			if(Auth::user()->role_id == 1)
			{
				return redirect()->route('admin_home');
			}else if(Auth::user()->role_id == 2)
			{
				return redirect()->route('billing_home');

			}else if(Auth::user()->role_id == 3)
			{
				return redirect()->route('cashier_home');
			}else if(Auth::user()->role_id == 4)
			{	
				return redirect()->route('client_home');
			}else if(Auth::user()->role_id == 5)
			{
				return redirect()->route('maintenance_home');
			}
		}else
		{
			return redirect()->back()->with('error','Invlalid Username/Password Combination');
		}
		
	}
}