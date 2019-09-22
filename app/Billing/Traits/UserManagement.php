<?php

namespace App\Billing\Traits;
use Illuminate\Http\Request;
use App\User;
use App\Billing;

trait UserManagement {

	public $request;

	public function __construct(Request $request)
	{
		$this->request = $request;
	}
	public function getAllClient()
	{
		$clients = User::where('role_id',4)->where('status_id','!=',5)->get();
		return $clients;
	}

	public function findClient($id)
	{
		return User::where('id',$id)->where('role_id',4)->first();
	}

	public function editClient($id)
	{
		$findClient = User::where('id',$id)->where('role_id',4)->first();
	}

	public function lockClient($id)
	{
		$findClient = User::where('id',$id)->where('role_id',4)->first();
		$findClient->update(['status_id' => 5]);
		return $findClient;
	}

	//Client Records

	public function viewClientRecords($id)
	{
		return Billing::where('client_id',$id)->orderBy('id','desc')->get();
	}
	public function updateClientRecords($id)
	{
		$user = Billing::where('client_id',$id)->first();

	}

}