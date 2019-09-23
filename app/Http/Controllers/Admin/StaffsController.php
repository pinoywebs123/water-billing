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
        $data = request()->validate([
            'email' => 'required|email',
            'password' => 'required',
            'role_id' => 'required'
        ]);

        $data2 = request()->validate([
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required'
        ]);

        $data['password'] = bcrypt(request()->password);
        $data['status_id'] = 3;
        
        User::create($data);

        $user_id = User::orderBy('updated_at', 'desc')->first()->id;
        $data2['user_id'] = $user_id;
        $data2['birth_date'] = $date = date('Y-m-d', time());;
        $data2['gender'] = '';
        $data2['contact'] = '';
        $data2['address'] = '';
        $data2['city'] = '';
        $data2['province'] = '';

        Profile::create($data2);

        return back();
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
