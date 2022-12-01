<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('/admin');
    }

    public function profiles()
    {
        $users = User::all();
        return view('/admin/profiles', compact('users'));
    }

    public function user($id)
    {
        $user = User::find($id);
        return view('/profiles/one', compact('user'));
    }

    public function ads()
    {
        $ads = Ad::all();
        foreach($ads as $ad){
            $getuser = User::Where('id', $ad->user_id)->get()[0];
            $ad->user_name = $getuser->name;
            $ad->user_surname = $getuser->surname;
        }

        return view('/admin/ads', compact('ads'));
    }
}
