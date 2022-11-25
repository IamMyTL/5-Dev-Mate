@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if(Auth::user()->Admin == 1)
                    <div class="card-header">{{ __('Interface administrateur') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        
                        {{ __("Futur contenu de l'interface administrateur") }}
                    </div>
                @else
                    <div class="card-header">{{ __('Accès refusé') }}</div>

                    <div class="card-body">
                        {{ __("Vous n'avez pas les droits nécessaires pour accéder à cette page") }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
