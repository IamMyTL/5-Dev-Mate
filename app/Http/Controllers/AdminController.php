<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
}
