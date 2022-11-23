<?php

namespace App\Http\Controllers;
use App\Models\Skill;


class SkillController extends Controller
{

    public function index()
    {
        $lskills = Skill::All();
        return view('auth.register', compact('lskills'));
    }
}