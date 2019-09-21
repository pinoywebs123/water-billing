<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Profile;
use App\user;

class RegisterController extends Controller
{
    public function register_store()
    {
        $data = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
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
        
        $data['password'] = bcrypt($data['password']);
        $data['role_id'] = '4';
        $data['status_id'] = '1';

        User::create($data);

        $data2['user_id'] = User::orderBy('updated_at', 'desc')->first()->id;
        Profile::create($data2);

        return back();
    }

    public function profile_store()
    {
        $user_id = Auth::user()->id;
        $checkIfProfieExist = Profile::where('user_id', $user_id)->exists();

        if ($checkIfProfieExist)
            $this->profile_update($user_id);

        $data = request()->validate([
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

        $data['user_id'] = $user_id;

        $data2 = request()->validate([
            'email' => 'required'
        ]);
        
        Profile::create($data);
        User::where('id', $user_id)->update($data2);

        return back();
    }
}
