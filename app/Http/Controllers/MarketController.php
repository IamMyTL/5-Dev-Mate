<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ad;

class MarketController extends Controller
{
    public function index()
    {   
        $user = Auth::user();

        if($user->role == "Candidat")
        {
            
            $userSkills = $user->skills->pluck('id')->toArray();

            $matchedAds = Ad::whereHas(
            'skills', 
            function($q) use ($userSkills) 
            {
                $q->whereIn('skill_id', $userSkills);
            }
        )
        ->with([
            'skills' => 
            function($q) use ($userSkills) 
            {
                $q->whereIn('skill_id', $userSkills);
            }
        ])
        ->get();

        foreach($matchedAds as $matchedAd)
                {
                    $matchedAd->number = count($matchedAd->skills);
                }

                $sortedAds = $matchedAds->sortByDesc('number');

        $error = "Aucun résultat!";
        return view('/market', compact('user', 'userSkills', isset($sortedAds) ? 'sortedAds' : $error));
        }
     }
}
