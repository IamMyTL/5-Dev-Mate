@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div style="text-align:center"><b>{{ $user->surname }} {{ $user->name }}</b></div>
                    <div style="text-align:center"><img style="width:120px; height:120px;" src="{{url('storage/'.$user->image)}}"></div>
                    @if($user->id == Auth::user()->id || Auth::user()->Admin == 1)
                        <div style="text-align:center">
                            <a href="{{ url('/profiles/edit/'.$user->id) }}" class="btn btn-primary btn-sm">Modifier le profil</a>
                            <a class="btn btn-primary btn-sm" href="{{ url('/profiles/delete/'.$user->id) }}" onclick="return confirm('En cliquant sur OK, votre compte sera définitivement supprimé de la plateforme Dev Mate. Souhaitez-vous continuer?')">Supprimer le profil</a>
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

                    Role: {{$user->role}}<br>
                    Adresse mail: {{$user->email}}<br>
                    Date et heure d'inscription: {{$user->created_at}}<br>
                    Compétences: <br>
                    <ul class="list-group list-group-horizontal">
                        @foreach($user->skills as $skill)
                        @if(Auth::user()->Admin == 1)
                            <li class="list-group-item"> <a href="{{ url('/admin/skill/profiles/'.$skill->id) }}" style="text-decoration:none;"> {{$skill->name}} </a></li>
                            @else
                                <li class="list-group-item">{{$skill->name}} <br></li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection