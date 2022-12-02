@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if($user->id == Auth::user()->id)
                    <div class="card-header" style="text-align: center">
                        <b>{{ __('Modification du profil') }}</b>
                        <div style="text-align: center">
                            <a href="{{ url('/auth/passwords/edit') }}" class="btn btn-primary btn-sm">Modifier le mot de passe</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <form id="editProfile" method="POST" action="{{ url('profiles/update/'.Auth::user()->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div style="text-align:center;">
                                <img src="{{url('storage/'.$user->image)}}" id="imgshow" style="width:120px; height:120px; text align:center;">
                            </div>
                            <br>

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nom') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="surname" class="col-md-4 col-form-label text-md-end">{{ __('Prénom') }}</label>

                                <div class="col-md-6">
                                    <input id="surname" type="text" class="form-control" name="surname" value="{{$user->surname}}" required autocomplete="surname">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Image de profil') }}</label>
    
                                <div class="col-md-6">
                                    <input id="imgload" type="file" class="form-control" name="image" onchange="onFileSelected(event)">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="role" class="col-md-4 col-form-label text-md-end">{{ __('Rôle') }}</label>

                                <div class="col-md-6">
                                    <select id="role" type="text" class="form-control" name="role" value="{{$user->role}}" required autocomplete="role">
                                        <option id="selected" name="selected">{{$user->role}}</option>
                                        @if($user->role == "Recruteur")
                                            <option id="candidate" name="candidate">{{ __('Candidat') }}</option>
                                        @else
                                            <option id="employee" name="employee">{{ __('Recruteur') }}</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            
                            <div class="row mb-3" id="skillschecks">
                                <label class="col-md-4 col-form-label text-md-end">{{ __('Compétences') }}</label>                
                                <div class="form-check" style="text-align:center">
                                    <div>
                                        @foreach($skills as $skill)
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="skills[]" type="checkbox" value="{{$skill['id']}}" @if(in_array($skill['id'], $checkedSkills)) checked @endif>
                                                <label class="form-check-label" >{{$skill['name']}}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            
                            <div>
                                <div style="text-align: center">
                                    <button id="editConfirm" type="submit" class="btn btn-primary" style="text-align: center">
                                        {{ __('Modifier') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                @else
                    <div class="card-header" style="text-align: center">
                        <b>{{ __('Accès refusé') }}</b>
                    </div>
                    <div class="card-body">
                        {{ __("Vous n'avez pas les droits nécessaires pour accéder à cette page") }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
