<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\User;
use App\Models\Skill;
use App\Models\AdSkill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdsController extends Controller
{
    public function index($id)
    {
        $user = User::Find($id);
        $ads = Ad::Where('user_id', $user->id)->get()->reverse();
        return view('/ads/list', compact('user', 'ads'));
    }

    public function create()
    {
        return view('ads/create',
        [
            'skills' => Skill::All(),
        ]);
    }

    public function show($id)
    {
        $ad = Ad::Find($id);
        return view('/ads/one', compact('ad'));
    }

    public function edit($id)
    {
        $checkedSkills = AdSkill::Where("ad_id", $id)->pluck('skill_id')->toArray();
        $skills = Skill::All();
        $ad = Ad::Find($id);
        return view('ads/edit', compact('ad', 'skills', 'checkedSkills'));
    }



    protected function store(Request $request)
    {
        //Pour insérer l'annonce dans la db, on intègre les données dans un tableau
        $ad = new Ad(
        [
            'title' => $request->title,
            'company' => $request->company,
            'description' => $request->description,
            'user_id' => Auth::user()->id,
        ]);
        
        $ad->save();

        $adid = $ad->id;

        foreach($request->skills as $skill)
        {
            $adskill = new AdSkill(
            [
                'ad_id' => $adid,
                'skill_id' => $skill,
            ]);

            $adskill->save();
        }
        return redirect('/ads/list/'.Auth::user()->id)->with('success', 'Annonce ajoutée avec succès!');
    }

    public function update(Request $request, $id)
    {
        $ad = Ad::Find($id);
        $ad->title = $request->input('title');
        $ad->company = $request->input('company');
        $ad->description = $request->input('description');
        $ad->update();

        $adSkillsInDB = AdSkill::Where("ad_id", $id);

        //Par défaut, on supprime toutes les relations de ce user avec les potentielles skills cochées dans la table intermédiaire

        $adSkillsInDB->delete();
            foreach ($request->skills as $skill) {
                
                $adskill = new AdSkill(
                    [
                        'ad_id' => $id,
                        'skill_id' => $skill,
                    ]
                );

                $adskill->save();
            }
        
        return redirect('/ads/one/'.$id)->with('status', 'Annonce modifiée avec succès!');
    }

    public function delete($id)
    {
        $ad = Ad::Find($id);
        $ad->delete();

        return redirect('/')->with('status', 'Votre annonce a bien été supprimée!');
    }
}
