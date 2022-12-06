@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="text-align: center;">
                    <b>{{ $ad->title }}</b>
                    <br>
                    Auteur: <a href="/profiles/one/{{$ad->user->id}}">{{ $ad->user->surname}} {{ $ad->user->name }}</a>
                    @if($ad->user_id == Auth::user()->id)
                        <div style="text-align:center">
                            <a href="{{ url('/ads/edit/'.$ad->id) }}" class="btn btn-primary btn-sm">Modifier l'annonce</a>
                            <a href="{{ url('/ads/delete/'.$ad->id) }}" class="btn btn-primary btn-sm"  onclick="return confirm('En cliquant sur OK, votre annonce sera définitivement supprimée de la plateforme Dev Mate. Souhaitez-vous continuer?')">Supprimer l'annonce</a>
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    @if (\Session::has('status'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{!! \Session::get('status') !!}</li>
                            </ul>
                        </div>
                    @endif
                    Entreprise: {{ $ad->company }}
                    <br>
                    {{ $ad->description }}
                    <br>
                    <br>

                    Compétences recherchées:
                    <br>
                    <ul class="list-group list-group-horizontal">
                        @foreach($ad->skills as $skill)
                            @if(Auth::user()->Admin == 1)
                                <li class="list-group-item"> <a href="{{ url('/admin/skill/profiles/'.$skill->id) }}" style="text-decoration:none;"> {{$skill->name}} </a></li>
                            @else
                                <li class="list-group-item">{{$skill->name}} <br></li>
                            @endif
                        @endforeach
                    </ul>
                    Date et heure de publication: {{ $ad->created_at }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

