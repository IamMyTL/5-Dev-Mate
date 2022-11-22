@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Inscription') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nom') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                                <input id="surname" type="text" class="form-control" name="surname" required autocomplete="surname">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="role" class="col-md-4 col-form-label text-md-end">{{ __('Rôle') }}</label>

                            <div class="col-md-6">
                                <select id="role" type="text" class="form-control" name="role" required autocomplete="role">
                                <option id="candidate" name="candidate">{{ __('Candidat') }}</option>
                                    <option id="employee" name="employee">{{ __('Recruteur') }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Adresse mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3" id="skillschecks">
                            <label class="col-md-4 col-form-label text-md-end">{{ __('Compétences') }}</label>                
                            <div class="form-check" style="text-align:center">
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="skills[]" type="checkbox" value="1">
                                        <label class="form-check-label" >PHP</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="skills[]" type="checkbox" value="2">
                                        <label class="form-check-label" >C++</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="skills[]" type="checkbox" value="3">
                                        <label class="form-check-label" >C#</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="skills[]" type="checkbox" value="4">
                                        <label class="form-check-label" >Java</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="skills[]" type="checkbox" value="5">
                                        <label class="form-check-label" >Python</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="skills[]" type="checkbox" value="6">
                                        <label class="form-check-label" >Laravel</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="skills[]" type="checkbox" value="7">
                                        <label class="form-check-label" >Spring</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="skills[]" type="checkbox" value="8">
                                        <label class="form-check-label" >UML</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="skills[]" type="checkbox" value="9">
                                        <label class="form-check-label" >Merise</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="skills[]" type="checkbox" value="10">
                                        <label class="form-check-label" >HTML</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="skills[]" type="checkbox" value="11">
                                        <label class="form-check-label" >CSS</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="skills[]" type="checkbox" value="12">
                                        <label class="form-check-label" >JavaScript</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="skills[]" type="checkbox" value="13">
                                        <label class="form-check-label" >Drupal</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="skills[]" type="checkbox" value="14">
                                        <label class="form-check-label" >Symfony</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="skills[]" type="checkbox" value="15">
                                        <label class="form-check-label" >WordPress</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Mot de passe') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirmation mot de passe') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Inscription') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
