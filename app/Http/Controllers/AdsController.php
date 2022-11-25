<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class AdsController extends Controller
{
    public function index()
    {
        return view('/ads',
        [
            'user' => User::Find($_GET['id']),
        ]);
    }
}
