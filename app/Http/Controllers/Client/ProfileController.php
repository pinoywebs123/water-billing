<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

use App\User;
use App\Profile;

class ProfileController extends Controller
{
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

    public function profile_update($id)
    {
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

        $data['user_id'] = $id;

        $data2 = request()->validate([
            'email' => 'required'
        ]);
        
        Profile::where('user_id', $id)->update($data);
        User::where('id', $id)->update($data2);

        return back();
    }
}
