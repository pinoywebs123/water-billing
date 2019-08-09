<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

use App\User;

class StaffsController extends Controller
{

    public function staffs_store()
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'role_id' => 'required'
        ]);

        $data['password'] = bcrypt(request()->password);
        
        User::create($data);

        return back();
    }

    public function staffs_update()
    {
        $data = request()->validate([
            'id' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'password' => '',
            'role_id' => 'required'
        ]);

        if ($data['password'] == '')
            unset($data['password']);

        $data['password'] = bcrypt(request()->password);
        
        User::find($data['id'])->update($data);

        return back();
    }
}