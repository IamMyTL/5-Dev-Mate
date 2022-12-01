<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Skill;
use App\Models\UserSkill;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function show($id)
    {
        $user = User::Find($id);
        return view('/profiles/one', compact('user'));
    }

    public function edit($id)
    {
        $checkedSkills = UserSkill::Where("user_id", $id)->pluck('skill_id')->toArray();
        $skills = Skill::All();
        $user = User::Find($id);
        return view('profiles/edit', compact('user', 'skills', 'checkedSkills'));
    }

    public function update(Request $request, $id)
    {
        $user = User::Find($id);
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->role = $request->input('role');
        if($user->id != 1){
            $user->Admin = $request->input('Admin') == "on" ? 1 : 0;
        }
        $user->update();

        $userSkillsInDB = UserSkill::Where("user_id", $id);

        //Par défaut, on supprime toutes les relations de ce user avec les potentielles skills cochées dans la table intermédiaire


        //Si le rôle de l'utilisateur reste "Candidat" ou s'il le devient, on insère chaque relation de ce user avec les skills cochées
        if ($user->role == "Candidat") {
            $userSkillsInDB->delete();

            if($request->skills != NULL){
                foreach ($request->skills as $skill) {
                    $userskill = new UserSkill(
                        [
                            'user_id' => $id,
                            'skill_id' => $skill,
                        ]
                    );
    
                    $userskill->save();
                }
            }
        }



        return redirect('/profiles/one/' . $id)->with('status', 'Profil modifié avec succès!');
    }

    public function delete($id)
    {
        $user = User::Find($id);
        $user->delete();

        return redirect('/')->with('status', 'Le compte a bien été supprimé!');
    }
}
