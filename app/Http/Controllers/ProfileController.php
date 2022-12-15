<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Skill;
use App\Models\UserSkill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        if($user != Auth::user() && Auth::user()->Admin == 0 || $user->id == 1){
            return view('home');
        }
        return view('profiles/edit', compact('user', 'skills', 'checkedSkills'));
    }

    public function update(Request $request, $id)
    {
        //dd($request->image);
        $user = User::Find($id);
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->role = $request->input('role');

        if($user->id != 1){
            $user->Admin = $request->input('Admin') == "on" ? 1 : 0;
        }

        if($request->image != NULL)
        {
            Storage::delete('images/'.$user->image);
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            ]);
            $imageName = time().'.'.$request->image->extension();
            
            $user->image = $imageName;
            $request->image->storeAs('images', $imageName);
        }

        if($request->cv != NULL)
        {
            Storage::delete('storage/cv'.$user->image);
            $request->validate([
                'cv' => 'required|mimes:pdf|max:1024',
            ]);
            $cvName = time().'.'.$request->cv->extension();
            
            $user->cv = $cvName;
            $request->cv->storeAs('cvs', $cvName);
        }

        $user->update();

        

        $userSkillsInDB = UserSkill::Where("user_id", $id);



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
        if($user != Auth::user() && Auth::user()->Admin == 0 || $user->id == 1){
            return view ('home');
        }
        $user->delete();
        Storage::delete('images/'.$user->image);
        Storage::delete('cvs/'.$user->cv);

        return redirect('/')->with('status', 'Le compte a bien été supprimé!');
    }

    public function deleteCv($cv,$id)
    {
        $user = User::Find($id);
        Storage::delete('cvs/'.$user->cv);
        $user->cv = NULL;
        $user->update();
        return redirect('/profiles/one/'.$id)->with('status', 'CV supprimé avec succès!');

    }

}
