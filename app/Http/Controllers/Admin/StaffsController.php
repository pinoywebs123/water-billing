<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

use App\User;
use App\Profile;

class StaffsController extends Controller
{

    public function staffs_store()
    {
        $year = date('Y');
        $account_id = $year;
        
        $data = request()->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'role_id' => 'required',
            'account_id'=> 'required'
        ]);

        
        if($data['role_id'] == 2){
            $account_id = $account_id.'-'.'B';
        }else if($data['role_id'] == 3){
            $account_id = $account_id.'-'.'C';
        }else if($data['role_id'] == 5){
            $account_id = $account_id.'-'.'M';
        }
        $data['account_id'] = $account_id.$data['account_id'];

        $check_account_id = User::where('account_id', $data['account_id'])->first();

        if($check_account_id){
            return redirect()->back()->with('error','Account ID Already Exist!');
        }

        $data2 = request()->validate([
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required'
        ]);

        // 2 - B 
        // 3 - C 
        // 5 - M 

        $data['password'] = bcrypt(request()->password);
        $data['status_id'] = 3;
         
        // dd($data);   
        $user = new User;
        $user->role_id = $data['role_id'];
        $user->account_id = $data['account_id'];
        $user->email = $data['email'];
        $user->password = $data['password'];
        $user->status_id = $data['status_id'];
        $user->save();

        //$user = User::create($data);


        $user_id = User::orderBy('updated_at', 'desc')->first()->id;
        $data2['user_id'] = $user_id;
        $data2['birth_date'] = $date = date('Y-m-d', time());;
        $data2['gender'] = '';
        $data2['contact'] = '';
        $data2['address'] = '';
        $data2['city'] = '';
        $data2['province'] = '';

        Profile::create($data2);

        return back()->with('success','New Account Successfully Added!');
    }

    public function staffs_update()
    {
        $data = request()->validate([
            'id' => 'required',
            'email' => 'required|email',
            'password' => '',
            'role_id' => 'required'
        ]);

        $data2 = request()->validate([
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
        ]);

        if ($data['password'] == '')
            unset($data['password']);
		else
			$data['password'] = bcrypt(request()->password);
    
        User::find($data['id'])->update($data);
        Profile::where('user_id', $data['id'])->update($data2);

        return back();
    }
}
