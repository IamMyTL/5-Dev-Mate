@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>{{ $ad->title }}</b></div>
                <div style="text-align:center">
                    <a href="{{ url('/ads/edit/'.$ad->id) }}" class="btn btn-primary btn-sm">Modifier l'annonce</a>
                    <a class="btn btn-primary btn-sm" href="{{ url('/ads/delete/'.$ad->id) }}" onclick="return confirm('En cliquant sur OK, votre annonce sera définitivement supprimée de la plateforme Dev Mate. Souhaitez-vous continuer?')">Supprimer l'annonce</a>
                </div>
                <div class="card-body">
                    @if (\Session::has('status'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{!! \Session::get('status') !!}</li>
                            </ul>
                        </div>
                    @endif
                    {{ $ad->description }}
                    <br>
                    <br>
                    Date et heure de publication: {{ $ad->created_at }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
