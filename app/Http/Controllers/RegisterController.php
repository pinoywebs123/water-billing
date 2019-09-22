<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Profile;
use App\user;
use Str;

class RegisterController extends Controller
{
    public function register_store()
    {
        $data = request()->validate([
            'email' => 'required|email'
        ]);

        $data2 = request()->validate([
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'birth_date' => 'required|date',
            'gender' => 'required',
            'contact' => 'required|numeric',
            'address' => 'required',
            'city' => 'required',
            'province' => 'required'
        ]);
        
        $data['name'] = '';
        
        $password = Str::random(10);
        $data['password'] = bcrypt($password);
        $data['role_id'] = '4';
        $data['status_id'] = '1';

        User::create($data);

        $data2['user_id'] = User::orderBy('updated_at', 'desc')->first()->id;
        Profile::create($data2);

        return redirect()->back()->with('success','You have successfully registered.' . $password );
    }
}
