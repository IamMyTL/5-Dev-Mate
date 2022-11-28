<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Skill;
use App\Models\UserSkill;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function mine($id)
    {
        $user = User::Find($id);
        return view('/profiles/mine', compact('user'));
    }

    public function show()
    {
        return view('/profiles/one',
        [
            'user' => User::Find($_GET['user']),
        ]);
    }

    public function edit($id)
    {
        $lsskills = Skill::All();
        $user = User::Find($id);
        return view('profiles/edit', compact('user', 'lsskills'));
    }

    public function update(Request $request, $id)
    {
        $user = User::Find($id);
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->role = $request->input('role');
        $user->update();

        $checkedSkills = UserSkill::Where("user_id", $id);

        if($user->role == "Recruteur")
        {
            $checkedSkills->delete();
        }
        else
        {
            foreach($request->skills as $skill)
            {
                $userskill = new UserSkill(
                    [
                        'user_id' => $id,
                        'skill_id' => $skill,
                    ]);
                    
                $userskill->save();
            }
        }

        return redirect('/profiles/mine/'.$id)->with('status', 'Profil modifié avec succès!');
        
    }

    public function delete($id)
    {
        $user = User::Find($id);
        $user->delete();

        return redirect('/')->with('status', 'Votre compte a bien été supprimé!');
    }

}
