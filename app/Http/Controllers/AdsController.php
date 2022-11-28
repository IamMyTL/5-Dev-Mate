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
    public function index()
    {
        return view('/ads/list',
        [
            'user' => User::Find($_GET['publisher']),
            'ads' => Ad::Where('user_id', Auth::user()->id)->get()->reverse(),
        ]);
    }

    public function create()
    {
        return view('ads/create',
        [
            'skills' => Skill::All(),
        ]);
    }

    public function show()
    {
        return view('/ads/one',
        [
            'ad' => Ad::Find($_GET['ad']),
            'skills' => AdSkill::Where('ad_id', $_GET['ad'])->get(),
        ]);
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
        return redirect('/ads/list?publisher='.Auth::user()->id)->with('success', 'Annonce ajoutée avec succès!');
    }
}
