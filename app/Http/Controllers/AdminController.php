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
        $users = User::paginate(10);
        return view('/admin/profiles', compact('users'));
    }

    public function user($id)
    {
        $user = User::find($id);
        return view('/profiles/one', compact('user'));
    }

    public function ads()
    {
        $ads = Ad::with('user')->paginate(5);
        return view('/admin/ads', compact('ads'));
    }

    public function usersfromskill($id)
    {
        $users = Skill::with('users')->find($id)->users;
        $skill = Skill::Find($id);
        return view('/admin/profiles', compact('users', 'skill'));
    }

    public function skills()
    {
        $skills = Skill::paginate(10);
        return view('/admin/skills', compact('skills'));
    }

    public function deleteskill($id)
    {
        $skill = Skill::Find($id);
        $skill->delete();
        return redirect('/admin/skills')->with('status', 'La compétence a bien été supprimée !');
    }

    public function addskill()
    {
        return view("/admin/createskill");
    }

    public function storeskill(Request $request)
    {
        $skill = new Skill(
            [
                'name' => $request->input('name')
            ]);
        $skill->save();
        return redirect('/admin/skills')->with('status', 'La compétence a bien été ajoutée !');
    }

    public function editskill($id)
    {
        $skill = Skill::Find($id);
        return view("/admin/editskill", compact('skill'));
    }

    public function updateskill(Request $request, $id)
    {
        $skill = Skill::Find($id);
        $skill->name = $request->input('name');
        $skill->update();
        return redirect('/admin/skills')->with('status', 'La compétence a bien été modifiée !');
    }
}
