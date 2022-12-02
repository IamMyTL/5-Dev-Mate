<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\User;
use App\Models\Skill;
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
        $ads = Ad::with('user')->get();
        return view('/admin/ads', compact('ads'));
    }

    public function usersfromskill($id){
        $users = Skill::with('users')->find($id)->users;
        $skill = Skill::Find($id);
        return view('/admin/profiles', compact('users', 'skill'));
    }
}
