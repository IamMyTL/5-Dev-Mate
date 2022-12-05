<?php

namespace App\Http\Controllers;


use App\Models\Ad;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        else if ($user->role == "Recruteur")
        {
            $myAds = Ad::Where('user_id', Auth::user()->id)->get();
            if(isset($_GET) && !empty($_GET))
            {
                $ad = Ad::Where('id',$_GET['id'])->get();
                $adSkills = $ad[0]->skills->pluck('id')->toArray();

                $matchedProfiles = User::whereHas(
                    'skills', 
                    function($q) use ($adSkills) 
                    {
                        $q->whereIn('skill_id', $adSkills);
                    }
                )
                ->with([
                    'skills' => 
                    function($q) use ($adSkills) 
                    {
                        $q->whereIn('skill_id', $adSkills);
                    }
                ])
                ->get();

                foreach($matchedProfiles as $matchedProfile)
                {
                    $matchedProfile->number = count($matchedProfile->skills);
                }

                $sortedProfiles = $matchedProfiles->sortByDesc('number');
            }

            $noneSelected = "Veuillez sélectionner une annonce";
            $error = 'Aucun résultat!';
            return view('/market', compact(isset($ad) ? 'ad' : 'noneSelected', 'user','myAds', isset($sortedProfiles) ? 'sortedProfiles' : 'error' ));
            
        }
     
     }
}
