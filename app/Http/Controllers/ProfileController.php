<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('/profile',
        [
            'user' => User::Find($_GET['id']),
        ]);
    }
}
